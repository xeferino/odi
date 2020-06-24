@extends('store.layouts.main')

@section('title', 'Catálogo - Pargi')

@section('styles')
@endsection

@section('content')
<div class="ps-section ps-home-blog pt-80 pb-80" id="login">
    <div class="ps-container">
        <div class="ps-section__header mb-50">
            <h2 class="ps-section__title" data-mask="Sesión">- Inicia</h2>
            <div class="ps-section__action"><a class="ps-morelink text-uppercase" href="{{ route('store.register', ['returnUrl' => $returnUrl]) }}">Regístrate<i
                        class="fa fa-long-arrow-right"></i></a></div>
        </div>
        <div class="ps-section__content">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 "></div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">

                    <div class="ps-home-contact__form">
                        <header>
                            <h3>Accede al catálogo completo</h3>
                            <p>Al ser usuario de la plataforma accederás a <br> todo el catálogo y a exclusivas ofertas.
                            </p>
                        </header>
                        <footer>
                            <form method="POST" action="{{ route('login', ['returnUrl' => $returnUrl]) }}">
                            @csrf
                                <div class="form-group">
                                    <label>Usuario <span>*</span></label>
                                    <input class="form-control" type="text" name="username">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña<span>*</span></label>
                                    <input class="form-control" type="password" name="password">
                                </div>

                                <div class="form-group text-center">
                                    <button class="ps-btn" type="submit">Iniciar sesión<i
                                                class="fa fa-angle-right"></i></button>
                                </div>
                            </form>
                        </footer>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 "></div>
            </div>
        </div>
    </div>
</div>
@endsection
