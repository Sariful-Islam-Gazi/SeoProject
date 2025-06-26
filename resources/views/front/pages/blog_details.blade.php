@extends('front.layout.app')
@section('content')
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">Blog Details</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('front_home') }}">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Blog Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="px-4">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="{{ asset('manual_storage/' . $blogDetails->image) }}"
                            style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mt-3 mb-2">
                                <a href="">{{ $blogDetails->type }}</a>
                                <span class="px-1">/</span>
                                <span>{{ formatDate($blogDetails->publish_at) }}</span>
                            </div>
                            <div>
                                <h3 class="mb-3">{{ $blogDetails->title }}</h3>
                                <p>{!! $blogDetails->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    {{-- <div class="bg-light mb-3" style="padding: 30px;">
                        <h3 class="mb-4">3 Comments</h3>
                        <div class="media">
                            <img src="{{ asset('front-asset/img/team-1.jpg') }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
                                    Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
                                    consetetur at sit.</p>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    {{-- <div class="bg-light mb-3" style="padding: 30px;">
                        <h3 class="mb-4">Leave a comment</h3>
                        <form>
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website">
                            </div>

                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Leave a comment"
                                    class="btn btn-primary font-weight-semi-bold py-2 px-3">
                            </div>
                        </form>
                    </div> --}}
                    <!-- Comment Form End -->
                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">
                    <!-- Popular News Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tranding</h3>
                        </div>
                        @foreach ($latestBlogs as $latestBlog)
                        <div class="d-flex mb-3">
                            <a href="{{ route('front_blog_details',[$latestBlog->slug, 'id' => $latestBlog->id]) }}">
                            <img src="{{ asset('manual_storage/' . $latestBlog->image) }}" style="width: 100px; height: 100px; object-fit: cover;">
                        </a>
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                                style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">{{ $latestBlog->type }}</a>
                                    <span class="px-1">/</span>
                                    <span>{{ formatDate($latestBlog->publish_at) }}</span>
                                </div>
                                <a class="h6 m-0" href="{{ route('front_blog_details', [$latestBlog->slug, 'id' => $latestBlog->id]) }}">{{ $latestBlog->title }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Popular News End -->
                </div>
            </div>
        </div>
    </div>
@endsection
