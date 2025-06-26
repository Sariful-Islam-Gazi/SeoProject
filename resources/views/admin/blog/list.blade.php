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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                                    <li class="breadcrumb-item active">Admin</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Blog</h4>
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
                                        <h4 class="header-title">Blog</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-secondary" onclick="openBlogForm(this)">Add New</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="basic_datatable" class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Type</th>
                                                <th>Title</th>
                                                <th>Publish Date</th>
                                                <th>Description</th>
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
    <div class="modal fade" id="blogModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Add Blog</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="add_blog">
                        <input type="hidden" name="id">
                        <div class="form-row">
                            <div class="col-lg-9">
                                <div class="row gy-3">
                                    <div class="form-group col-md-12">
                                        <label class="col-form-label">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="title">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label">Type</label>
                                        <select class="custom-select" name="type">
                                            <option value="">Select Type</option>
                                            <option value="SEO">SEO</option>
                                            <option value="YouTube">YouTube</option>
                                            <option value="FaceBook">FaceBook</option>
                                            <option value="Development">Development</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label">Date</label>
                                        <input type="date" name="publish_at" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group" style="width: 100%; height:150px;">
                                    <img id="blog_image" src="" class="img-thumbnail"
                                        style="width: 100%; height:100%; object-fit: contain;">
                                </div>
                                <div>
                                    <input
                                        type="file"onchange="document.querySelector('#blog_image').src=window.URL.createObjectURL(this.files[0])"
                                        name="image" class="form-control" style="width: 100%;" />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="summernote"></textarea>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-secondary waves-effect" class="close"
                                data-dismiss="modal" aria-hidden="true">Cancel</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customJs')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script>
        function reload_data_table(ele) {
            $(ele).DataTable().ajax.reload();
        }
        $('#summernote').summernote({
            placeholder: 'Description',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['fullscreen']]
            ]
        });
        $(document).on('submit', '#add_blog', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('admin_blog_addEdit') }}",
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                processData: false,
                success: function(data) {
                    webinaToast({
                        type: data.type,
                        message: data.text
                    });
                    if (data.type == 'success') {
                        $('#blogModal').modal('hide');
                        reload_data_table("#basic_datatable");
                    }
                }
            });
        });

        function openBlogForm(edit_id = 0) {
            $("#testimonialModal").find(
                    "input[name='id'],input[type='text'], input[type='number'], input[type='password'], select, textarea")
                .val('');
            $("#blog_image").attr("src", "");
            $('#summernote').summernote('code', '');
            $("#blogModal").modal('show');
            if (parseInt(edit_id) > 0) {
                $.ajax({
                    url: "{{ route('admin_blog_edit') }}",
                    method: "POST",
                    data: {
                        id: edit_id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $.each(data, function(key, value) {
                            if (key == "image") {
                                $("#blog_image").attr("src", "{{ asset('manual_storage/') }}/" +
                                    value);
                            } else if (key == "description") {
                                $('#summernote').summernote('code', value);
                            } else {
                                $('#add_blog [name="' + key + '"]').val(value);
                            }
                        });
                    }
                });
            }
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
                    url: "{{ route('admin_blog_fetchAllList') }}",
                    type: "POST",
                    data: {}
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0, 4, 5]
                }, ],
                "order": [
                    [0, 'asc']
                ],
            });
        }
        $(document).ready(function(e) {
            lolad_datatable();
        });

        function updateStatus(id) {
            event.preventDefault();
            webinaFire({
                icon: "question",
                title: "Are you sure to change status?",
                acceptButton: "Yes, change it!",
                cancelButton: "Cancel",
                message: "",
                accept: function() {
                    if ($("#" + id + "_status").is(":checked")) {
                        var status = 0;
                    } else {
                        var status = 1;
                    }
                    $.ajax({
                        url: "{{ route('admin_blog_status') }}",
                        method: 'POST',
                        data: {
                            id: id,
                            status: status
                        },
                        dataType: 'JSON',
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

        function deleteBlog(id) {
            event.preventDefault();
            webinaFire({
                icon: "question",
                title: "Are you sure to Delete?",
                acceptButton: "Yes, Delete it!",
                cancelButton: "Cancel",
                message: "",
                accept: function() {
                    $.ajax({
                        url: "{{ route('admin_blog_delete') }}",
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
