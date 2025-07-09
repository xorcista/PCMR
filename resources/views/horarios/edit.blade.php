@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($horario) ? 'Editar' : 'Nuevo' }} Horario</h1>
    <form action="{{ isset($horario) ? route('horarios.update', $horario) : route('horarios.store') }}" method="POST">
        @csrf
        @if(isset($horario)) @method('PUT') @endif

        <div class="form-group">
            <label>Doctor</label>
            <select name="doctor_id" class="form-control" required>
                @foreach($doctores as $doctor)
                    <option value="{{ $doctor->id }}" {{ isset($horario) && $horario->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->nombres }} {{ $doctor->apellidos }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Día de la semana</label>
            <select name="dia_semana" class="form-control" required>
                @foreach(['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'] as $dia)
                    <option value="{{ $dia }}" {{ (isset($horario) && $horario->dia_semana == $dia) ? 'selected' : '' }}>{{ $dia }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Hora de inicio</label>
            <input type="time" name="hora_inicio" class="form-control" value="{{ $horario->hora_inicio ?? old('hora_inicio') }}" required>
        </div>

        <div class="form-group">
            <label>Hora de fin</label>
            <input type="time" name="hora_fin" class="form-control" value="{{ $horario->hora_fin ?? old('hora_fin') }}" required>
        </div>

        <div class="form-group">
            <label>Estado</label>
            <select name="estado" class="form-control" required>
                <option value="activo" {{ (isset($horario) && $horario->estado == 'activo') ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ (isset($horario) && $horario->estado == 'inactivo') ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection
