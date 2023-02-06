<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use Illuminate\Http\Request;

class DescargarController extends Controller
{
    /**
     * 
     */
    public function desclib($nombrefile)
    {
        $libro = Libros::where('nomblib',$nombrefile)->firstOrFail();
        $filelib = storage_path("app/public/$libro->ruta/$libro->nomblib");

        return response()->download($filelib);// se pasa la ruta con el nombre del archivo para descargar
    }

    /** 
     * mostrar el pdf en el navegador
    */
    public function verlib($nombrefile)
    {
        $libro = Libros::where('nomblib',$nombrefile)->firstOrFail();
        $filelib = storage_path("app/public/$libro->ruta/$libro->nomblib");

        return response()->file($filelib);// se pasa la ruta con el nombre del archivo para visualizar

        /* return Response::make(file_get_contents($filelib), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$libro->nomblib.'"'
        ]); */
    }
}
