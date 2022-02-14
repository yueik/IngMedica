<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente',
        'cuit',
        'documento',
        'telefono',
        'mail',
        'activo',
    ];
    protected $attributes = ['activo' => 1];

    public function direccion_clientes() {
        return $this->hasMany(DireccionCliente::class);
    }

    public function egreso_stocks() {
        return $this->hasMany(EgresoStock::class);
    }
}
