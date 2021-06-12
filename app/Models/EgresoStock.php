<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EgresoStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'cliente_id',
        'montoFinal',
        'estado_id',
        'observacion',
        'activo',
    ];
    protected $attributes = ['activo' => 1];

    public function estado() {
        return $this->belongsTo(EstadoEgreso::class);
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function detalle_egresos() {
        return $this->hasMany(DetalleEgreso::class);
    }
}
