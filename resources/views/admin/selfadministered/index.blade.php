@extends('admin.layouts.main')

@section('title', 'Autoadministrable')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/dropzone/dist/min/dropzone.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/select2/dist/css/select2.min.css') }}">
<link href="{{ asset('admin/assets/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Imagen de inicio</h4>
                    </div>
                    <div class="card-body">
                        <div class="row el-element-overlay">
                            @foreach($sliderImages as $sliderImage)
                            <div class="col-md-3 col-sm-12">
                                <div class="card">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1" style="height: 250px;"> <img src="{{ asset($sliderImage->content) }}" alt="{{ $sliderImage->created_at }}">
                                            <div class="el-overlay">
                                                <ul class="list-style-none el-info">
                                                    <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset($sliderImage->content) }}"><i class="sl-icon-magnifier"></i></a></li>
                                                    <li class="el-item">
                                                        <form method="POST" action="{{ route('admin.selfadministered.destroy', ['selfAdministered' => $sliderImage]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-outline el-link" type="submit"><i class="sl-icon-trash"></i></button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="el-card-content">
                                            <span class="text-muted">{{ $sliderImage->created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.selfadministered.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-danger">
                                            <input type="hidden" name="type" value="slider-image">
                                            <fieldset class="form-group">
                                                <input type="file" class="form-control-file" name="content">
                                            </fieldset>
                                            <input type="hidden" name="order" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Marcas</h4>
                    </div>
                    <div class="card-body">
                        <div class="row el-element-overlay">
                            @foreach($partners as $partner)
                            <div class="col-md-3 col-sm-12">
                                <div class="card">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1" style="height: 250px;"> <img src="{{ asset($partner->content) }}" alt="{{ $partner->created_at }}">
                                            <div class="el-overlay">
                                                <ul class="list-style-none el-info">
                                                    <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset($partner->content) }}"><i class="sl-icon-magnifier"></i></a></li>
                                                    <li class="el-item">
                                                        <form method="POST" action="{{ route('admin.selfadministered.destroy', ['selfAdministered' => $partner]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-outline el-link" type="submit"><i class="sl-icon-trash"></i></button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="el-card-content">
                                            <span class="text-muted">{{ $partner->created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.selfadministered.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-danger">
                                            <input type="hidden" name="type" value="partners">
                                            <fieldset class="form-group">
                                                <input type="file" class="form-control-file" name="content">
                                            </fieldset>
                                            <input type="hidden" name="order" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Imagen de detalles de compra</h4>
                    </div>
                    <div class="card-body">
                        <div class="row el-element-overlay">
                            @if($purchaseDetailsImage)
                            <div class="col-12">
                                <div class="card">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1" style="height: 250px;"> <img src="{{ asset($purchaseDetailsImage->content) }}" alt="{{ $purchaseDetailsImage->created_at }}">
                                            <div class="el-overlay">
                                                <ul class="list-style-none el-info">
                                                    <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset($purchaseDetailsImage->content) }}"><i class="sl-icon-magnifier"></i></a></li>
                                                    <li class="el-item">
                                                        <form method="POST" action="{{ route('admin.selfadministered.destroy', ['selfAdministered' => $purchaseDetailsImage]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-outline el-link" type="submit"><i class="sl-icon-trash"></i></button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="el-card-content">
                                            <span class="text-muted">{{ $purchaseDetailsImage->created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.selfadministered.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-danger">
                                            <input type="hidden" name="type" value="purchase-details-image">
                                            <fieldset class="form-group">
                                                <input type="file" class="form-control-file" name="content">
                                            </fieldset>
                                            <input type="hidden" name="order" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Frase de ventas</h4>
                    </div>
                    <form method="POST" action="{{ route('admin.selfadministered.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-danger">
                                            <input type="hidden" name="type" value="sales-phrase">
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control-file" name="content" @if($salesPhrase) value="{{ $salesPhrase->content }}" @endif>
                                            </fieldset>
                                            <input type="hidden" name="order" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Imagen de frase de ventas</h4>
                    </div>
                    <div class="card-body">
                        <div class="row el-element-overlay">
                            @if($salesPhraseImage)
                            <div class="col-12">
                                <div class="card">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1" style="height: 250px;"> <img src="{{ asset($salesPhraseImage->content) }}" alt="{{ $salesPhraseImage->created_at }}">
                                            <div class="el-overlay">
                                                <ul class="list-style-none el-info">
                                                    <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset($salesPhraseImage->content) }}"><i class="sl-icon-magnifier"></i></a></li>
                                                    <li class="el-item">
                                                        <form method="POST" action="{{ route('admin.selfadministered.destroy', ['selfAdministered' => $salesPhraseImage]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-outline el-link" type="submit"><i class="sl-icon-trash"></i></button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="el-card-content">
                                            <span class="text-muted">{{ $salesPhraseImage->created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.selfadministered.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-danger">
                                            <input type="hidden" name="type" value="sales-phrase-image">
                                            <fieldset class="form-group">
                                                <input type="file" class="form-control-file" name="content">
                                            </fieldset>
                                            <input type="hidden" name="order" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Ofertas</h4>
                    </div>
                    <div class="card-body">
                        <div class="row el-element-overlay">
                            @foreach($offerImages as $image)
                            <div class="col-3">
                                <div class="card">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1" style="height: 250px;"> <img src="{{ asset($image->content) }}" alt="{{ $image->created_at }}">
                                            <div class="el-overlay">
                                                <ul class="list-style-none el-info">
                                                    <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset($image->content) }}"><i class="sl-icon-magnifier"></i></a></li>
                                                    <li class="el-item">
                                                        <form method="POST" action="{{ route('admin.selfadministered.destroy', ['selfAdministered' => $image]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-outline el-link" type="submit"><i class="sl-icon-trash"></i></button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="el-card-content">
                                            <span class="text-muted">{{ $image->created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.selfadministered.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-danger">
                                            <input type="hidden" name="type" value="offer-images">
                                            <fieldset class="form-group">
                                                <input type="file" class="form-control-file" name="content">
                                            </fieldset>
                                            <input type="hidden" name="order" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Promociones</h4>
                    </div>
                    <div class="card-body">
                        <div class="row el-element-overlay">
                            <div class="col-12">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover" id="products_table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($offers as $offer)
                                            <tr>
                                                <td>{{ $offer->content }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Acciones">
                                                        <form method="post" action="{{ route('admin.selfadministered.destroy', ['selfAdministered' => $offer]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-info btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Acción</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.selfadministered.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-danger">
                                            <h5>Agregar producto</h5>
                                            <input type="hidden" name="type" value="offers">
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control-file" name="content">
                                            </fieldset>
                                            <input type="hidden" name="order" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Más vendidos</h4>
                    </div>
                    <div class="card-body">
                        <div class="row el-element-overlay">
                            <div class="col-12">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover" id="products_table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bestSellers as $bestSeller)
                                            <tr>
                                                <td>{{ $bestSeller->content }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Acciones">
                                                        <form method="post" action="{{ route('admin.selfadministered.destroy', ['selfAdministered' => $bestSeller]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-info btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Acción</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.selfadministered.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-danger">
                                            <h5>Agregar producto</h5>
                                            <input type="hidden" name="type" value="best-sellers">
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control-file" name="content">
                                            </fieldset>
                                            <input type="hidden" name="order" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Recomendaciones</h4>
                    </div>
                    <div class="card-body">
                        <div class="row el-element-overlay">
                            <div class="col-12">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover" id="products_table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($recommendations as $recommendation)
                                            <tr>
                                                <td>{{ $recommendation->content }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Acciones">
                                                        <form method="post" action="{{ route('admin.selfadministered.destroy', ['selfAdministered' => $recommendation]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-info btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Acción</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.selfadministered.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-danger">
                                            <h5>Agregar producto</h5>
                                            <input type="hidden" name="type" value="recommendations">
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control-file" name="content">
                                            </fieldset>
                                            <input type="hidden" name="order" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Testimoniales</h4>
                    </div>
                    <div class="card-body">
                        <div class="row el-element-overlay">
                            <div class="col-12">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover" id="products_table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Autor</th>
                                                <th>Testimonio</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($testimonials as $testimony)
                                            <tr>
                                                <td>{{ explode("{::}", $testimony->content)[0] }}</td>
                                                <td>{{ explode("{::}", $testimony->content)[1] }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Acciones">
                                                        <form method="post" action="{{ route('admin.selfadministered.destroy', ['selfAdministered' => $testimony]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-info btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Autor</th>
                                                <th>Testimonio</th>
                                                <th>Acción</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.selfadministered.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-danger">
                                            <h5>Agregar testimonio</h5>
                                            <input type="hidden" name="type" value="testimony">
                                            <input type="hidden" name="content" value="testimony">
                                            <fieldset class="form-group">
                                                <label>Autor</label>
                                                <input type="text" class="form-control-file" name="author">
                                                <label>Testimonio</label>
                                                <input type="text" class="form-control-file" name="testimony">
                                            </fieldset>
                                            <input type="hidden" name="order" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Newsletter</h4>
                    </div>
                    <form method="POST" action="{{ route('admin.selfadministered.newsletter') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-danger">
                                            <h5>Enviar newsletter</h5>
                                            <fieldset class="form-group">
                                                <label>Asunto</label>
                                                <input type="text" class="form-control-file" name="subject">
                                                <label>PDF</label>
                                                <input type="file" class="form-control-file" name="pdf">
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Enviar</button>
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
<script src="{{ asset('admin/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/forms/select2/select2.init.js') }}"></script>
<script src="{{ asset('admin/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/magnific-popup/meg.init.js') }}"></script>
<script>
    $(function() {
        $('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
                verticalFit: true
            }

        });
    });
</script>
@endsection