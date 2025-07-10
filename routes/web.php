<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

/*use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\ComentarioController;*/


use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\CentroSaludController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\TeleconsultaController;
use App\Http\Controllers\PacienteController;




Route::get('/', function () {
    return view('index');
});

Auth::routes();


/*
Route::resource('especialidades', EspecialidadController::class)->middleware('auth');
Route::resource('centros-salud', CentroSaludController::class)->middleware('auth');
Route::resource('doctores', DoctorController::class)->middleware('auth');
Route::resource('horarios', HorarioController::class)->middleware('auth');
Route::resource('citas', CitaController::class)->middleware('auth');
Route::resource('pacientes', PacienteController::class)->middleware('auth');
*/

Route::resource('pacientes', PacienteController::class)->middleware(['auth', 'rol:admin']);
Route::resource('doctores', DoctorController::class)->middleware(['auth', 'rol:admin']);
Route::resource('especialidades', EspecialidadController::class)->middleware(['auth', 'rol:admin']);

Route::resource('horarios', HorarioController::class)->middleware(['auth', 'rol:doctor,admin']);

Route::resource('citas', CitaController::class)->middleware(['auth', 'rol:paciente,admin']);
Route::resource('teleconsultas', TeleconsultaController::class)->middleware(['auth', 'rol:paciente,doctor,admin']);






Route::middleware(['auth', 'rol:paciente,doctor,admin'])->group(function () {
    Route::get('teleconsultas', [TeleconsultaController::class, 'index'])->name('teleconsultas.index');
    Route::get('teleconsultas/crear/{cita}', [TeleconsultaController::class, 'create'])->name('teleconsultas.create');
    Route::get('teleconsultas/{teleconsulta}', [TeleconsultaController::class, 'show'])->name('teleconsultas.show');
    Route::post('teleconsultas/{teleconsulta}/estado', [TeleconsultaController::class, 'cambiarEstado'])->name('teleconsultas.estado');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/lista')->name('citas.lista');

/*Route::get('/lista', function () {
    return view('citas.lista');
});*/

//Route::view('/citas/lista', 'citas.lista')->middleware('auth');

/*
Route::middleware(['auth'])->group(function () {

Route::get('/citas/lista', function () {
    return view('citas.lista');
});
    

    Route::resource('proyectos', ProyectoController::class);
    Route::resource('tareas', TareaController::class);
    Route::resource('comentarios', ComentarioController::class);

    Route::get('/proyecto/{proyecto}', [ProyectoController::class, 'show'])->name('proyectos.show');

});*/