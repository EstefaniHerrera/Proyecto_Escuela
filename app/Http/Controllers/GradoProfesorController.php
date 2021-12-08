<?php

namespace App\Http\Controllers;

use App\Models\GradoProfesor;
use Illuminate\Http\Request;

class GradoProfesorController extends Controller
{
    //
    public function crear(){
        return view('formularioGradoProfesor');
    }

    //funcion para guardar los datos creados o insertados
    public function store(Request $request){
        //VALIDAR
        $request->validate([
            'grado_id'=>'required|numeric',
            'profesor_id'=>'required|numeric',
        ]);

        //Formulario
        $nuevoGradoProfesor = new GradoProfesor();
        $nuevoGradoProfesor->grado_id = $request->input('grado_id');
        $nuevoGradoProfesor->profesor_id = $request->input('profesor_id');

        $creado = $nuevoGradoProfesor->save();

        if($creado){
            return redirect()->route('grado.index')
                ->with('mensaje', 'El profesor fue asignado exitosamente');
        }else{
            //retornar con un mensaje de error
        }
    }
}
