<?php

namespace App\Http\Livewire\Modelo;

use Livewire\Component;
use App\Models\Modelo;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class TablaModelo extends Component
{
    use WithPagination;

    public $modelo;
    public $search;
    public $editModal = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $state = [];

    public function render()
    {
        return view('livewire.modelo.tabla-modelo', [
            'modelos' => Modelo::where('activo', '=', 1)
                ->where(function ($query) {
                    $query->orWhere('marca_id', 'like', '%' . $this->search . '%')
                        ->orWhere('precio', 'like', '%' . $this->search . '%')
                        ->orWhere('modelo', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate()
        ]);
    }

    public function addModelo()
    {
        $this->state = [];
        $this->editModal = false;
        $this->dispatchBrowserEvent("showModal");
    }

    public function createModelo()
    {
        $validar = Validator::make($this->state, [
            'modelo' => 'required',
            'precio' => 'required',
            'marca_id' => 'required',
        ])->validate();

        Modelo::create($validar);

        $this->emit('alert', 'Modelo registrado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editModelo(Modelo $modelo)
    {
        $this->editModal = true;

        $this->modelo = $modelo;

        $this->state = $modelo->toArray();

        $this->dispatchBrowserEvent("showModal");
    }

    public function updateModelo()
    {
        $validar = Validator::make($this->state, [
            'marca_id' => 'required',
            'modelo' => 'required',
            'precio' => 'required',
        ])->validate();

        $this->modelo->update($validar);

        $this->emit('alert', 'Modelo actualizado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function destroy($id)
    {
        Modelo::destroy($id);
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
