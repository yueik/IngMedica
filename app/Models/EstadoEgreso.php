<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoEgreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'activo',
    ];
    protected $attributes = ['activo' => 1];

    public function egreso_stocks() {
        return $this->hasMany(EgresoStock::class);
    }
    
}
