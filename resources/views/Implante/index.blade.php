@extends('adminlte::page')

@section('title', 'Implantes')

@section('content_header')
    <h1>Listado De Implantes</h1>
@stop

@section('content')
    <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#addImplante">
    Launch demo modal
    </button>

    @livewire('implante.tabla-implante')

    <!-- Modal Create -->
    <div class="modal fade" id="addImplante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('Implantes.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <select class="form-control" name="marca">
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->modelo->marca->id }}">{{ $implante->modelo->marca->marca }}</option>
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

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/Implantes" method="POST" id="formEditImplante">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <select class="form-control" name="marca" id="marca">
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->modelo->marca->id }}">{{ $implante->modelo->marca->marca }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <select class="form-control" name="modelo" id="modelo">
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->modelo->id }}">{{ $implante->modelo->modelo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">                            
                            <label for="talle">Talle</label>
                            <select class="form-control" name="talle" id="talle">
                                @foreach ($implantes as $implante)
                                <option value="{{ $implante->talle->id }}">{{ $implante->talle->talle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">                            
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" name="codigo" id="codigo">
                        </div>
                        <div class="form-group">                            
                            <label for="serie">Serie</label>
                            <input type="text" class="form-control" name="serie" id="serie">
                        </div>
                        <div class="form-group">                            
                            <label for="estado">Estado</label>
                            <select class="form-control" name="estado" id="estado">
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
@stop

@section('css')    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop

@section('js')
@stop