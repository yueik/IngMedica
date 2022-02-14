<?php

namespace App\Http\Controllers;

use App\Models\DetalleEgreso;
use App\Models\Modelo;
use App\Models\Implante;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class ReportesController extends Controller
{
    public function cantModelos()
    {
        //Implantes por Modelo
        $getModelos = Modelo::withCount('implantes')->get();
        $modelos = [];
        $implantesModelo = [];
        $montos = [];
        foreach ($getModelos as $model) {
            array_push($modelos, $model->modelo);
            array_push($montos, 0);
            array_push($implantesModelo, $model->implantes_count);
        }
        //Montos por Modelo
        $detalleEgreso = DetalleEgreso::join('implantes', 'implantes.id', '=', 'detalle_egresos.implante_id')
            ->join('modelos', 'modelos.id', '=', 'implantes.modelo_id')
            ->get(['detalle_egresos.monto', 'modelos.id']);
        foreach ($detalleEgreso as $detalle) {
            foreach ($getModelos as $modelo) {
                if ($modelo['id'] == $detalle['id']) {
                    $montos[$modelo['id']-1] += $detalle['monto'];
                }
            }
        }
        //dd($montos);

        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->labels($modelos)
            ->datasets([
                [
                    "label" => "Implantes por Modelo",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)'],
                    'data' => $implantesModelo
                ]
            ])
            ->options([]);

        
        return view('Reportes.index', compact('chartjs'));
    }
    public function ventasModelos()
    {
        //Implantes por Modelo
        $getModelos = Modelo::withCount('implantes')->get();
        $modelos = [];
        $implantesModelo = [];
        $montos = [];
        foreach ($getModelos as $model) {
            array_push($modelos, $model->modelo);
            array_push($montos, 0);
            array_push($implantesModelo, $model->implantes_count);
        }
        //Montos por Modelo
        $detalleEgreso = DetalleEgreso::join('implantes', 'implantes.id', '=', 'detalle_egresos.implante_id')
            ->join('modelos', 'modelos.id', '=', 'implantes.modelo_id')
            ->get(['detalle_egresos.monto', 'modelos.id']);
        foreach ($detalleEgreso as $detalle) {
            foreach ($getModelos as $modelo) {
                if ($modelo['id'] == $detalle['id']) {
                    $montos[$modelo['id']-1] += $detalle['monto'];
                }
            }
        }

        $chartjs = app()->chartjs
            ->name('MontoEgresadoModelo')
            ->type('bar')
            ->size(['width' => 300, 'height' => 200])
            ->labels($modelos)
            ->datasets([
                [
                    "label" => "Ventas por Modelo",
                    'backgroundColor' => ['rgba(0, 255, 0, 0.2)'],
                    'data' => $montos
                ]
            ])
            ->options([]);

        return view('Reportes.index', compact('chartjs'));
    }
}
