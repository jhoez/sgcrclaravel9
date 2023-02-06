<?php

namespace App\Http\Livewire\Conteduc;

use Livewire\Component;

class FiltrarLibro extends Component
{
    public $nombrelibro;
    public $tipoconteduc;

    public function filtrarlibros()
    {
        $this->emit('padrefiltrolibros',$this->nombrelibro,$this->tipoconteduc);
    }

    public function render()
    {
        return view('livewire.conteduc.filtrar-libro');
    }
}
