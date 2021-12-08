<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradoController extends Controller
{
    //
    public function index(){
        
        $grado = Grado::paginate(10);
        return view('raizgrado')->with('grados', $grado);
    }

    //funcion para la barra
    public function index2(Request $request){
        
        $texto =trim($request->get('texto'));
        $grados = DB::table('Grados')
                        ->where('NivelGrado', 'LIKE', '%'.$texto.'%')
                        ->orWhere('Seccion', 'LIKE', '%'.$texto.'%')
                        ->paginate(10);
        return view('buscargrado', compact('grados', 'texto'));
    }


    //funcion para mostrar
    public function show($id){
        $grado = Grado::findOrFail($id);
        $alumnos = Grado::find($id);
        $profesores = DB::table('grado_profesors')
            ->join('profesors', 'grado_profesors.profesor_id', '=', 'profesors.id')
            ->where('grado_profesors.grado_id', '=', $id)
            ->select('profesors.id', 'profesors.Nombres', 'profesors.PrimerApellido')
            ->get();
        $alumnos = DB::table('grados')
                ->join('alumnos', 'grados.id', '=', 'alumnos.grado_id')
                ->where('alumnos.grado_id', '=', $id)
                ->select('alumnos.id', 'alumnos.Nombres', 'alumnos.PrimerApellido')
                ->get();
        return view('gradoIndividual', compact('profesores', 'alumnos'))->with('grado', $grado);
    }

    //funcion para crear o insertar datos
    public function crear(){
        return view('formularioGrado');
    }

    //funcion para guardar los datos creados o insertados
    public function store(Request $request){
        //VALIDAR
        $request->validate([
            'NivelGrado'=>'required|alpha',
            'Seccion'=>'required|numeric',
        ]);

        //Formulario
        $nuevoGrado = new Grado();
        $nuevoGrado->NivelGrado = $request->input('NivelGrado');
        $nuevoGrado->Seccion = $request->input('Seccion');

        $creado = $nuevoGrado->save();

        if($creado){
            return redirect()->route('grado.index')
                ->with('mensaje', 'El grado fue creado exitosamente');
        }else{
            //retornar con un mensaje de error
        }
    }

    //funcion para editar los datos
    public function edit($id){
        $grado = Grado::findOrFail($id);
        return view('formularioEditarGrado')->with('grado', $grado);

    }

    //funcion para actualizar los datos
    public function update(Request $request, $id){

        $request->validate([
            'NivelGrado'=>'required|alpha',
            'Seccion'=>'required|numeric',
        ]);

        $grado = Grado::findOrFail($id);
        $grado->NivelGrado = $request->input('NivelGrado');
        $grado->Seccion = $request->input('Seccion');

        $creado = $grado->save();

        if($creado){
            return redirect()->route('grado.index')
                ->with('mensaje', 'El grado fue modificado exitosamente');
        }else{
            //retornar con un mensaje de error
        }
    }

    //funcion para borrar
    public function destroy($id){
        Grado::destroy($id);
        return redirect('/grados/')->with('mensaje', 'Grado borrado completamente');
    }
}
