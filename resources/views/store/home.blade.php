@extends('store.layouts.main')

@section('title', 'Venta de Calzado por Mayoreo - Pargi')

@section('styles')
@endsection

@section('content')
@if($sliderImages->count() > 0)
<div class="ps-banner">
    <div class="rev_slider fullscreenbanner" id="home-banner">
        <ul>
            @for($i = 0; $i < $sliderImages->count(); $i++)
                @php($sliderImage = $sliderImages[$i])
                <li class="ps-banner ps-banner--white" data-index="rs-{{ $i }}" data-transition="random" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-rotate="0"><img class="rev-slidebg" src="{{ $sliderImage->content }}" alt="PARGI" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
                    <div class="tp-caption ps-banner__header" id="layer20" data-x="left" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['-150','-120','-150','-170']" data-width="['none','none','none','400']" data-type="text" data-responsive_offset="on" data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                        <p>LAS MEJORES <br> COLECCIONES</p>
                    </div>
                    <div class="tp-caption ps-banner__title" id="layer339" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['-60','-40','-50','-70']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                        <p class="text-uppercase">EN CALZADO</p>
                    </div>
                    <div class="tp-caption ps-banner__description" id="layer2-14" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['30','50','50','50']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                        <p>Comercializadora especializada con colecciones <br> de + 10,000 pares de zapatos y las
                            mejores <br> ofertas. ¡Lo encuentras por que lo encuentras!</p>
                    </div>
                </li>
                @endfor
        </ul>
    </div>
</div>
@endif
<!--- Banner de Marcas -->
<div class="ps-home-partner">
    <div class="ps-container">
        <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="40" data-owl-nav="false" data-owl-dots="false" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="4" data-owl-item-md="5" data-owl-item-lg="6" data-owl-duration="1000" data-owl-mousedrag="on">
            @foreach($partners as $partner)
            <img src="{{ asset($partner->content) }}" alt="Marca">
            @endforeach
        </div>
    </div>
</div>
<!-- End Banner de Marcaas -->


<!-- Inicio de Sesión -->
@if(!Auth::check())
<div class="ps-section ps-home-blog pt-80 pb-80" id="login">
    <div class="ps-container">
        <div class="ps-section__header mb-50">
            <h2 class="ps-section__title" data-mask="Sesión">- Inicia</h2>
            <div class="ps-section__action"><a class="ps-morelink text-uppercase" href="registro.html">Regístrate<i class="fa fa-long-arrow-right"></i></a></div>
        </div>
        <div class="ps-section__content">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 "></div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">

                    <div class="ps-home-contact__form">
                        <header>
                            <h3>Accede al catálogo completo</h3>
                            <p>Al ser usuario de la plataforma accederás a <br> todo el catálogo y a exclusivas
                                ofertas.</p>
                        </header>
                        <footer>
                            <form action="{{ route('login') }}" method="POST">
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
                                    <button type="submit" class="ps-btn">Iniciar
                                        sesión<i class="fa fa-angle-right"></i></button><br>
                                    <p>-</p>
                                </div>
                                <div class="form-group text-center">
                                    <a href="{{ route('store.register') }}" class="ps-btn">Regístrate<i class="fa fa-angle-right"></i></a><br>
                                    <p>-</p>
                                </div>
                                <div class="form-group text-center">
                                    <a href="{{ route('password.request') }}">¿Olvidaste tu cuenta?</a><br>
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
<!-- Fin inicio de sesión -->



<!-- Frase Parallax -->
@if($salesPhraseImage)
<div class="ps-home-testimonial bg--parallax pb-40" data-background="@if($salesPhraseImage) {{ asset($salesPhraseImage->content) }} @endif">
    <div class="container">
        <div class="owl-slider owl-slider-testimonial" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
            <div class="ps-testimonial">
                <div class="ps-testimonial__thumbnail"><img src="{{ asset('images/logo-p.jpg') }}" alt=""><i class="fa fa-quote-left"></i></div>
                <header>
                    <select class="ps-rating">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="1">5</option>
                    </select>
                    <p>Director de Pargi</p>
                </header>
                <footer>
                    <p>@if($salesPhrase) {{ $salesPhrase->content }} @endif</p>
                </footer>
            </div>
            @foreach($testimonials as $testimony)
            <div class="ps-testimonial">
                <div class="ps-testimonial__thumbnail"><img src="{{ asset('images/logo-p.jpg') }}" alt=""><i class="fa fa-quote-left"></i></div>
                <header>
                    <select class="ps-rating">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="1">5</option>
                    </select>
                    <p>{{ explode("{::}", $testimony->content)[0] }}</p>
                </header>
                <footer>
                    <p>{{ explode("{::}", $testimony->content)[1] }}</p>
                </footer>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<div class="ps-section ps-section--top-sales ps-owl-root pt-80 pb-20">
    <div class="ps-container">
        <div class="ps-section__header mb-50">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="MÁS VENDIDOS">- Top Ventas</h3>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Sig<i class="ps-icon-arrow-left"></i></a></div>
                </div>
            </div>
        </div>
        <div class="ps-section__content">
            <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                @foreach($bestSellers as $product)
                <div class="ps-shoes--carousel">
                    <div class="ps-shoe">
                        <div class="ps-shoe__thumbnail">
                            @if($product->images()->count() > 0)<img src="{{ asset($product->images->first()->url) }}" alt="{{ $product->description }}">@endif
                            <a class="ps-shoe__overlay" href="{{ route('store.product', ['product' => $product]) }}"></a>
                        </div>
                        <div class="ps-shoe__content">
                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{ route('store.product', ['product' => $product]) }}" style="text-transform: capitalize;">{{ $product->brand->name }}
                                    - {{ $product->model }}</a>
                                <p class="ps-shoe__categories"><b>{{ $product->description }}</b></p>
                                <p class="ps-shoe__categories"><b>{{ $product->size }}</b></p>
                                <p class="ps-shoe__categories">
                                    @foreach($product->tags as $tag)
                                    #{{ $tag->name }},
                                    @endforeach
                                </p>
                                <a class="ps-cart__toggle pull-right" style="margin: 10px;" href="{{ route('store.cart.add', ['product' => $product->id]) }}"><i class="ps-icon-shopping-cart"></i></a>
                                
                                <span class="ps-shoe__price">@money($product->public_price, 'MXN')</span>
                               
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Fin Más vendidos -->

