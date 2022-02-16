<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEgreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'egreso_stock_id',
        'implante_id',
        'monto',
        'activo',
    ];
    protected $attributes = ['activo' => 1];

    public function egreso_stock() {
        return $this->belongsTo(EgresoStock::class)->withDefault();
    }

    public function implante() {
        return $this->belongsTo(Implante::class)->withDefault();
    }

}
