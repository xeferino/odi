@extends('admin.layouts.main')

@section('title', 'Editar producto')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/dropzone/dist/min/dropzone.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/select2/dist/css/select2.min.css') }}">
<link href="{{ asset('admin/assets/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Editar producto</h4>
                    </div>
                    <form method="post" action="{{ route('admin.products.update', ['product' => $product->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Sku</label>
                                            <input type="text" name="sku" id="sku" class="form-control" value="{{old('sku') ? old('sku') : $product->sku }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Marca</label>
                                            <select name="brand_id" id="brand_id" class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" required>
                                                @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ $brand->id == $product->brand_id  ? 'selected' : '' }}> {{
                                                    $brand->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Modelo</label>
                                            <input type="text" name="model" id="model" class="form-control" value="{{old('model') ? old('model') : $product->model }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Descripción</label>
                                            <input type="text" name="description" id="description" class="form-control"
                                                value="{{old('description') ? old('description') : $product->description }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Talla</label>
                                            <input type="text" name="size" id="size" class="form-control" value="{{old('size') ? old('size') : $product->size }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Cantidad</label>
                                            <input type="number" name="quantity" id="quantity" class="form-control"
                                                step="1" value="{{old('quantity') ? old('quantity') : $product->quantity }}"
                                                required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Precio unitario</label>
                                            <input type="number" name="unit_price" id="unit_price" class="form-control"
                                                step="0.01" value="{{ old('unit_price') ? old('unit_price') : $product->unit_price }}"
                                                required>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group has-danger">
                                            <label class="control-label">Género</label>
                                            <select name="gender" id="gender" class="select2 form-control custom-select"
                                                style="width: 100%; height:36px;" required>
                                                <option value="" disabled hidden>Selecciona el género</option>
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
                                                        value="{{ $tag->id }}" name="tags[]"
                                                        {{ $product->tags->contains($tag) ? "checked" : "" }}>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Imagenes</h4>
                    </div>
                    <div class="card-body">
                        <div class="row el-element-overlay" id="product-images">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4 class="card-title">Cargar imagenes</h4>
                                <form class="dropzone dz-clickable" method="post" action="{{ route('admin.products.images.add', ['product' => $product->id]) }}"
                                    id="image-dropzone">
                                    @csrf
                                    <div class="dz-default dz-message"><span>Arrastrar las imagenes aquí</span></div>
                                </form>
                            </div>
                        </div>
                    </div>
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
<script>
    $(function () {
        $("#gender").val('{{ old('gender') ? old('gender') : $product->gender }}').trigger('change');
    });
</script>
<script id="product-images-template" type="text/x-jsrender">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1" style="height: 250px;"> <img src="[%:url%]" alt="[%:created_at%]">
                    <div class="el-overlay">
                        <ul class="list-style-none el-info">
                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link"
                                    href="[%:url%]"><i class="sl-icon-magnifier"></i></a></li>
                            <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:removeImage([%:id%])"><i
                                        class="sl-icon-trash"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="el-card-content">
                    <span class="text-muted">[%:created_at%]</span>
                </div>
            </div>
        </div>
    </div>
</script>
<!-- This Page JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsviews/1.0.0/jsrender.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsviews/1.0.0/jquery.observable.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsviews/1.0.0/jquery.views.min.js"></script>
<script src="{{ asset('admin/assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/forms/select2/select2.init.js') }}"></script>
<script src="{{ asset('admin/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/magnific-popup/meg.init.js') }}"></script>
<script>
    $.views.settings.delimiters("[%", "%]");
    var productImagesTemplate = $.templates("#product-images-template");
    var productImages = [];
    productImagesTemplate.link("#product-images", productImages);
    $(function () {
        // Now that the DOM is fully loaded, create the dropzone, and setup the
        // event listeners
        var imageDropzone = Dropzone.forElement("#image-dropzone");
        imageDropzone.on("success", function (file, response) {
            refreshImages();
        });
        refreshImages();
    });

    function refreshImages() {
        $.get("{{ route('admin.products.images.list', ['product' => $product->id]) }}").done(function (data) {
            var images = JSON.parse(data);
            $.observable(productImages).refresh(images);
            $('.image-popup-vertical-fit').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-img-mobile',
                image: {
                    verticalFit: true
                }

            });
        });
    }

    function removeImage(id) {
        $.ajax({
            url: "{{ route('admin.products.images.remove', ['productImage' => '']) }}/" + id,
            type: 'DELETE',
            data: {
                "_token": "{{ csrf_token() }}"
            }
        }).done(function (data) {
            refreshImages();
        });
    }

</script>
@endsection
