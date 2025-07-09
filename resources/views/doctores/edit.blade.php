@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($doctor) ? 'Editar' : 'Nuevo' }} Doctor</h1>
    <form action="{{ isset($doctor) ? route('doctores.update', $doctor) : route('doctores.store') }}" method="POST">
        @csrf
        @if(isset($doctor)) @method('PUT') @endif

        <div class="form-group">
            <label>Nombres</label>
            <input type="text" name="nombres" class="form-control" value="{{ $doctor->nombres ?? old('nombres') }}" required>
        </div>
        <div class="form-group">
            <label>Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="{{ $doctor->apellidos ?? old('apellidos') }}" required>
        </div>
        <div class="form-group">
            <label>DNI</label>
            <input type="text" name="dni" class="form-control" value="{{ $doctor->dni ?? old('dni') }}" required>
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $doctor->telefono ?? old('telefono') }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $doctor->email ?? old('email') }}">
        </div>
        <div class="form-group">
            <label>Especialidad</label>
            <select name="especialidad_id" class="form-control" required>
                @foreach($especialidades as $esp)
                    <option value="{{ $esp->id }}" {{ (isset($doctor) && $doctor->especialidad_id == $esp->id) ? 'selected' : '' }}>
                        {{ $esp->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Centro de Salud</label>
            <select name="centro_salud_id" class="form-control" required>
                @foreach($centros as $centro)
                    <option value="{{ $centro->id }}" {{ (isset($doctor) && $doctor->centro_salud_id == $centro->id) ? 'selected' : '' }}>
                        {{ $centro->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
        <a href="{{ route('doctores.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection
