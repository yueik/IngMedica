<?php

namespace App\Http\Livewire\IngresoStock;

use Livewire\Component;
use App\Models\IngresoStock;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class TablaIngresoStock extends Component
{
    use WithPagination;

    public $ingreso_stock;
    public $search;
    public $editModal = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $state = [];

    public function render()
    {
        return view('livewire.ingreso-stock.tabla-ingreso-stock', [
            'ingresos' => IngresoStock::where('id', 'like', '%' . $this->search . '%')
                ->orWhere('fecha', 'like', '%' . $this->search . '%')
                ->orWhere('observacion', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate()
        ]);
    }

    public function addIngresoStock()
    {
        $this->state = [];
        $this->editModal = false;
        $this->dispatchBrowserEvent("showModal");
    }

    public function createIngresoStock()
    {
        $validar = Validator::make($this->state, [
            'fecha' => 'required',
            'observacion' => '',
        ])->validate();

        IngresoStock::create($validar);

        $this->emit('alert', 'Ingreso registrado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editIngresoStock(IngresoStock $ingreso_stock)
    {
        $this->editModal = true;

        $this->ingreso_stock = $ingreso_stock;

        $this->state = $ingreso_stock->toArray();

        $this->dispatchBrowserEvent("showModal");
    }

    public function updateIngresoStock()
    {
        $validar = Validator::make($this->state, [
            'fecha' => 'required',
            'observacion' => 'required',
        ])->validate();

        $this->ingreso_stock->update($validar);

        $this->emit('alert', 'Ingreso actualizado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function destroy($id)
    {
        IngresoStock::destroy($id);
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
