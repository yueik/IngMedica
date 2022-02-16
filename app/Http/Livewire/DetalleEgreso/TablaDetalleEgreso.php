<?php

namespace App\Http\Livewire\DetalleEgreso;

use Livewire\Component;
use App\Models\DetalleEgreso;
use App\Models\Implante;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class TablaDetalleEgreso extends Component
{
    use WithPagination;

    public $detalle;
    public $egreso_stock_id;
    public $search;
    public $editModal = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $state = [];
    public $vistaImplante;//bandera para ocultar btn AgregarImplante

    protected $listeners = ['detallesEgreso', 'render'];

    public function detallesEgreso($array)
    {
        $this->egreso_stock_id = $array[0];//array[0] id de EgresoStock
        $this->vistaImplante = $array[1];//array[1] booleano
    }

    public function render()
    {
        $arrayIn = [];
        $implantes = Implante::join('detalle_egresos', 'implantes.id', '=', 'detalle_egresos.implante_id')->get();
        foreach ($implantes as $implante) {
            array_push($arrayIn, $implante->implante_id);
        };
        $implantes = Implante::whereNotIn('id', $arrayIn)->get();
        return view('livewire.detalle-egreso.tabla-detalle-egreso', [
            'detalles' => DetalleEgreso::where('egreso_stock_id', '=', $this->egreso_stock_id)
                ->where('activo', '=', 1)
                ->where(function ($query) {
                    $query->orWhere('id', 'like', '%' . $this->search . '%')
                        ->orWhere('monto', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate(),

            'implantes' => $implantes,
        ]);
    }

    public function addDetalle()
    {
        $this->state = ['egreso_stock_id' => $this->egreso_stock_id];
        $this->editModal = false;
        $this->dispatchBrowserEvent("showModalDetalle");
    }

    public function createDetalle()
    {
        $validar = Validator::make($this->state, [
            'egreso_stock_id' => 'required',
            'implante_id' => 'required',
            'monto' => 'required',
        ])->validate();

        DetalleEgreso::create($validar);
        //dd($this->state['implante_id']);
        //Implante::find($this->state['implante_id'])->update(['estado_id' => 2]);

        $this->emit('alert', 'Detalle de Egreso registrado con éxito');
        $this->dispatchBrowserEvent('closeModalDetalle');
    }

    public function editDetalle(DetalleEgreso $detalle)
    {
        $this->editModal = true;

        $this->detalle = $detalle;

        $this->state = $detalle->toArray();

        $this->dispatchBrowserEvent("showModalDetalle");
    }

    public function updateDetalle()
    {

        $validar = Validator::make($this->state, [
            'egreso_stock_id' => 'required',
            'implante_id' => 'required',
            'monto' => 'required',
        ])->validate();

        if ($this->detalle->id != $this->state['implante_id']) {
            Implante::find($this->detalle->id)->update(['estado_id' => 1]);
            Implante::find($this->state['implante_id'])->update(['estado_id' => 2]);
        }

        $this->detalle->update($validar);

        $this->emit('alert', 'Detalle de Egreso actualizado con éxito');
        $this->dispatchBrowserEvent('closeModalDetalle');
    }

    public function destroy($id)
    {
        DetalleEgreso::destroy($id);
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

    public function cerrarModalDetalle()
    {
        $this->dispatchBrowserEvent('closeModalDetalle');
    }

    public function devolucion($implante_id)
    {
        Implante::find($implante_id)->update(['estado_id' => 1]);
    }

    public function concesion($implante_id)
    {
        Implante::find($implante_id)->update(['estado_id' => 2]);
    }
}
