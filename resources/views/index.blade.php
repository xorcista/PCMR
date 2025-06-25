@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!--div class="card-header">{{ __('Dashboard') }}</div-->

                <div class="card-body">
                    <h1>Plataforma de Citas Médicas para Zonas Rurales</h1>

                    <div>Plataforma de inclusión social enfocado a la medicina, permite buscar especialistas y reservar citas médicas.</div>

                    <div>Para solicitar una cita es necesario registrarse haciendo click en el siguiente botón:</div>

                    <div class="col-md-12 text-center mt-5"><a class="btn btn-primary btn-lg" role="button" href="/register">REGISTRO</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
