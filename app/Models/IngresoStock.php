<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoStock extends Model
{
    use HasFactory;

    public function detalle_ingresos() {
        return $this->belongsTo(DetalleIngreso::class);
    }
}
