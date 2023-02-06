<?php

namespace App\Http\Livewire\Conteduc;

use Livewire\Component;
use App\Models\Catalogo;
use App\Models\Libros;

class Contenidoeducativo extends Component
{
    public $nombrelibro;
    public $tipoconteduc;
    public $coleccion;
    public $colnivel;

    protected $listeners = ['padrefiltrolibros' => 'cargardatos'];

    public function mount(){
        $this->coleccion = Catalogo::where('idpadre',9)->get();
        $this->colnivel = Catalogo::where('idpadre',10)->get();
    }

    public function cargardatos($nombrelibro,$tipoconteduc)
    {
        $this->nombrelibro = $nombrelibro;
        $this->tipoconteduc = $tipoconteduc;
    }

    public function render()
    {
        $libros = Libros::when($this->nombrelibro,function($query){
            $query->where('nomblib', 'LIKE', '%'.$this->nombrelibro.'%');
        })
        ->when($this->tipoconteduc,function($query){
            $query->where('nivel', 'LIKE', '%'. $this->tipoconteduc .'%');
            //$query->orWhere('nivel', 'LIKE', '%'. $this->tipoconteduc .'%');
        })
        ->orderBy('idlib','DESC')
        ->paginate(14);

        return view('livewire.conteduc.contenidoeducativo',[
            'libros' => $libros,
            'coleccion' => $this->coleccion,
            'colnivel' => $this->colnivel,
        ]);
    }
}

