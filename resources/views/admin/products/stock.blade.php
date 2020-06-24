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
                <h2>Fiscal</h2>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Archivo XLS</h4>
                        <h6 class="card-subtitle">Seleccionar archivo xls para cargar</h6>
                        <form action="{{ route('admin.products.stock') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="form-group">
                                <input type="file" class="form-control-file" id="exampleInputFile" name="xls">
                                <input type="hidden" name="tipo" value="fiscal">
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
            <div class="col-12">
                <h2>Interno</h2>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Archivo XLS</h4>
                        <h6 class="card-subtitle">Seleccionar archivo xls para cargar</h6>
                        <form action="{{ route('admin.products.stock') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="form-group">
                                <input type="file" class="form-control-file" id="exampleInputFile" name="xls">
                                <input type="hidden" name="tipo" value="interno">
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
            
            
            <!--- A PARTIR DE AQUÍ NO SÉ QUE PASA PERO EL DISEÑO ES COMO LO PONGO EN LAS LÍNEAS ANTERIORES--->
            
            @if (isset($products))
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Revisión de productos</h4>
                        <h6 class="card-subtitle">Productos no cargados, porfavor cargar manualmente</h6>
                        <div class="float-right mb-3">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Aceptar</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Clave</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Existencia</th>
                                        <th scope="col">Costo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product[0] }}</td>
                                        <td>{{ $product[1] }}</td>
                                        <td>{{ $product[2] }}</td>
                                        <td>${{ $product[3] }}</td>
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
