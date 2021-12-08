@extends('Plantillas.plantilla')

@section('titulo', 'Lista De Alumnos')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <form action="{{route('alumno.index2')}}" method="GET">
                <div class="form-row">
                    <div class="col-sm-4 my-1">
                        <input type="text" class="form-control" name="texto" placeholder="Buscar">
                    </div>
                    <div class="col-auto my-1">
                        <input type="submit" class="btn btn-secondary" value="Buscar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <h1> Listado De Alumnos
            <a class="btn btn-info float-end" href="{{route('alumno.crear')}}"> Agregar Un Nuevo Alumno </a>
            <a class="btn btn-info float-end" href="{{route('grado.index')}}"> Ir A Grados </a> 
    </h1>
    {{ $alumnos->links()}}
    
    <table class="table table-bordered border-dark" >
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Grado Id</th>
                <th scope="col">Nombres</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
                <th scope="col">Año de Ingreso</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Edad</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">Ver</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>  
        </thead>
        <tbody>
        @forelse ($alumnos as $alumno)
            <tr class="table-active">
                <th scope="row">{{ $alumno->id }}</th>
                <td scope="col">{{ $alumno->grado_id }}</td>
                <td scope="col">{{ $alumno->Nombres }}</td>
                <td scope="col">{{ $alumno->PrimerApellido }}</td>
                <td scope="col">{{ $alumno->SegundoApellido }}</td>
                <td scope="col">{{ $alumno->AñoIngreso}}</td>
                <td scope="col">{{ $alumno->CorreoElectronico}}</td>
                <td scope="col">{{ $alumno->Edad}}</td>
                <td scope="col">{{ $alumno->FechaNacimiento }}</td>
                <td> <a class="btn btn-light" href="{{ route('alumno.mostrar',['id' => $alumno->id]) }}"> Ver </a></td>
                <td> <a class="btn btn-info" href="{{ route('alumno.edit',['id' => $alumno->id]) }}"> Editar </a></td>
                <td>
                    <form method="POST" action="{{route ('alumno.borrar', ['id'=>$alumno->id])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" onclick="return confirm('¿Esta seguro que desea eliminar el alumno?')" value="Eliminar" class="btn btn-outline-danger">
                    </form>
                </td>   
            </tr>
        @empty
            <tr>
                <td colspan="4"> No hay mas alumnos </td>
            </tr>    
        @endforelse

        </tbody>
    </table>
    @section('footer', 'Esta pagina pertenece a: Belsy Mairena, Estefani Herrera y Karla Sierra')
    
@endsection
