@extends('store.layouts.main')

@section('title', 'Catálogo - Pargi')

@section('styles')
@endsection

@section('content')

<div class="ps-section--offer">
    <div class="ps-column"><a class="ps-offer" href="#"><img src="http://calzadopargi.mx/images/banner-promo.jpg" alt=""></a></div>
    <div class="ps-column"><a class="ps-offer" href="#"><img src="http://calzadopargi.mx/images/banner-promo-dos.jpg" alt=""></a></div>
     <a class="ps-btn" href="{{ route('store.catalogue', ['returnUrl' => $returnUrl]) }}" style="background-color: #50ab3a; margin-top:15px; margin-left:20px;" onclick="return gtag_report_conversion('http://calzadopargi.mx/store/catalogue')">Conoce Nuestro Catálogo</a>
</div>

<div class="ps-contact ps-contact--2 ps-section pt-80 pb-80">
    <div class="ps-container">
            <div class="ps-section__header mb-50">
            <h3 class="ps-section__title" data-mask="Registro">- Regístrate y accede a nuestro catálogo de precios preferenciales.</h3>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                <div class="ps-post">

                    <div class="ps-post__content">
                    <p>Si después de oprimir el botón "Enviar registro" ha sido redirigido a esta página, por favor intente con otro nombre de usuario, asegúrese de ingresar la misma contraseña en ambos campos y que su correo electrónico no haya sido registrado previamente. </p><br>        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ps-section__header pt-10">
                <form class="ps-contact__form" action="{{ route('clients.store', ['returnUrl' => $returnUrl]) }}" method="post">
                @csrf
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="form-group">
                            <label>Usuario <sub>*Requerido sin espacios o acentos</sub></label>
                            <input name="username" class="form-control" type="text" placeholder="-----" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña <sub>*Requerido</sub></label>
                            <input name="password" class="form-control" type="password" placeholder="*****" required>
                        </div>
                        <div class="form-group">
                            <label>Confirmar Contraseña <sub>*Requerido</sub></label>
                            <input name="password_confirmation" class="form-control" type="password" placeholder="*****" required>
                        </div>
                        <div class="form-group">
                            <label>Nombre de la Zapateria <sub>*Requerido</sub></label>
                            <input name="company" class="form-control" type="text" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Nombre del Dueño <sub>*Requerido</sub></label>
                            <input name="name" class="form-control" type="text" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="form-group">
                            <label>Dirección de entrega <sub>*Requerido - No utilizar signos como #</sub></label>
                            <input name="address" class="form-control" type="text" placeholder="(No utilizar signos como #)" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono Fijo <sub>*</sub></label>
                            <input name="phone" class="form-control" type="phone" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Teléfono Celular <sub>*Requerido</sub></label>
                            <input name="mobile_phone" class="form-control" type="phone" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Correo Electrónico <sub>*Requerido</sub></label>
                            <input name="email" class="form-control" type="email" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="form-group">
                            <button class="ps-btn mr-15" type="submit">Enviar registro<i class="ps-icon-next"></i></button><br><br><br>
                            <a class="ps-btn" href="{{ route('store.catalogue', ['returnUrl' => $returnUrl]) }}" style="background-color: #50ab3a;" onclick="return gtag_report_conversion('http://calzadopargi.mx/store/catalogue')">Conoce Nuestro Catálogo</a><br><br><br>
                            <a class="ps-btn" href="{{ route('store.login', ['returnUrl' => $returnUrl]) }}">Iniciar sesión</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Proceso de compra -->

<div class="ps-features pt-80 pb-80 bg--cover" data-background="http://calzadopargi.mx/images/self/5ca2472e49591.jpg ">
    <div class="ps-container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <div class="ps-iconbox ps-iconbox--inverse">
                    <div class="ps-iconbox__header"><i class="ps-icon-delivery"></i>
                        <h3>ENVÍO A DOMICILIO</h3>
                        <p>Tu pedido en menos de 10 días hábiles</p>
                    </div>
                    <div class="ps-iconbox__content">
                        <p>Recíbelo en cualquier parte de la República.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <div class="ps-iconbox ps-iconbox--inverse">
                    <div class="ps-iconbox__header"><i class="ps-icon-money"></i>
                        <h3>PEDIDOS DE 6 EN 6</h3>
                        <p>MARCAS ESPECIALES** SE VENDEN POR PAR.</p>
                    </div>
                    <div class="ps-iconbox__content">
                        <p>**Converse, Swiss Brand, Discovery, Jeep, Bota de Hule, etc.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <div class="ps-iconbox ps-iconbox--inverse">
                    <div class="ps-iconbox__header"><i class="ps-icon-customer-service"></i>
                        <h3>SERVICIO AL CLIENTE</h3>
                        <p>CUENTA CON NUESTRO APOYO</p>
                    </div>
                    <div class="ps-iconbox__content">
                        <p>pedidospargi@hotmail.com <br> Móvil. 044 771 295 0629 - 044 812 354 4458<br>
                            Teléfono. 01 812 559 22 97 al 99
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fin de Proceso -->






@endsection

@section('scripts')
@endsection
