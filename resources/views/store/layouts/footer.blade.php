<div class="ps-footer bg--cover" data-background="{{ asset('images/background/parallax-3.jpg') }}">
    <div class="ps-footer__content">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--info">
                      <header><a class="ps-logo" href="{{ route('store.home') }}"><img src="{{ asset('images/logo-w.png') }}" alt=""></a>
                        <h3 class="ps-widget__title">Encuéntranos</h3>
                      </header>
                      <footer>
                        <p><strong>Avenida Madero 2611, Col. Acero, Monterrey</strong></p><br>
                        <p>- Email: <a href='mailto:pedidospargi@hotmail.com'>pedidospargi@hotmail.com</a></p>
                        <p>- Línea Directa: <a href="tel:8125592297"> (812) 559 22 97 al 99 </a> </p>
                        <p>- Whatsapp: <a href="https://wa.me/528123544458"> 81 2354 4458 </a>  </p>
                    
                      </footer>
                    </aside>
                  </div>
                
                 <div class="col-lg-5 col-md-3 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title text-center">Accesos Rápidos</h3>
                      </header>
                    <div class="text-center">
                         @if(!Auth::check())
                        <a href="{{ route('store.register') }}" class="ps-btn">Regístrate<i class="fa fa-angle-right"></i></a>
                         @endif
                        <br><br>
                         <a href="https://goo.gl/maps/34i6tCgbruBwGDWk9"><button class="ps-btn">Ir a Pargi<i class="fa fa-angle-right"></i></button></a><br><br>
                         <a href="https://wa.me/528123544458"><button class="ps-btn">Whatsapp<i class="fa fa-angle-right"></i></button></a>
                    </div>
                    </aside>
                  </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Enlaces de interés</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--line">
                          <li><a href="{{ route('store.about') }}">Nuestra Marca</a></li>
                          <li><a href="{{ route('store.faq') }}">Preguntas Frecuentes</a></li>
                          <li><a href="{{ route('store.shipping') }}">Envíos y Devoluciones</a></li>
                          <li><a href="{{ route('store.privacy') }}">Política de Privacidad</a></li>
                          <li><a href="{{ route('store.terms') }}">Condiciones</a></li>
                          <li><a href="{{ route('store.contact') }}">Contacto</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Productos</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--line">
                          <li><a href="{{ route('store.catalogue') }}">Catálogo</a></li>
                          <li><a href="#">Historial de Compra</a></li>
                          <li><a href="{{ route('store.cart') }}">Carrito de Compras</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>
            </div>
        </div>
    </div>
    <div class="ps-footer__copyright">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <p>&copy; <a>Comercializadora Pargi S.A. de C.V.</a>, algunos derechos reservados - 2019</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <ul class="ps-social">
                      <li><a href="https://www.facebook.com/calzadopargi"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="https://www.instagram.com/calzadopargi/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



