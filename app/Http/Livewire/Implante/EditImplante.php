<?php

namespace App\Http\Livewire\Implante;

use App\Models\Implante;
use Livewire\Component;

class EditImplante extends Component
{
    public $open = false;
    public $implante;
    public $marca_id, $modelo_id, $talle_id, $codigo, $serie, $estado_id;

    protected $rules = [
        'modelo_id' =>'required',
        'talle_id' =>'required',
        'codigo' =>'required',
        'serie' =>'required',
        'estado_id' =>'required',
        'implante.modelo_id' =>'required',
        'implante.talle_id' =>'required',
        'implante.codigo' =>'required',
        'implante.serie' =>'required',
        'implante.estado_id' =>'required'
    ];

    public function update()
    {
        $this->implante->save();
        $this->validate();

        /*Implante::create([
            'modelo_id' => $this->modelo,
            'talle_id' => $this->talle,
            'codigo' => $this->codigo,
            'serie' => $this->serie,
            'estado_id' => $this->estado,
            'activo' => 1,
        ]);*/

        $this->reset([
            'implante',
            'open',
            'marca_id',
            'modelo_id',
            'talle_id',
            'codigo',
            'serie',
            'estado_id',
            'implante.modelo_id',
            'implante.talle_id',
            'implante.codigo',
            'implante.serie',
            'implante.estado_id',
        ]);

        $this->emitTo('implante.tabla-implante', 'render');
        $this->emit('alert', 'Implante actualizado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function mount(Implante $implante)
    {
        $this->implante = $implante;
    }

    public function editImplante()
    {
        $this->dispatchBrowserEvent('showModal');
    }

    public function render()
    {
        return view('livewire.implante.edit-implante', [
            'implantes' => Implante::orderBy('id', 'desc')
                                    ->paginate()
        ]);
    }
}
