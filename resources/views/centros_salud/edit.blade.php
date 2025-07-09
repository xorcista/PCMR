@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Centro de Salud</h1>
    <form action="{{ route('centros-salud.update', $centro) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $centro->nombre }}" required>
        </div>
        <div class="form-group">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ $centro->direccion }}" required>
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $centro->telefono }}">
        </div>
        <div class="form-group">
            <label>Distrito</label>
            <input type="text" name="distrito" class="form-control" value="{{ $centro->distrito }}">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
        <a href="{{ route('centros-salud.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection
