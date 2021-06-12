@extends('adminlte::page')

@section('title', 'Ingresos')

@section('content_header')
    <h1>Ingresos De Implantes</h1>
@stop

@section('content')

@livewire('ingreso-stock.tabla-ingreso-stock')

@stop

@section('css')    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@stop

@section('js')

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
  $("#addIngresoStock").modal("hide");
  $("#editIngresoStock").modal("hide");
})
window.addEventListener('showModal', event => {
  $("#addIngresoStock").modal("show");
  $("#editIngresoStock").modal("show");
})  
</script>
@stop