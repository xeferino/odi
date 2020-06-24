@extends('store.layouts.main')

@section('title', 'Venta de Calzado por Mayoreo - Pargi')

@section('styles')
@endsection

@section('content')

<!--Inicio del Proceso-->
 <div class="ps-contact ps-contact--2 ps-section pt-50 pb-80">
        <div class="ps-container">
          <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                  <div class="ps-section__header pt-0">
                    <h2 class="ps-section__title" data-mask="Contacto">- Escríbenos</h2>
                    <form class="ps-contact__form" action="{{ route('store.send_contact') }}" method="post">
                    @csrf
                      <div class="form-group">
                        <label>Nombre <sub>*</sub></label>
                        <input class="form-control" name="name" type="text" placeholder="Por favor, escribe tu nombre">
                      </div>
                      <div class="form-group">
                        <label>Correo Electrónico <sub>*</sub></label>
                        <input class="form-control" name="email" type="email" placeholder="Correo electrónico">
                      </div>
                       <div class="form-group">
                        <label>Teléfono <sub>*</sub></label>
                        <input class="form-control" name="phone" type="phone" placeholder="Tu número a 10 dígitos">
                      </div>
                      <div class="form-group mb-25">
                        <label>Tu mensaje <sub>*</sub></label>
                        <textarea class="form-control" name="message" rows="6" placeholder="¿Cómo te podemos ayudar?"></textarea>
                      </div>
                      <div class="form-group">
                        <button class="ps-btn">Enviar<i class="ps-icon-next"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pt-90 ">
                    <br><br>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6304.043133062381!2d-100.28703747046964!3d25.680840796090695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x866295109c21519d%3A0x16e03e707a6769b8!2sPARGI!5e0!3m2!1ses-419!2smx!4v1557810218772!5m2!1ses-419!2smx" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
          </div>
        </div>
      </div>

<!-- Fin de Proceso -->


@endsection

@section('scripts')
@endsection
