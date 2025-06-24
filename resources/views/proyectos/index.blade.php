@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h1>Proyectos</h1>
    <a href="{{ route('proyectos.create') }}" class="btn btn-primary mb-3">Nuevo Proyecto</a>
    <ul>
        @foreach ($proyectos as $proyecto)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $proyecto->nombre }}</h5>
                    <a href="{{ route('proyectos.show', $proyecto) }}" class="btn btn-primary btn-sm">Ver</a>
                    <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('¿Estás seguro de eliminar este proyecto?');">
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