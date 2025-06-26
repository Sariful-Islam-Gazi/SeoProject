<div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-4">
                <h5 class="text-white mb-4">Get In Touch</h5>
                <p><i class="fa fa-map-marker-alt me-3"></i>1209, Dhaka, Bangladesh</p>
                <p><i class="fa fa-phone-alt me-3"></i><a href="tel:+8801748186891" class="text-white">+880 1748186891</a>
                </p>
                <p><i class="fa fa-envelope me-3"></i><a href="mailto:nafijkhan126@gmail.com"
                        class="text-white">nafijkhan126@gmail.com</a></p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" target="_blank" href=""><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank"
                        href="https://www.facebook.com/abu.sayedkhan.501"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank"
                        href="https://www.instagram.com/nahidislam3652/"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank"
                        href="https://www.linkedin.com/in/nahid-khan-81606225a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5 class="text-white mb-4">Popular Link</h5>
                <a class="btn btn-link" href="{{ route('front_about') }}">About Us</a>
                <a class="btn btn-link" href="{{ route('front_contact') }}">Contact Us</a>
                <a class="btn btn-link" href="{{ route('front_privacy_policy') }}">Privacy Policy</a>
                <a class="btn btn-link" href="{{ route('front_terms_condition') }}">Terms & Condition</a>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5 class="text-white mb-4">Project Gallery</h5>
                <div class="row g-2">
                    @foreach (getLatestPortfolioImages() as $image)
                        <div class="col-4">
                            <img src="{{ asset('manual_storage/' . $image) }}" alt="Image" style="width: 102px; height: 102px; object-fit: cover;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container px-lg-5">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="{{ route('front_home') }}">Seo Tech Master</a>, All Right
                    Reserved.
                    Designed By <a class="border-bottom" href="{{ route('front_home') }}">My Team</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ route('front_home') }}">Home</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
