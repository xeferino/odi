@extends('store.layouts.main')

@section('title', 'Carrito - Pargi')

@section('styles')
<style>
.hide_form {
    display: none;
}
</style>
@endsection

@section('content')
<div class="ps-content pt-80 pb-80">
    <div class="ps-container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                <div class="ps-post">

                    <div class="ps-post__content"><a class="ps-post__title_2">- Gracias por comprar en Pargi en línea - </a>
                    <br><p>Si necesita agregar distintas tallas del mismo modelo, por favor dé click sobre la fotografía del producto para agregar un registro más del mismo modelo. </p><br>        
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-cart-listing">
            <table class="table ps-cart__table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Talla</th>
                        <th>Descripción</th>
                        <th>Precio Unit.</th>
                        <th>Cantidad</th>
                        <th>Total</th>                        
                        <th>Pedido especial</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($order)
                    @foreach($order->order_products as $order_product)
                    <tr>
                        <td><a class="ps-product__preview"
                                href="{{ route('store.product', ['product' => $order_product->product]) }}">@if($order_product->product->images->count() > 0)<img
                                    class="mr-15" src="{{ asset($order_product->product->images->first()->url) }}"
                                    alt="{{ $order_product->product->description }}" width="64"
                                    height="64">@endif {{ $order_product->product->brand->name }}
                                {{ $order_product->product->model }}</a></td>
                        <td>
                        @if(!$order_product->is_special_order)
                        <div data-order-product-id="{{ $order_product->id }}">
                            <select class="ps-select selectpicker" id="size" onchange="changeSize({{ $order_product->id }})">
                                @foreach($order_product->similar_products() as $product_variant)
                                <option value="{{ $product_variant->id }}" @if($product_variant->id == $order_product->product->id) selected @endif>{{ $product_variant->size }}</option>
                                @endforeach
                            </select>
                        </div>
                            <div data-order-product-id="{{ $order_product->id }}" class="hide_form">
                                <input data-order-product="{{ $order_product->id }}" class="form-control" type="number" name="size" value="20" step="0.5" min="0" onkeydown="return false">
                            </div>
                        </td>
                        @else
                            <div data-order-product-id="{{ $order_product->id }}">
                                <input data-order-product="{{ $order_product->id }}" class="form-control" type="number" name="size" value="{{ $order_product->size }}" step="0.5" min="0" onkeydown="return false">
                            </div>
                        @endif
                        <td>{{ $order_product->product->description }}</td>
                        <td>@if(Auth::user()->hasRole('client')) @money($order_product->product->public_price, 'MXN')
                            @else - @endif
                        </td>
                        <td style="width: 230px">
                            @if(!$order_product->is_special_order)
                            <div data-order-product-id="{{ $order_product->id }}">
                                <div class="form-group--number">
                                    <a
                                        href="{{ route('store.cart.quantity', ['orderProduct' => $order_product, 'action' => 'SUBTRACT']) }}"><button
                                            class="minus"><span>-</span></button></a>
                                    <input class="form-control" type="text" value="{{ $order_product->quantity }}" readonly>
                                    <a
                                        href="{{ route('store.cart.quantity', ['orderProduct' => $order_product, 'action' => 'ADD']) }}"><button
                                            class="plus"><span>+</span></button></a>
                                </div>
                            </div>
                            <div data-order-product-id="{{ $order_product->id }}" class="hide_form">
                                <input data-order-product="{{ $order_product->id }}" class="form-control" type="number" name="quantity" value="0" step="1" min="0" onkeydown="return false">
                            </div>
                            @else
                            <div data-order-product-id="{{ $order_product->id }}">
                                <input data-order-product="{{ $order_product->id }}" class="form-control" type="number" name="quantity" value="{{ $order_product->quantity }}" step="1" min="0" onkeydown="return false">
                            </div>
                            @endif
                        </td>
                        <td>@if(Auth::user()->hasRole('client')) @money($order_product->public_price, 'MXN') @else -
                            @endif</td>
                        <td>
                            @if(!$order_product->is_special_order)
                            <div data-order-product-id="{{ $order_product->id }}">
                                <button onclick="specialOrder({{ $order_product->id }})" class="btn btn-danger" class="mb-5">Hacer pedido especial</button>
                            </div>
                            <div data-order-product-id="{{ $order_product->id }}" class="hide_form">
                                <button onclick="saveSpecialOrder({{ $order_product->id }})" class="btn btn-success" class="mb-5">Guardar</button>
                                <button onclick="specialOrder({{ $order_product->id }})" class="btn btn-danger" class="mb-5">Cancelar</button>
                            </div>
                            @else
                            <div data-order-product-id="{{ $order_product->id }}">
                                <button onclick="saveSpecialOrder({{ $order_product->id }})" class="btn btn-success" class="mb-5">Actualizar</button>
                            </div>
                            @endif
                        </td>
                        
                        <td>                        
                        <a href="{{ route('store.cart.remove', ['orderProduct' => $order_product]) }}">
                                <div class="ps-remove"></div>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <div class="ps-cart__actions">
                <div class="ps-cart__promotion">
                    <div class="form-group"><br><br>
                    </div>
                    <div class="form-group">
                        <a class="ps-btn ps-btn--gray" href="{{ route('store.catalogue') }}">Volver al Catálogo</a>
                    </div>
                </div>
                @if($order && count($order->order_products) > 0)
                <div class="ps-cart__total">
                    {{-- <h3>Precio Total <span>@if(Auth::user()->hasRole('client')) @money($order->public_price, 'MXN')
                            @else - @endif</span></h3><button class="ps-btn" data-toggle="modal"
                        data-target="#orderModal">Realizar
                        Pedido<i class="ps-icon-next"></i></button> --}}
                        @if(Auth::user()->hasRole('client'))
                            <h3>Sub Total <span>@money($order->public_price, 'MXN')
                            </span></h3>
                            <h3>Descuento 10%<span>@money($order->public_price*0.10, 'MXN')
                            </span></h3>
                            <h3>Precio Total <span>@money($order->public_price-($order->public_price*0.10), 'MXN')
                            </span></h3>
                        @else <h3><span> - </span></h3>@endif
                           <button 
                                class="ps-btn" 
                                data-toggle="modal"
                                data-target="#orderModal">
                                    Realizar Pedido
                                    <i class="ps-icon-next"></i>
                            </button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Confirmar pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('store.cart.order') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group form-group--inline textarea">
                    <label>Notas especiales</label>
                    <textarea class="form-control" rows="5" name="notes"
                        placeholder="Información adicional para tu pedido, por ejemplo cambio de dirección de entrega."></textarea>
                </div>
                <div class="form-group form-group--inline">
                    <label>Vendedor Pargi<span></span>
                    </label>
                    <select class="ps-select selectpicker" name="seller">
                    <option value="" selected>Ninguno</option>
                    @foreach($sellers as $seller)
                        <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Confirmar</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function changeSize(orderProduct) {
        var url = "{{ route('store.cart.size', ['orderProduct' => 'orderProduct', 'product' => 'product']) }}";
        url = url.replace("orderProduct", orderProduct);
        url = url.replace("product", $("#size").val());
        window.location.replace(url);
    }

    function specialOrder(orderProduct) {
        $("[data-order-product-id='" + orderProduct + "']").toggleClass("hide_form");
    }

    function saveSpecialOrder(orderProduct) {
        var url = "{{ route('store.cart.special', ['orderProduct' => 'orderProduct', 'size' => 'size', 'quantity' => 'quantity']) }}";
        url = url.replace("orderProduct", orderProduct);
        url = url.replace("size", $("[name='size'][data-order-product='" + orderProduct + "']").val());
        url = url.replace("quantity", $("[name='quantity'][data-order-product='" + orderProduct + "']").val());
        window.location.replace(url);
    }
</script>
@endsection
