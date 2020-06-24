@extends('store.layouts.main')

@section('title', 'Venta de Calzado por Mayoreo - Pargi')

@section('styles')
@endsection

@section('content')
<!--Inicio de la página-->
        <!--- Imagen de Portada--->
      <div class="ps-home-testimonial bg--parallax pb-280" data-background="{{ asset('images/background/parallax-info.jpg') }}"></div>
        <!--- Fin de Imagen de Portada--->

<!--- Inicio del Texto-->
      <div class="ps-section ps-home-blog pt-40 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <h2 class="ps-section__title" data-mask="Historia">- Crezcamos Juntos</h2>
           
          </div>
          <div class="ps-section__content">
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      
                      <div class="ps-post__content"><a class="ps-post__title_2"><i class="fa fa-rocket"> - </i> Pargi está contigo para ayudar a crecer tu negocio.</a>
                        <br>
                        <p>Somos una empresa de venta de calzado al mayoreo 100% mexicana y familiar, fundada en la Ciudad de México, con más de 40 años de experiencia, ofreciendo la más alta calidad de productos y sobre todo una amplia variedad de modelos y marcas en calzado para toda la familia.<br><br> En la actualidad nos hemos extendido nuestras bodegas hacia Monterrey y Villahermosa, para poder brindarle un mejor servicio y así poder estar más cerca de usted.<br><br> Desde nuestra fundación nuestro objetivo principal es ofrecerle los mejores productos, garantizados, por lo cual nos esforzamos día a día en tener el equipo mas capacitado para así poder ayudarle de la manera más eficaz y satisfactoria. Es por ellos que nuestro personal está disponible para brindarle los mejores consejos y respuestas a sus preguntas para iniciar o hacer crecer su negocio, ya que manejamos los precios mas competitivos del mercado, dándonos una ampla ventaja sobre la competencia.<br><br> Así mismo estamos dispuestos a ayudarle con asesoría en el manejo de mercancía y créditos, ya que contamos con medio de financiamiento para ayudar a crecer su empresa. </p><br>
                          <a class="ps-morelink" href="{{ route('store.home') }}">Comienza ahora<i class="fa fa-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
            </div>
           
          </div>
        </div>
      </div>
<!-- Fin del texto -->
@endsection

@section('scripts')
@endsection
