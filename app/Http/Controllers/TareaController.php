<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Tarea;
use App\Models\Comentario;
use App\Models\User;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create() {
        $proyecto_id = request('proyecto_id');
        return view('tareas.create', compact('proyecto_id'));
    }

    public function store(Request $request) {
        $request->validate(['titulo' => 'required']);
        Tarea::create($request->only('titulo', 'descripcion', 'proyecto_id'));
        return redirect()->route('proyectos.show', $request->proyecto_id);
    }

    public function show(Tarea $tarea) {
        return view('tareas.show', compact('tarea'));
    }

    public function edit(Tarea $tarea) {
        return view('tareas.edit', compact('tarea'));
    }

    public function update(Request $request, Tarea $tarea) {
        if ($tarea->estado === 'completado' && $request->estado !== 'completado') {
            return back()->withErrors('No se puede modificar una tarea completada.');
        }
        $tarea->update($request->only(['titulo', 'descripcion', 'estado']));
        return redirect()->route('tareas.show', $tarea);
    }

    public function destroy(Tarea $tarea) {
        $tarea->delete();
        return back();
    }
}
