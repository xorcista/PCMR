<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Especialidad;
use App\Models\CentroSalud;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctores = Doctor::with('especialidad', 'centroSalud')->get();
        return view('doctores.index', compact('doctores'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        $centros = CentroSalud::all();
        return view('doctores.create', compact('especialidades', 'centros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'dni' => 'required|digits:8|unique:doctores,dni',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'especialidad_id' => 'required|exists:especialidades,id',
            'centro_salud_id' => 'required|exists:centros_salud,id',
        ]);

        Doctor::create($request->all());

        return redirect()->route('doctores.index')->with('success', 'Doctor registrado correctamente.');
    }

    public function show(Doctor $doctor)
    {
        return view('doctores.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        $especialidades = Especialidad::all();
        $centros = CentroSalud::all();
        return view('doctores.edit', compact('doctor', 'especialidades', 'centros'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'dni' => 'required|digits:8|unique:doctores,dni,' . $doctor->id,
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'especialidad_id' => 'required|exists:especialidades,id',
            'centro_salud_id' => 'required|exists:centros_salud,id',
        ]);

        $doctor->update($request->all());

        return redirect()->route('doctores.index')->with('success', 'Doctor actualizado.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctores.index')->with('success', 'Doctor eliminado.');
    }
}
