@extends('plantillas.plantilla')
@section('titulo', 'Profesor')
@section('contenido')

<h1> Detalles de {{$profesor->Nombres}} {{$profesor->PrimerApellido}}
<a class="btn btn-warning" href="{{route ('profesor.edit', ['id'=>$profesor->id])}}"> Editar </a>
</h1>
<br>
<table class="table">
    <thead class="table-secondary">
        <tr>
            <th scope="col">Campos</th>
            <th scope="col">Valor</th>
        </tr>  
    </thead>
    <tbody>
        <tr>
            <th scope="row">Nombres</th>
            <td scope="col">{{ $profesor->Nombres}} </td>
        </tr>
        <tr>
            <th scope="row">Primer Apellido</th>
            <td scope="col">{{ $profesor->PrimerApellido }} </td>
        </tr>
        <tr>
            <th scope="row">Segundo Apellido</th>
            <td scope="col">{{ $profesor->SegundoApellido }} </td>
        </tr>
        <tr>
            <th scope="row">Telefono</th>
            <td scope="col">{{ $profesor->Telefono }} </td>
        </tr>
        <tr>
            <th scope="row">Correo Electronico</th>
            <td scope="col">{{ $profesor->CorreoElectronico }} </td>
        </tr>
        <tr>
            <th scope="row">Sueldo</th>
            <td scope="col">{{ $profesor->Sueldo}} </td>
        </tr>
        <tr>
            <th scope="row">Grado Asignados</th>
            <td scope="col">
                <table class="table table-bordered border-dark" >
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nivel Grado</th>
                            <th scope="col">Seccion</th>
                        </tr>  
                    </thead>
                    <tbody>
                    @forelse ($grados as $grado)
                        <tr class="table-active">
                            <th scope="row">{{ $grado->id }}</th>
                            <td scope="col">{{ $grado->NivelGrado }}</td>
                            <td scope="col">{{ $grado->Seccion }}</td> 
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"> No hay mas grados </td>
                        </tr>    
                    @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>

<a class="btn btn-primary" href="{{route('profesor.index')}}"> Volver </a>
@section('footer', 'Esta pagina pertenece a: Belsy Mairena, Estefani Herrera y Karla Sierra')
@endsection
