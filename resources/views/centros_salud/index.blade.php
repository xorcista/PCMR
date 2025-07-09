@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Centros de Salud</h1>
    <a href="{{ route('centros-salud.create') }}" class="btn btn-primary mb-3">Nuevo Centro</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Distrito</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($centros as $centro)
                <tr>
                    <td>{{ $centro->nombre }}</td>
                    <td>{{ $centro->direccion }}</td>
                    <td>{{ $centro->telefono }}</td>
                    <td>{{ $centro->distrito }}</td>
                    <td>
                        <a href="{{ route('centros-salud.show', $centro) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('centros-salud.edit', $centro) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('centros-salud.destroy', $centro) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este centro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
