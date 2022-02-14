<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingreso_stock_id',
        'implante_id',
        'costo',
        'activo',
    ];
    protected $attributes = ['activo' => 1];

    public function implante()
    {
        return $this->belongsTo(Implante::class);
    }

    public function ingreso_stock()
    {
        return $this->belongsTo(IngresoStock::class)->withDefault();
    }
}
