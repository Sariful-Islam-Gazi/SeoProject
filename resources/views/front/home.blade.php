@extends('front.layout.app')
@section('content')
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="text-white mb-4 animated zoomIn">Grow Your Brand with Expert YouTube & Social Media SEO
                        Services</h1>
                    <p class="text-white pb-3 animated zoomIn">Elevate your brand with our expert-led strategies in YouTube
                        SEO, Instagram growth, Facebook advertising, and content optimization. We drive real results through
                        data-driven planning, platform-specific insights, and powerful digital branding solutions.</p>
                    <a href="{{ route('front_contact') }}"
                        class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact
                        Us</a>
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid" src="{{ asset('front-asset/img/hero.png') }}" alt="user">
                </div>
            </div>
        </div>
    </div>
    <!-- About Start -->
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
                        <a class="btn btn-primary rounded-pill px-4 me-3" href="{{ route('front_about') }}">Read More</a>
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
    <!-- About End -->
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Our Services</h6>
                <h2 class="mt-2">What Solutions We Provide</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                        <div class="service-icon flex-shrink-0">
                            <i class="fa fa-search fa-2x"></i>
                        </div>
                        <h5 class="mb-3">SEO Optimization</h5>
                        <p>Boost your online visibility and drive targeted traffic with proven SEO strategies tailored for
                            long-term success.</p>
                        {{-- <a class="btn px-3 mt-auto mx-auto" href="">Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                        <div class="service-icon flex-shrink-0">
                            <i class="fa fa-laptop-code fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Web Design</h5>
                        <p>Create stunning, responsive, and user-friendly websites that elevate your brand and engage your
                            audience effectively.</p>
                        {{-- <a class="btn px-3 mt-auto mx-auto" href="">Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                        <div class="service-icon flex-shrink-0">
                            <i class="fa fa-share-alt fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Social Media Marketing</h5>
                        <p>Enhance your brand presence, engage your audience, and drive results through targeted campaigns
                            across all major social platforms.</p>
                        {{-- <a class="btn px-3 mt-auto mx-auto" href="">Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                        <div class="service-icon flex-shrink-0">
                            <i class="fa fa-bullhorn fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Advertising</h5>
                        <p>Reach your ideal customers with high-impact advertising strategies that drive conversions and
                            boost brand visibility.</p>
                        {{-- <a class="btn px-3 mt-auto mx-auto" href="">Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                        <div class="service-icon flex-shrink-0">
                            <i class="fa fa-mobile-alt fa-2x"></i>
                        </div>
                        <h5 class="mb-3">App Development</h5>
                        <p>Design and develop high-performance mobile apps tailored to your business needs, ensuring
                            seamless user experience and functionality.</p>
                        {{-- <a class="btn px-3 mt-auto mx-auto" href="">Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
    <!-- Portfolio Start -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Our Projects</h6>
                <h2 class="mt-2">Recent Projects</h2>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="btn px-3 pe-4 active" data-filter="*">All</li>
                        <li class="btn px-3 pe-4" data-filter=".seo">SEO</li>
                        <li class="btn px-3 pe-4" data-filter=".facebook">FaceBook</li>
                        <li class="btn px-3 pe-4" data-filter=".youtube">YouTube Seo</li>
                        <li class="btn px-3 pe-4" data-filter=".development">Development</li>
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">
                @foreach ($portfolios as $type => $items)
                    @foreach ($items as $portfolio)
                        <div class="col-lg-4 col-md-6 portfolio-item {{ strtolower($portfolio->type) }} wow zoomIn"
                            data-wow-delay="0.1s">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('manual_storage/' . $portfolio->image) }}"
                                    alt="portfolio">
                                <div class="portfolio-overlay">
                                    <a class="btn btn-light" href="{{ asset('manual_storage/' . $portfolio->image) }}"
                                        data-lightbox="portfolio"><i class="fa fa-eye fa-2x text-white"></i></a>
                                    <div class="mt-auto">
                                        <small class="text-white"><i
                                                class="fa fa-folder me-2"></i>{{ $portfolio->type }}</small>
                                        <p class="h5 d-block text-white mt-1 mb-0" href="">{{ $portfolio->title }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <!-- Portfolio End -->
    <!-- Video Start -->
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
                                <video class="project-video" style="width: 100%; height: 100%; object-fit: contain;"
                                    controls controlsList="nodownload">
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
    <!-- Video End -->
    <!-- Blog Start -->
    <div class="container-xxl">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Our Blog</h6>
                <h2 class="mt-2">Our Latest Blogs</h2>
            </div>
            <div class="row g-4">
                @foreach ($blogs as $blog)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="position-relative overflow-hidden rounded shadow-sm" style="height: 300px;">
                            <a href="{{ route('front_blog_details', [$blog->slug, 'id' => $blog->id]) }}">
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
                                <a href="{{ route('front_blog_details', [$blog->slug, 'id' => $blog->id]) }}"
                                    class="text-white h5 mb-0 text-decoration-none">{{ $blog->title }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog End -->
    <!-- Review Start -->
    <div class="container-xxl bg-primary my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form id="add_review" method="post">
                    <div class="section-heading text-center mb-5">
                        <h6 class="text-white">Review</h6>
                        <h2 class="text-white">Share Your <span>Review</span> & <em>Tell</em> Us About Your Experience</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <input type="text" name="name" placeholder="Name" autocomplete="on"
                                    class="form-control">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <input type="text" name="designation" placeholder="Designation" autocomplete="on"
                                    class="form-control">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <select class="custom-select" name="country" class="form-control">
                                    <option value="">-- Select Country --</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Eswatini">Eswatini</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Micronesia">Micronesia</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montenegro">Montenegro</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Namibia">Namibia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherlands">Netherlands</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="North Korea">North Korea</option>
                                    <option value="North Macedonia">North Macedonia</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau">Palau</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia">Saint Lucia</option>
                                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the
                                        Grenadines</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="South Korea">South Korea</option>
                                    <option value="South Sudan">South Sudan</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City">Vatican City</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <select class="custom-select" name="rating" class="form-control">
                                    <option value="">-- Select Rating --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <input type="file" name="image" class="form-control">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <textarea name="description" placeholder="Comments" class="form-control"></textarea>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" class="btn btn-primary w-100 form-submit">Send Now</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Review End -->
    <!-- Testimonial Start -->
    <div class="container-xxl bg-primary testimonial my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 px-lg-5">
            <div class="owl-carousel testimonial-carousel">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-item bg-transparent border rounded text-white p-4">
                        <i class="fa fa-quote-left fa-2x mb-3"></i>
                        <p style="overflow: hidden; text-overflow: ellipsis; text-align: justify;">
                            {{ Str::limit(strip_tags($testimonial->description), 200, '...') }}</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle"
                                src="{{ $testimonial->image ? asset('manual_storage/' . $testimonial->image) : asset('front-asset/img/testimonial-1.jpg') }}"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h6 class="text-white mb-1">{{ $testimonial->name }}
                                    @if ($testimonial->country)
                                        ({{ $testimonial->country }})
                                    @endif
                                </h6>
                                <small>{{ $testimonial->designation }}</small>
                                <div class="mt-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i
                                            class="fa fa-star{{ $testimonial->rating >= $i ? '' : '-o' }} text-warning"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
@section('customJs')
    <script>
        $(document).on('submit', '#add_review', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('front_add_review') }}",
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
                        $('#add_review')[0].reset();
                    }
                }
            });
        });
        // $(document).ready(function() {
        //     $('.play-btn').click(function(e) {
        //         e.stopPropagation();
        //         var video = $(this).closest('.video-card').find('video').get(0);
        //         var playButton = $(this);

        //         video.setAttribute('controls', 'true');
        //         video.play();

        //         playButton.hide();
        //     });

        //     // $('.project-video').on('click', function(e) {
        //     //     e.stopPropagation();
        //     //     var video = this;
        //     //     var playButton = $(this).siblings('.play-btn');

        //     //     // if (video.paused) {
        //     //     //     video.pause();
        //     //     //     playButton.show();
        //     //     // } else {
        //     //     //     video.play();
        //     //     //     playButton.hide();
        //     //     // }
        //     //     if (video.paused) {
        //     //         video.play();
        //     //         playButton.hide();
        //     //     } else {
        //     //         video.pause();
        //     //         playButton.show();
        //     //     }

        //     // });

        //     $('.project-video').on('ended', function() {
        //         $(this).siblings('.play-btn').show();
        //     });

        //     $('.project-video').each(function() {
        //         var video = this;

        //         video.onplay = function() {
        //             $(video).siblings('.play-btn').hide();
        //         };

        //         video.onpause = function() {
        //             $(video).siblings('.play-btn').show();
        //         };
        //     });
        // });
        $(document).ready(function() {
            $('video').on('play', function() {
                $('video').not(this).each(function() {
                    this.pause();
                });
            });
        });
    </script>
@endsection
