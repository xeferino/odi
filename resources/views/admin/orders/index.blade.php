@extends('admin.layouts.main')

@section('title', 'Lista de ordenes')

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
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-3"></div>
                    <div class="col-3"></div>
                    <div class="col-md-3 col-sm-12">
                    <!--
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Buscar..." id="search">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button" id="search-btn"><i class="ti-search"></i></button>
                            </div>
                        </div>
                        
                    -->
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Acción</th>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                                <th>Total</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Acción</th>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                                <th>Total</th>
                                <th>Estado</th>
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

<script>
    var table;
    $(document).ready(function () {
        table = $('#table').DataTable({
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: false,
            info: true,
            autoWidth: false,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.orders.datatables') }}"
            },
            columns: [                
                {
                    data: null
                },
                {
                    data: 'id'
                },
                {
                    data: 'user.name'
                },
                {
                    data: 'user.email'
                },
                {
                    data: 'public_price',
                    render: function (data, type, row, meta) {
                        return (data / 100).toLocaleString('es-MX', {
                            style: 'currency',
                            currency: 'MXN'
                        });
                    }
                },
                {
                    data: null
                }
            ],
            columnDefs: [
                {
                    targets: 0,
                    defaultContent: "",
                    createdCell: function (td, cellData, rowData, row, col) {
                        var tdContent =
                                `
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <a class="btn btn-info" alt="Ver" style="color:white" href="{{ route('admin.orders.show', ['order' => '']) }}/` + rowData['id'] + `">
                                    <i class="fas fa-clipboard-list"></i>
                                </a>
                            </div>
                        `;
                        $(td).prepend(tdContent);
                    },
                    searchable: false,
                    orderable: false
                },
                {
                    targets: 5,
                    defaultContent: "",
                    createdCell: function (td, cellData, rowData, row, col) {
                        if(rowData['confirmed'] == true)
                            $(td).prepend("Aprobada");
                        else
                            $(td).prepend("Revisar");
                    },
                    searchable: false,
                    orderable: false
                }
            ],
            order: [[ 1, "desc" ]]
        });

        $('#search').on('keyup', function (e) {
            if (e.keyCode == 13) {
                var search = $('#search').val();
                table.search(search).draw();
            }
        });
        $('#search-btn').on('click', function () {
            var search = $('#search').val();
            table.search(search).draw();
        });
    });

</script>



@endsection
