@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Editar Proyecto</h1>
    <form action="{{ route('proyectos.update', $proyecto) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="nombre" value="{{ $proyecto->nombre }}" class="form-control">
        <button class="btn btn-success mt-2">Actualizar</button>
    </form>
</div>
@endsection