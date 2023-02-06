<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdigController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConteducController;
use App\Http\Controllers\CanaimitaController;
use App\Http\Controllers\DescargarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/** 
 * RUTAS A CONTENIDO EDUCATIVO
*/
Route::get('conteduc/', [ConteducController::class, 'index'])->name('conteduc.index');
Route::get('conteduc/crearcontenido', [ConteducController::class, 'crearcontenido'])->name('conteduc.crearcontenido');
Route::get('conteduc/registros', [ConteducController::class, 'registros'])->name('conteduc.registros');
Route::get('conteduc/updatelib/{libros}', [ConteducController::class, 'updatelib'])->name('conteduc.updatelib');
Route::get('conteduc/detallelib/{libro}', [ConteducController::class, 'detallelib'])->name('conteduc.detallelib');

/** 
 * RUTAS A PROYECTOS DIGITALES
*/
Route::get('prodig/', [ProdigController::class, 'index'])->name('prodig.index');
Route::post('prodig/', [ProdigController::class, 'subirproyecto'])->name('prodig.subirproyecto');
Route::get('prodig/crearproyecto',[ProdigController::class,'crearproyecto'])->name('prodig.crearproyecto');
Route::get('prodig/registros',[ProdigController::class,'registros'])->name('prodig.registros');

/** 
 * RUTAS A REALIDAD AUMENTADA
*/
Route::get('rea/', [ReaController::class, 'index'])->name('rea.index');

/** 
 * RUTAS A TUTOR
*/
Route::get('canaimita/',[CanaimitaController::class, 'index'])->name('canaimitas.index');

/** 
 * RUTAS PARA VER Y DESCARGAR LIBROS
*/
Route::get('descargar/verlib/{libros}', [DescargarController::class, 'verlib'])->name('descargar.verlib');
Route::get('descargar/desclib/{libros}', [DescargarController::class, 'desclib'])->name('descargar.desclib');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
