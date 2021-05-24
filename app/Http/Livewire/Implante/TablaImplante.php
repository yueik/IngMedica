<?php

namespace App\Http\Livewire\Implante;

use Livewire\Component;
use App\Models\Implante;
use Livewire\WithPagination;

class TablaImplante extends Component
{
    use WithPagination;

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['render' => 'render'];
    
    public function render()
    {
        return view('livewire.implante.tabla-implante', [
            'implantes' => Implante::where('modelo_id', 'like', '%' . $this->search . '%')
                                    ->orWhere('codigo', 'like', '%' . $this->search . '%')
                                    ->orderBy($this->sort, $this->direction)
                                    ->paginate()
        ]);
    }

    public function destroy($id)
    {
        Implante::destroy($id);
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
