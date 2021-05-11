<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    use HasFactory;

    public function implante() {
        return $this->belongsTo(Implante::class);
    }

    public function ingreso_stock() {
        return $this->belongsTo(IngresoStock::class);
    }
}
