@extends('admin.layouts.main')

@section('title', 'Orden: ' . $order->id)

@section('styles')
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Detalle de orden: {{ $order->id }}</h4>
                <div class="d-flex align-items-center">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Datos generales</h4>
                        @if($order->user->client)
                        <p>{{ $order->user->client->mobile_phone }}</p>
                        <p>{{ $order->user->name }}</p>
                        <p>{{ $order->user->client->company }}</p>
                        <p>{{ $order->user->email }}</p>
                        <p>{{ $order->user->client->address }}</p>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Productos</h4>
                        <ul class="list-unstyled m-t-40">
                            @foreach($order->order_products as $order_product)
                            <form action="{{ route('admin.orders.modify', ['orderProduct' => $order_product]) }}" method="POST">
                            @csrf
                            <li class="media my-4">
                            @if($order_product->product->images->count() > 0)<img class="m-r-15" src="{{ asset($order_product->product->images->first()->url) }}"
                                    width="60" alt="{{ $order_product->product->description }}">@endif
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="mt-0 mb-1">{{ $order_product->product->brand->name }}
                                                {{ $order_product->product->model }}</h5>
                                        </div>
                                        <div class="col-12">
                                            <h6 class="mt-0 mb-1">Talla: {{ $order_product->product->size }}</h6>
                                        </div>
                                        <div class="col-12 mb-5">
                                            {{ $order_product->product->description }}
                                        </div>
                                        <div class="col-4">
                                            <h6 class="mt-0 mb-1">Cantidad: </h6>
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="quantity"
                                                    value="{{ $order_product->quantity }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="mt-0 mb-1">Talla: </h6>
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="size" step="0.5"
                                                    value="{{ $order_product->size }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="mt-0 mb-1">Descuento: </h6>
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="discount"
                                                    value="{{ $order_product->discount }}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <h6 class="mt-0 mb-1">Total:
                                            </h6>
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    value="@money($order_product->public_price, 'MXN')" readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" type="submit"><i class="fas fa-sync-alt"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr>
                            </form>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Orden</h4>
                    </div>
                    <div class="card-body bg-light">
                        <div class="row text-center">
                            <div class="col-6 m-t-10 m-b-10">
                                <span class="label label-warning">Ultima actualización</span>
                            </div>
                            <div class="col-6 m-t-10 m-b-10">
                                {{ $order->updated_at }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="p-t-20">Vendedor</h5>
                        <span>@if($order->seller) {{ $order->seller->name }} @endif</span>
                        <br>
                        <h5 class="p-t-20">Notas</h5>
                        <span>{{ $order->notes }}</span>
                        <br>
                        <h5 class="p-t-20">Total</h5>
                        <span>@money($order->public_price-($order->public_price*0.10), 'MXN')</span>
                        <br>
                        <a alt="Aprobar" href="{{ route('admin.orders.approve', ['order' => $order]) }}" class="m-t-20 btn waves-effect waves-light btn-success">Aprobar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
