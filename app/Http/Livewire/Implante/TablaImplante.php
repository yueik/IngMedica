<?php

namespace App\Http\Livewire\Implante;

use Livewire\Component;
use App\Models\Implante;
use Livewire\WithPagination;

class TablaImplante extends Component
{
    use WithPagination;
    
    public function render()
    {
        //$implantes = Implante::all()->paginate();

        return view('livewire.implante.tabla-implante', [
            'implantes' => Implante::orderBy('id', 'desc')->paginate(1)
        ]);
    }
}
