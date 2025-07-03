<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Medico;
use App\Models\Especialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CitaAgendada;
use App\Notifications\CitaCancelada;

class CitaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->tipo === 'paciente') {
            $citas = Cita::where('paciente_id', $user->paciente->id)
                        ->with(['medico.user', 'medico.especialidad'])
                        ->orderBy('fecha_hora', 'desc')
                        ->get();
        } elseif ($user->tipo === 'medico') {
            $citas = Cita::where('medico_id', $user->medico->id)
                        ->with(['paciente.user'])
                        ->orderBy('fecha_hora', 'desc')
                        ->get();
        } else {
            $citas = collect();
        }
        
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        $medicos = Medico::with(['user', 'especialidad', 'centroSalud'])->get();
        
        return view('citas.create', compact('especialidades', 'medicos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'fecha_hora' => 'required|date|after:now',
            'motivo' => 'required|string|max:500',
        ]);
        
        // Verificar disponibilidad
        $medico = Medico::find($validated['medico_id']);
        if (!$this->medicoDisponible($medico, $validated['fecha_hora'])) {
            return back()->with('error', 'El médico no está disponible en ese horario');
        }
        
        $cita = Cita::create([
            'paciente_id' => Auth::user()->paciente->id,
            'medico_id' => $validated['medico_id'],
            'fecha_hora' => $validated['fecha_hora'],
            'motivo' => $validated['motivo'],
            'estado' => 'pendiente',
        ]);
        
        // Notificaciones
        $cita->medico->user->notify(new CitaAgendada($cita));
        $cita->paciente->user->notify(new CitaAgendada($cita));
        
        return redirect()->route('citas.index')->with('success', 'Cita agendada correctamente');
    }

    public function cancelar(Request $request, Cita $cita)
    {
        $request->validate([
            'razon' => 'required|string|max:500',
        ]);
        
        $cita->update([
            'estado' => 'cancelada',
            'cancelacion_razon' => $request->razon,
        ]);
        
        // Notificaciones
        $cita->medico->user->notify(new CitaCancelada($cita));
        $cita->paciente->user->notify(new CitaCancelada($cita));
        
        return back()->with('success', 'Cita cancelada correctamente');
    }

    protected function medicoDisponible($medico, $fechaHora)
    {
        // Lógica para verificar disponibilidad del médico
        // Considerar horarios laborales, citas existentes, etc.
        return true;
    }
}