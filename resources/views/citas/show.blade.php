@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Cita</h1>
    <p><strong>Fecha:</strong> {{ $cita->fecha }}</p>
    <p><strong>Doctor:</strong> {{ $cita->doctor->nombres }} {{ $cita->doctor->apellidos }}</p>
    <p><strong>Día/Hora:</strong> {{ $cita->horario->dia_semana }} {{ $cita->horario->hora_inicio }} - {{ $cita->horario->hora_fin }}</p>
    <p><strong>Motivo:</strong> {{ $cita->motivo }}</p>
    <p><strong>Estado:</strong> {{ ucfirst($cita->estado) }}</p>
    <a href="{{ route('citas.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
