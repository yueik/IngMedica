@extends('adminlte::page')

@section('title', 'Implantes')

@section('content_header')
<h1>Listado De Implantes</h1>
@stop

@section('content')

@livewire('implante.tabla-implante')

@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
  integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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

    Livewire.on('deleteImplante', implante_id => {
      Swal.fire({
        title: 'Está seguro?',
        text: "No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
          Livewire.emitTo('implante.tabla-implante', 'destroy', implante_id)
          Swal.fire(
            'Eliminado!',
            'El implante ha sido eliminado.',
            'success'
          )
        }
      })
    })
</script>

<script>
  window.addEventListener('closeModal', event => {
      $("#addImplante").modal("hide");
      $("#editImplante").modal("hide");
    })
    window.addEventListener('showModal', event => {
      $("#addImplante").modal("show");
      $("#editImplante").modal("show");
    })  
</script>
@stop