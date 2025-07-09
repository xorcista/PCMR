@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ isset($paciente) ? route('pacientes.update', $paciente) : route('pacientes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $paciente->name ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $paciente->email ?? '') }}" required>
        </div>
        <div class="form-group">
            <label>DNI</label>
            <input type="text" name="dni" class="form-control" value="{{ old('dni', $paciente->dni ?? '') }}">
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $paciente->telefono ?? '') }}">
        </div>

        <div class="form-group">
            <label for="rol">Rol</label>
            <select name="rol" class="form-control">
                <option value="paciente">Paciente</option>
                <option value="doctor">Doctor</option>
                <option value="admin">Administrador</option>
            </select>
        </div>


        @if(!isset($paciente))
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
            <label>Confirmar contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        @endif

        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection