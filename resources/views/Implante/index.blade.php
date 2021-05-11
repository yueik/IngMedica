@extends('adminlte::page')

@section('title', 'Implantes')

@section('content_header')
    <h1>Listado De Implantes</h1>
@stop

@section('content')
    <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#addImplante">
    Launch demo modal
    </button>

    <table id="implantes" class="table table-striped table-bordered shadow-lg mt-4">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Talle</th>
                <th scope="col">Codigo</th>
                <th scope="col">Serie</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($implantes as $implante)
            <tr>
                <td>{{ $implante->id }}</td>
                <td>{{ $implante->modelo->marca->marca }}</td>
                <td>{{ $implante->modelo->modelo }}</td>
                <td>{{ $implante->talle->talle }}</td>
                <td>{{ $implante->codigo }}</td>
                <td>{{ $implante->serie }}</td>
                <td>{{ $implante->estado->estado}}</td>
                <td>
                    <form action="{{ route('Implantes.destroy', $implante->id) }}" method="POST">
                        <a href="#" class="btn btn-info editImplante"><i class="far fa-fw fa-file"></i> Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

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
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            //Tabla
            var tablaImplantes = $('#implantes').DataTable({
                "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "autoWidth": false
            });
            
            $('#formEditImplante').submit(function(e) {
                e.preventDefault();
                tablaImplantes.ajax.reload(null, false);
            })

            //Boton Editar
            tablaImplantes.on('click', '.editImplante', function(){                
                //Obtengo la fila
                fila = $(this).closest('tr');
                if($(fila).hasClass('child')) {
                    fila = fila.prev('.parent');
                }
                //Coloco los valores del registro en el Form
                var data = tablaImplantes.row(fila).data();
                console.log(data[1])
                $('#modelo option[value="' + data[2] + '"]').prop('selected', true);
                $('#talle option[value="' + data[3] + '"]').prop('selected', true);
                $('#codigo').val(data[4]);
                $('#serie').val(data[5]);
                $('#estado option[value="' + data[6] + '"]').prop('selected', true);
                //Edito el action del Form
                $('#formEditImplante').attr('action', '/Implantes/'+data[0]);

                $(".modal-header").css("background-color", "#007bff");
                $(".modal-header").css("color", "white");
                $(".modal-title").text("Editar Implante");
                $('#editModal').modal('show');
            });


        });
    </script>
@stop