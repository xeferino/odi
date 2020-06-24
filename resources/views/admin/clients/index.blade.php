@extends('admin.layouts.main')

@section('title', 'Lista de clientes')

@section('styles')
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
                    <div class="col-3"></div>
                    <div class="col-md-3 col-sm-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Buscar..." id="search">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button" id="search-btn"><i
                                        class="ti-search"></i></button>
                            </div>
                        </div>
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
                                <th>Zapatería</th>
                                <th>Dirección</th>
                                <th>Correo electrónico</th>
                                <th>Celular</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Acción</th>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Zapatería</th>
                                <th>Dirección</th>
                                <th>Correo electrónico</th>
                                <th>Celular</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de que desea eliminar el cliente? (Se eliminarán todas las ordenes asociadas a dicho cliente)</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger waves-effect waves-light" onclick="eraseClient()">Eliminar</button>
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
    var currentUser;
    var loading = false;
    $(document).ready(function () {
        table = $('#table').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.clients.datatables') }}"
            },
            columns: [{
                    data: null
                },
                {
                    data: 'id'
                },
                {
                    data: 'user.name'
                },
                {
                    data: 'company'
                },
                {
                    data: 'address'
                },
                {
                    data: 'user.email'
                },
                {
                    data: 'mobile_phone'
                }
            ],
            columnDefs: [{
                targets: 0,
                defaultContent: "",
                createdCell: function (td, cellData, rowData, row, col) {
                    var tdContent =
                        `
                        <div class="btn-group" role="group" aria-label="Acciones">
                        `;
                    if (rowData['is_approved']) {
                        tdContent +=
                            `
                            <button type="button" class="btn btn-info btn-success" title="Aprobar" disabled>
                                <i class="fas fa-check"></i>
                            </button>
                        `;
                    } else {
                        tdContent +=
                            `
                            <button type="button" class="btn btn-info btn-success" title="Aprobar" onclick="approveClient('` +
                            rowData['user']['username'] + `')">
                                <i class="fas fa-check"></i>
                            </button>
                        `;
                    }
                    tdContent +=
                        `
                            <button type="button" class="btn btn-info btn-success" title="Borrar" onclick="confirmEraseClient('` +
                        rowData['user']['username'] + `')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        `;
                    $(td).prepend(tdContent);
                },
                searchable: false,
                orderable: false
            }],
            order: [
                [1, "desc"]
            ]
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

    function approveClient(username) {
        $.ajax({
            url: "{{ route('admin.clients.approve', ['username' => '']) }}/" + username,
            data: {
                "_token": "{{ csrf_token() }}",
            },
            type: "PUT"
        }).done(function () {
            table.ajax.reload();
        });
    }

    function confirmEraseClient(username) {
        $("#delete-modal").modal('show');
        currentUser = username;
    }

    function eraseClient() {
        if(loading)
            return;
        loading = true;
        $.ajax({
            url: "{{ route('admin.clients.erase', ['username' => '']) }}/" + currentUser,
            data: {
                "_token": "{{ csrf_token() }}",
            },
            type: "DELETE"
        }).done(function () {
            table.ajax.reload();
            $("#delete-modal").modal('hide');
            loading = false;
            currentUser = "";
        });
    }

</script>



@endsection
