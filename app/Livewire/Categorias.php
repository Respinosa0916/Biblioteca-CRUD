<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class Categorias extends Component
{
    public $categorias;
    public function render()
    {
        $this->categorias = Categoria::all();
        return view('livewire.categorias');
    }
}
