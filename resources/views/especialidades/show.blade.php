@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Especialidad</h1>
    <p><strong>Nombre:</strong> {{ $especialidad->nombre }}</p>
    <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
