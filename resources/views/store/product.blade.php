@extends('store.layouts.main')

@section('title', 'Catálogo - Pargi')

@section('styles')
@endsection

@section('content')
<div class="test">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
            </div>
        </div>
    </div>
</div>
<div class="ps-product--detail pt-60">
    <div class="ps-container">
        <div class="row">
            <div class="col-lg-10 col-md-12 col-lg-offset-1 mb-50">
                <div class="ps-product__thumbnail">
                    <div class="ps-product__preview">
                        <div class="ps-product__variants">
                            @foreach($product->images as $image)
                            <div class="item"><img src="{{ asset($image->url) }}" alt="{{ $product->description }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="ps-product__image">
                        @foreach($product->images as $image)
                        <div class="item"><img class="zoom" src="{{ asset($image->url) }}"
                                alt="{{ $product->description }}" data-zoom-image="{{ asset($image->url) }}"></div>
                        @endforeach
                    </div>
                </div>
                <div class="ps-product__thumbnail--mobile">
                    <div class="ps-product__main-img">@if($product->images->first())<img src="{{ asset($product->images->first()->url) }}"
                            alt="{{ $product->description }}">@endif</div>
                    <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true"
                        data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false"
                        data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3"
                        data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
                        @foreach($product->images as $image)
                        <img src="{{ asset($image->url) }}" alt="{{ $product->description }}">
                        @endforeach
                    </div>
                </div>
                <div class="ps-product__info">
                <div class="ps-product__block ps-product__size">
                  <h4>Tallas</h4>
                  <select class="ps-select selectpicker" id="size">
                    @foreach($products as $product_variant)
                    <option value="{{ $product_variant->id }}" {{ $product->id == $product_variant->id ? 'selected' : ''}}>{{ $product_variant->size }}</option>
                    @endforeach
                  </select>
                </div>
                    <h1>{{ $product->brand->name }} - {{ $product->model }}</h1>
                    <p class="ps-product__category">
                        @foreach($product->tags as $tag)
                        #{{ $tag->name }},
                        @endforeach
                    </p>
                    @if(Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('client')))
                    <h3 class="ps-product__price">@money($product->public_price, 'MXN')</h3>
                    @endif
                    <div class="ps-product__block ps-product__quickview">
                        <h4>Descripción</h4>
                        <p>{{ $product->description }} {{ $product->size }}</p>
                    </div>
                    <div class="ps-product__shopping"><a class="ps-btn mb-10" id="order"
                            href="{{ route('store.cart.add', ['product' => $products->first()]) }}">Agregar al carrito<i
                                class="ps-icon-next"></i></a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
                <div class="ps-container">
                    <div class="ps-section__header mb-50">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                                <h3 class="ps-section__title" data-mask="Relacionados">- TE PUEDE INTERESAR</h3>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                                <div class="ps-owl-actions"><a class="ps-prev" href="#"><i
                                            class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Sig<i
                                            class="ps-icon-arrow-left"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-section__content">
                        <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true"
                            data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false"
                            data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3"
                            data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                            @foreach($similary_products as $product)
                            <div class="ps-shoes--carousel">
                                <div class="ps-shoe">
                                    <div class="ps-shoe__thumbnail">
                                        @if($product->images()->count() > 0)<img
                                            src="{{ asset($product->images->first()->url) }}"
                                            alt="{{ $product->description }}">@endif
                                        <a class="ps-shoe__overlay"
                                            href="{{ route('store.product', ['product' => $product]) }}"></a>
                                    </div>
                                    <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                            <div class="ps-shoe__variant normal">
                                                @foreach($product->images as $image)
                                                <img src="{{ asset($image->url) }}" alt="{{ $product->description }}">
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="ps-shoe__detail"><a class="ps-shoe__name"
                                                href="{{ route('store.product', ['product' => $product]) }}" style="text-transform: capitalize;">{{ $product->brand->name }}
                                                - {{ $product->model }}</a>
                                            <p class="ps-shoe__categories"><b>{{ $product->description }}</b></p>
                                            <p class="ps-shoe__categories"><b>{{ $product->size }}</b></p>
                                            <p class="ps-shoe__categories">
                                                @foreach($product->tags as $tag)
                                                #{{ $tag->name }},
                                                @endforeach
                                            </p>
                                            @if(Auth::check() && (Auth::user()->hasRole('admin') ||
                                            Auth::user()->hasRole('client')))
                                            <span class="ps-shoe__price">@money($more_expensive_product->public_price, 'MXN')</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $("#size").on('change', function() {
        location.replace("{{ route('store.product', ['product' => '']) }}/" + this.value);
    });
})
</script>
@endsection
