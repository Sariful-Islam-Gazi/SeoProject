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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Video</a></li>
                                    <li class="breadcrumb-item active">Admin</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Video</h4>
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
                                        <h4 class="header-title">Video</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-secondary" onclick="openVideoForm(this)">Add
                                            New</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="basic_datatable" class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Home</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Add Portfolio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form id="add_video" method="POST">
                        <input type="hidden" name="id">
                        <div class="form-row">
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-form-label">View In Home</label>
                                        <select class="custom-select" name="home">
                                            <option value="">Select iew In Home</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group" style="width: 100%; height:150px;">
                                    <video id="project_video" controls
                                        style="width: 100%; height:100%; object-fit: contain; display: none;">
                                        <source id="video_source" src="" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div>
                                    <input type="file" onchange="previewVideo(this)" name="video" class="form-control"
                                        style="width: 100%;" />
                                </div>
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
    <script>
        function reload_data_table(ele) {
            $(ele).DataTable().ajax.reload();
        }
        $(document).on('submit', '#add_video', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('admin_video_add') }}",
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
                        $('#videoModal').modal('hide');
                        reload_data_table("#basic_datatable");
                    }
                }
            });
        });

        function openVideoForm(edit_id = 0) {
            $("#videoModal").find(
                    "input[name='id'],input[type='text'], input[type='number'], input[type='password'], select, textarea")
                .val('');
            let $video = $("#project_video");
            let $source = $("#video_source");
            $source.attr("src", "");
            $video.hide();
            $("#videoModal").on('hidden.bs.modal', function() {
                $video[0].pause();
                $video[0].currentTime = 0;
            });
            $("#videoModal").modal('show');
            if (parseInt(edit_id) > 0) {
                $.ajax({
                    url: "{{ route('admin_video_edit') }}",
                    method: "POST",
                    data: {
                        id: edit_id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $.each(data, function(key, value) {
                            if (key == "video") {
                                let video = $("#project_video");
                                let source = $("#video_source");
                                source.attr("src", "{{ asset('manual_storage') }}/" + value);
                                video.show();
                                video[0].load();
                            } else {
                                $('#add_video [name="' + key + '"]').val(value);
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
                    url: "{{ route('admin_video_fetchAllList') }}",
                    type: "POST",
                    data: {}
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [2, 3]
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
                        url: "{{ route('admin_video_status') }}",
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

        function deleteVideo(id) {
            event.preventDefault();
            webinaFire({
                icon: "question",
                title: "Are you sure to Delete?",
                acceptButton: "Yes, Delete it!",
                cancelButton: "Cancel",
                message: "",
                accept: function() {
                    $.ajax({
                        url: "{{ route('admin_video_delete') }}",
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

        function previewVideo(input) {
            const file = input.files[0];
            if (file) {
                let $video = $('#project_video');
                let $source = $('#video_source');

                $source.attr('src', URL.createObjectURL(file));
                $video.show();
                $video[0].load();
            }
        }
    </script>
@endsection
