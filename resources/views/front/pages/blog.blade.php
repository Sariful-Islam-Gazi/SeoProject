@extends('front.layout.app')
@section('content')
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">Blog</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('front_home') }}">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="row justify-content-center">
                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-4 rounded shadow-sm">
                    <h3 class="m-0">Featured Blogs</h3>
                    {{-- <a class="text-primary fw-semibold text-decoration-none" href="#">View All</a> --}}
                </div>
                <!-- Featured Blog Item 1 -->
                @foreach ($blogs as $blog)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="position-relative overflow-hidden rounded shadow-sm" style="height: 300px;">
                            <a href="{{ route('front_blog_details',[$blog->slug, 'id' => $blog->id]) }}">
                            <img class="img-fluid w-100 h-100" src="{{ asset('manual_storage/' . $blog->image) }}"
                                style="object-fit: cover;" alt="Blog Title">
                            </a>
                            <div class="position-absolute bottom-0 start-0 w-100 p-3"
                                style="background: rgba(0, 0, 0, 0.6);">
                                <div class="text-white small mb-1">
                                    <span>{{ $blog->type }}</span>
                                    <span class="px-1">/</span>
                                    <span>{{ formatDate($blog->publish_at) }}</span>
                                </div>
                                <a href="{{ route('front_blog_details', [$blog->slug, 'id' => $blog->id]) }}" class="text-white h5 mb-0 text-decoration-none">{{ $blog->title }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
