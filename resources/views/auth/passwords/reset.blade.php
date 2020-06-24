@extends('store.layouts.main')

@section('title', 'Venta de Calzado por Mayoreo - Pargi')

@section('styles')
@endsection

@section('content')
@if(!Auth::check())
<div class="ps-section ps-home-blog pt-80 pb-80" id="login">
    <div class="ps-container">
        <div class="ps-section__header mb-50">
            <h2 class="ps-section__title" data-mask="Cuenta">- Recuperar</h2>
            <div class="ps-section__action"><a class="ps-morelink text-uppercase" href="registro.html">Regístrate<i class="fa fa-long-arrow-right"></i></a></div>
        </div>
        <div class="ps-section__content">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 "></div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">

                    <div class="ps-home-contact__form">
                        <header>
                            <p>Ingresa el correo electrónico de tu cuenta y la nueva contraseña.</p>
                        </header>
                        <footer>
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <label>Correo electrónico <span>*</span></label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                </div>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                                <div class="form-group">
                                    <label>Contraseña <span>*</span></label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                </div>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                                <div class="form-group">
                                    <label>Confirmar Contraseña <span>*</span></label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="ps-btn">Cambiar contraseña<i class="fa fa-angle-right"></i></button><br>
                                    <p>-</p>
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
@endif
@endsection

@section('scripts')
@endsection