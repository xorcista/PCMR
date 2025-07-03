<?php

namespace App\Http\Controllers;

use App\Models\ConsultaRemota;
use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NuevaConsultaRemota;

class TelemedicinaController extends Controller
{
    public function index()
    {
        $medicos = Medico::where('disponible_telemedicina', true)
                        ->with(['user', 'especialidad'])
                        ->get();
                        
        return view('telemedicina.index', compact('medicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'motivo' => 'required|string|max:500',
            'sintomas' => 'required|string|max:1000',
        ]);
        
        $medico = Medico::findOrFail($request->medico_id);
        
        if (!$medico->disponible_telemedicina) {
            return back()->with('error', 'Este médico no está disponible para telemedicina');
        }
        
        $consulta = ConsultaRemota::create([
            'paciente_id' => Auth::user()->paciente->id,
            'medico_id' => $medico->id,
            'motivo' => $request->motivo,
            'sintomas' => json_encode(explode(',', $request->sintomas)),
            'estado' => 'pendiente',
            'sala_id' => 'tm-' . uniqid(),
        ]);
        
        // Notificar al médico
        $medico->user->notify(new NuevaConsultaRemota($consulta));
        
        return redirect()->route('telemedicina.show', $consulta)
                        ->with('success', 'Consulta remota solicitada. El médico será notificado.');
    }

    public function show(ConsultaRemota $consulta)
    {
        if (Auth::user()->cannot('view', $consulta)) {
            abort(403);
        }
        
        $consulta->load(['medico.user', 'paciente.user']);
        
        return view('telemedicina.show', [
            'consulta' => $consulta,
            'token' => $this->generateVideoToken($consulta->sala_id, Auth::id()),
        ]);
    }
    
    protected function generateVideoToken($roomId, $userId)
    {
        // Implementar lógica para generar token de video
        return md5("{$roomId}-{$userId}-" . config('app.key'));
    }
}