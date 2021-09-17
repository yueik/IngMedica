<?php

namespace App\Http\Controllers;

use App\Models\DetalleEgreso;
use App\Models\EgresoStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Date;

;

class Remito extends Controller
{
    function index(Request $request)
    {
        $customer_data = $this->get_customer_data($request->egreso_id);                
        return view('Remito.remito')->with('customer_data', $customer_data);
    }

    function get_customer_data($egreso_id)
    {
        $detallesEgreso = DetalleEgreso::where('egreso_stock_id', '=', $egreso_id)->get();
        return $detallesEgreso;
    }

    function pdf(Request $request)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html($request->egreso_id));
        return $pdf->stream();
    }

    function convert_customer_data_to_html($egreso_id)
    {
        $cliente = EgresoStock::find($egreso_id);
        $customer_data = $this->get_customer_data($egreso_id);
        $output = '
     <h1 align="center" style="margin-bottom: 100px">MEDIC SA</h1>
     <h4>INGENIERIA MEDICA SRL</h4>
     <p>Calle Altura - dpto -</p>
     <p>(5000) Córdoba Argentina</p>
     <p>Telefono/Fax: 0351 468 4444 - 444 4444</p>
     <p>Cel: (0351) 155 555 555</p>
     <div class="col-md-6" align="center"
      style="border: 1px solid #000;
       margin-top:50px;
       margin-bottom:50px;">
       R E M I T O
     </div>
     <h5 align="center" style="margin-bottom: 50px;">'.date('d/m/Y').'</h5>
     <p><b>Señor (es)</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Obra Social</p>
     <p>PRESENTE:&nbsp;&nbsp;&nbsp;&nbsp; '.$cliente->cliente->cliente.'</p>
     <p>Paciente:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Paciente</p>
     <table width="100%" style="border-collapse: collapse; border: 0px; margin-top:40px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="10%">Cantidad</th>
    <th style="border: 1px solid; padding:12px;" width="70%">Descripción</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Número de Serie</th>
   </tr>
     ';
        foreach ($customer_data as $customer) {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">1</td>
       <td style="border: 1px solid; padding:12px;"> Prótesis '
                . $customer->implante->modelo->modelo . ' de '
                . $customer->implante->talle->talle .
                '</td>
       <td style="border: 1px solid; padding:12px;">' . $customer->implante->serie . '</td>
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }
}
