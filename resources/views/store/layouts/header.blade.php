<header class="header">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                    <p>Avenida Madero 2611, Col. Acero, Monterrey - Línea Directa: (812) 559 22 97 al 99</p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="header__actions">
                        @if(Auth::check())
                        <a href="javascript::void(0)"> Bienvenido {{ Auth::user()->name }}</a>
                        <a href="{{ route('logout') }}"> Salir</a>
                        @else
                        <a href="{{ route('store.login') }}"> Iniciar Sesión</a>
                        <a href="{{ route('store.register') }}"> Regístrate</a>
                        @endif
                        <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catálogo<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                @foreach($categories as $tag)
                                <li><a href="{{ route('store.catalogue') }}?tags={{ $tag->name }}">{{ $tag->name }}</a></li>
                                @endforeach
                                <li><a href="{{ route('store.catalogue') }}">Todos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container-fluid">
            <div class="navigation__column left">
                <div class="header__logo"><a class="ps-logo" href="{{ route('store.home') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a></div>
            </div>
            <div class="navigation__column center">
                <ul class="main-menu menu">
                    <li class="menu-item"><a href="{{ route('store.home') }}">Inicio</a></li>
                    <li class="menu-item"><a href="{{ route('store.catalogue') }}">Catálogo</a></li>
                    <li class="menu-item menu-item-has-children dropdown"><a href="#">Categorías</a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="{{ route('store.catalogue') }}">Todas</a></li>
                            @foreach($categories as $tag)
                            <li class="menu-item"><a href="{{ route('store.catalogue') }}?tags={{ $tag->name }}">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="menu-item"><a href="{{ route('store.contact') }}">Contacto</a></li>
                </ul>
            </div>
            <div class="navigation__column right">
                @if(Auth::check())
                <div class="ps-cart"><a class="ps-cart__toggle" href="{{ route('store.cart') }}"><span><i>@if(Auth::user()->current_order())
                                {{ count(Auth::user()->current_order()->order_products) }} @endif</i></span><i class="ps-icon-shopping-cart"></i></a>
                    @if(Auth::user()->current_order())
                    <div class="ps-cart__listing">
                        <div class="ps-cart__content">
                            @foreach(Auth::user()->current_order()->order_products as $order_product)
                            <div class="ps-cart-item"><a class="ps-cart-item__close" href="{{ route('store.cart.remove', ['orderProduct' => $order_product]) }}"></a>
                                <div class="ps-cart-item__thumbnail"><a href="{{ route('store.product', ['product' => $order_product->product]) }}"></a>@if($order_product->product->images->count()
                                    > 0)<img src="{{ asset($order_product->product->images->first()->url) }}" alt="{{ $order_product->product->description }}">@endif</div>
                                <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="{{ route('store.product', ['product' => $order_product->product]) }}">{{ $order_product->product->model }}</a>
                                    <p><span>Cantidad:<i>{{ $order_product->quantity }}</i></span>@if(Auth::user()->hasRole('client'))<span>Total:<i>@money($order_product->public_price,
                                                'MXN')</i></span>@endif</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="ps-cart__total">
                            <p>Productos
                                seleccionados:<span>{{ count(Auth::user()->current_order()->order_products) }}</span>
                            </p>
                            @if(Auth::user()->hasRole('client'))<p>
                                Total:<span>@money(Auth::user()->current_order()->public_price, 'MXN')</span></p>@endif
                        </div>
                        <div class="ps-cart__footer"><a class="ps-btn" href="{{ route('store.cart') }}">Revisar
                                carrito<i class="ps-icon-arrow-left"></i></a></div>
                    </div>
                    @endif
                </div>
                @endif
                <div class="menu-toggle"><span></span></div>
            </div>
        </div>
    </nav>
    <div style="background: white; width: 100%; overflow: hidden;">
        <div style="float: right; margin-bottom: 10px;">
            <form class="ps-search--header mb-5" action="{{ route('store.catalogue') }}" method="get">
                <input class="form-control" type="text" placeholder="Buscar Producto…" name="search_description">
                <button><i class="ps-icon-search"></i></button>
            </form>
        </div>
    </div>

</header>
<div style="clear: both"></div>
<div class="header-services">
    <div class="ps-services owl-slider owl-slider-labels" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>10% DE DESCUENTO</strong>: En todas las compras en línea antes del 31 de marzo</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Envíos a todo el país</strong>: Su pedido en
            10 días hábiles</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Calidad Garantizada</strong>: Las tendencias
            de moda las encuentra aquí</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Todas las marcas</strong>: Encuentre marcas
            nacionales e internacionales</p>
    </div>
</div>