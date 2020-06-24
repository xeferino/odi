@extends('admin.layouts.main')

@section('title', 'Lista de vendedores')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<style>
    .dataTables_filter, .dataTables_info { display: none; }
</style>
@endsection

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Agregar vendedor</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.sellers.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" placeholder="Nombre" name="name">
                            </div>
                            <button type="submit" class="btn btn-success m-r-10">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="products_table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sellers as $seller)
                            <tr>
                                <td>{{ $seller->name }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Acciones">
                                        <form method="post" action="{{ route('admin.sellers.destroy', ['seller' => $seller]) }}">
                                            {!! method_field('delete') !!}
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-info btn-danger product-delete" title="Eliminar"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
