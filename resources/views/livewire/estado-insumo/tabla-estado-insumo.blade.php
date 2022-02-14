<div>
    <div class="px-0 py-3 flex justify-between">
        <button wire:click.prevent="addEstadoInsumo" type="button" class="btn btn-primary">Agregar</button>
        <input type="text" wire:model="search" placeholder="Buscar...">
    </div>

    <div class="modal fade" wire:ignore.self id="addEstadoInsumo" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue-500">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @if($editModal)
                        <span class="text-white">Editar Estado</span>
                        @else
                        <span class="text-white">Registrar Estado</span>
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $editModal ? 'updateEstadoInsumo' : 'createEstadoInsumo' }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control @error('estado') is-invalid @enderror" id="estado"
                                wire:model.defer="state.estado">
                            @error('estado')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
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

    @if ($estados->count())

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="bg-gray-600">
                <tr>
                    <th scope="col"
                        class="cursor-pointer px-6 py-3 text-center text-xs font-medium text-gray-200 uppercase tracking-wider"
                        wire:click="order('estado')">
                        Estado
                        @if($sort =='estado')
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
                @foreach ($estados as $estado)
                <tr>
                    <td>{{ $estado->estado }}</td>
                    <td>
                        <a type="button" class="btn btn-warning" wire:click.prevent="editEstadoInsumo({{ $estado }})">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <button wire:click="destroy({{ $estado->id }})" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $estados->links() }}
    </div>
    @else
    <div class="alert alert-danger" role="alert">
        No existe ninguna coincidencia
    </div>
    @endif
</div>