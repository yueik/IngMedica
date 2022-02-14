<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoInsumo extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'activo',
    ];
    protected $attributes = ['activo' => 1];

    public function implantes() {
        return $this->hasMany(Implante::class);
    }
}
