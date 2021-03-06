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

/* ********************************************** Alumno *********************************/
//ruta para leer
Route::get('/alumnos', [AlumnoController::class, 'index'])
->name('alumno.index');

//ruta para barra de busqueda
Route::get('/alumnos/buscar', [AlumnoController::class, 'index2'])
->name('alumno.index2');

//ruta para mostrar
Route::get('/alumnos/{id}', [AlumnoController::class, 'show'])
->name('alumno.mostrar')->where('id', '[0-9]+');

//ruta para crear
Route::get('/alumnos/crear', [AlumnoController::class, 'crear'])
->name('alumno.crear');

//ruta para postear
Route::post('/alumnos/crear', [AlumnoController::class, 'store'])
->name('alumno.guardar');

//ruta para mostrar formulario
Route::get('/alumnos/{id}/editar', [AlumnoController::class, 'edit'])
->name('alumno.edit')->where('id', '[0-9]+');

//para actualizar los datos
Route::put('/alumnos/{id}/editar', [AlumnoController::class, 'update'])
->name('alumno.update')->where('id', '[0-9]+');

//ruta para borrar datos
Route::delete('/alumnos/{id}/borrar', [AlumnoController::class, 'destroy'])
->name('alumno.borrar')->where('id', '[0-9]+');

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

/* *******************************************GradoProfesor*************************************/
//ruta para crear
Route::get('/gradoprofesors/crear', [GradoProfesorController::class, 'crear'])
->name('gradoprofesor.crear');

//ruta para postear
Route::post('/gradoprofesors/crear', [GradoProfesorController::class, 'store'])
->name('gradoprofesor.guardar');
