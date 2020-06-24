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
            <h2 class="ps-section__title" data-mask="Pedidos">- Envíos y Devoluciones</h2>
           
          </div>
          <div class="ps-section__content">
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      
                      <div class="ps-post__content"><a class="ps-post__title_2"><i class="fa fa-truck"> - </i> Entregas</a>
                        <br>
                        <p>Ya que hayas realizado tu pago en alguna de las plataformas que ponemos a tu alcance, y se vea reflejado en nuestro sistema, nuestra gente en bodega, tramita tu pedido en las siguientes 24horas. Ya que tu pedido esté listo, se hace la logística necesaria para el envío y te llegará un correo electrónico con toda la información necesaria de la compra, de esta manera, podrás tener tu mercancía en las puertas de tu hogar o negocio en máximo 10 días hábiles. </p><br>
                          <a class="ps-morelink" href="{{ route('store.catalogue') }}">Ir al Catálogo<i class="fa fa-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                      
                      <div class="ps-post__content"><a class="ps-post__title_2"><i class="fa fa-dropbox"> - </i> Garantías y Devoluciones</a>
                        <br>
                        <p>En PARGI las devoluciones que manejamos, son únicamente por daños de fábrica, por tal motivo, cuando tu producto esté dañado, lo puedes devolver con las siguientes condiciones. <br><br>Error de producto solicitado, defecto o daño de fábrica. Para poder hacer válida la devolución es imprescindible que mande un correo electrónico a pedidospargi@hotmail.com o al teléfono 0457712148835, dentro las primeras 48hrs después de  recibido su paquete, con la razón de la devolución y fotografías que validen los daños de fábrica y número de pedido, así mismo los artículos tienen que estar en sus empaque original y sin usarse, si su devolución no cumple con los requisitos antes mencionados, no se podrá hacerla válida, los gastos de envío de ida y vuelta, corren por parte del cliente.   </p><br>
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