<div class="ps-section--offer">
    @foreach($offerImages as $image)
    <div class="ps-column"><a class="ps-offer" href="javascript:void(0);"><img src="{{ asset($image->content) }}" alt=""></a></div>
    @endforeach
</div>
<!-- Promos -->

<div class="ps-section ps-section--top-sales ps-owl-root pt-80 pb-20">
    <div class="ps-container">
        <div class="ps-section__header mb-50">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="Promociones">- Promociones</h3>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Sig<i class="ps-icon-arrow-left"></i></a></div>
                </div>
            </div>
        </div>
        <div class="ps-section__content">
            <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                @foreach($offers as $product)
                <div class="ps-shoes--carousel">
                    <div class="ps-shoe">
                        <div class="ps-shoe__thumbnail">
                            @if($product->images()->count() > 0)<img src="{{ asset($product->images->first()->url) }}" alt="{{ $product->description }}">@endif
                            <a class="ps-shoe__overlay" href="{{ route('store.product', ['product' => $product]) }}"></a>
                        </div>
                        <div class="ps-shoe__content">
                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{ route('store.product', ['product' => $product]) }}" style="text-transform: capitalize;">{{ $product->brand->name }}
                                    - {{ $product->model }}</a>
                                <p class="ps-shoe__categories"><b>{{ $product->description }}</b></p>
                                <p class="ps-shoe__categories"><b>{{ $product->size }}</b></p>
                                <p class="ps-shoe__categories">
                                    @foreach($product->tags as $tag)
                                    #{{ $tag->name }},
                                    @endforeach
                                </p>
                                <a class="ps-cart__toggle pull-right" style="margin: 10px;" href="{{ route('store.cart.add', ['product' => $product->id]) }}"><i class="ps-icon-shopping-cart"></i></a>
                                
                                <span class="ps-shoe__price">@money($product->public_price, 'MXN')</span>
                               
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if(!Auth::check())
            <div class=" text-center">
                <a href="#login"><button class="ps-btn">Iniciar sesión<i class="fa fa-angle-right"></i></button></a><br>
                <p>-</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!--End Promos -->

<!-- Proceso de compra -->

<div class="ps-features pt-80 pb-80 bg--cover" data-background="@if($purchaseDetailsImage) {{ asset($purchaseDetailsImage->content) }} @endif">
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

<!-- Recomendados -->

<div class="ps-section ps-section--top-sales ps-owl-root pt-80 pb-20">
    <div class="ps-container">
        <div class="ps-section__header mb-50">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="Recomendados">- Recomendados</h3>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Sig<i class="ps-icon-arrow-left"></i></a></div>
                </div>
            </div>
        </div>
        <div class="ps-section__content">
            <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                @foreach($recommendations as $product)
                <div class="ps-shoes--carousel">
                    <div class="ps-shoe">
                        <div class="ps-shoe__thumbnail">
                            @if($product->images()->count() > 0)<img src="{{ asset($product->images->first()->url) }}" alt="{{ $product->description }}">@endif
                            <a class="ps-shoe__overlay" href="{{ route('store.product', ['product' => $product]) }}"></a>
                        </div>
                        <div class="ps-shoe__content">
                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{ route('store.product', ['product' => $product]) }}" style="text-transform: capitalize;">{{ $product->brand->name }}
                                    - {{ $product->model }}</a>
                                <p class="ps-shoe__categories"><b>{{ $product->description }}</b></p>
                                <p class="ps-shoe__categories"><b>{{ $product->size }}</b></p>
                                <p class="ps-shoe__categories">
                                    @foreach($product->tags as $tag)
                                    #{{ $tag->name }},
                                    @endforeach
                                </p>
                                <a class="ps-cart__toggle pull-right" style="margin: 10px;" href="{{ route('store.cart.add', ['product' => $product->id]) }}"><i class="ps-icon-shopping-cart"></i></a>
                               
                                <span class="ps-shoe__price">@money($product->public_price, 'MXN')</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if(!Auth::check())
            <div class=" text-center">
                <a href="#login"><button class="ps-btn">Iniciar sesión<i class="fa fa-angle-right"></i></button></a><br>
                <p>-</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!--End Recomendados -->


@endsection

@section('scripts')
@endsection