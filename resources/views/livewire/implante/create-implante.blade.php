<div>
    <div class="modal fade" wire:model="open" id="addImplante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                            <select class="form-control" name="marca">
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->modelo->marca->id }}">
                                    {{ $implante->modelo->marca->marca }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <select class="form-control" name="modelo">
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->modelo->id }}">{{ $implante->modelo->modelo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="talle">Talle</label>
                            <select class="form-control" name="talle">
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->talle->id }}">{{ $implante->talle->talle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" name="codigo">
                        </div>
                        <div class="form-group">
                            <label for="serie">Serie</label>
                            <input type="text" class="form-control" name="serie">
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" name="estado">
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->estado->id }}">{{ $implante->estado->estado }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>