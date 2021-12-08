<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    //
    public function index(){
        
        $profesor = Profesor::paginate(10);
        return view('raizprofesor')->with('profesores', $profesor);
    }


    //funcion para mostrar
    public function show($id){
        $profesor = Profesor::findOrFail($id);
        $grados = DB::table('grado_profesors')
                ->join('grados', 'grado_profesors.grado_id', '=', 'grados.id')
                ->where('grado_profesors.profesor_id', '=', $id)
                ->select('grados.id', 'grados.NivelGrado', 'grados.Seccion')
                ->get();
        return view('profesorIndividual', compact('grados'))->with('profesor', $profesor);
    }

    //funcion para la barra
    public function index2(Request $request){
        
        $texto =trim($request->get('texto'));
        $profesores = DB::table('Profesors')
                        ->where('nombres', 'LIKE', '%'.$texto.'%')
                        ->orWhere('PrimerApellido', 'LIKE', '%'.$texto.'%')
                        ->orWhere('SegundoApellido', 'LIKE', '%'.$texto.'%')
                        ->paginate(10);
        return view('buscarprofesor', compact('profesores', 'texto'));
    }


    //funcion para crear o insertar datos
    public function crear(){
        return view('formularioProfesor');
    }

    //funcion para guardar los datos creados o insertados
    public function store(Request $request){
        //VALIDAR
        $request->validate([
            'Nombres'=>'required',
            'PrimerApellido'=>'required|alpha',
            'SegundoApellido'=>'required|alpha',
            'Telefono'=>'required|numeric',
            'CorreoElectronico'=>'required',
            'Sueldo'=>'required|numeric'
        ]);

        //Formulario
        $nuevoProfesor = new Profesor();
        $nuevoProfesor->Nombres = $request->input('Nombres');
        $nuevoProfesor->PrimerApellido = $request->input('PrimerApellido');
        $nuevoProfesor->SegundoApellido = $request->input('SegundoApellido');
        $nuevoProfesor->Telefono = $request->input('Telefono');
        $nuevoProfesor->CorreoElectronico = $request->input('CorreoElectronico');
        $nuevoProfesor->Sueldo = $request->input('Sueldo');

        $creado = $nuevoProfesor->save();

        if($creado){
            return redirect()->route('profesor.index')
                ->with('mensaje', 'El profesor fue creado exitosamente');
        }else{
            //retornar con un mensaje de error
        }
    }

    //funcion para editar los datos
    public function edit($id){
        $profesor = Profesor::findOrFail($id);
        return view('formularioEditarProfesor')->with('profesor', $profesor);

    }

    //funcion para actualizar los datos
    public function update(Request $request, $id){

        $request->validate([
            'Nombres'=>'required',
            'PrimerApellido'=>'required|alpha',
            'SegundoApellido'=>'required|alpha',
            'Telefono'=>'required|numeric',
            'CorreoElectronico'=>'required',
            'Sueldo'=>'required|numeric',
        ]);

        $profesor = Profesor::findOrFail($id);
        $profesor->Nombres = $request->input('Nombres');
        $profesor->PrimerApellido = $request->input('PrimerApellido');
        $profesor->SegundoApellido = $request->input('SegundoApellido');
        $profesor->Telefono = $request->input('Telefono');
        $profesor->CorreoElectronico = $request->input('CorreoElectronico');
        $profesor->Sueldo= $request->input('Sueldo');

        $creado = $profesor->save();

        if($creado){
            return redirect()->route('profesor.index')
                ->with('mensaje', 'El profesor fue modificado exitosamente');
        }else{
            //retornar con un mensaje de error
        }
    }

    //funcion para borrar
    public function destroy($id){
        Profesor::destroy($id);
        return redirect('/profesors/')->with('mensaje', 'Profesor borrado completamente');
    }
}
