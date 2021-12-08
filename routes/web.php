<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


/* ********************************************** Grado *********************************/
//ruta para leer
Route::get('/grados', [GradoController::class, 'index'])
->name('grado.index');

//ruta para barra de busqueda
Route::get('/grados/buscar', [GradoController::class, 'index2'])
->name('grado.index2');

//ruta para mostrar
Route::get('/grados/{id}', [GradoController::class, 'show'])
->name('grado.mostrar')->where('id', '[0-9]+');

//ruta para crear
Route::get('/grados/crear', [GradoController::class, 'crear'])
->name('grado.crear');

//ruta para postear
Route::post('/grados/crear', [GradoController::class, 'store'])
->name('grado.guardar');

//ruta para mostrar formulario
Route::get('/grados/{id}/editar', [GradoController::class, 'edit'])
->name('grado.edit')->where('id', '[0-9]+');

//para actualizar los datos
Route::put('/grados/{id}/editar', [GradoController::class, 'update'])
->name('grado.update')->where('id', '[0-9]+');

//ruta para borrar datos
Route::delete('/grados/{id}/borrar', [GradoController::class, 'destroy'])
->name('grado.borrar')->where('id', '[0-9]+');