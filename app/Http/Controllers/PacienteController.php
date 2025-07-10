<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = User::all(); // si agregas roles, filtra por 'paciente'
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'telefono' => 'nullable|string|max:20',
            'dni'      => 'nullable|digits:8|unique:users,dni',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'dni'      => $request->dni,
            'rol'      => $request->rol,

        ]);

        return redirect()->route('pacientes.index')->with('success', 'Paciente registrado.');
    }

    public function show(User $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(User $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, User $paciente)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $paciente->id,
            'telefono' => 'nullable|string|max:20',
            'dni'      => 'nullable|digits:8|unique:users,dni,' . $paciente->id,
            'rol'      => 'nullable',
        ]);

        //$paciente->update($request->all());
        $paciente->update($request->only(['name', 'email', 'telefono', 'dni', 'rol']));

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado.');
    }

    public function destroy(User $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado.');
    }
}
