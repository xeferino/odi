@extends('admin.layouts.main')
@section('title', 'Estadísticas de los productos')
@section('styles')
<link rel="stylesheet" type="text/css"
    href="{{ asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/select2/dist/css/select2.min.css') }}">
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
            <div class="col-6">
                <div class="button-group">
                    <button type="button" class="btn waves-effect waves-light btn-success" id="export">Excel</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SKU</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
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
<script src="{{ asset('admin/js/pages/datatable/datatable-advanced.init.js') }}"></script>
<script src="{{ asset('admin/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/select2/dist/js/select2.min.js') }}"></script>
<script>
    var table;
    $(document).ready(function () {
        $("#seller").select2();
        table = $('#table').DataTable({
            buttons: [{
                extend: 'excelHtml5',
                title: "",
                footer: true
            }, ],
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: false,
            info: true,
            autoWidth: false,
            pageLength: 30,
            language: {
                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.stats.products.data') }}",
            },
            columns: [
                {
                    data: 'sku',
                },
                {
                    data: 'name',
                },
                {
                    data: 'model',
                },
                {
                    data: 'description',
                },
                {
                    data: 'total_items',
                },
            ],
            footerCallback: function (row, data, start, end, display) {
                var api = this.api(),
                    data;
                var total_items = api
                    .column(1)
                    .data()
                    .reduce(function (a, b) {
                        return parseFloat(a) + parseFloat(b);
                    }, 0);
                $(api.column(0).footer()).html('Total');
                $(api.column(1).footer()).html(total_items);
            }
        });
        $("#export").on("click", function() {
            table.button('.buttons-excel').trigger();
        });
        $('.dt-buttons').hide();
    });

</script>
@endsection
