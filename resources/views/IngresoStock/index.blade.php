@extends('adminlte::page')

@section('title', 'Ingresos')

@section('content_header')
    <h1>Ingresos De Implantes</h1>
@stop

@section('content')
    <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#addIngreso">
    Agregar Ingreso
    </button>

    <table id="ingresos" class="table table-striped table-bordered shadow-lg mt-4">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha</th>
                <th scope="col">Observacion</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ingresos as $ingreso)
            <tr>
                <td>{{ $ingreso->id }}</td>
                <td>{{ $ingreso->fecha }}</td>
                <td>{{ $ingreso->observacion }}</td>
                <td>
                    <form action="{{ route('Ingresos.destroy', $ingreso->id) }}" method="POST">
                        <a href="#" class="btn btn-success editIngreso"><i class="far fa-fw fa-file"></i> Detalles</a>
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
            var tablaIngresos = $('#ingresos').DataTable({
                "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "autoWidth": false
            });
            
            $('#formEditIngreso').submit(function(e) {
                e.preventDefault();
                tablaIngresos.ajax.reload(null, false);
            })

            //Boton Editar
            tablaIngresos.on('click', '.editIngreso', function(){                
                //Obtengo la fila
                fila = $(this).closest('tr');
                if($(fila).hasClass('child')) {
                    fila = fila.prev('.parent');
                }
                //Coloco los valores del registro en el Form
                var data = tablaIngresos.row(fila).data();
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
                $('#formEditIngreso').attr('action', '/Ingresos/'+data[0]);

                $(".modal-header").css("background-color", "#007bff");
                $(".modal-header").css("color", "white");
                $(".modal-title").text("Editar Ingreso");
                $('#editModal').modal('show');
            });


        });
    </script>
@stop