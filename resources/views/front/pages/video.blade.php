@extends('front.layout.app')
@section('content')
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">Video</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('front_home') }}">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Video</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Our Video</h6>
                <h2 class="mt-2">Our Latest Video</h2>
            </div>
            <div class="row g-4">
                @foreach ($videos as $video)
                    <div class="col-md-6 col-lg-4">
                        <div class="video-card position-relative overflow-hidden rounded shadow-sm"
                            style="cursor: pointer;">
                            <div class="video-wrapper" style="position: relative; width: 100%; height: 250px;">
                                <video class="project-video" style="width: 100%; height: 100%; object-fit: cover;"
                                    controls>
                                    <source src="{{ asset('manual_storage/' . $video->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                {{-- <div class="play-button play-btn"
                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                    <img src="{{ asset('front-asset/img/play-button.png') }}" alt="Play"
                                        width="64" height="64">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
