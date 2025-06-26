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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Password</a></li>
                                    <li class="breadcrumb-item active">Admin</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Password</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="update_password">
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="row gy-4">
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Old Password</label>
                                                    <input type="password" class="form-control" name="old_password"
                                                        placeholder="Password">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">New Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="New Password">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Confirm Password</label>
                                                    <input type="password" class="form-control" name="password_confirmation"
                                                        placeholder="Confirm Password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light">Update</button>
                                    </div>
                                </form>

                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
@endsection
@section('customJs')
    <script type="text/javascript">
        $(document).on('submit', '#update_password', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('admin_password_update') }}",
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
                        location.href = "{{ route('admin_logout') }}";
                    }
                }
            });
        });
    </script>
@endsection
