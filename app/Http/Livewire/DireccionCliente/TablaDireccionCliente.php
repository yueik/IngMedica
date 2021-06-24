<?php

namespace App\Http\Livewire\DireccionCliente;

use Livewire\Component;
use App\Models\DireccionCliente;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\Constraint\DirectoryExists;

class TablaDireccionCliente extends Component
{
    use WithPagination;

    public $direccion;
    public $cliente_id;
    public $search;
    public $editModal = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $state = [];

    protected $listeners = ['direccionesCliente', 'render'];

    public function direccionesCliente($cliente_id)
    {
        $this->cliente_id = $cliente_id;
        $this->dispatchBrowserEvent("showDirecciones");
    }

    public function render()
    {
        return view('livewire.direccion-cliente.tabla-direccion-cliente', [
            'direcciones' => DireccionCliente::where('cliente_id', '=', $this->cliente_id)
                ->where(function ($query) {
                    $query->orWhere('numero', 'like', '%' . $this->search . '%')
                        ->orWhere('calle', 'like', '%' . $this->search . '%')
                        ->orWhere('piso', 'like', '%' . $this->search . '%')
                        ->orWhere('dpto', 'like', '%' . $this->search . '%')
                        ->orWhere('barrio', 'like', '%' . $this->search . '%')
                        ->orWhere('codigoPostal', 'like', '%' . $this->search . '%')
                        ->orWhere('observacion', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate()
        ]);
        
    }

    public function addDireccion()
    {
        $this->state = ['cliente_id' => $this->cliente_id];
        $this->editModal = false;
        $this->dispatchBrowserEvent("showModalDireccion");
    }

    public function createDireccion()
    {
        $validar = Validator::make($this->state, [
            'cliente_id' => 'required',
            'calle' => 'required',
            'numero' => 'required',
            'piso' => 'required',
            'dpto' => 'required',
            'barrio' => 'required',
            'codigoPostal' => 'required',
            'observacion' => ''
        ])->validate();

        DireccionCliente::create($validar);

        $this->emit('alert', 'Dirección registrada con éxito');
        $this->dispatchBrowserEvent('closeModalDireccion');
    }

    public function editDireccion(DireccionCliente $direccion)
    {
        $this->editModal = true;

        $this->direccion = $direccion;

        $this->state = $direccion->toArray();

        $this->dispatchBrowserEvent("showModalDireccion");
    }

    public function updateDireccion()
    {
        $validar = Validator::make($this->state, [
            'cliente_id' => 'required',
            'calle' => 'required',
            'numero' => 'required',
            'piso' => 'required',
            'dpto' => 'required',
            'barrio' => 'required',
            'codigoPostal' => 'required',
            'observacion' => ''
        ])->validate();

        $this->direccion->update($validar);

        $this->emit('alert', 'Dirección actualizada con éxito');
        $this->dispatchBrowserEvent('closeModalDireccion');
    }

    public function destroy($id)
    {
        DireccionCliente::destroy($id);
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
