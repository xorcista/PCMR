@extends('layouts.app')
@section('content')
<div class="container">
    <h2>{{ $tarea->titulo }}</h2>
    <p>{{ $tarea->descripcion }}</p>
    <p><strong>Estado:</strong> {{ $tarea->estado }}</p>
    <h4>Comentarios</h4>
    <ul>
        @foreach($tarea->comentarios as $comentario)
            <li>{{ $comentario->contenido }} - <em>{{ $comentario->usuario->name }}</em></li>
        @endforeach
    </ul>
    <form action="{{ route('comentarios.store') }}" method="POST">
        @csrf
        <input type="hidden" name="tarea_id" value="{{ $tarea->id }}">
        <div class="form-group">
            <label for="contenido">Nuevo Comentario</label>
            <textarea name="contenido" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Comentar</button>
    </form>
</div>
@endsection