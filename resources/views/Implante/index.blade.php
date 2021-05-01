@extends('adminlte::page')

@section('title', 'Implantes')

@section('content_header')
    <h1>Listado De Implantes</h1>
@stop

@section('content')
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
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#implantes').DataTable({
                "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
            });
        });
    </script>
@stop