<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Tarea;
use App\Models\Comentario;
use App\Models\User;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $proyectos = auth()->user()->proyectos;
        return view('proyectos.index', compact('proyectos'));
    }

    public function create() {
        return view('proyectos.create');
    }

    public function store(Request $request) {
        $request->validate(['nombre' => 'required']);
        auth()->user()->proyectos()->create($request->only('nombre'));
        return redirect()->route('proyectos.index');
    }

    /*public function show(Proyecto $proyecto) {
        $this->authorize('view', $proyecto);
        return view('proyectos.show', compact('proyecto'));
    }*/

    public function show(Proyecto $proyecto) {
        return view('proyectos.show', compact('proyecto'));
    }

    public function edit(Proyecto $proyecto) {
        return view('proyectos.edit', compact('proyecto'));
    }

    public function update(Request $request, Proyecto $proyecto) {
        $proyecto->update($request->only('nombre'));
        return redirect()->route('proyectos.index');
    }

    public function destroy(Proyecto $proyecto) {
        $tareas = $proyecto->tareas;
        $puedeEliminar = $tareas->every(fn($t) => $t->estado === 'completado') || $tareas->isEmpty();
        if ($puedeEliminar) {
            $proyecto->delete();
            return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado.');
        }
        return redirect()->route('proyectos.index')->with('error', 'No se puede eliminar el proyecto.');
        //return back()->withErrors('No se puede eliminar el proyecto.');
    }
}
