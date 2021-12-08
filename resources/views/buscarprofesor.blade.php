@extends('Plantillas.plantilla')

@section('titulo', 'Lista De Profesores')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <form action="{{route('profesor.index2')}}" method="GET">
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

    <h1> Listado De Profesores 
        <a class="btn btn-info float-end" href="{{route('profesor.crear')}}" > Agregar Un Nuevo Profesor </a> 
        <a class="btn btn-info float-end" href="{{route('alumno.index')}}" > Ir A Alumnos </a> 
        <a class="btn btn-info float-end" href="{{route('grado.index')}}" > Ir A Grados </a> 
    </h1>
    {{ $profesores->links()}}
    
    <table class="table table-bordered border-dark" >
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombres</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Sueldo</th>
                <th scope="col">Ver</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>  
        </thead>
        <tbody>
        @forelse ($profesores as $profesor)
            <tr class="table-active">
                <th scope="row">{{ $profesor->id }}</th>
                <td scope="col">{{ $profesor->Nombres }}</td>
                <td scope="col">{{ $profesor->PrimerApellido }}</td>
                <td scope="col">{{ $profesor->SegundoApellido }}</td>
                <td scope="col">{{ $profesor->Telefono}}</td>
                <td scope="col">{{ $profesor->CorreoElectronico}}</td>
                <td scope="col">{{ $profesor->Sueldo}}</td>
                <td> <a class="btn btn-light" href="{{ route('profesor.mostrar',['id' => $profesor->id]) }}"> Ver </a></td>
                <td> <a class="btn btn-info" href="{{ route('profesor.edit',['id' => $profesor->id]) }}"> Editar </a></td>
                <td>
                    <form method="POST" action="{{route ('profesor.borrar', ['id'=>$profesor->id])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" onclick="return confirm('¿Esta seguro que desea eliminar el profesor?')" value="Eliminar" class="btn btn-outline-danger">
                    </form>
                </td>   
            </tr>
        @empty
            <tr>
                <td colspan="4"> No hay mas profesores </td>
            </tr>    
        @endforelse

        </tbody>
    </table>
    @section('footer', 'Esta pagina pertenece a: Belsy Mairena, Estefani Herrera y Karla Sierra')
@endsection