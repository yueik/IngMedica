<?php

namespace App\Http\Livewire\Talle;

use Livewire\Component;
use App\Models\Talle;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class TablaTalle extends Component
{
    use WithPagination;

    public $talle;
    public $search;
    public $editModal = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $state = [];

    public function render()
    {
        return view('livewire.talle.tabla-talle', [
            'talles' => Talle::where('id', 'like', '%' . $this->search . '%')
                ->orWhere('talle', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate()
        ]);
    }

    public function addTalle()
    {
        $this->state = [];
        $this->editModal = false;
        $this->dispatchBrowserEvent("showModal");
    }

    public function createTalle()
    {
        $validar = Validator::make($this->state, [
            'talle' => 'required',
        ])->validate();

        Talle::create($validar);

        $this->emit('alert', 'Talle registrado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editTalle(Talle $talle)
    {
        $this->editModal = true;

        $this->talle = $talle;

        $this->state = $talle->toArray();

        $this->dispatchBrowserEvent("showModal");
    }

    public function updateTalle()
    {
        $validar = Validator::make($this->state, [
            'talle' => 'required',
        ])->validate();

        $this->talle->update($validar);

        $this->emit('alert', 'Talle actualizado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function destroy($id)
    {
        Talle::destroy($id);
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
