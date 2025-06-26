<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ isset($pageTitle) ? $pageTitle : 'Home | Seo Tech Master' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('front.layout.link')
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <div id="ajax_spinner"
            class="position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center d-none">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        @include('front.layout.navbar')
        <!-- Navbar End -->

        @yield('content')

        <!-- Footer Start -->
        @include('front.layout.footer')
        <!-- Footer End -->
        <div class="floating-buttons">
            <a href="https://wa.me/+8801748186891" target="_blank" class="whatsapp-btn">
                <i class="fab fa-whatsapp"></i>
            </a>
        </div>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i
                class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front-asset/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('front-asset/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front-asset/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('front-asset/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front-asset/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('front-asset/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front-asset/js/main.js') }}"></script>
    <script src="{{ asset('wt_assets/wt_alert.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/681d722b917ab9190b6a30ba/1iqpgbv6d';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    @yield('customJs')
</body>

</html>
