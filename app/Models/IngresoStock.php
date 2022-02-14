<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'observacion',
        'activo',
    ];
    protected $attributes = ['activo' => 1];

    public function detalle_ingresos() {
        return $this->hasMany(DetalleIngreso::class);
    }

    public function getNCantDetallesAttribute()
    {
        return $this->detalle_ingresos->count();
    }
}
