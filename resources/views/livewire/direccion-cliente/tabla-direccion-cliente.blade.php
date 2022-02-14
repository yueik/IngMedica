<div>
    <div class="modal fade" wire:ignore.self id="direcciones" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="min-width: 85%;" role="document">
            <div class="modal-content p-2">
                <div class="modal-header mb-2 bg-green-600">
                    <h5 class="modal-title text-white" id="exampleModalLabel">
                        <b>Listado de Direcciones de {{$cliente}}</b>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="card p-3 m-0">

                    <div class="px-0 py-3 flex justify-between">
                        <button wire:click.prevent="addDireccion" type="button" class="btn btn-primary">Agregar</button>
                        <input type="text" wire:model="search" placeholder="Buscar...">
                    </div>

                    <div class="modal fade" wire:ignore.self id="addDireccion" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-blue-500">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        @if($editModal)
                                        <span class="text-white">Editar Direccion</span>
                                        @else
                                        <span class="text-white">Registrar Direccion</span>
                                        @endif
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form wire:submit.prevent="{{ $editModal ? 'updateDireccion' : 'createDireccion' }}">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" id="cliente_id" wire:model.defer="state.cliente_id" value="{{$cliente_id}}">
                                        <div class="form-group">
                                            <label for="calle">Calle</label>
                                            <input type="text" class="form-control @error('calle') is-invalid @enderror"
                                                id="calle" wire:model.defer="state.calle">
                                            @error('calle')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="numero">numero</label>
                                            <input type="text"
                                                class="form-control @error('numero') is-invalid @enderror" name="numero"
                                                wire:model.defer="state.numero">
                                            @error('numero')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="piso">piso</label>
                                            <input type="text" class="form-control @error('piso') is-invalid @enderror"
                                                name="piso" wire:model.defer="state.piso">
                                            @error('piso')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="dpto">dpto</label>
                                            <input type="text" class="form-control @error('dpto') is-invalid @enderror"
                                                name="dpto" wire:model.defer="state.dpto">
                                            @error('dpto')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="barrio">barrio</label>
                                            <input type="text"
                                                class="form-control @error('barrio') is-invalid @enderror" name="barrio"
                                                wire:model.defer="state.barrio">
                                            @error('barrio')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="codigoPostal">Codigo Postal</label>
                                            <input type="text"
                                                class="form-control @error('codigoPostal') is-invalid @enderror"
                                                name="codigoPostal" wire:model.defer="state.codigoPostal">
                                            @error('codigoPostal')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="observacion">Observacion</label>
                                            <input type="text"
                                                class="form-control @error('observacion') is-invalid @enderror"
                                                name="observacion" wire:model.defer="state.observacion">
                                            @error('observacion')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer align-items-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary" wire:loading.remove
                                            wire:target="save">Guardar</button>
                                        <img src="{{ asset('img/loading.gif') }}" height="50" width="50" wire:loading
                                            wire:target="save" alt="Cargando..">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    @if ($direcciones->count())

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="bg-gray-600">
                                <tr>
                                    <th scope="col"
                                        class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
                                        wire:click="order('calle')">
                                        Calle
                                        @if($sort =='calle')
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
                                        wire:click="order('numero')">
                                        Número
                                        @if($sort =='numero')
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
                                        wire:click="order('piso')">
                                        Piso
                                        @if($sort =='piso')
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
                                        wire:click="order('dpto')">
                                        Dpto
                                        @if($sort =='dpto')
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
                                        wire:click="order('barrio')">
                                        Barrio
                                        @if($sort =='barrio')
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
                                        wire:click="order('codigoPostal')">
                                        Código Postal
                                        @if($sort =='codigoPostal')
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
                                        wire:click="order('observacio')">
                                        Observacion
                                        @if($sort =='barrio')
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
                                @foreach ($direcciones as $direccion)
                                <tr>
                                    <td>{{ $direccion->calle }}</td>
                                    <td>{{ $direccion->numero }}</td>
                                    <td>{{ $direccion->piso }}</td>
                                    <td>{{ $direccion->dpto }}</td>
                                    <td>{{ $direccion->barrio }}</td>
                                    <td>{{ $direccion->codigoPostal }}</td>
                                    <td>{{ $direccion->observacion }}</td>
                                    <td>
                                        <a type="button" class="btn btn-warning"
                                            wire:click.prevent="editDireccion({{ $direccion }})">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <button wire:click="destroy({{ $direccion->id }})" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $direcciones->links() }}
                    </div>
                    @else
                    <div class="alert alert-danger" role="alert">
                        No existe ninguna coincidencia
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>