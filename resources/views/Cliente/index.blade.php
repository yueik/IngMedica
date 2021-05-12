@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Listado De Clientes</h1>
@stop

@section('content')
    <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#addCliente">
    Launch demo modal
    </button>

    <table id="clientes" class="table table-striped table-bordered shadow-lg mt-4">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Cliente</th>
                <th scope="col">Cuit</th>
                <th scope="col">Documento</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Mail</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->cliente }}</td>
                <td>{{ $cliente->cuit }}</td>
                <td>{{ $cliente->documento }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>{{ $cliente->mail }}</td>
                <td>
                    <form action="{{ route('Clientes.destroy', $cliente->id) }}" method="POST">
                        <a href="#" class="btn btn-info editCliente"><i class="far fa-fw fa-file"></i> Editar</a>
                        <a href="{{ route('Direcciones.index') }}" class="btn btn-success"><i class="far fa-fw fa-file"></i> Direcciones</a>
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
    <div class="modal fade" id="addCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('Clientes.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="cliente">Nombre</label>
                            <input type="text" class="form-control" name="cliente">
                        </div>
                        <div class="form-group">
                            <label for="cuit">Cuit</label>
                            <input type="number" class="form-control" name="cuit">
                        </div>
                        <div class="form-group">                            
                            <label for="documento">Documento</label>
                            <input type="number" class="form-control" name="documento">
                        </div>
                        <div class="form-group">                            
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" name="telefono">
                        </div>
                        <div class="form-group">                            
                            <label for="mail">Mail</label>
                            <input type="email" class="form-control" name="mail">
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
                <form action="/Clientes" method="POST" id="formEditCliente">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="cliente">Nombre</label>
                            <input type="text" class="form-control" name="cliente" id="cliente">
                        </div>
                        <div class="form-group">
                            <label for="cuit">Cuit</label>
                            <input type="number" class="form-control" name="cuit" id="cuit">
                        </div>
                        <div class="form-group">                            
                            <label for="documento">Documento</label>
                            <input type="number" class="form-control" name="documento" id="documento">
                        </div>
                        <div class="form-group">                            
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono">
                        </div>
                        <div class="form-group">                            
                            <label for="mail">Mail</label>
                            <input type="email" class="form-control" name="mail" id="mail">
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
            var tablaClientes = $('#clientes').DataTable({
                "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "autoWidth": false
            });
            
            $('#formEditCliente').submit(function(e) {
                e.preventDefault();
                tablaClientes.ajax.reload(null, false);
            })

            //Boton Editar
            tablaClientes.on('click', '.editCliente', function(){                
                //Obtengo la fila
                fila = $(this).closest('tr');
                if($(fila).hasClass('child')) {
                    fila = fila.prev('.parent');
                }
                //Coloco los valores del registro en el Form
                var data = tablaClientes.row(fila).data();
                console.log(data[1])
                $('#cliente').val(data[1]);
                $('#cuit').val(data[2]);
                $('#documento').val(data[3]);
                $('#telefono').val(data[4]);
                $('#mail').val(data[5]);
                //Edito el action del Form
                $('#formEditCliente').attr('action', '/Clientes/'+data[0]);

                $(".modal-header").css("background-color", "#007bff");
                $(".modal-header").css("color", "white");
                $(".modal-title").text("Editar Cliente");
                $('#editModal').modal('show');
            });


        });
    </script>
@stop