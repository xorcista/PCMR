<?php

namespace App\Http\Controllers;

use App\Models\CentroSalud;
use Illuminate\Http\Request;

class CentroSaludController extends Controller
{
    public function index()
    {
        $centros = CentroSalud::all();
        return view('centros_salud.index', compact('centros'));
    }

    public function create()
    {
        return view('centros_salud.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'distrito' => 'nullable|string|max:100',
        ]);

        CentroSalud::create($request->all());

        return redirect()->route('centros-salud.index')->with('success', 'Centro de salud creado correctamente.');
    }

    public function show(CentroSalud $centro)
    {
        return view('centros_salud.show', compact('centro'));
    }

    public function edit(CentroSalud $centro)
    {
        return view('centros_salud.edit', compact('centro'));
    }

    public function update(Request $request, CentroSalud $centro)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'distrito' => 'nullable|string|max:100',
        ]);

        $centro->update($request->all());

        return redirect()->route('centros-salud.index')->with('success', 'Centro de salud actualizado.');
    }

    public function destroy(CentroSalud $centro)
    {
        $centro->delete();
        return redirect()->route('centros-salud.index')->with('success', 'Centro de salud eliminado.');
    }
}
