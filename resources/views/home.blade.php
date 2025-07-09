@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('') }}



                    {{-- <div class="col-md-12">
                        <form method="get" action="/lista">
                            <div class="input-group mb-3">
                                <select class="form-select" name="especialidad" placeholder="Especialidad" aria-label="Username" required>
                                    <option value="">Selecciona una especialidad</option>
                                    <option value="1">Medicina General</option>
                                    <option value="2">Pediatria</option>
                                    <option value="3">Traumatología (huesos)</option>
                                    <option value="4">Obstetricia</option>
                                    <option value="5">Ginecología</option>
                                    <option value="6">Psicología</option>                                    
                                </select>
                                <span class="input-group-text">-</span>
                                <select class="form-select" name="distrito" placeholder="Distrito" aria-label="Username" required>
                                    <option value="">Selecciona un distrito</option>
                                    <option value="1">Amarilis</option>
                                    <option value="2">Chinchao</option>
                                    <option value="3">Churubamba</option>
                                    <option value="4">Huánuco</option>
                                    <option value="5">Margos</option>
                                    <option value="6">Pillco Marca</option>
                                    <option value="7">Quisqui</option>
                                    <option value="8">San Francisco de Cayrán</option>
                                    <option value="9">San Pedro de Chaulán</option>
                                    <option value="10">Santa María del Valle</option>
                                    <option value="11">Yarumayo</option>                                  
                                </select>
                            </div>
                            <div class="input-group mt-5 justify-content-md-center">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-primary text-center" type="submit">Buscar Cita</button> 
                                    <a href="/citas/lista" role="button" class="btn btn-primary text-center">Buscar Cita</a>                                
                                </div>
                            </div>
                        </form>
                    </div>
 --}}
                    <div class="col-md-12">
                        <div class="button-group">
                            <!-- Botón solo para administradores -->
                            @if(auth()->user()->rol === 'admin')
                                <a href="{{ route('pacientes.index') }}" class="btn btn-primary">Usuarios</a>
                                <a href="{{ route('doctores.index') }}" class="btn btn-primary">Doctores</a>
                                <a href="{{ route('especialidades.index') }}" class="btn btn-primary">Especialidades</a>
                                <a href="{{ route('horarios.index') }}" class="btn btn-primary">Horarios</a>
                                <a href="{{ route('citas.index') }}" class="btn btn-primary">Citas</a>
                                <a href="{{ route('teleconsultas.index') }}" class="btn btn-primary">Teleconsultas</a>
                            @endif

                            <!-- Botón solo para pacientes -->
                            @if(auth()->user()->rol === 'paciente')
                                <a href="{{ route('citas.index') }}" class="btn btn-primary">Citas</a>
                                <a href="{{ route('teleconsultas.index') }}" class="btn btn-primary">Teleconsultas</a>
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
