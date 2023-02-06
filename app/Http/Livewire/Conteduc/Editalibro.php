<?php

namespace App\Http\Livewire\Conteduc;

use Livewire\Component;
use App\Models\Libros;
use App\Models\Imagen;
use App\Models\Catalogo;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Editalibro extends Component
{
    use WithFileUploads;// permite subir archivos con livewire

    /**
     * propiedades
     */
    public $coleccion;
    public $niveles;
    public $portada;// portada actual
    public $portada_nueva;
    public $libro_nuevo;

    //
    public $libro;// objeto libro, cargado en el metodo mount
    public $arraynivel;

    protected $rules = [
        'coleccion' => 'nullable|string',
        'niveles' => 'nullable|string',
        'libro_nuevo' => 'nullable|mimes:pdf|max:124000',
        'portada_nueva' => 'nullable|image|max:124000|mimes:jpeg,jpg,png',
    ];

    public function mount(Libros $libros)
    {
        $this->libro = $libros;
        $this->portada = $libros->relimagen->nombimg;
    }

    public function actualizarlibro()
    {
        $imagen = null;
        $nuevolibro = null;

        $datos = $this->validate();// validación

        /** 
         * transforma la primera letra a minuscula
        */
        $coleccionlibro	= $datos['coleccion'] === 'Lectura' ?
            lcfirst($datos['coleccion']) :
            lcfirst(str_replace(' ','',$datos['coleccion']));
        $nivelestu  = !empty($datos['niveles']) ? lcfirst($datos['niveles']) : '';
        
        if ($coleccionlibro === 'colecciónBicentenario') {
            $ruta = "coleccionLibros/$coleccionlibro/$nivelestu";
        }elseif( $coleccionlibro === 'colecciónMaestros' || $coleccionlibro === 'lectura' ){
            $ruta = "coleccionLibros/$coleccionlibro";
        }

        /**
         * si existe una nueva portada
        */
        if($this->portada_nueva)
        {
            $imagen = $this->portada_nueva->store('public/coleccionLibros/cimg');
            $datos['nuevaimagen'] = str_replace('public/coleccionLibros/cimg/', '', $imagen);
        }

        /**
         * si existe un nuevo libro
         */
        if($this->libro_nuevo)
        {
            $nuevolibro = $this->libro_nuevo->store("public/coleccionLibros/$coleccionlibro/$nivelestu");
            $datos['nuevolibro'] = str_replace("public/coleccionLibros/$coleccionlibro/$nivelestu/", '', $nuevolibro);
        }

        // CONSULTA EL LIBRO
        $libronew = Libros::find($this->libro->idlib);
        $libronew->nomblib = $datos['nuevolibro'] ?? $libronew->nomblib;
        $libronew->ruta = $ruta ?? $libronew->ruta;

        if ($nivelestu === ('inicial' || 'primaria' || 'media')) {
            $libronew->nivel = $nivelestu;
        }else if($coleccionlibro == 'colecciónMaestros'){
            $libronew->nivel = 'maestro';
        }else if($coleccionlibro == 'lectura') {
            $libronew->nivel = 'lectura';
        }else{
            $libronew->nivel = $nivelestu ?? $libronew->nivel;
        }

        if ( $libronew->save() ) {
            // consultar imagen
            $imagennueva = Imagen::find($libronew->fkimag);
            $imagennueva->nombimg = $datos['nuevaimagen'] ?? $imagennueva->nombimg;

            if ( $imagennueva->save() ) {
                // crear un mensaje por medio de session
                session()->flash('mensaje','Ha sido actualizado los datos del libro!!');

                // limpiar carpeta temporal de livewire
                $this->cleanOldFileTempLivewire();

                // redireccionar al usuario
                return redirect()->route('conteduc.updatelib',$libronew->idlib);
            }
        }
        
    }

    /** 
     * eliminar archivos temporales del livewire-temp
    */
    public function cleanOldFileTempLivewire()
    {
        $oldTemp = Storage::files('livewire-tmp');

        foreach ($oldTemp as $archivos) {
            Storage::delete($archivos);
        }
    }

    /** 
     * si el valor del selector coleccion
    */
    public function updatedColeccion()
    {
        if($this->coleccion === 'Colección Bicentenario')
        {
            $this->arraynivel = Catalogo::where('idpadre',10)->get();
        }else {
            $this->arraynivel = [];
        }
    }

    public function render()
    {
        $arraycoleccion = Catalogo::where('idpadre',9)->get();

        return view('livewire.conteduc.editalibro',[
            'libros'=>$this->libro,
            'arraycoleccion' =>  $arraycoleccion,
        ]);
    }
}
