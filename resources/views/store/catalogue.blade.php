@extends('store.layouts.main')

@section('title', 'Catálogo - Pargi')

@section('styles')
@endsection

@section('content')
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MSD2WHV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="ps-section--offer">
    <div class="ps-column"><a class="ps-offer" href="#"><img src="http://calzadopargi.mx/images/banner-promo.jpg" alt=""></a></div>
    <div class="ps-column"><a class="ps-offer" href="#"><img src="http://calzadopargi.mx/images/banner-promo-dos.jpg" alt=""></a></div>
</div>
<div class="ps-products-wrap pt-80 pb-80">
    <div class="ps-products" data-mh="product-listing">
        <div class="ps-product-action">
        </div>
        <div class="ps-product__columns">
            @foreach ($products as $product)
            <div class="ps-product__column" style="min-height: 450px;">
                <div class="ps-shoe mb-30">
                    <div class="ps-shoe__thumbnail">
                        @if($product->images()->count() > 0)<img src="{{ asset($product->images->first()->url) }}" alt="{{ $product->description }}">@endif
                        <a class="ps-shoe__overlay" href="{{ route('store.product', ['product' => $product]) }}"></a>
                    </div>
                    <div class="ps-shoe__content">
                        <div class="ps-shoe__variants">
                            <div class="ps-shoe__variant normal">
                                @php($count = 0)
                                @foreach($product->images as $image)
                                <img src="{{ asset($image->url) }}" alt="{{ $product->description }}">
                                @php($count++)
                                @if($count >= 2)
                                    @break
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="ps-shoe__detail">
                            <a class="ps-shoe__name" href="{{ route('store.product', ['product' => $product]) }}" style="text-transform: capitalize;">{{
                                $product->brand->name }} - {{ $product->model }}</a>
                            <p class="ps-shoe__categories"><b>{{ $product->description }}</b></p>
                            <p class="ps-shoe__categories"><b>{{ $product->size }}</b></p>
                            <p class="ps-shoe__categories">
                                @foreach($product->tags as $tag)
                                #{{ $tag->name }},
                                @endforeach
                            </p>
                            <a class="ps-cart__toggle pull-right" style="margin: 10px;"
                        href="{{ route('store.cart.add', ['product' => $product->id]) }}"><i
                            class="ps-icon-shopping-cart"></i></a>
                            
                            <span class="ps-shoe__price">@money($product->public_price, 'MXN')</span>
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @foreach ($errors->all() as $error)
            <strong>{{ $error }}</strong>
            @endforeach
        </div>
        @endif
        <div class="ps-product-action">
            <div class="ps-pagination">
                @if ($products->lastPage() > 1)
                <ul class="pagination">
                    @if($products->currentPage() > 1)
                    <li>
                        <a href="javascript:changePage({{ $products->currentPage() - 1 }})"><</a> 
                    </li>
                    @endif
                    @if($products->currentPage() != $products->lastPage())
                    <li class="{{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                        <a href="javascript:changePage({{ $products->currentPage() + 1 }})">></a>
                    </li>
                    @endif
                </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="ps-sidebar" data-mh="product-listing">
        @if(isset($filters['search_description']))
        <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
                <h3>Busqueda</h3>
            </div>
            <div class="ps-widget__content">
                <ul class="ps-list--checked" id="searches">
                    <li class="current"><a href="{{ route('store.catalogue') }}">{{ $filters['search_description'] }}</a></li>
                </ul>
            </div>
        </aside>
        @endif
        <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
                <h3>Categoría</h3>
            </div>
            <div class="ps-widget__content">
                <ul class="ps-list--checked" id="tags">
                    @foreach($tags as $tag)
                    <li data-tag-name="{{ $tag->name }}"><a href="{{ route('store.catalogue') }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </aside>
        <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
                <h3>El/Ella</h3>
            </div>
            <div class="ps-widget__content">
                <ul class="ps-list--checked" id="genders">
                    <li data-gender="DAMA"><a href="{{ route('store.catalogue') }}">Dama</a></li>
                    <li data-gender="CABALLERO"><a href="{{ route('store.catalogue') }}">Caballero</a></li>
                    <li data-gender="NINO"><a href="{{ route('store.catalogue') }}">Niño</a></li>
                    <li data-gender="NINA"><a href="{{ route('store.catalogue') }}">NIña</a></li>
                    <li data-gender="UNISEX"><a href="{{ route('store.catalogue') }}">Unisex</a></li>
                </ul>
            </div>
        </aside>
        <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
                <h3>Marcas (Por inicial)</h3>
            </div>
            <div class="ps-widget__content">
                <ul class="ps-list--checked" id="brands">
                    <li data-brand="A-E"><a href="{{ route('store.catalogue') }}">A - E</a></li>
                    <li data-brand="F-J"><a href="{{ route('store.catalogue') }}">F - J </a></li>
                    <li data-brand="K-O"><a href="{{ route('store.catalogue') }}">K - O </a></li>
                    <li data-brand="P-T"><a href="{{ route('store.catalogue') }}">P - T </a></li>
                    <li data-brand="U-Z"><a href="{{ route('store.catalogue') }}">U - Z </a></li>
                    <li data-brand="0-9"><a href="{{ route('store.catalogue') }}">0 - 9 </a></li>
                </ul>
            </div>
        </aside>
        <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
                <h3>Tallas</h3>
            </div>
            <div class="ps-widget__content">
                <ul class="ps-list--checked" id="sizes">
                    <li data-size="12-14"><a href="{{ route('store.catalogue') }}">12 a 14 cm </a></li>
                    <li data-size="15-17"><a href="{{ route('store.catalogue') }}">15 a 17 cm </a></li>
                    <li data-size="18-21"><a href="{{ route('store.catalogue') }}">18 a 21 cm </a></li>
                    <li data-size="22-25"><a href="{{ route('store.catalogue') }}">22 a 25 cm </a></li>
                    <li data-size="26-28"><a href="{{ route('store.catalogue') }}">26 a 28 cm </a></li>
                </ul>
            </div>
        </aside>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var url = "{{ route('store.catalogue') }}";
    var urlVars = [];
    var tags = [];
    var genders = [];
    var brands = [];
    var sizes = [];
    var page;

    function getUrlVars() {
        var vars = [],
            hash;
        var hashes = decodeURI(window.location.href.slice(window.location.href.indexOf('?') + 1)).split('&');
        for (var i = 0; i < hashes.length; i++) {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }

    function filter() {
        var searchFilter = urlVars['search_description'] ? "search_description=" + urlVars['search_description'] : "";
        var tagsFilter = tags.length > 0 ? "tags=" + tags.join() : "";
        var gendersFilter = genders.length > 0 ? "genders=" + genders.join() : "";
        var brandsFilter = brands.length > 0 ? "brands=" + brands.join() : "";
        var sizesFilter = sizes.length > 0 ? "sizes=" + sizes.join() : "";
        var pageFilter = "page=" + page;
        var filters = [searchFilter, tagsFilter, gendersFilter, brandsFilter, sizesFilter, pageFilter];
        filters = filters.filter(filter => filter != "");
        urlFilters = url;
        urlFilters += filters.length > 0 ? "?" + filters.join('&') : "";
        window.location.href = urlFilters;
    }

    function changePage(newPage) {
        page = newPage;
        filter();
    }

    $(function () {
        urlVars = getUrlVars();
        page = 1;
        if (urlVars['page']) {
            page = urlVars['page'];
        }
        if (urlVars['tags']) {
            tags = urlVars['tags'].split(",");
            $.each($('#tags').children(), function () {
                if (tags.includes($(this).attr('data-tag-name'))) {
                    $(this).addClass('current');
                }
            });
        }
        $('#tags > li > a').click(function (event) {
            event.preventDefault();
            page = 1;
            if (tags.includes($(this).parent().attr('data-tag-name'))) {
                tags = tags.filter(tag => tag != $(this).parent().attr('data-tag-name'));
            } else {
                tags.push($(this).parent().attr('data-tag-name'));
            }
            filter();
        });

        if (urlVars['genders']) {
            genders = urlVars['genders'].split(",");
            $.each($('#genders').children(), function () {
                if (genders.includes($(this).attr('data-gender'))) {
                    $(this).addClass('current');
                }
            });
        }
        $('#genders > li > a').click(function (event) {
            event.preventDefault();
            page = 1;
            if (genders.includes($(this).parent().attr('data-gender'))) {
                genders = genders.filter(gender => gender != $(this).parent().attr('data-gender'));
            } else {
                genders.push($(this).parent().attr('data-gender'));
            }
            filter();
        });

        if (urlVars['brands']) {
            brands = urlVars['brands'].split(",");
            $.each($('#brands').children(), function () {
                if (brands.includes($(this).attr('data-brand'))) {
                    $(this).addClass('current');
                }
            });
        }
        $('#brands > li > a').click(function (event) {
            event.preventDefault();
            page = 1;
            if (brands.includes($(this).parent().attr('data-brand'))) {
                brands = brands.filter(brand => brand != $(this).parent().attr('data-brand'));
            } else {
                brands.push($(this).parent().attr('data-brand'));
            }
            filter();
        });

        if (urlVars['sizes']) {
            sizes = urlVars['sizes'].split(",");
            $.each($('#sizes').children(), function () {
                if (sizes.includes($(this).attr('data-size'))) {
                    $(this).addClass('current');
                }
            });
        }
        $('#sizes > li > a').click(function (event) {
            event.preventDefault();
            page = 1;
            if (sizes.includes($(this).parent().attr('data-size'))) {
                sizes = sizes.filter(size => size != $(this).parent().attr('data-size'));
            } else {
                sizes.push($(this).parent().attr('data-size'));
            }
            filter();
        });

    });

</script>
@endsection
