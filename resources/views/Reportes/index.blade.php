@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
<h1>Reportes</h1>
@stop

@section('content')

<div style="width:100%; max-height:700px;">
    {!! $chartjs->render() !!}
</div>

@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    Livewire.on('alert', function(message) {
        Swal.fire(
            'Excelente!',
            message,
            'success'
        )
    })
</script>

<script>
    window.addEventListener('closeModal', event => {
        $("#addTalle").modal("hide");
        $("#editTalle").modal("hide");
    })
    window.addEventListener('showModal', event => {
        $("#addTalle").modal("show");
        $("#editTalle").modal("show");
    })  
</script>
@stop