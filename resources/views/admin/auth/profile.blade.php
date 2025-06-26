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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                                    <li class="breadcrumb-item active">Admin</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Profile</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="update_profile">
                                    <div class="form-row">
                                        <div class="col-lg-9">
                                            <div class="row gy-4">
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Name</label>
                                                    <input type="text" value="{{ auth()->user()->name }}" name="name"
                                                        class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Phone</label>
                                                    <input type="number" value="{{ auth()->user()->phone }}" name="phone"
                                                        class="form-control" placeholder="Phone">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Email</label>
                                                    <input type="email" value="{{ auth()->user()->email }}" name="email"
                                                        class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mt-3">
                                                <input type="file" name="image" data-plugins="dropify"
                                                    data-default-file="{{ auth()->user()->image ? asset('manual_storage/' . auth()->user()->image) : '' }}" />
                                                <p class="text-muted text-center mt-2 mb-0">Profile</p>
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
    <script src="{{ asset('admin-asset/libs/dropzone/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('admin-asset/libs/dropify/js/dropify.min.js') }}"></script>

    <!-- Init js-->
    <script src="{{ asset('admin-asset/js/pages/form-fileuploads.init.js') }}"></script>
    <script>
        $(document).on('submit', '#update_profile', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('admin_profile_update') }}",
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.type == 'success') {
                        webinaToast({
                            type: data.type,
                            message: data.text
                        });
                        location.reload();
                    }
                }
            });
        });
    </script>
@endsection
