@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Doctores</h1>
    <a href="{{ route('doctores.create') }}" class="btn btn-primary mb-3">Nuevo Doctor</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nombre completo</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>Especialidad</th>
                <th>Centro de Salud</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctores as $doctor)
                <tr>
                    <td>{{ $doctor->nombres }} {{ $doctor->apellidos }}</td>
                    <td>{{ $doctor->dni }}</td>
                    <td>{{ $doctor->telefono }}</td>
                    <td>{{ $doctor->especialidad->nombre }}</td>
                    <td>{{ $doctor->centroSalud->nombre }}</td>
                    <td>
                        <a href="{{ route('doctores.show', $doctor) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('doctores.edit', $doctor) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('doctores.destroy', $doctor) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este doctor?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
