@extends('admin.layout.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Contact</a></li>
                                    <li class="breadcrumb-item active">Admin</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Contact</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <h4 class="header-title">Contact</h4>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="basic_datatable" class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customJs')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script>
        function reload_data_table(ele) {
            $(ele).DataTable().ajax.reload();
        }

        function lolad_datatable() {
            $('#basic_datatable').DataTable({
                "pageLength": 10,
                "lengthMenu": [10, 20, 50, 100, 200],
                "language": {
                    "lengthMenu": '_MENU_',
                    "sSearch": "",
                    "searchPlaceholder": "Search records"
                },
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: "{{ route('admin_contact_fetchAllList') }}",
                    type: "POST",
                    data: {}
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [3, 4, 5]
                }, ],
                "order": [
                    [0, 'asc']
                ],
            });
        }
        $(document).ready(function(e) {
            lolad_datatable();
        });

        function deleteContact(id) {
            event.preventDefault();
            webinaFire({
                icon: "question",
                title: "Are you sure to Delete?",
                acceptButton: "Yes, Delete it!",
                cancelButton: "Cancel",
                message: "",
                accept: function() {
                    $.ajax({
                        url: "{{ route('admin_contact_delete') }}",
                        type: 'delete',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(data) {
                            webinaToast({
                                type: data.type,
                                message: data.text
                            });
                            if (data.type == 'success') {
                                reload_data_table("#basic_datatable");
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
