@extends('front.layout.app')
@section('content')
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">Project</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('front_home') }}">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Project</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Our Projects</h6>
                <h2 class="mt-2">Recently Launched Projects</h2>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="btn px-3 pe-4 active" data-filter="*">All</li>
                        <li class="btn px-3 pe-4" data-filter=".seo">SEO</li>
                        <li class="btn px-3 pe-4" data-filter=".facebook">FaceBook</li>
                        <li class="btn px-3 pe-4" data-filter=".youtube">YouTube</li>
                        <li class="btn px-3 pe-4" data-filter=".development">Development</li>
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">
                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ strtolower($portfolio->type) }} wow zoomIn"
                        data-wow-delay="0.1s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('manual_storage/' . $portfolio->image) }}"
                                alt="portfolio">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{ asset('manual_storage/' . $portfolio->image) }}"
                                    data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i
                                            class="fa fa-folder me-2"></i>{{ $portfolio->type }}</small>
                                    <p class="h5 d-block text-white mt-1 mb-0" href="">{{ $portfolio->title }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
