@extends('adminlte::page')

@section('title', 'Direcciones')

@section('content_header')
    <h1>Direcciones De Cliente</h1>
@stop

@section('content')
    <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#addDireccion">
    Agregar Dirección
    </button>

    <table id="direcciones" class="table table-striped table-bordered shadow-lg mt-4">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Cliente</th>
                <th scope="col">Calle</th>
                <th scope="col">Número</th>
                <th scope="col">Piso</th>
                <th scope="col">Dpto</th>
                <th scope="col">Barrio</th>
                <th scope="col">CP</th>
                <th scope="col">Observacion</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($direcciones as $direccion)
            <tr>
                <td>{{ $direccion->id }}</td>
                <td>{{ $direccion->cliente->cliente }}</td>
                <td>{{ $direccion->calle }}</td>
                <td>{{ $direccion->numero }}</td>
                <td>{{ $direccion->piso }}</td>
                <td>{{ $direccion->dpto }}</td>
                <td>{{ $direccion->barrio }}</td>
                <td>{{ $direccion->codigoPostal }}</td>
                <td>{{ $direccion->observacion }}</td>
                <td>
                    <form action="{{ route('Direcciones.destroy', $direccion->id) }}" method="POST">
                        <a href="#" class="btn btn-info editDireccion"><i class="far fa-fw fa-file"></i> Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
            var tablaDirecciones = $('#direcciones').DataTable({
                "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "autoWidth": false
            });
            
            $('#formEditDireccion').submit(function(e) {
                e.preventDefault();
                tablaDirecciones.ajax.reload(null, false);
            })

            //Boton Editar
            tablaDirecciones.on('click', '.editDireccione', function(){                
                //Obtengo la fila
                fila = $(this).closest('tr');
                if($(fila).hasClass('child')) {
                    fila = fila.prev('.parent');
                }
                //Coloco los valores del registro en el Form
                var data = tablaDirecciones.row(fila).data();
                console.log(data[1])
                $('#cliente_id').val(data[1]);
                $('#calle').val(data[2]);
                $('#numero').val(data[3]);
                $('#piso').val(data[4]);
                $('#dpto').val(data[5]);
                $('#barrio').val(data[6]);
                $('#codigoPostal').val(data[7]);
                $('#observacion').val(data[8]);
                //Edito el action del Form
                $('#formEditDireccion').attr('action', '/Direcciones/'+data[0]);

                $(".modal-header").css("background-color", "#007bff");
                $(".modal-header").css("color", "white");
                $(".modal-title").text("Editar Direccion");
                $('#editModal').modal('show');
            });


        });
    </script>
@stop