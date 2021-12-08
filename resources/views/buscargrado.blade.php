@extends('Plantillas.plantilla')

@section('titulo', 'Lista De Grados')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <form action="{{route('grado.index2')}}" method="GET">
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

    <h1> Listado De Grados 
        <a class="btn btn-info float-end" href="{{route('grado.crear')}}"> Agregar Nuevo Grado</a>
        <a class="btn btn-info float-end" href="{{route('gradoprofesor.crear')}}"> Asignar Profesor</a> 
        <a class="btn btn-info float-end" href="{{route('profesor.index')}}"> Ir A Profesores</a> 
        <a class="btn btn-info float-end" href="{{route('alumno.index')}}" > Ir A Alumnos </a> 
    </h1>
    {{ $grados->links()}}
    
    <table class="table table-bordered border-dark" >
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nivel Grado</th>
                <th scope="col">Seccion</th>
                <th scope="col">Ver</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>  
        </thead>
        <tbody>
        @forelse ($grados as $grado)
            <tr class="table-active">
                <th scope="row">{{ $grado->id }}</th>
                <td scope="col">{{ $grado->NivelGrado }}</td>
                <td scope="col">{{ $grado->Seccion }}</td>
                <td> <a class="btn btn-light" href="{{ route('grado.mostrar',['id' => $grado->id]) }}"> Ver </a></td>
                <td> <a class="btn btn-info" href="{{ route('grado.edit',['id' => $grado->id]) }}"> Editar </a></td>
                <td>
                    <form method="POST" action="{{route ('grado.borrar', ['id'=>$grado->id])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" onclick="return confirm('¿Esta seguro que desea eliminar el grado?')" value="Eliminar" class="btn btn-outline-danger">
                    </form>
                </td>   
            </tr>
        @empty
            <tr>
                <td colspan="4"> No hay mas grados </td>
            </tr>    
        @endforelse

        </tbody>
    </table>
    @section('footer', 'Esta pagina pertenece a: Belsy Mairena, Estefani Herrera y Karla Sierra')
    
@endsection