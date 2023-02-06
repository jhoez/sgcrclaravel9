<?php

namespace App\Http\Livewire\Conteduc;

use App\Models\Imagen;
use App\Models\Libros;
use Livewire\Component;
use App\Models\Catalogo;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;// para subir archlibros

class Subirlibro extends Component
{
    use WithFileUploads; // trait para subir archivos
    
    /** 
     * propiedades para el formulario
    */
    public $coleccion;
    public $niveles;
    public $arraynivel;
    public $archlibro;
    public $portada;

    /** 
     * para cambiar el texto del boton de guardar a actualizar
    */
    public $tipo;

    protected $rules = [
        'coleccion' => 'required',
        'niveles' => 'string',
        'archlibro' => 'required|mimes:pdf|max:124000',
        'portada' => 'required|image|max:124000|mimes:jpeg,jpg,png',
    ];

    /** 
     * eventos de escucha
    */
    protected $listeners = ['mostrarNivel'];

    public function insertarlibro()
    {
        $imagen = new Imagen;
        $libros = new Libros;
        $ruta = '';
        $coleccion = '';
        $nivelestu = '';
        
        $datos = $this->validate();// con el metodo validate() aplica las reglas
        
        // DATOS DE IMAGEN
        // almacenar la portada
        //$portada = $this->portada->storeAs('public/coleccionLibros/cimg',$this->portada->getClientOriginalName());// con nombre original, PERO SE PUEDE CAMBIAR EL NOMBRE EN EL SEGUNDO PARAMETRO
        $portada = $this->portada->store('public/coleccionLibros/cimg');
        $datos['portada'] = str_replace('public/coleccionLibros/cimg/', '', $portada);
        
        $imagen->nombimg = $datos['portada'];
        $imagen->fkuser = auth()->user()->id;// Con el metodo id() de la clase Auth obtenemos el id de la tabla usuario

        // GUARDAR DATOS DE IMAGEN
        if ($imagen->save()) {
            $coleccion	= $datos['coleccion'] === 'Lectura' ? lcfirst($datos['coleccion']) : lcfirst(str_replace(' ','',$datos['coleccion']));
            $nivelestu  = !empty($datos['niveles']) ? lcfirst($datos['niveles']) : '';
            
            if ($coleccion === 'colecciónBicentenario') {
                $ruta = "coleccionLibros/$coleccion/$nivelestu";
            }elseif( $coleccion === 'colecciónMaestros' || $coleccion === 'lectura' ){
                $ruta = "coleccionLibros/$coleccion";
            }

            // almacenar el libro
            //$libro = $this->archlibro->storeAs($ruta,$this->archlibro->getClientOriginalName());// con nombre original
            $filelibro = $this->archlibro->store($ruta);
            $datos['libro'] = str_replace($ruta.'/', '', $filelibro);

            if ($nivelestu === ('inicial' || 'primaria' || 'media')) {
                $libros->nivel = $nivelestu;
            }else if($coleccion == 'colecciónMaestros'){
                $libros->nivel = 'maestro';
            }else if($coleccion == 'lectura') {
                $libros->nivel = 'lectura';
            }else{
                $libros->nivel = $nivelestu;
            }
            
            $libros->nomblib = $datos['libro'];
            $libros->ruta = $ruta;
            $libros->coleccion = $coleccion;
            /* if (!empty($datos['anio'])) {
                $libros->anio = $datos['anio'];
            } */
            $libros->fkimag = $imagen->idimag;
            
            if ( $libros->save() ) {
                $this->cleanOldFileTempLivewire();
                //dd($libros->idlib);
                //return Response()->json($datosEmpleados);
                return redirect('conteduc/crearcontenido')->with('mensaje','Libro agregado con exito!!');
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
     * cambia los valores de el nivel
    */
    public function mostrarNivel($data)
    {
        dd($data);
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

        return view('livewire.conteduc.subirlibro', [
            'arraycoleccion' =>  $arraycoleccion,
        ]);
    }
}