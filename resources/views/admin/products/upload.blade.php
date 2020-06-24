@extends('admin.layouts.main')

@section('title', 'Cargar productos')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/dropzone/dist/min/dropzone.min.css') }}">
@endsection

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Archivo CSV</h4>
                        <h6 class="card-subtitle">Seleccionar archivo csv para cargar</h6>
                        <form action="{{ route('admin.products.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="form-group">
                                <input type="file" class="form-control-file" id="exampleInputFile" name="csv">
                            </fieldset>
                            <div class="action-form">
                                <div class="form-group m-b-0 text-left">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Cargar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            @if (isset($products))
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Revisión de productos</h4>
                        <h6 class="card-subtitle">Productos cargados</h6>
                        <div class="float-right mb-3">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Aceptar</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Marca</th>
                                        <th scope="col">Modelo</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Talla</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio Unitario</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product['count'] }}</th>
                                        <td>{{ $product['brand'] }}</td>
                                        <td>{{ $product['model'] }}</td>
                                        <td>{{ $product['description'] }}</td>
                                        <td>{{ $product['size'] }}</td>
                                        <td>{{ $product['quantity'] }}</td>
                                        <td>{{ $product['unit_price'] }}</td>
                                        <td>{{ $product['total'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Aceptar</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if (isset($products_with_errors))
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Productos con errores</h4>
                        <h6 class="card-subtitle">Productos no cargados</h6>
                        <div class="float-right mb-3">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Aceptar</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SKU</th>
                                        <th scope="col">Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products_with_errors as $product)
                                    <tr>
                                        <th scope="row">{{ $product['sku'] }}</th>
                                        <th scope="row">{{ $product['details'] }}</th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Aceptar</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('customizer')

@endsection

@section('scripts')
<!-- This Page JS -->
<script src="{{ asset('admin/assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
@endsection
