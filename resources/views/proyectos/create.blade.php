@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Proyecto</h1>
    <form action="{{ route('proyectos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Proyecto</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Guardar</button>
    </form>
</div>
@endsection