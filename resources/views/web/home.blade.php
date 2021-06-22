@extends('web.partials.master')

@section('title')
    Telepráctica
@endsection

@section('estilos')
@endsection

@section('content')
        
    <section>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/carousel-1.jpg" alt="Primer slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h4>Somos Telepráctica ¡un mundo de oportunidades!</h4>
                        <p>Únete a nosotros y accede a un mundo de oportunidades profesionales</p>
                    </div>
                </div>

                <div class="carousel-item active">
                    <img class="d-block w-100" src="/img/carousel-2.jpg" alt="Segundo slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h4>Somos Telepráctica ¡un mundo de oportunidades!</h4>
                        <p>Únete a nosotros y accede a un mundo de oportunidades profesionales</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="/img/carousel-3.jpg" alt="Tercer slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h4>Somos Telepráctica ¡un mundo de oportunidades!</h4>
                        <p>Únete a nosotros y accede a un mundo de oportunidades profesionales</p>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previo</span>
            </a>

            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </section>

   <section>
    <div class="card-deck m-3">
        <div class="card border-secondary">
          <img class="card-img-top" src="img/card-group-empresas.jpg" alt="Empresas">
          <button class="btn btn-lg btn-outline-dark mb-3" style="position: absolute; top: 5px; left: 5px">Empresas destacadas</button>
        </div>
        
        <div class="card border-secondary">
            <img class="card-img-top" src="img/card-group-ofertas.jpg" alt="Ofertas">
            <button class="btn btn-lg btn-outline-dark mb-3" style="position: absolute; top: 5px; left: 5px">Ofertas</button>
          </div>
          
        <div class="card border-secondary">
            <img class="card-img-top" src="img/card-group-instituciones.jpg" alt="Instituciones">
            <button class="btn btn-lg btn-light border-secondary mb-3" style="position: absolute; top: 5px; left: 5px">Instituciones asociadas</button>
          </div>
      </div>
   </section>

    <section>
        <div class="card text-center">
        <div class="card-header display-3">
            Contáctanos
        </div>
        <div class="card-body">
          <p class="card-text">Estamos ubicados en 1 Nte. 1089 B, Viña del Mar, Región de Valparaíso.</p>
          <p class="card-text">Si quieres conocer más acerca de nosotros no dudes en comunicarte mediante alguno de los siguientes canales:</p>
        </div>
        <div class="card-footer text-muted">
            <p><i class="fas fa-phone-square-alt mr-1"></i>(32) 332 5244</p>
            <p><i class="fas fa-envelope mr-1"></i>contacto@creatiox.com</p>
        </div>
      </div>
    </section>

    <section>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13381.07873419244!2d-71.5464264!3d-33.0230248!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc72c344c8071c897!2sCreatiox!5e0!3m2!1ses!2scl!4v1618341698779!5m2!1ses!2scl" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
        </div>
    </section>

@endsection

@section('scripts')
@endsection
