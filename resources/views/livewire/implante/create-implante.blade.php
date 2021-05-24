<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addImplante">Agregar</button>

    <div class="modal fade" id="addImplante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
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
                            <select class="form-control" name="modelo" wire:model.defer="modelo">
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->modelo->id }}">{{ $implante->modelo->modelo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="talle">Talle</label>
                            <select class="form-control" name="talle" wire:model.defer="talle">
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->talle->id }}">{{ $implante->talle->talle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" name="codigo" wire:model.defer="codigo">
                            @error('codigo')
                            <span>
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="serie">Serie</label>
                            <input type="text" class="form-control" name="serie" wire:model.defer="serie">
                            @error('serie')
                            <span>
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" name="estado" wire:model.defer="estado">
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->estado->id }}">{{ $implante->estado->estado }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                            wire:click.prevent="save">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>