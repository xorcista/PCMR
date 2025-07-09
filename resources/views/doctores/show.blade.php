@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Doctor: {{ $doctor->nombres }} {{ $doctor->apellidos }}</h1>
    <p><strong>DNI:</strong> {{ $doctor->dni }}</p>
    <p><strong>Teléfono:</strong> {{ $doctor->telefono }}</p>
    <p><strong>Email:</strong> {{ $doctor->email }}</p>
    <p><strong>Especialidad:</strong> {{ $doctor->especialidad->nombre }}</p>
    <p><strong>Centro de Salud:</strong> {{ $doctor->centroSalud->nombre }}</p>
    <a href="{{ route('doctores.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
