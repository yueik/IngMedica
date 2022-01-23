<?php

namespace App\Http\Livewire\Implante;

use Livewire\Component;
use App\Models\Implante;
use App\Models\Modelo;
use App\Models\EstadoInsumo;
use App\Models\Talle;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class TablaImplante extends Component
{
    use WithPagination;

    public $implante;
    public $search;
    public $editModal = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $state = [];

    public function render()
    {
        return view('livewire.implante.tabla-implante', [
            'implantes' => Implante::where('activo', '=', 1)
                ->where(function ($query) {
                    $query->orWhere('id', 'like', '%' . $this->search . '%')
                        ->orWhere('modelo_id', 'like', '%' . $this->search . '%')
                        ->orWhere('talle_id', 'like', '%' . $this->search . '%')
                        ->orWhere('codigo', 'like', '%' . $this->search . '%')
                        ->orWhere('serie', 'like', '%' . $this->search . '%')
                        ->orWhere('estado_id', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate(),
            'modelos' => Modelo::where('activo', '=', 1)->get(),
            'talles' => Talle::where('activo', '=', 1)->get(),
            'estados' => EstadoInsumo::where('activo', '=', 1)->get(),
        ]);
    }

    public function addImplante()
    {
        $this->state = [];
        $this->editModal = false;
        $this->dispatchBrowserEvent("showModal");
    }

    public function createImplante()
    {
        $validar = Validator::make($this->state, [
            'modelo_id' => 'required',
            'talle_id' => 'required',
            'codigo' => 'required',
            'serie' => 'required',
            'estado_id' => 'required'
        ])->validate();

        Implante::create($validar);

        $this->emit('alert', 'Implante registrado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editImplante(Implante $implante)
    {
        $this->editModal = true;

        $this->implante = $implante;

        $this->state = $implante->toArray();

        $this->dispatchBrowserEvent("showModal");
    }

    public function updateImplante()
    {
        $validar = Validator::make($this->state, [
            'modelo_id' => 'required',
            'talle_id' => 'required',
            'codigo' => 'required',
            'serie' => 'required',
            'estado_id' => 'required'
        ])->validate();

        $this->implante->update($validar);

        $this->emit('alert', 'Implante actualizado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function destroy($id)
    {
        Implante::destroy($id);
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
