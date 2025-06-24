@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $proyecto->nombre }}</h1>
    <a href="{{ route('tareas.create', ['proyecto_id' => $proyecto->id]) }}" class="btn btn-primary mb-3">Agregar Tarea</a>
    <ul>
        @foreach ($proyecto->tareas as $tarea)
            <div class="card mb-3">
                <div class="card-body">
                    <h6 class="card-title">{{ $tarea->titulo }} - <span class="badge bg-{{ $tarea->estado == 'completada' ? 'success' : 'secondary' }}">{{ ucfirst($tarea->estado) }}</span></h6>
                    <p>{{ $tarea->descripcion }}</p>

                    <a href="{{ route('tareas.show', $tarea) }}" class="btn btn-primary btn-sm">Ver</a>
                    <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('¿Estás seguro de eliminar esta tarea?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
        @endforeach

    </ul>
</div>
@endsection
