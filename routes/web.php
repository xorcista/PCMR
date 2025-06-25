<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\ComentarioController;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth'])->group(function () {
    

    Route::resource('proyectos', ProyectoController::class);
    Route::resource('tareas', TareaController::class);
    Route::resource('comentarios', ComentarioController::class);

    Route::get('/proyecto/{proyecto}', [ProyectoController::class, 'show'])->name('proyectos.show');

});