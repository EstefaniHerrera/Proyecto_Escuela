@extends('plantillas.plantilla')
@section('titulo', 'Grado')
@section('contenido')

<h1> Detalles de {{$grado->NivelGrado}}, seccion {{$grado->Seccion}}
<a class="btn btn-warning" href="{{route ('grado.edit', ['id'=>$grado->id])}}"> Editar </a>
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
            <th scope="row">Nivel Grado</th>
            <td scope="col">{{ $grado->NivelGrado}} </td>
        </tr>
        <tr>
            <th scope="row">Seccion</th>
            <td scope="col">{{ $grado->Seccion }} </td>
        </tr>
        <tr>
            <th scope="row">Profesores Asignados</th>
            <td scope="col">
                <table class="table table-bordered border-dark" >
                    <thead class="table-dark">
                        <tr >
                            <th scope="col">Id</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Primer Apellido</th>
                        </tr>  
                    </thead>
                    <tbody>
                        @forelse ($profesores as $profesor)
                            <tr class="table-active">
                                <th scope="row">{{ $profesor->id }}</th>
                                <td scope="col">{{ $profesor->Nombres }}</td>
                                <td scope="col">{{ $profesor->PrimerApellido }}</td>   
                            </tr> 
                        @empty
                            <tr>
                                <td colspan="4"> No hay mas profesores </td>
                            </tr>    
                        @endforelse  
                    </tbody>
                </table>
            </td> 
        </tr>
        <tr>
            <th scope="row">Alumnos Matriculados</th>
            <td scope="col">
                <table class="table table-bordered border-dark" >
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Primer Apellido</th>
                        </tr>  
                    </thead>
                    <tbody>
                    @forelse ($alumnos as $alumno)
                        <tr class="table-active">
                            <th scope="row">{{ $alumno->id }}</th>
                            <td scope="col">{{ $alumno->Nombres }}</td>
                            <td scope="col">{{ $alumno->PrimerApellido }}</td>  
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"> No hay mas alumnos </td>
                        </tr>    
                    @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>

<a class="btn btn-primary" href="{{route('grado.index')}}"> Volver </a>
@section('footer', 'Esta pagina pertenece a: Belsy Mairena, Estefani Herrera y Karla Sierra')

@endsection