<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Doctor;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::with('doctor')->get();
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        $doctores = Doctor::all();
        return view('horarios.create', compact('doctores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctores,id',
            'dia_semana' => 'required|string',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'estado' => 'required|in:activo,inactivo',
        ]);

        Horario::create($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario registrado correctamente.');
    }

    public function show(Horario $horario)
    {
        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario)
    {
        $doctores = Doctor::all();
        return view('horarios.edit', compact('horario', 'doctores'));
    }

    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctores,id',
            'dia_semana' => 'required|string',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $horario->update($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado.');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado.');
    }
}
