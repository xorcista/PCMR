@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Centro de Salud</h1>
    <p><strong>Nombre:</strong> {{ $centro->nombre }}</p>
    <p><strong>Dirección:</strong> {{ $centro->direccion }}</p>
    <p><strong>Teléfono:</strong> {{ $centro->telefono }}</p>
    <p><strong>Distrito:</strong> {{ $centro->distrito }}</p>
    <a href="{{ route('centros-salud.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
