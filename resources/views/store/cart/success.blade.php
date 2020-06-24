@extends('store.layouts.main')

@section('title', 'Orden envidada - Pargi')

@section('styles')
@endsection

@section('content')
<!-- Inicio de Sesión -->
<div class="ps-section ps-home-blog pt-80 pb-80" id="login">
    <div class="ps-container">
        <div class="ps-section__header mb-50">
            <h2 class="ps-section__title" data-mask="Enviada">- Orden</h2>
            <div class="ps-section__action"><a class="ps-morelink text-uppercase" href="{{ route('store.catalogue') }}">Seguir ordenando<i
                        class="fa fa-long-arrow-right"></i></a></div>
        </div>
        <div class="ps-section__content">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 "></div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">

                    <div class="ps-home-contact__form">
                        <header>
                            <h3>Gracias por tu orden.</h3>
                            <p>Tu orden fue enviada con éxito, en cuanto sea aprobada recibirás un correo con el detalle de tu orden.</p>
                        </header>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 "></div>
            </div>
        </div>
    </div>
</div>
@endsection
