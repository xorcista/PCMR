@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Especialidades</h1>
    <a href="{{ route('especialidades.create') }}" class="btn btn-primary mb-3">Nueva Especialidad</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($especialidades as $especialidad)
                <tr>
                    <td>{{ $especialidad->nombre }}</td>
                    <td>
                        <a href="{{ route('especialidades.show', $especialidad) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('especialidades.edit', $especialidad) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('especialidades.destroy', $especialidad) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta especialidad?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
