<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Implante extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo_id',
        'talle_id',
        'codigo',
        'serie',
        'estado_id',
        'activo',
    ];
    protected $attributes = ['activo' => 1];

    public function modelo() {
        return $this->belongsTo(Modelo::class);
    }

    public function talle() {
        return $this->belongsTo(Talle::class);
    }

    public function estado() {
        return $this->belongsTo(EstadoInsumo::class);
    }

    public function detalle_egresos() {
        return $this->hasMany(DetalleEgreso::class);
    }

    public function detalle_ingreso()
    {
        return $this->hasOne(DetalleIngreso::class);
    }

    /*public function ingreso_stock()
    {
        return $this->hasMany(IngresoStock::class, DetalleIngreso::class, '');
    }*/

    /*public function getFechaIngresoAttribute()
    {
        return $this->detalle_ingreso->ingreso_stock->fecha;
    }*/
}
