<?php

namespace App\Http\Livewire\Marca;

use Livewire\Component;
use App\Models\Marca;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class TablaMarca extends Component
{
    use WithPagination;

    public $marca;
    public $search;
    public $editModal = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $state = [];

    public function render()
    {
        return view('livewire.marca.tabla-marca', [
            'marcas' => Marca::where('activo', '=', 1)
                ->where(function ($query) {
                    $query->orWhere('marca', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate()
        ]);
    }

    public function addMarca()
    {
        $this->state = [];
        $this->editModal = false;
        $this->dispatchBrowserEvent("showModal");
    }

    public function createMarca()
    {
        $validar = Validator::make($this->state, [
            'marca' => 'required',
        ])->validate();

        Marca::create($validar);

        $this->emit('alert', 'Marca registrada con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editMarca(Marca $marca)
    {
        $this->editModal = true;

        $this->marca = $marca;

        $this->state = $marca->toArray();

        $this->dispatchBrowserEvent("showModal");
    }

    public function updateMarca()
    {
        $validar = Validator::make($this->state, [
            'marca' => 'required',
        ])->validate();

        $this->marca->update($validar);

        $this->emit('alert', 'Marca actualizada con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function destroy($id)
    {
        Marca::destroy($id);
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
