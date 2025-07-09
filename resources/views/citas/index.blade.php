@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis Citas Médicas</h1>
    <a href="{{ route('citas.create') }}" class="btn btn-primary mb-3">Reservar Cita</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Doctor</th>
                <th>Día / Hora</th>
                <th>Motivo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($citas as $cita)
                <tr>
                    <td>{{ $cita->fecha }}</td>
                    <td>{{ $cita->doctor->nombres }} {{ $cita->doctor->apellidos }}</td>
                    <td>{{ $cita->horario->dia_semana }} {{ $cita->horario->hora_inicio }} - {{ $cita->horario->hora_fin }}</td>
                    <td>{{ $cita->motivo }}</td>
                    <td>{{ ucfirst($cita->estado) }}</td>
                    <td>
                        <a href="{{ route('citas.show', $cita) }}" class="btn btn-info btn-sm">Ver</a>
                        <form action="{{ route('citas.destroy', $cita) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Cancelar esta cita?')">Cancelar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
