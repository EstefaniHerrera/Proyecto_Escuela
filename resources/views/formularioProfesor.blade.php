@extends('Plantillas.plantilla')

@section('titulo', 'Formulario De Profesor')

@section('contenido')

<h1> Profesores </h1>

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
        <label for="Nombres"> Nombres </label>
        <input type="text" class="form-control" name="Nombres" id="Nombres" placeholder="Nombres del profesor">
    </div>

    <div class="form-group">
        <label for="PrimerApellido"> Primer Apellido </label>
        <input type="text" class="form-control" name="PrimerApellido" id="PrimerApellido" placeholder="Primer Apellido del profesor">
    </div>

    <div class="form-group">
        <label for="SegundoApellido"> Segundo Apellido </label>
        <input type="text" class="form-control" name="SegundoApellido" id="SegundoApellido" placeholder="Segundo Apellido del profesor">
    </div>

    <div class="form-group">
        <label for="Telefono"> Telefono </label>
        <input type="text" class="form-control" name="Telefono" id="Telefono" placeholder="00-00-00-00">
    </div>

    <div class="form-group">
        <label for="CorreoElectronico"> Correo Electronico </label>
        <input type="text" class="form-control" name="CorreoElectronico" id="CorreoElectronico" placeholder="nombre.apellido@example.com">
    </div>

    <div class="form-group">
        <label for="Sueldo"> Sueldo </label>
        <input type="text" class="form-control" name="Sueldo" id="Sueldo" placeholder="0.00">
    </div>

    <br>
    <button type="submit" class="btn btn-primary"> Guardar </button>
    <input type="reset" class="btn btn-danger"> 
</form>  
@section('footer', 'Esta pagina pertenece a: Belsy Mairena, Estefani Herrera y Karla Sierra')

@endsection