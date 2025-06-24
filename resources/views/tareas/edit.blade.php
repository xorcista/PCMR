@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Editar Tarea</h1>
    <form action="{{ route('tareas.update', $tarea) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" value="{{ $tarea->titulo }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ $tarea->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control">
                <option value="pendiente" @selected($tarea->estado === 'pendiente')>Pendiente</option>
                <option value="en_progreso" @selected($tarea->estado === 'en_progreso')>En progreso</option>
                <option value="completado" @selected($tarea->estado === 'completado')>Completado</option>
            </select>
        </div>
        <button class="btn btn-success mt-2">Actualizar</button>
    </form>
</div>
@endsection