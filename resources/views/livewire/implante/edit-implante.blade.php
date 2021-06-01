<div>
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editImplante">
        <i class="fas fa-pencil-alt"></i>
    </button>

    <div class="modal fade" wire:ignore.self id="editImplante" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue-500">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Editar Implante</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="update">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="marca_id">Marca</label>
                            <select class="form-control" name="marca_id" wire:model.defer="marca_id">
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->modelo->marca->id }}">
                                    {{ $implante->modelo->marca->marca }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="modelo_id">Modelo</label>
                            <select class="form-control @error('modelo_id') is-invalid @enderror" name="modelo_id"
                                wire:model.defer="modelo_id">
                                <option value=""></option>
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->modelo->id }}">{{ $implante->modelo->modelo }}</option>
                                @endforeach
                            </select>
                            @error('modelo_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="talle_id">Talle</label>
                            <select class="form-control @error('talle_id') is-invalid @enderror" name="talle_id"
                                wire:model.defer="talle_id">
                                <option value=""></option>
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->talle->id }}">{{ $implante->talle->talle }}</option>
                                @endforeach
                            </select>
                            @error('talle_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo"
                                wire:model.defer="implante.codigo">
                            @error('codigo')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="serie">Serie</label>
                            <input type="text" class="form-control @error('serie') is-invalid @enderror" name="serie"
                                wire:model.defer="implante.serie">
                            @error('serie')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="estado_id">Estado</label>
                            <select class="form-control @error('estado_id') is-invalid @enderror" name="estado_id"
                                wire:model.defer="estado_id">
                                <option value=""></option>
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->estado->id }}">{{ $implante->estado->estado }}</option>
                                @endforeach
                            </select>
                            @error('estado_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer align-items-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" wire:loading.remove
                            wire:target="update">Guardar</button>
                        <img src="{{ asset('img/loading.gif') }}" height="50" width="50" wire:loading wire:target="update"
                            alt="Cargando..">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>