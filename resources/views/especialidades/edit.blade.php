@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Especialidad</h1>
    <form action="{{ route('especialidades.update', $especialidad) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ $especialidad->nombre }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
        <a href="{{ route('especialidades.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection
