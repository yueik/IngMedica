<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talle extends Model
{
    use HasFactory;

    protected $fillable = [
        'talle',
        'activo',
    ];
    protected $attributes = ['activo' => 1];

    public function implantes() {
        return $this->hasMany(Implante::class);
    }
}
