<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DireccionCliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'calle',
        'numero',
        'piso',
        'dpto',
        'barrio',
        'codigoPostal',
        'observacion',
        'activo',
    ];
    protected $attributes = ['activo' => 1, 'cliente_id' => 1];


    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }
}
