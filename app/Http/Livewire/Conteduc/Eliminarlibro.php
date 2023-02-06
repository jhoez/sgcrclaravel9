<?php

namespace App\Http\Livewire\Conteduc;

use App\Models\Libros;
use Livewire\Component;

class Eliminarlibro extends Component
{
    /** 
     * propiedad para ejecutar funciones como eventos de escucha
    */
    protected $listeners = ['dlibro'];

    public function dlibro(Libros $libro){
        echo 'hola';
        //$libro->delete();
    }

    public function render()
    {
        return view('livewire.conteduc.eliminarlibro');
    }
}
