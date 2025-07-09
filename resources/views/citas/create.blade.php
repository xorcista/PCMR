@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservar Cita Médica</h1>

    <form action="{{ route('citas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" class="form-control" required>
                @foreach($doctores as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->nombres }} {{ $doctor->apellidos }} - {{ $doctor->especialidad->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="horario_id">Horario</label>
            <select name="horario_id" class="form-control" required>
                @foreach($horarios as $horario)
                    <option value="{{ $horario->id }}">
                        {{ $horario->doctor->nombres }} - {{ $horario->dia_semana }} ({{ $horario->hora_inicio }} - {{ $horario->hora_fin }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha de la cita</label>
            <input type="date" name="fecha" class="form-control" min="{{ date('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="motivo">Motivo</label>
            <input type="text" name="motivo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-2">Confirmar</button>
        <a href="{{ route('citas.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection