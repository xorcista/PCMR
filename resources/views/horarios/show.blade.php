@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Horario</h1>
    <p><strong>Doctor:</strong> {{ $horario->doctor->nombres }} {{ $horario->doctor->apellidos }}</p>
    <p><strong>Día:</strong> {{ $horario->dia_semana }}</p>
    <p><strong>Hora inicio:</strong> {{ $horario->hora_inicio }}</p>
    <p><strong>Hora fin:</strong> {{ $horario->hora_fin }}</p>
    <p><strong>Estado:</strong> {{ ucfirst($horario->estado) }}</p>
    <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
