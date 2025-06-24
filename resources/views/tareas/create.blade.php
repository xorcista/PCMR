@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Nueva Tarea</h1>
    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf
        <input type="hidden" name="proyecto_id" value="{{ $proyecto_id }}">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">Crear</button>
    </form>
</div>
@endsection