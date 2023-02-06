<?php

namespace App\Http\Livewire\Prodig;

use Livewire\Component;
use App\Models\Multimedia;

class Proyectosdigitales extends Component
{
    public function render()
    {
        $proyectos = Multimedia::orderBy('idmult','DESC')->paginate(14);

        return view('livewire.prodig.proyectosdigitales',[
            'proyectos'=>$proyectos
        ]);
    }
}
