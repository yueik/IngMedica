<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addImplante">Agregar</button>

    <div class="modal fade" wire:ignore.self id="addImplante" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue-500">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Registrar Implante</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="save">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <select class="form-control" name="marca" wire:model.defer="marca">
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->modelo->marca->id }}">
                                    {{ $implante->modelo->marca->marca }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <select class="form-control @error('modelo') is-invalid @enderror" name="modelo"
                                wire:model.defer="modelo">
                                <option value=""></option>
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->modelo->id }}">{{ $implante->modelo->modelo }}</option>
                                @endforeach
                            </select>
                            @error('modelo')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="talle">Talle</label>
                            <select class="form-control @error('talle') is-invalid @enderror" name="talle"
                                wire:model.defer="talle">
                                <option value=""></option>
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->talle->id }}">{{ $implante->talle->talle }}</option>
                                @endforeach
                            </select>
                            @error('talle')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo"
                                wire:model.defer="codigo">
                            @error('codigo')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="serie">Serie</label>
                            <input type="text" class="form-control @error('serie') is-invalid @enderror" name="serie"
                                wire:model.defer="serie">
                            @error('serie')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control @error('estado') is-invalid @enderror" name="estado"
                                wire:model.defer="estado">
                                <option value=""></option>
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->estado->id }}">{{ $implante->estado->estado }}</option>
                                @endforeach
                            </select>
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
                        <img src="{{ asset('img/loading.gif') }}" height="50" width="50" wire:loading
                            wire:target="save" alt="Cargando..">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>