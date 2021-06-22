@extends('web.partials.master')

@section('title')
    Soy institución - Telepráctica
@endsection

@section('estilos')
@endsection

@section('content')

    <section>
        <img src="/img/quienes-somos.jpg" class="img-fluid" alt="Imagen" style="width: 100%">
    </section>

    <section>
        <div class="card text-center">
            <div class="card-header display-4">
                ¿Quiénes somos?
            </div>
            <div class="card-body">
                <p class="card-text">¡Somos Telepráctica, de ©Creatiox!</p>
                <p class="card-text">Una plataforma orientada a estudiantes que buscan realizar su práctica profesional de manera online.</p>
            </div>
            <div class="card-footer text-muted">
                <p><i class="fas fa-phone-square-alt mr-1"></i>(32) 332 5244<i class="fas fa-envelope ml-5 mr-1"></i>contacto@creatiox.com</p>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
@endsection
