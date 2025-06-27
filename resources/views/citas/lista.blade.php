@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4"><i class="bi bi-person-circle" style="font-size: 3rem;"></i></div>
                            <div class="col-md-4">
                                <h2>[Nombre Especialista]</h2>
                                <h5>[Especialidad]</h5>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-success" role="button">Agendar Cita</a>
                            </div>
                        </div>
                        

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
