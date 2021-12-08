<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    //
    public function index(){
        
        $alumno = Alumno::paginate(10);
        return view('raizalumno')->with('alumnos', $alumno);
    }

    //funcion para la barra
    public function index2(Request $request){
        
        $texto =trim($request->get('texto'));
        $alumnos = DB::table('Alumnos')
                        ->where('nombres', 'LIKE', '%'.$texto.'%')
                        ->orWhere('PrimerApellido', 'LIKE', '%'.$texto.'%')
                        ->orWhere('SegundoApellido', 'LIKE', '%'.$texto.'%')
                        ->paginate(10);
        return view('buscaralumno', compact('alumnos', 'texto'));
    }


    //funcion para mostrar
    public function show($id){
        $alumno = Alumno::findOrFail($id);
        return view('alumnoIndividual')->with('alumno', $alumno);
    }

    //funcion para crear o insertar datos
    public function crear(){
        return view('formularioAlumno');
    }

    //funcion para guardar los datos creados o insertados
    public function store(Request $request){
        //VALIDAR
        $request->validate([
            'grado_id'=>'required|numeric',
            'Nombres'=>'required',
            'PrimerApellido'=>'required|alpha',
            'SegundoApellido'=>'required|alpha',
            'AñoIngreso'=>'required|numeric',
            'CorreoElectronico'=>'required',
            'Edad'=>'required|numeric',
            'FechaNacimiento'=>'required'
        ]);

        //Formulario
        $nuevoAlumno = new Alumno();
        $nuevoAlumno->grado_id = $request->input('grado_id');
        $nuevoAlumno->Nombres = $request->input('Nombres');
        $nuevoAlumno->PrimerApellido = $request->input('PrimerApellido');
        $nuevoAlumno->SegundoApellido = $request->input('SegundoApellido');
        $nuevoAlumno->AñoIngreso = $request->input('AñoIngreso');
        $nuevoAlumno->CorreoElectronico = $request->input('CorreoElectronico');
        $nuevoAlumno->Edad = $request->input('Edad');
        $nuevoAlumno->FechaNacimiento = $request->input('FechaNacimiento');

        $creado = $nuevoAlumno->save();

        if($creado){
            return redirect()->route('alumno.index')
                ->with('mensaje', 'El alumno fue creado exitosamente');
        }else{
            //retornar con un mensaje de error
        }
    }

    //funcion para editar los datos
    public function edit($id){
        $alumno = Alumno::findOrFail($id);
        return view('formularioEditarAlumno')->with('alumno', $alumno);

    }

    //funcion para actualizar los datos
    public function update(Request $request, $id){

        $request->validate([
            'grado_id'=>'required|numeric',
            'Nombres'=>'required',
            'PrimerApellido'=>'required|alpha',
            'SegundoApellido'=>'required|alpha',
            'AñoIngreso'=>'required|numeric',
            'CorreoElectronico'=>'required',
            'Edad'=>'required|numeric',
            'FechaNacimiento'=>'required'
        ]);

        $alumno = Alumno::findOrFail($id);
        $alumno->grado_id = $request->input('grado_id');
        $alumno->Nombres = $request->input('Nombres');
        $alumno->PrimerApellido = $request->input('PrimerApellido');
        $alumno->SegundoApellido = $request->input('SegundoApellido');
        $alumno->AñoIngreso = $request->input('AñoIngreso');
        $alumno->CorreoElectronico = $request->input('CorreoElectronico');
        $alumno->Edad = $request->input('Edad');
        $alumno->FechaNacimiento = $request->input('FechaNacimiento');

        $creado = $alumno->save();

        if($creado){
            return redirect()->route('alumno.index')
                ->with('mensaje', 'El alumno fue modificado exitosamente');
        }else{
            //retornar con un mensaje de error
        }
    }

    //funcion para borrar
    public function destroy($id){
        Alumno::destroy($id);
        return redirect('/alumnos/')->with('mensaje', 'Alumno borrado completamente');
    }
}
