<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function direccion_clientes() {
        return $this->hasMany(DireccionCliente::class);
    }

    public function egreso_stocks() {
        return $this->hasMany(EgresoStock::class);
    }
}
