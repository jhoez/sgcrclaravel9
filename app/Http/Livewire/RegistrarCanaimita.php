<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegistrarCanaimita extends Component
{
    public function mount()
    {
        $this->estadoArray          =   Estado::all();
        $this->municipioArray       =   Municipio::all();
        $this->parroquiaArray       =   Parroquia::all();
        $this->arraynivel           =   Catalogo::all()->where('idpadre','=',1);
        $this->arrayversequipo      =   Catalogo::all()->where('idpadre','=',2);
        $this->arrayfsoftware       =   Catalogo::all()->where('idpadre','=',3);
        $this->arrayfpantalla       =   Catalogo::all()->where('idpadre','=',4);
        $this->arrayftarjetamadre   =   Catalogo::all()->where('idpadre','=',5);
        $this->arrayfteclado        =   Catalogo::all()->where('idpadre','=',6);
        $this->arrayfcarga          =   Catalogo::all()->where('idpadre','=',7);
        $this->arrayfgeneral        =   Catalogo::all()->where('idpadre','=',8);
    }

    public function render()
    {
        return view('livewire.registrar-canaimita', [
            'estadoArray'        =>  $this->estadoArray,
            'municipioArray'     =>  $this->municipioArray,
            'parroquiaArray'     =>  $this->parroquiaArray,
            'arraynivel'            =>  $this->arraynivel,
            'arrayversequipo'       =>  $this->arrayversequipo,
            'arrayfsoftware'        =>  $this->arrayfsoftware,
            'arrayfpantalla'        =>  $this->arrayfpantalla,
            'arrayftarjetamadre'    =>  $this->arrayftarjetamadre,
            'arrayfteclado'         =>  $this->arrayfteclado,
            'arrayfcarga'           =>  $this->arrayfcarga,
            'arrayfgeneral'         =>  $this->arrayfgeneral,
        ]);
    }
}
