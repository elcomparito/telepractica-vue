@extends('web.partials.master')

@section('title')
    Soy institución - Telepráctica
@endsection

@section('estilos')
@endsection

@section('content')

    <section>
        <img src="/img/soy-institucion.jpg" class="img-fluid" alt="Imagen" style="width: 100%">
    </section>

    <section>
        <div class="card text-center">
            <div class="card-header display-4">
                ¿Eres institución?
            </div>
            <div class="card-body">
                <p class="card-text">¡Contáctanos! y te brindaremos la oportunidad de acceder a los beneficios que ofrece Telepráctica.</p>
                <p class="card-text">Nuestros canales de contacto son:</p>
            </div>
            <div class="card-footer text-muted">
                <p><i class="fas fa-phone-square-alt mr-1"></i>(32) 332 5244<i class="fas fa-envelope ml-5 mr-1"></i>contacto@creatiox.com</p>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
@endsection
