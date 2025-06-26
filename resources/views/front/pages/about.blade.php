@extends('front.layout.app')
@section('content')
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">About Us</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('front_home') }}">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="section-title position-relative mb-4 pb-2">
                        <h6 class="position-relative text-primary ps-4">About Us</h6>
                        <h2 class="mt-2">The best SEO solution with 6 years of experience</h2>
                    </div>
                    <p class="mb-4">At SEO Tech Master, we specialize in smart and scalable solutions for YouTube SEO,
                        social media growth, and digital branding. Whether you're a content creator or a business owner, we
                        help you grow faster with real strategies that work. From keyword ranking to viral content
                        strategies—we turn clicks into clients</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Award Winning</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Professional Staff</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>24/7 Support</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Fair Prices</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <a class="btn btn-outline-primary btn-square me-3" target="_blank"
                            href="https://www.facebook.com/abu.sayedkhan.501"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" target="_blank" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" target="_blank"
                            href="https://www.instagram.com/nahidislam3652/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-primary btn-square" target="_blank"
                            href="https://www.linkedin.com/in/nahid-khan-81606225a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{ asset('front-asset/img/about.jpg') }}">
                </div>
            </div>
        </div>
    </div>
@endsection
