<?php

namespace App\Http\Livewire\DetalleIngreso;

use Livewire\Component;

use App\Models\DetalleIngreso;
use App\Models\Implante;
use App\Models\Modelo;
use App\Models\Talle;
use App\Models\EstadoInsumo;
use App\Models\IngresoStock;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class TablaDetalleIngreso extends Component
{
    use WithPagination;

    public $detalle;
    public $implante;
    public $ingreso_stock_id;
    public $search;
    public $editModal = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $stateDetalle = [];
    public $stateImplante = [];
    private $detallesTemporales;

    protected $listeners = ['detallesIngreso', 'render'];

    public function detallesIngreso($ingreso_stock_id)
    {
        $this->ingreso_stock_id = $ingreso_stock_id;
    }

    public function render()
    {
        $detallesTabla = DetalleIngreso::where('ingreso_stock_id', '=', $this->ingreso_stock_id)
            ->where('activo', '=', 1)
            ->where(function ($query) {
                $query->orWhere('id', 'like', '%' . $this->search . '%')
                    ->orWhere('costo', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sort, $this->direction)
            ->paginate();

        return view('livewire.detalle-ingreso.tabla-detalle-ingreso', [
            'detalles' => $detallesTabla,
            'modelos' => Modelo::all(),
            'talles' => Talle::all(),
            'estados' => EstadoInsumo::all(),
        ]);
    }

    public function addDetalle()
    {
        $this->stateDetalle = ['ingreso_stock_id' => $this->ingreso_stock_id];
        $this->editModal = false;
        $this->dispatchBrowserEvent("showModalDetalle");
    }

    public function createDetalle()
    {
        $validar = Validator::make($this->stateImplante, [
            'modelo_id' => 'required',
            'talle_id' => 'required',
            'codigo' => 'required',
            'serie' => 'required',
            'estado_id' => 'required'
        ])->validate();

        Implante::create($validar);
        $implante_id = Implante::select('id')->orderByDesc('id')->limit(1)->get();
        $this->stateDetalle['implante_id'] = $implante_id[0]['id'];

        $validar = Validator::make($this->stateDetalle, [
            'ingreso_stock_id' => 'required',
            'implante_id' => 'required',
            'costo' => 'required',
        ])->validate();


        DetalleIngreso::create($validar);

        $this->emit('alert', 'Detalle de Ingreso registrado con éxito');
        $this->dispatchBrowserEvent('closeModalDetalle');
    }

    public function editDetalle(DetalleIngreso $detalle)
    {
        $this->editModal = true;

        $this->detalle = $detalle;

        $this->stateDetalle = $detalle->toArray();        

        $this->implante = Implante::find($detalle->implante_id);
        $this->stateImplante = $this->implante->toArray();

        $this->dispatchBrowserEvent("showModalDetalle");
    }

    public function updateDetalle()
    {
        $validar = Validator::make($this->stateImplante, [
            'modelo_id' => 'required',
            'talle_id' => 'required',
            'codigo' => 'required',
            'serie' => 'required',
            'estado_id' => 'required'
        ])->validate();

        $this->implante->update($validar);

        $validar = Validator::make($this->stateDetalle, [
            'ingreso_stock_id' => 'required',
            'implante_id' => 'required',
            'costo' => 'required',
        ])->validate();

        $this->detalle->update($validar);

        $this->emit('alert', 'Detalle de Ingreso actualizado con éxito');
        $this->dispatchBrowserEvent('closeModalDetalle');
    }

    public function destroy($id)
    {
        DetalleIngreso::destroy($id);
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
}
