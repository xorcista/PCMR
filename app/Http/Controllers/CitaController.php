<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with('doctor', 'horario')->where('user_id', Auth::id())->get();
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        $doctores = Doctor::all();
        $horarios = Horario::where('estado', 'activo')->get();
        return view('citas.create', compact('doctores', 'horarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctores_id' => 'required|exists:doctores,id',
            'horarios_id' => 'required|exists:horarios,id',
            'fecha' => 'required|date|after_or_equal:today',
            'motivo' => 'nullable|string|max:255',
        ]);

        Cita::create([
            'user_id' => Auth::id(),
            'doctores_id' => $request->doctor_id,
            'horarios_id' => $request->horario_id,
            'fecha' => $request->fecha,
            'motivo' => $request->motivo,
            'estado' => 'pendiente'
        ]);

        return redirect()->route('citas.index')->with('success', 'Cita reservada correctamente.');
    }

    public function show(Cita $cita)
    {
        //$this->authorize('view', $cita);
        return view('citas.show', compact('cita'));
    }

    public function destroy(Cita $cita)
    {
        //$this->authorize('delete', $cita);
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita cancelada.');
    }
}
