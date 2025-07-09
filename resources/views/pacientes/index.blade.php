@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Usuarios</h1>
    <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th><th>Email</th><th>DNI</th><th>Teléfono</th><th>Rol</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->name }}</td>
                    <td>{{ $paciente->email }}</td>
                    <td>{{ $paciente->dni }}</td>
                    <td>{{ $paciente->telefono }}</td>
                    <td>{{ $paciente->rol }}</td>
                    <td>
                        <a href="{{ route('pacientes.show', $paciente) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este paciente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
