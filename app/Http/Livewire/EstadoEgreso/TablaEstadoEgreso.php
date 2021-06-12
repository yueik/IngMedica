<?php

namespace App\Http\Livewire\EstadoEgreso;

use Livewire\Component;
use App\Models\EstadoEgreso;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class TablaEstadoEgreso extends Component
{
    use WithPagination;

    public $estado;
    public $search;
    public $editModal = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $state = [];

    public function render()
    {
        return view('livewire.estado-egreso.tabla-estado-egreso', [
            'estados' => EstadoEgreso::where('id', 'like', '%' . $this->search . '%')
                ->orWhere('estado', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate()
        ]);
    }

    public function addEstadoEgreso()
    {
        $this->state = [];
        $this->editModal = false;
        $this->dispatchBrowserEvent("showModal");
    }

    public function createEstadoEgreso()
    {
        $validar = Validator::make($this->state, [
            'estado' => 'required'
        ])->validate();

        EstadoEgreso::create($validar);

        $this->emit('alert', 'Estado registrado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editEstadoEgreso(EstadoEgreso $estado)
    {
        $this->editModal = true;

        $this->estado = $estado;

        $this->state = $estado->toArray();

        $this->dispatchBrowserEvent("showModal");
    }

    public function updateEstadoEgreso()
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
        EstadoEgreso::destroy($id);
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
