<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Models\Catalogo;
use Illuminate\Http\Request;

class ConteducController extends Controller
{
    /** 
     * 
    */
    public function index()
    {
        $libros = Libros::all();

        return view('conteduc.index',[
            'libros' => $libros
        ]);
    }

    public function crearcontenido()
    {
        return view('conteduc.crearcontenido');
    }

    public function registros()
    {
        return view('conteduc.registros');
    }

    public function updatelib(Libros $libros)
    {
        return view('conteduc.updatelib',[
            'libros'=>$libros
        ]);
    }

    public function detallelib(Libros $libro)
    {
        return view('conteduc.detallelib',[
            'libro' => $libro
        ]);
    }
}
