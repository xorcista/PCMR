@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Paciente: {{ $paciente->name }}</h1>
    <p><strong>Email:</strong> {{ $paciente->email }}</p>
    <p><strong>DNI:</strong> {{ $paciente->dni }}</p>
    <p><strong>Teléfono:</strong> {{ $paciente->telefono }}</p>
    <p><strong>Rol:</strong> {{ $paciente->rol }}</p>
    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
