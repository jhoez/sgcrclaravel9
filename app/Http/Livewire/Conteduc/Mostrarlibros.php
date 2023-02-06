<?php

namespace App\Http\Livewire\Conteduc;

use App\Models\Imagen;
use App\Models\Libros;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class Mostrarlibros extends Component
{
    public $bandera = null;
    /** 
     * propiedad para ejecutar funciones como eventos de escucha
    */
    protected $listeners = ['dlibro'];

    /** 
     * eliminar libro
    */
    public function dlibro(Libros $libro)
    {
        $imagen = Imagen::where('idimag',$libro->fkimag)->firstOrFail();
        $libro_path = storage_path('app/public/'.$libro->ruta."/".$libro->nomblib);
        $imagen_path = storage_path('app/public/'.$libro->relimagen->ruta."/".$libro->relimagen->nombimg);

        //dd( File::exists($libro_path),File::exists($imagen_path) );

        if ( File::exists($libro_path) && File::exists($imagen_path) ) {
            if( $libro->delete() && $imagen->delete() )
            {
                unlink($libro_path);
                unlink($imagen_path);
            }
        }else {
            return $bandera = 'uno';
            // crear un mensaje por medio de session
            session()->flash('mensaje','No existe el libro a eliminar!!');
        }
    }

    public function render()
    {
        $libros = Libros::paginate(5);

        return view('livewire.conteduc.mostrarlibros',[
            'libros'=>$libros
        ]);
    }
}
