<div>
    <div class="px-0 py-3 flex justify-between">
        <button wire:click.prevent="addDetalle" type="button" class="btn btn-primary">Agregar Implante</button>
        <input type="text" wire:model="search" placeholder="Buscar...">
    </div>

    <div class="modal fade" wire:ignore.self id="addDetalle" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content p-2">
                <div class="modal-header mb-2 bg-blue-500">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if($editModal)
                        <span class="text-white">Editar Detalle</span>
                        @else
                        <span class="text-white">Registrar Detalle</span>
                        @endif
                    </h5>
                    <button type="button" class="close" wire:click.prevent="cerrarModalDetalle">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $editModal ? 'updateDetalle' : 'createDetalle' }}">
                    @csrf
                    <div class="modal-body grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <input type="hidden" class="form-control" id="egreso_stock_id" wire:model.defer="state.egreso_stock_id" value="{{$egreso_stock_id}}">
                        <div class="form-group">
                            <label for="implante_id">Implante</label>
                            <select class="form-control @error('implante_id') is-invalid @enderror" name="implante_id"
                                wire:model.defer="state.implante_id">
                                <option value=""></option>
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->id }}">{{ $implante->codigo }}</option>
                                @endforeach
                            </select>
                            @error('implante_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="monto">Monto</label>
                            <input type="text" class="form-control @error('monto') is-invalid @enderror" id="monto"
                                wire:model.defer="state.monto">
                            @error('monto')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer align-items-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" wire:loading.remove
                            wire:target="save" wire:click.prevent="{{ $editModal ? 'updateDetalle' : 'createDetalle' }}">Guardar</button>
                        <img src="{{ asset('img/loading.gif') }}" height="50" width="50" wire:loading wire:target="save"
                            alt="Cargando..">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($detalles->count())

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
                        wire:click="order('implante_id')">
                        Implante
                        @if($sort =='implante_id')
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
                        wire:click="order('monto')">
                        Monto
                        @if($sort =='monto')
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
                @foreach ($detalles as $detalle)
                <tr>
                    <td>{{ $detalle->id }}</td>
                    <td>{{ $detalle->implante->id }}</td>
                    <td>{{ $detalle->monto }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" wire:click.prevent="editDetalle({{ $detalle }})">
                            <i class="fas fa-pencil-alt"></i>
                        </button>

                        <button wire:click.prevent="{{ $detalle->implante->estado->estado == 'Concesion' ? 'devolucion' : 'concesion' }}({{ $detalle->implante->id }})" 
                            class="btn btn-{{ $detalle->implante->estado->estado == 'Concesion' ? 'success' : 'danger' }}">
                            <i class="fas fa-{{ $detalle->implante->estado->estado == 'Concesion' ? 'check' : 'times' }}"></i>
                        </button>

                        <button wire:click.prevent="destroy({{ $detalle->id }})" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $detalles->links() }}
    </div>
    @else
    <div class="alert alert-danger" role="alert">
        No existe ninguna coincidencia
    </div>
    @endif
</div>