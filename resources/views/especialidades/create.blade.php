@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Especialidad</h1>
    <form action="{{ route('especialidades.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de la especialidad</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
        <a href="{{ route('especialidades.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection
