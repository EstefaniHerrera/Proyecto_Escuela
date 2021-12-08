@extends('Plantillas.plantilla')

@section('titulo', 'Formulario De Alumnos')

@section('contenido')

<h1> Alumnos </h1>

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
        <label for="grado_id"> Grado Id </label>
        <input type="number" class="form-control" name="grado_id" id="grado_id" placeholder="Id de los grados existentes">
    </div>

    <div class="form-group">
        <label for="Nombres"> Nombres </label>
        <input type="text" class="form-control" name="Nombres" id="Nombres" placeholder="Nombres del alumno">
    </div>

    <div class="form-group">
        <label for="PrimerApellido"> Primer Apellido </label>
        <input type="text" class="form-control" name="PrimerApellido" id="PrimerApellido" placeholder="Primer Apellido del alumno">
    </div>

    <div class="form-group">
        <label for="SegundoApellido"> Segundo Apellido </label>
        <input type="text" class="form-control" name="SegundoApellido" id="SegundoApellido" placeholder="Segundo Apellido del alumno">
    </div>

    <div class="form-group">
        <label for="AñoIngreso"> Año Ingreso </label>
        <input type="text" class="form-control" name="AñoIngreso" id="AñoIngreso" placeholder="0000">
    </div>

    <div class="form-group">
        <label for="CorreoElectronico"> Correo Electronico </label>
        <input type="text" class="form-control" name="CorreoElectronico" id="CorreoElectronico" placeholder="nombre.apellido@example.com">
    </div>

    <div class="form-group">
        <label for="Edad"> Edad </label>
        <input type="text" class="form-control" name="Edad" id="Edad" placeholder="Edad del Alumno">
    </div>

    <div class="form-group">
        <label for="FechaNacimiento"> Fecha de Nacimiento </label>
        <input type="text" class="form-control" name="FechaNacimiento" id="FechaNacimiento" placeholder="Fecha de Nacimiento del Alumno">
    </div>

    <br>
    <button type="submit" class="btn btn-primary"> Guardar </button>
    <input type="reset" class="btn btn-danger"> 
</form>  
@section('footer', 'Esta pagina pertenece a: Belsy Mairena, Estefani Herrera y Karla Sierra')

@endsection
