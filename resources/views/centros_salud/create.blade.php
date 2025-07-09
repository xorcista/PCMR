@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Centro de Salud</h1>
    <form action="{{ route('centros-salud.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control">
        </div>
        <div class="form-group">
            <label>Distrito</label>
            <input type="text" name="distrito" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
        <a href="{{ route('centros-salud.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection