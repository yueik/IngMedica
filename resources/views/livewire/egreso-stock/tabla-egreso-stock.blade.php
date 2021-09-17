<div>
    <div class="px-0 py-3 flex justify-between">
        <button wire:click.prevent="addEgresoStock" type="button" class="btn btn-primary">Agregar</button>
        <input type="text" wire:model="search" placeholder="Buscar...">
    </div>

    <div class="modal fade" wire:ignore.self id="addEgresoStock" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="min-width: 85%;" role="document">
            <div class="modal-content p-2">
                <div class="modal-header mb-2 bg-blue-500">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if($editModal)
                        <span class="text-white">Editar Egreso de Stock</span>
                        @else
                        <span class="text-white">Registrar Egreso de Stock</span>
                        @endif
                    </h5>
                    <button type="button" class="close" wire:click.prevent="cerrarModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $editModal ? 'updateEgresoStock' : 'createEgresoStock' }}">
                    @csrf
                    <div class="modal-body">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" class="form-control @error('fecha') is-invalid @enderror"
                                    name="fecha" wire:model.defer="state.fecha">
                                @error('fecha')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cliente_id">Cliente</label>
                                <select class="form-control @error('cliente_id') is-invalid @enderror" name="cliente_id"
                                    wire:model.defer="state.cliente_id">
                                    <option value=""></option>
                                    @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->cliente }}</option>
                                    @endforeach
                                </select>
                                @error('cliente_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="montoFinal">Monto</label>
                                <input type="number" class="form-control @error('montoFinal') is-invalid @enderror"
                                    name="montoFinal" wire:model.defer="state.montoFinal">
                                @error('montoFinal')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="estado_id">Estado</label>
                                <select class="form-control @error('estado_id') is-invalid @enderror" name="estado_id"
                                    wire:model.defer="state.estado_id">
                                    <option value=""></option>
                                    @foreach ($estados as $estado)
                                    <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                                    @endforeach
                                </select>
                                @error('estado_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="observacion">Observación</label>
                                <input type="text" class="form-control" id="observacion"
                                    wire:model.defer="state.observacion">
                            </div>
                        </div>

                        @livewire('detalle-egreso.tabla-detalle-egreso')

                    </div>
                    <div class="modal-footer align-items-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" wire:loading.remove
                            wire:target="save">Guardar</button>
                        <img src="{{ asset('img/loading.gif') }}" height="50" width="50" wire:loading wire:target="save"
                            alt="Cargando..">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($egresos->count())

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="bg-gray-600">
                <tr>
                    <th scope="col"
                        class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
                        wire:click="order('id')">
                        Código
                        @if($sort =='id')
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
                        class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
                        wire:click="order('cliente_id')">
                        Cliente
                        @if($sort =='cliente_id')
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
                        class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
                        wire:click="order('montoFinal')">
                        Monto
                        @if($sort =='montoFinal')
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
                        class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
                        wire:click="order('estado_id')">
                        Estado
                        @if($sort =='estado_id')
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
                        class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
                        wire:click="order('observacion')">
                        Observación
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
                @foreach ($egresos as $egreso)
                <tr>
                    <td>{{ $egreso->id }}</td>
                    <td>{{ $egreso->fecha }}</td>
                    <td>{{ $egreso->cliente->cliente }}</td>
                    <td>{{ $egreso->montoFinal }}</td>
                    <td>{{ $egreso->estado->estado }}</td>
                    <td>{{ $egreso->observacion }}</td>
                    <td>
                        <a type="button" class="btn btn-warning" wire:click.prevent="editEgresoStock({{ $egreso }})">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a href="{{ route('Remito', $egreso->id) }}" type="button" class="btn btn-secondary"><i class="fas fa-print"></i></a>

                        <button wire:click="destroy({{ $egreso->id }})" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $egresos->links() }}
    </div>
    @else
    <div class="alert alert-danger" role="alert">
        No existe ninguna coincidencia
    </div>
    @endif
</div>