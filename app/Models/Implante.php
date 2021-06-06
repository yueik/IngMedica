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
}
