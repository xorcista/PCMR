@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Teleconsulta</h1>

    <p><strong>Fecha:</strong> {{ $teleconsulta->cita->fecha }}</p>
    <p><strong>Doctor:</strong> {{ $teleconsulta->cita->doctor->nombres }} {{ $teleconsulta->cita->doctor->apellidos }}</p>
    <p><strong>Link virtual:</strong> <a href="{{ $teleconsulta->link_virtual }}" target="_blank">{{ $teleconsulta->link_virtual }}</a></p>
    <p><strong>Estado:</strong> {{ ucfirst($teleconsulta->estado) }}</p>

    <a href="{{ route('teleconsultas.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
