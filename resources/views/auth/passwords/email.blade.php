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
                            <p>Ingresa el correo electrónico de tu cuenta.</p>
                        </header>
                        <footer>
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Correo electrónico <span>*</span></label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                                <div class="form-group text-center">
                                    <button type="submit" class="ps-btn">Recuperar cuenta<i class="fa fa-angle-right"></i></button><br>
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