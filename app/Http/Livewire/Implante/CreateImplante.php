<?php

namespace App\Http\Livewire\Implante;

use Livewire\Component;
use App\Models\Implante;

class CreateImplante extends Component
{
    public function render()
    {
        return view('livewire.implante.create-implante', [
            'implantes' => Implante::orderBy('id', 'desc')
                                    ->paginate()
        ]);
    }
}
