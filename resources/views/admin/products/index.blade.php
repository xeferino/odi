@extends('admin.layouts.main')

@section('title', 'Lista de productos')

@section('styles')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css"
    href="{{ asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<style>
    .dataTables_filter,
    .dataTables_info {
        display: none;
    }

</style>
@endsection

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-3"></div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group m-b-30">
                            <select class="form-control" id="imageFilter">
                                <option value="no-filter">Sin filtro de imágenes</option>
                                <option value="with-images">Con imágenes</option>
                                <option value="without-images">Sin imágenes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Buscar..." id="product-search">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button" id="product-search-btn"><i
                                        class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="products_table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>SKU</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Descripción</th>
                                <th>Talla</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>SKU</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Descripción</th>
                                <th>Talla</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
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
<!-- This Page JS -->
<script src="{{ asset('admin/assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<!--This page plugins -->
<script src="{{ asset('admin/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="{{ asset('admin/js/pages/datatable/datatable-advanced.init.js') }}"></script>

<script>
    $(document).ready(function () {
        var table = $('#products_table').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            "pageLength": 10,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "processing": true,
            "serverSide": true,
            "ajax": { 
                url: "{{ route('admin.products.data') }}",
                data: function(data) {
                    data.image_filter = $('#imageFilter').val();
                } 
            },
            "columnDefs": [{
                "targets": -1,
                "defaultContent": "",
                "width": "250px",
                "createdCell": function (td, cellData, rowData, row, col) {
                    if (rowData[8] > 0)
                        $(td).html(
                            `                       
                                <input type="checkbox" checked data-product-id="` + rowData[0] + `">
                                <button type="button" class="btn btn-info btn-warning product-edit float-left ml-2" title="Editar" data-product-id="` +
                            rowData[0] +
                            `">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <form method="post" class="float-left">
                                    {!! method_field('delete') !!}
                                    {!! csrf_field() !!}
                                    <button type="button" class="btn btn-info btn-danger product-delete ml-2" title="Eliminar" data-product-id="` +
                            rowData[0] +
                            `"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            `
                        );
                    else
                        $(td).html(
                            `                       
                                <input type="checkbox" data-product-id="` + rowData[0] + `">
                                <button type="button" class="btn btn-info btn-warning product-edit float-left ml-2" title="Editar" data-product-id="` +
                            rowData[0] +
                            `">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <form method="post" class="float-left">
                                    {!! method_field('delete') !!}
                                    {!! csrf_field() !!}
                                    <button type="button" class="btn btn-info btn-danger product-delete ml-2" title="Eliminar" data-product-id="` +
                            rowData[0] +
                            `"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            `
                        );
                    
                },
                "searchable": false,
                "orderable": false
            }, {
                "searchable": false,
                "targets": [0, 5, 6, 7]
            }],
            drawCallback: function(settings) {
                $("input[type='checkbox']").bootstrapToggle({
                    on: 'Mostrado',
                    off: 'No mostrado',
                    style: "float-left"
                });
                $("input[type='checkbox']").change(function() {
                    var $element = $(this), id = $element.attr('data-product-id');
                    verify(id, this);
                });
            }
        });

        $('#product-search').on('keyup', function (e) {
            if (e.keyCode == 13) {
                var search = $('#product-search').val();
                table.search(search).draw();
            }
        });
        $('#product-search-btn').on('click', function () {
            var search = $('#product-search').val();
            table.search(search).draw();
        });

        $('#products_table tbody').on('click', '.product-edit', function () {
            var route = "{{ route('admin.products.edit', ['product' => 'product_id']) }}";
            route = route.replace("product_id", $(this).attr('data-product-id'));
            window.open(route);
        });

        $('#products_table tbody').on('click', '.product-delete', function () {
            var form = $(this).parents('form:first');
            var route = "{{ route('admin.products.destroy', ['product' => 'product_id']) }}";
            route = route.replace("product_id", $(this).attr('data-product-id'));
            form.attr('action', route);
            form.submit();
        });

        $('#imageFilter').on('change', function () {
            table.ajax.reload();
        });

    });

    function verify(id, button) {
        $(button).bootstrapToggle('disable');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: "{{ route('admin.products.show-in-catalogue', ['product' => '']) }}/" + id,
            type: 'PUT',
            success: function (response) {
                $(button).bootstrapToggle('enable');
            },
            error: function () {
                $(button).bootstrapToggle('toggle');
                $(button).bootstrapToggle('enable');
            }
        });
    }
</script>



@endsection
