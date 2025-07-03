<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Especialidad;
use App\Models\CentroSalud;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index(Request $request)
    {
        $query = Medico::with(['user', 'especialidad', 'centroSalud']);
        
        if ($request->has('especialidad')) {
            $query->where('especialidad_id', $request->especialidad);
        }
        
        if ($request->has('centro')) {
            $query->where('centro_salud_id', $request->centro);
        }
        
        if ($request->has('telemedicina')) {
            $query->where('disponible_telemedicina', true);
        }
        
        $medicos = $query->paginate(10);
        $especialidades = Especialidad::all();
        $centros = CentroSalud::all();
        
        return view('medicos.index', compact('medicos', 'especialidades', 'centros'));
    }

    public function show(Medico $medico)
    {
        $medico->load(['user', 'especialidad', 'centroSalud', 'disponibilidades']);
        $horarios = $this->generarHorariosDisponibles($medico);
        
        return view('medicos.show', compact('medico', 'horarios'));
    }

    protected function generarHorariosDisponibles($medico)
    {
        // Lógica para generar horarios disponibles basados en las disponibilidades
        return [];
    }
}