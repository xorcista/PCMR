@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Teleconsultas</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Doctor</th>
                <th>Link</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teleconsultas as $t)
                <tr>
                    <td>{{ $t->cita->fecha }}</td>
                    <td>{{ $t->cita->doctor->nombres }} {{ $t->cita->doctor->apellidos }}</td>
                    <td><a href="{{ $t->link_virtual }}" target="_blank">Ir a la sala</a></td>
                    <td>{{ ucfirst(str_replace('_', ' ', $t->estado)) }}</td>
                    <td>
                        <a href="{{ route('teleconsultas.show', $t) }}" class="btn btn-info btn-sm">Ver</a>
                        <form action="{{ route('teleconsultas.estado', $t) }}" method="POST" style="display:inline;">
                            @csrf
                            <select name="estado" onchange="this.form.submit()" class="form-select form-select-sm">
                                <option value="pendiente" {{ $t->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="en_curso" {{ $t->estado == 'en_curso' ? 'selected' : '' }}>En curso</option>
                                <option value="finalizada" {{ $t->estado == 'finalizada' ? 'selected' : '' }}>Finalizada</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
