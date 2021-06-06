<?php

namespace App\Http\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cliente;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;

class TablaCliente extends Component
{
    use WithPagination;

    public $cliente;
    public $search;
    public $editModal = false;
    public $sort = 'id';
    public $direction = 'desc';
    public $state = [];

    public function render()
    {
        return view('livewire.cliente.tabla-cliente', [
            'clientes' => Cliente::where('cliente', 'like', '%' . $this->search . '%')
                ->orWhere('cuit', 'like', '%' . $this->search . '%')
                ->orWhere('documento', 'like', '%' . $this->search . '%')
                ->orWhere('telefono', 'like', '%' . $this->search . '%')
                ->orWhere('mail', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate()
        ]);
    }

    public function addCliente()
    {
        $this->state = [];
        $this->editModal = false;
        $this->dispatchBrowserEvent("showModal");
    }

    public function createCliente()
    {
        $validar = Validator::make($this->state, [
            'cliente' => 'required',
            'cuit' => 'required',
            'documento' => 'required',
            'telefono' => 'required',
            'mail' => 'required'
        ])->validate();

        Cliente::create($validar);

        $this->emit('alert', 'Cliente registrado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editCliente(Cliente $cliente)
    {
        $this->editModal = true;

        $this->cliente = $cliente;

        $this->state = $cliente->toArray();

        $this->dispatchBrowserEvent("showModal");
    }

    public function updateCliente()
    {
        $validar = Validator::make($this->state, [
            'cliente' => 'required',
            'cuit' => 'required',
            'documento' => 'required',
            'telefono' => 'required',
            'mail' => 'required'
        ])->validate();

        $this->cliente->update($validar);

        $this->emit('alert', 'Cliente actualizado con éxito');
        $this->dispatchBrowserEvent('closeModal');
    }

    public function destroy($id)
    {
        Cliente::destroy($id);
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
