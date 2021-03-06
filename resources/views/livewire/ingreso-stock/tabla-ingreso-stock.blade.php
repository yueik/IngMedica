<div>

    <div class="px-0 py-3 flex justify-between">
        <button wire:click.prevent="addIngresoStock" type="button" class="btn btn-primary">Agregar Ingreso</button>
        <input type="text" wire:model="search" placeholder="Buscar...">
    </div>

    <div class="modal fade" wire:ignore.self id="addIngresoStock" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="min-width: 85%;" role="document">
            <div class="modal-content p-2">
                <div class="modal-header mb-2 bg-blue-500">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if($editModal)
                        <span class="text-white">Editar Ingreso de Stock</span>
                        @else
                        <span class="text-white">Registrar Ingreso de Stock</span>
                        @endif
                    </h5>
                    <button type="button" class="close" wire:click.prevent="cerrarModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $editModal ? 'updateIngresoStock' : 'createIngresoStock' }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="fecha">Fecha</label>
                                <input type="date" class="form-control @error('fecha') is-invalid @enderror"
                                    name="fecha" wire:model.defer="state.fecha">
                                @error('fecha')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-3">
                                <label for="observacion">Observaci??n</label>
                                <input type="text" class="form-control" id="observacion"
                                    wire:model.defer="state.observacion">
                            </div>
                        </div>

                        @livewire('detalle-ingreso.tabla-detalle-ingreso')

                    </div>
                    <div class="modal-footer align-items-center">
                        <button type="button" class="btn btn-secondary" wire:click.prevent="cerrarModal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" wire:loading.remove
                            wire:target="save">Guardar</button>
                        <img src="{{ asset('img/loading.gif') }}" height="50" width="50" wire:loading wire:target="save"
                            alt="Cargando..">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($ingresos->count())

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="bg-gray-600">
                <tr>
                    <th scope="col"
                        class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
                        wire:click="order('fecha')">
                        Fecha
                        @if($sort =='fecha')
                        @if($direction == 'asc')
                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                        @else
                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                        @endif
                        @else
                        <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col"
                        class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider">
                        N?? de Implantes                        
                    </th>
                    <th scope="col"
                        class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
                        wire:click="order('observacion')">
                        Observaci??n
                        @if($sort =='observacion')
                        @if($direction == 'asc')
                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                        @else
                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                        @endif
                        @else
                        <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col"
                        class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white text-center divide-y divide-gray-200">
                @foreach ($ingresos as $ingreso)
                <tr>
                    <td>{{ $ingreso->fecha }}</td>
                    <td>{{ $ingreso->n_cant_detalles }}</td>
                    <td>{{ $ingreso->observacion }}</td>
                    <td>
                        <a type="button" class="btn btn-warning" wire:click.prevent="editIngresoStock({{ $ingreso }})">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <button wire:click="destroy({{ $ingreso->id }})" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $ingresos->links() }}
    </div>
    @else
    <div class="alert alert-danger" role="alert">
        No existe ninguna coincidencia
    </div>
    @endif
</div>