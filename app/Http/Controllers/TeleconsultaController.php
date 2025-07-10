<?php

namespace App\Http\Controllers;

use App\Models\Teleconsulta;
use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TeleconsultaController extends Controller
{
    public function index()
    {
        $citas = Cita::where('user_id', Auth::id())->get();
        $teleconsultas = Teleconsulta::with('cita.doctor')->whereIn('cita_id', $citas->pluck('id'))->get();

        return view('teleconsultas.index', compact('teleconsultas'));
    }

    public function create(Cita $cita)
    {
        if ($cita->user_id !== Auth::id()) {
            abort(403);
        }

        //$link = url('/teleconsulta/' . Str::uuid());

        $user = Auth::user();
        $randomCode = substr(md5(uniqid(rand(), true)), 0, 6);
        $roomName = Str::slug($user->name) . '-' . $randomCode;
        $link = 'https://meet.jit.si/' . $roomName;

        $teleconsulta = Teleconsulta::create([
            'cita_id' => $cita->id,
            'link_virtual' => $link,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('teleconsultas.index')->with('success', 'Teleconsulta creada.');
    }

    public function show(Teleconsulta $teleconsulta)
    {
        if ($teleconsulta->cita->user_id !== Auth::id()) {
            abort(403);
        }

        return view('teleconsultas.show', compact('teleconsulta'));
    }

    public function cambiarEstado(Request $request, Teleconsulta $teleconsulta)
    {
        $teleconsulta->estado = $request->estado;
        $teleconsulta->save();

        return back()->with('success', 'Estado actualizado.');
    }
}
