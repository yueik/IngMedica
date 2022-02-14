<!DOCTYPE html>
<html>
 <head>
  <title>Resumen Remito</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Implantes</h3><br />
   
   <div class="row">
    <div class="col-md-7" align="right">
     <h4></h4>
    </div>
    <div class="col-md-5" align="right">
     <a href="{{ route('Remito/pdf', $customer_data->first->egreso_stock_id->egreso_stock_id) }}" class="btn btn-danger">Generar Remito</a>
    </div>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
      <tr>
       <th>Cantidad</th>
       <th>Descripción</th>
       <th>Numero de Serie</th>
      </tr>
     </thead>
     <tbody>
     @foreach($customer_data as $customer)
      <tr>
       <td>1</td>
       <td>{{ $customer->implante->modelo->modelo }}</td>
       <td>{{ $customer->implante->talle->talle }}</td>
      </tr>
     @endforeach
     </tbody>
    </table>
   </div>
  </div>
 </body>
</html>