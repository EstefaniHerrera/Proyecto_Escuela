@extends('Plantillas.plantilla')

@section('titulo', 'Formulario De Grado')

@section('contenido')

<h1> Grados </h1>

<!-- PARA LOS ERRORES -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="">
    @csrf <!-- PARA PODER ENVIAR EL FORMULARIO -->
    <div class="form-group">
        <label for="NivelGrado"> Nivel Grado </label>
        <input type="text" class="form-control" name="NivelGrado" id="NivelGrado" placeholder="Nivel del grado">
    </div>

    <div class="form-group">
        <label for="Seccion"> Seccion </label>
        <input type="text" class="form-control" name="Seccion" id="Seccion" placeholder="Seccion del grado">
    </div>

    <br>
    <button type="submit" class="btn btn-primary"> Guardar </button>
    <input type="reset" class="btn btn-danger"> 
</form>  
@section('footer', 'Esta pagina pertenece a: Belsy Mairena, Estefani Herrera y Karla Sierra')
@endsection