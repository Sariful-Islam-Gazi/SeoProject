<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ isset($pageTitle) ? $pageTitle : 'Login | Seo Tech Master' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Sariful Islam Gazi" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin-asset/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('admin-asset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ asset('admin-asset/css/app.min.css') }}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="{{ asset('admin-asset/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled />
    <link href="{{ asset('admin-asset/css/app-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="{{ asset('admin-asset/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('wt_assets/wt_alert.css') }}">

</head>

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">
                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <span class="logo-lg-text-light text-black fs-10 fw-bold">Seo Tech Master</span>
                                </div>
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin
                                    panel.</p>
                            </div>

                            <form id="login_form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Email address</label>
                                    <input class="form-control" type="email" name="email" required="true"
                                        placeholder="Enter your email">
                                </div>

                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Enter your password">
                                        <div class="input-group-append" data-password="false">
                                            <div class="input-group-text">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin"
                                            checked>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor js -->
    <script src="{{ asset('admin-asset/js/vendor.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('admin-asset/js/app.min.js') }}"></script>
    <script src="{{ asset('wt_assets/wt_alert.js') }}"></script>
    <script type="text/javascript">
        $(document).on('submit', '#login_form', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('admin_loginAction') }}",
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
                        location.href = "{{ route('admin_dashboard') }}";
                    }
                }
            });
        });
    </script>
</body>

</html>
