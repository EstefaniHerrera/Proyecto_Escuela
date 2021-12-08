@extends('Plantillas.plantilla')

@section('titulo', 'Formulario Para Asignar Profesor A Grado')

@section('contenido')

<h1> Formulario Para Asignar Profesor A Grado </h1>

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
        <label for="grado_id"> Id del Grado </label>
        <input type="text" class="form-control" name="grado_id" id="grado_id" placeholder="grado_id">
    </div>

    <div class="form-group">
        <label for="profesor_id"> Id del Profesor </label>
        <input type="text" class="form-control" name="profesor_id" id="profesor_id" placeholder="Id del Profesor">
    </div>

    <br>
    <button type="submit" class="btn btn-primary"> Guardar </button>
    <input type="reset" class="btn btn-danger"> 
</form>  
@section('footer', 'Esta pagina pertenece a: Belsy Mairena, Estefani Herrera y Karla Sierra')
@endsection