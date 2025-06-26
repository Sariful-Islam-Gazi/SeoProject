<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ route('front_home') }}" class="navbar-brand p-0">
            <h1 class="m-0"><i class="fa fa-search me-2"></i>Seo<span class="fs-5">Tech Master</span></h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('front_home') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('front_portfolio') }}" class="nav-item nav-link">Portfolio</a>
                <a href="{{ route('front_video') }}" class="nav-item nav-link">Videos</a>
                <a href="{{ route('front_blog') }}" class="nav-item nav-link">Blog</a>
                <a href="{{ route('front_about') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('front_contact') }}" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>

</div>