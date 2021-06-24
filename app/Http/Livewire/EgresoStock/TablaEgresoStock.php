<?php

namespace App\Http\Livewire\EgresoStock;

use Livewire\Component;
use App\Models\EgresoStock;
use App\Models\EstadoEgreso;
use App\Models\Cliente;
use App\Models\DetalleEgreso;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class TablaEgresoStock extends Component
{
    use WithPagination;

    public $egreso_stock;
    public $search;
    public $editModal = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $state = [];

    public function render()
    {
        return view('livewire.egreso-stock.tabla-egreso-stock', [
            'egresos' => EgresoStock::where('activo', '=', 1)
                ->where(function ($query) {
                    $query->orWhere('id', 'like', '%' . $this->search . '%')
                        ->orWhere('fecha', 'like', '%' . $this->search . '%')
                        ->orWhere('cliente_id', 'like', '%' . $this->search . '%')
                        ->orWhere('montoFinal', 'like', '%' . $this->search . '%')
                        ->orWhere('estado_id', 'like', '%' . $this->search . '%')
                        ->orWhere('observacion', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate(),
            'clientes' => Cliente::all(),
            'estados' => EstadoEgreso::all()
        ]);
    }

    public function addEgresoStock()
    {
        $this->state = [];
        $this->editModal = false;
        $this->emit('detallesEgreso', 0);
        $this->dispatchBrowserEvent("showModal");
    }

    public function createEgresoStock()
    {
        $validar = Validator::make($this->state, [
            'fecha' => 'required',
            'cliente_id' => 'required',
            'montoFinal' => 'required',
            'estado_id' => 'required',
            'observacion' => '',
        ])->validate();

        EgresoStock::create($validar);

        $egreso = EgresoStock::select('id')->orderByDesc('id')->limit(1)->get();
        DetalleEgreso::where('egreso_stock_id', 0)
            ->update(['egreso_stock_id' => $egreso[0]['id']]);

        $this->emit('alert', 'Egreso registrado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editEgresoStock(EgresoStock $egreso_stock)
    {
        $this->editModal = true;

        $this->egreso_stock = $egreso_stock;

        $this->state = $egreso_stock->toArray();

        $this->emit('detallesEgreso', $egreso_stock->id);
        $this->dispatchBrowserEvent("showModal");
    }

    public function updateEgresoStock()
    {
        $validar = Validator::make($this->state, [
            'fecha' => 'required',
            'cliente_id' => 'required',
            'montoFinal' => 'required',
            'estado_id' => 'required',
            'observacion' => 'required',
        ])->validate();

        $this->egreso_stock->update($validar);

        $this->emit('alert', 'Egreso actualizado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function destroy($id)
    {
        EgresoStock::destroy($id);
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

    public function cerrarModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }
}
