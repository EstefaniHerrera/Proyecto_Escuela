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

/* ********************************************** Profesor *********************************/
//ruta para leer
Route::get('/profesors', [ProfesorController::class, 'index'])
->name('profesor.index');

//ruta para barra de busqueda
Route::get('/profesors/buscar', [ProfesorController::class, 'index2'])
->name('profesor.index2');


//ruta para mostrar
Route::get('/profesors/{id}', [ProfesorController::class, 'show'])
->name('profesor.mostrar')->where('id', '[0-9]+');

//ruta para crear
Route::get('/profesors/crear', [ProfesorController::class, 'crear'])
->name('profesor.crear');

//ruta para postear
Route::post('/profesors/crear', [ProfesorController::class, 'store'])
->name('profesor.guardar');

//ruta para mostrar formulario
Route::get('/profesors/{id}/editar', [ProfesorController::class, 'edit'])
->name('profesor.edit')->where('id', '[0-9]+');

//para actualizar los datos
Route::put('/profesors/{id}/editar', [ProfesorController::class, 'update'])
->name('profesor.update')->where('id', '[0-9]+');

//ruta para borrar datos
Route::delete('/profesors/{id}/borrar', [ProfesorController::class, 'destroy'])
->name('profesor.borrar')->where('id', '[0-9]+');