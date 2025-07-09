@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Horarios Disponibles</h1>
    <a href="{{ route('horarios.create') }}" class="btn btn-primary mb-3">Nuevo Horario</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Doctor</th>
                <th>Día</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
                <tr>
                    <td>{{ $horario->doctor->nombres }} {{ $horario->doctor->apellidos }}</td>
                    <td>{{ $horario->dia_semana }}</td>
                    <td>{{ $horario->hora_inicio }}</td>
                    <td>{{ $horario->hora_fin }}</td>
                    <td>{{ ucfirst($horario->estado) }}</td>
                    <td>
                        <a href="{{ route('horarios.show', $horario) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('horarios.edit', $horario) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('horarios.destroy', $horario) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este horario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
