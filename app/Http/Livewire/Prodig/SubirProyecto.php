<?php

namespace App\Http\Livewire\Prodig;

use Livewire\Component;
use Livewire\WithFileUploads;// para subir archlibros
use Illuminate\Support\Facades\Request; // para poder subir archivos grandes

class SubirProyecto extends Component
{
    use WithFileUploads; // trait para subir archivos

    public $tipo;

    public $pro_nombre;
    public $pro_creador;
    public $pro_colaboracion;
    public $pro_descripcion;
    public $pro_audiovideo;
    public $pro_created_at;
    public $pro_updated_at;
    public $pro_usuario;

    /** 
     * reglas de validacion
    */
    protected $rules = [
        'pro_nombre'       => 'required|string|max:255',
        'pro_creador'      => 'required|string|max:50',
        'pro_colaboracion' => 'required|string|max:255',
        'pro_descripcion'  => 'required|string|max:500',
        //'pro_audiovideo'   => 'required|file|mimes:m4v,avi,flv,mp4,mov',
        //'pro_audiovideo'   => 'required|file|mimetypes:video/x-flv,video/mp4,video/quicktime,video/x-msvideo|max:200000',
    ];

    /** 
     * reglas de mensajes
    */
    protected $messages = [
        'pro_nombre.required'       =>'El nombre es requerido!!',
        'pro_creador.required'      =>'El creador del video o audio es requerido!!',
        'pro_colaboracion.required' =>'Los colaboradores del proyecto son requeridos!!',
        'pro_descripcion.required'  =>'La descripción es requerida!!',
        //'pro_audiovideo.required'   =>'El video o audio es requerido!!',
    ];

    public function insertarproyecto()
    {
        $datos = $this->validate(/*[
            'file', // Confirm the upload is a file before checking its type.
            function ($attribute, $value, $fail) {
                $is_video = Validator::make(
                    ['upload' => $value],
                    ['upload' => 'mimetypes:video/video/x-flv,video/mp4,video/quicktime,video/x-msvideo']
                )->passes();

                if (!$is_video) {
                    $fail(':attribute must be video.');
                }

                if ($is_video) {
                    $validator = Validator::make(
                        ['video' => $value],
                        ['video' => "max:124000"]
                    );
                    if ($validator->fails()) {
                        $fail(":attribute must be 10 megabytes or less.");
                    }
                }
            }
        ]*/);

        /**
         * livewire no sube file maximo a 12mb
         * utilizamos Request para subir el video
         */
        /* if(Request::hasFile('file')){
            $file = Request::file('file');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/uploads/';
            return $file->move($path, $filename);
        } */
        
        dd('crear proyecto',$datos);
    }

    public function render()
    {
        return view('livewire.prodig.subir-proyecto');
    }
}
