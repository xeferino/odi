@extends('admin.layouts.main')

@section('title', 'Crear producto')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/dropzone/dist/min/dropzone.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/select2/dist/css/select2.min.css') }}">

@endsection

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Nuevo producto</h4>
                    </div>
                    <form action="{{ route('admin.products.store') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Sku</label>
                                            <input type="text" name="sku" id="sku" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Marca</label>
                                            <select name="brand_id" id="brand_id" class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" required>
                                                <option value="" selected disabled hidden>Selecciona la marca</option>
                                                @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}"> {{ $brand->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Modelo</label>
                                            <input type="text" name="model" id="model" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Descripción</label>
                                            <input type="text" name="description" id="description" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Talla</label>
                                            <input type="text" name="size" id="size" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Cantidad</label>
                                            <input type="number" name="quantity" id="quantity" class="form-control"
                                                step="1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Precio unitario</label>
                                            <input type="number" name="unit_price" id="unit_price" class="form-control"
                                                step="0.01" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Género</label>
                                            <select name="gender" id="gender" class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" required>
                                                <option value="" selected disabled hidden>Selecciona el género</option>
                                                <option value="DAMA">Dama</option>
                                                <option value="CABALLERO">Caballero</option>
                                                <option value="NINO">Niño</option>
                                                <option value="NINA">Niña</option>
                                                <option value="UNISEX">Unisex</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label">Categorías</label>
                                        <div class="row">
                                            @foreach($tags as $tag)
                                            <div class="col-md-4 col-sm-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="tag-{{ $tag->id }}"
                                                        value="{{ $tag->id }}" name="tags[]">
                                                    <label class="custom-control-label" for="tag-{{ $tag->id }}">{{
                                                        $tag->name }}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection

@section('scripts')
<!-- This Page JS -->
<script src="{{ asset('admin/assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/forms/select2/select2.init.js') }}"></script>

@endsection
