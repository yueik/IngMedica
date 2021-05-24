<?php

namespace App\Http\Livewire\Implante;

use Livewire\Component;
use App\Models\Implante;

class CreateImplante extends Component
{
    public $open = false;
    public $marca, $modelo, $talle, $codigo, $serie, $estado;

    protected $rules = [
        'modelo' =>'required',
        'talle' =>'required',
        'codigo' =>'required',
        'serie' =>'required',
        'estado' =>'required'
    ];

    public function mount()
    {
        $this->marca = 1;
        $this->modelo = 1;
        $this->talle = 1;
        $this->estado = 1;
    }

    public function save()
    {
        $this->validate();
        
        Implante::create([
            'modelo_id' => $this->modelo,
            'talle_id' => $this->talle,
            'codigo' => $this->codigo,
            'serie' => $this->serie,
            'estado_id' => $this->estado,
            'activo' => 1,
        ]);

        $this->reset([
            'open',
            'marca',
            'modelo',
            'talle',
            'codigo',
            'serie',
            'estado',
        ]);

        $this->emitTo('implante.tabla-implante', 'render');
        $this->emit('alert', 'Implante registrado con éxito');
    }

    public function render()
    {
        return view('livewire.implante.create-implante', [
            'implantes' => Implante::orderBy('id', 'desc')
                                    ->paginate()
        ]);
    }
}
