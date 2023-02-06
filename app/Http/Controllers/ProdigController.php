<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProdigController extends Controller
{
    //
    public function index()
    {
        return view('prodig.index');
    }

    public function crearproyecto()
    {
        return view('prodig.crearproyectos');
    }

    public function subirproyecto(Request $request)
    {
        $proyecto = new Proyecto;
        $multimedia = new Multimedia;

        $campos = [
            'pro_nombre'       => 'required|string|max:255',
            'pro_creador'      => 'required|string|max:50',
            'pro_colaboracion' => 'required|string|max:255',
            'pro_descripcion'  => 'required|string|max:500',
            'pro_audiovideo'   => 'required|file|mimetypes:video/x-flv,video/mp4,video/quicktime,video/x-msvideo|max:200000',
        ];
        $msj = [
            'pro_nombre.required'       =>'El nombre es requerido!!',
            'pro_creador.required'      =>'El creador del video o audio es requerido!!',
            'pro_colaboracion.required' =>'Los colaboradores del proyecto son requeridos!!',
            'pro_descripcion.required'  =>'La descripción es requerida!!',
            'pro_audiovideo.required'   =>'El video o audio es requerido!!',
        ];
        
        $datos = $this->validate($request,$campos,$msj);
        //$post = $request->except('_token');
        
        if ( $request->hasFile('pro_audiovideo') )
        {
            $mimetype = explode('/',$request->file('pro_audiovideo')->getMimeType());

            $proyecto->nombpro = $request->pro_nombre;
            $proyecto->creador = $request->pro_creador;
            $proyecto->colaboracion = $request->pro_colaboracion;
            $proyecto->descripcion = $request->pro_descripcion;
            $proyecto->fkuser = auth()->user()->id;

            if ( $proyecto->save() ) {
                if ( $mimetype[0] === 'video' ) {
                    $nombremultimedia = $request->file('pro_audiovideo')->storeAs('public/proyectos/video',$request->file('pro_audiovideo')->getClientOriginalName());
                    $multimedia->nombmult = str_replace('public/proyectos/video/', '', $nombremultimedia);
                }elseif ( $mimetype[0] === 'audio' ) {
                    $nombremultimedia = $request->file('pro_audiovideo')->storeAs('public/proyectos/audio',$request->file('pro_audiovideo')->getClientOriginalName());
                    $multimedia->nombmult = str_replace('public/proyectos/audio/', '', $nombremultimedia);
                }

                $multimedia->tipomult = $mimetype[0];
                $multimedia->fkpro = $proyecto->idpro;

                if ( $multimedia->save() ) {
                    return back()->with('mensaje', 'El proyecto ha sido registrado con exito!!');
                }
            }
        }
    }

    public function registros()
    {
        return view('prodig.registros');
    }
}
