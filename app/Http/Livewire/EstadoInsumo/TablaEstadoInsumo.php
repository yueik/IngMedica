<?php

namespace App\Http\Livewire\EstadoInsumo;

use Livewire\Component;
use App\Models\EstadoInsumo;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class TablaEstadoInsumo extends Component
{
    use WithPagination;

    public $estado;
    public $search;
    public $editModal = false;
    public $sort = 'estado';
    public $direction = 'asc';
    public $state = [];

    public function render()
    {
        return view('livewire.estado-insumo.tabla-estado-insumo', [
            'estados' => EstadoInsumo::where('activo', '=', 1)
                ->where(function ($query) {
                    $query->orWhere('estado', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate()
        ]);
    }

    public function addEstadoInsumo()
    {
        $this->state = [];
        $this->editModal = false;
        $this->dispatchBrowserEvent("showModal");
    }

    public function createEstadoInsumo()
    {
        $validar = Validator::make($this->state, [
            'estado' => 'required'
        ])->validate();

        EstadoInsumo::create($validar);

        $this->emit('alert', 'Estado registrado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editEstadoInsumo(EstadoInsumo $estado)
    {
        $this->editModal = true;

        $this->estado = $estado;

        $this->state = $estado->toArray();

        $this->dispatchBrowserEvent("showModal");
    }

    public function updateEstadoInsumo()
    {
        $validar = Validator::make($this->state, [
            'estado' => 'required'
        ])->validate();

        $this->estado->update($validar);

        $this->emit('alert', 'Estado actualizado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function destroy($id)
    {
        EstadoInsumo::destroy($id);
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
