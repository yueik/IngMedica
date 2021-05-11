<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEgreso extends Model
{
    use HasFactory;

    public function egreso_stock() {
        return $this->belongsTo(EgresoStock::class);
    }

    public function implante() {
        return $this->belongsTo(Implante::class);
    }

}
