@extends('store.layouts.main')

@section('title', 'Venta de Calzado por Mayoreo - Pargi')

@section('styles')
@endsection

@section('content')
<!--Inicio de la página-->
        <!--- Imagen de Portada--->
      <div class="ps-home-testimonial bg--parallax pb-280" data-background="{{ asset('images/background/parallax-copia.jpg') }}"></div>
        <!--- Fin de Imagen de Portada--->

<!--- Inicio del Texto-->
      <div class="ps-section ps-home-blog pt-40 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <h2 class="ps-section__title" data-mask="FAQ">- Preguntas Frecuentes</h2>
          </div>
          <div class="ps-section__content">
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      
                      <div class="ps-post__content"><a class="ps-post__title_2">1. ¿Cómo me registro en calzadopargi.mx?</a>
                        <br>
                        <p>En la parte superior de la extrema derecha de la página existe un ícono que dice “REGISTRATE” da click sobre la leyenda y después llena el formulario que aparece en su totalidad, una vez finalizado, da click en “ENVIAR REGISTRO”, minutos más tarde, se te hará llegará un mail con la confirmación del registro y de esta manera podrás iniciar sesión para comenzar a comprar en calzadpargi.mx </p><br>
                          <a class="ps-morelink" href="{{ route('store.catalogue') }}">Ir al Catálogo<i class="fa fa-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      
                      <div class="ps-post__content"><a class="ps-post__title_2">2. ¿Por qué aparecen 6 piezas?</a>
                        <br>
                        <p>Nuestro sistema de venta es a mayoreo de 6 en 6 piezas, esto quiere decir que el mínimo de compra con nosotros es media docena, en mismo modelo, mismo color, y numeración corrida de 15/17, 18/21, 22/25, 23/26, 27/29. </p><br>
                          <a class="ps-morelink" href="{{ route('store.catalogue') }}">Ir al Catálogo<i class="fa fa-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      
                      <div class="ps-post__content"><a class="ps-post__title_2">3. ¿Cuál es la compra mínima de mayoreo?</a>
                        <br>
                        <p>La compra mínima en calzadopargi.mx es de media docena.   </p><br>
                          <a class="ps-morelink" href="{{ route('store.catalogue') }}">Ir al Catálogo<i class="fa fa-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      
                      <div class="ps-post__content"><a class="ps-post__title_2">4. ¿Cuánto cuesta el envío de los productos?</a>
                        <br>
                        <p>Los costos de envío corren a cargo del cliente y depende del lugar de destino al que tiene que llegar la mercancía.  </p><br>
                          <a class="ps-morelink" href="{{ route('store.catalogue') }}">Ir al Catálogo<i class="fa fa-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      
                      <div class="ps-post__content"><a class="ps-post__title_2">5. ¿Cómo hago mi pago?</a>
                        <br>
                        <p>El pago de tu mercancía se puede hacer en efectivo, depósito bancario o transferencia interbancaria. </p><br>
                          <a class="ps-morelink" href="{{ route('store.catalogue') }}">Ir al Catálogo<i class="fa fa-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      
                      <div class="ps-post__content"><a class="ps-post__title_2">6. ¿Cuánto tardará en llegar mi pedido?</a>
                        <br>
                        <p>Tu pedido llegará en máximo 10 días hábiles, dependiendo de en qué parte de la republica te encuentres, y de cuando el pago se vea reflejado en el sistema esto dependiendo de la parte de la república donde te encuentres.  </p><br>
                          <a class="ps-morelink" href="{{ route('store.catalogue') }}">Ir al Catálogo<i class="fa fa-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      
                      <div class="ps-post__content"><a class="ps-post__title_2">7. ¿Sólo puedo comprar mayoreo?</a>
                        <br>
                        <p>Sí, somos una comercializadora de venta de calzado a mayoreo, la compra mínima es media docena de mismo modelo, mismo color, y numeración corrida.  </p><br>
                          <a class="ps-morelink" href="{{ route('store.catalogue') }}">Ir al Catálogo<i class="fa fa-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      
                      <div class="ps-post__content"><a class="ps-post__title_2">8. ¿Cómo me pongo en contacto con Pargi?</a>
                        <br>
                        <p>Nuestro gusto es poder ayudarte en todo lo que necesites, puedes contar con nosotros en pedidospargi@hotmail.com <br><br>Móvil. 044 771 295 0629 <br><br>Teléfono. 01 812 559 22 97 al 99 <br><br>Avenida Madero 2611, Col. Acero, Monterrey <br><br>De lunes a viernes de 9 a 18hrs, sábados de 8 a 15hrs.  </p><br>
                          <a class="ps-morelink" href="{{ route('store.catalogue') }}">Ir al Catálogo<i class="fa fa-long-arrow-right"></i></a>
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
