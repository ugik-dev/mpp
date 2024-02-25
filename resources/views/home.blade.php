@extends('homeLayout/index')
@section('content')
    <!--header-->
    <div class="page-wrapper">
        @include('landingPage.hero')
        <section class="department-section">
            <div class="container">
                <div class="department-section-inner">
                    <div class="row row-gutter-y-40">
                        <div class="col-xl-2 col-lg-4 col-md-6">
                            <div class="department-card">
                                <div class="department-card-icon">
                                    <a href="departments.html"><i class="flaticon-parthenon"></i></a>
                                </div><!-- department-card-icon -->
                                <div class="department-card-content">
                                    <h5><a href="department-details.html">Your Government</a></h5>
                                </div><!-- department-card-content -->
                            </div><!--department-card-->
                        </div><!--col-xl-2 col-lg-4 col-md-6-->
                        <div class="col-xl-2 col-lg-4 col-md-6">
                            <div class="department-card">
                                <div class="department-card-icon">
                                    <a href="departments.html"><i class="flaticon-suitcase"></i></a>
                                </div><!-- department-card-icon -->
                                <div class="department-card-content">
                                    <h5><a href="department-details.html">Jobs & Unemployment</a></h5>
                                </div><!-- department-card-content -->
                            </div><!--department-card-->
                        </div><!--col-xl-2 col-lg-4 col-md-6-->
                        <div class="col-xl-2 col-lg-4 col-md-6">
                            <div class="department-card">
                                <div class="department-card-icon">
                                    <a href="departments.html"><i class="flaticon-industry"></i></a>
                                </div><!-- department-card-icon -->
                                <div class="department-card-content">
                                    <h5><a href="department-details.html">Business & Industry</a></h5>
                                </div><!-- department-card-content -->
                            </div><!--department-card-->
                        </div><!--col-xl-2 col-lg-4 col-md-6-->
                        <div class="col-xl-2 col-lg-4 col-md-6">
                            <div class="department-card">
                                <div class="department-card-icon">
                                    <a href="departments.html"><i class="flaticon-bus"></i></a>
                                </div><!-- department-card-icon -->
                                <div class="department-card-content">
                                    <h5><a href="department-details.html">Roads & Transport</a></h5>
                                </div><!-- department-card-content -->
                            </div><!--department-card-->
                        </div><!--col-xl-2 col-lg-4 col-md-6-->
                        <div class="col-xl-2 col-lg-4 col-md-6">
                            <div class="department-card">
                                <div class="department-card-icon">
                                    <a href="departments.html"><i class="flaticon-lotus"></i></a>
                                </div><!-- department-card-icon -->
                                <div class="department-card-content">
                                    <h5><a href="department-details.html">Culture & Recreation</a></h5>
                                </div><!-- department-card-content -->
                            </div><!--department-card-->
                        </div><!--col-xl-2 col-lg-4 col-md-6-->
                        <div class="col-xl-2 col-lg-4 col-md-6">
                            <div class="department-card">
                                <div class="department-card-icon">
                                    <a href="departments.html"><i class="flaticon-balance-1"></i></a>
                                </div><!-- department-card-icon -->
                                <div class="department-card-content">
                                    <h5><a href="department-details.html">Justice, Safety Law</a></h5>
                                </div><!-- department-card-content -->
                            </div><!--department-card-->
                        </div><!--col-xl-2 col-lg-4 col-md-6-->
                    </div><!-- row -->
                </div><!--department-section-inner-->
            </div><!-- container -->
            <div class="department-search-section">
                <div class="container">
                    <form class="department-search-form">
                        <input type="text" placeholder="Get our quick services from the city municipal" name="search">
                        <button type="submit">View All Services</button>
                    </form><!-- department-search-form -->
                </div><!-- container -->
            </div><!-- department-search-section -->
        </section><!--department-section-->
        <section class="about-section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <div class="about-image">
                            <div class="about-image-inner img-one">
                                <img src="assets/image/gallery/about-1.jpg" class="img-fluid" alt="img-2">
                                <div class="sign-text">Kevin Martin</div><!-- sign-text -->
                                <div class="about-image-caption">
                                    <div class="about-image-caption-inner">
                                        <span class="about-caption-number">18</span>
                                        <span class="about-caption-text">Years of<br>experience</span>
                                    </div><!-- about-image-caption-inner -->
                                </div><!--about-image-caption-->
                            </div><!--about-image-inner img-one-->
                            <div class="about-image-inner img-two">
                                <img src="assets/image/shapes/about-3.jpg" class="floated-image" alt="img-3">
                                <img src="assets/image/gallery/about-2.jpg" class="img-fluid" alt="img-4">
                            </div><!--about-image-inner img-two-->
                        </div><!--about-image-->
                    </div><!--col-lg-6-->
                    <div class="col-lg-6">
                        <div class="about-inner">
                            <div class="section-title-box">
                                <div class="section-tagline">Our introductions</div><!-- section-tagline -->
                                <h2 class="section-title">Welcome & Support to City Municipal</h2>
                                <p>Aliquam viverra arcu. Donec aliquet blandit enim feugiat. Suspendisse id quam sed
                                    eros tincidunt luctus sit amet eu nibh egestas tempus turpis, sit amet mattis magna
                                    varius non.</p>
                            </div><!-- section-title-box -->
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-6">
                                    <div class="about-card">
                                        <h4 class="about-title"><i class="fa-solid fa-circle-check"></i>Business &
                                            Economy</h4>
                                        <p class="about-text">Lorem ipsum dolor sited amet consectetur notted.</p>
                                    </div><!-- about-card -->
                                </div><!-- col-xl-6 col-lg-12 col-md-6 -->
                                <div class="col-xl-6 col-lg-12 col-md-6">
                                    <div class="about-card">
                                        <h4 class="about-title"><i class="fa-solid fa-circle-check"></i>Health &
                                            Education</h4>
                                        <p class="about-text">Lorem ipsum dolor sited amet consectetur notted.</p>
                                    </div><!-- about-card -->
                                </div><!-- col-xl-6 col-lg-12 col-md-6 -->
                            </div><!--row-->
                            <div class="about-author-box">
                                <div class="about-author-image">
                                    <img src="assets/image/gallery/about-4.png" class="img-fluid" alt="img-5">
                                </div><!-- about-author-image -->
                                <div class="about-author-box-meta">
                                    <h5>Mr. Kevin Martin</h5>
                                    <span>City Mayor</span>
                                </div><!-- about-author-box-meta -->
                            </div><!--about-author-box-->
                        </div><!-- about-inner -->
                    </div><!--col-lg-6-->
                </div><!-- row -->
            </div><!-- container -->
        </section><!--about-section-->
        <section class="service-section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <div class="section-title-box">
                            <div class="section-tagline">Government Service</div><!-- section-tagline -->
                            <h2 class="section-title text-white">Explore our Online<br> Governmet Services <br> &
                                Resources</h2>
                            <div class="section-text">
                                <p>Aliquam viverra arcu. Donec aliquet blandit enim feugiat. Suspendisse id quam sed
                                    eros tincidunt luctus sit amet eu nibh egestas tempus turpis, sit amet mattis magna
                                    varius non.</p>
                            </div><!-- section-text -->
                            <div class="service-arrow-image">
                                <img src="assets/image/shapes/arrow.png" alt="img-6">
                            </div><!-- service-arrow-image -->
                        </div><!--section-title-box-->
                    </div><!--col-lg-6-->
                    <div class="col-lg-5">
                        <div class="service-card">
                            <div class="service-card-video">
                                <a href="https://www.youtube.com/watch?v=rzfmZC3kg3M" class="video-popup">
                                    <i class="fa fa-play"></i>
                                </a><!-- video-popup -->
                            </div><!-- service-card-video -->
                            <ul class="list-unstyled">
                                <li><a href="department-details.html">Parking Permission <i
                                            class="fa-solid fa-chevron-right"></i></a></li>
                                <li><a href="department-details.html">File a Tax Return <i
                                            class="fa-solid fa-chevron-right"></i></a></li>
                                <li><a href="department-details.html">Order Birth Certificate <i
                                            class="fa-solid fa-chevron-right"></i></a></li>
                                <li><a href="department-details.html">Get Building Permission <i
                                            class="fa-solid fa-chevron-right"></i></a></li>
                                <li><a href="department-details.html">Apply for Driving License <i
                                            class="fa-solid fa-chevron-right"></i></a></li>
                                <li><a href="department-details.html">Report Polution <i
                                            class="fa-solid fa-chevron-right"></i></a></li>
                            </ul><!-- list-unstyled -->
                            <div class="service-button">
                                <a href="department-details.html" class="btn btn-primary">Discover More</a>
                            </div><!-- service-button -->
                        </div><!--service-card-->
                    </div><!--col-lg-5-->
                </div><!-- row -->
            </div><!-- container -->
        </section><!--service-section-->
        <section class="funfact-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="funfact-counter-item">
                            <div class="funfact-counter-box">
                                <div class="funfact-counter-icon">
                                    <i class="flaticon-running-man"></i>
                                </div><!-- funfact-counter-icon -->
                                <div class="funfact-counter-number">
                                    <h3 class="counter-number">84</h3>
                                    <span class="funfact-counter-number-postfix">k</span>
                                </div><!-- funfact-counter-number -->
                            </div><!-- funfact-counter-box -->
                            <p class="funfact-text">Total People Lived<br>in our City</p>
                        </div><!--funfact-counter-item-->
                    </div><!--col-xl-3 col-md-6-->
                    <div class="col-xl-3 col-md-6">
                        <div class="funfact-counter-item">
                            <div class="funfact-counter-box">
                                <div class="funfact-counter-icon">
                                    <i class="flaticon-coverage"></i>
                                </div><!-- funfact-counter-icon -->
                                <div class="funfact-counter-number">
                                    <h3 class="counter-number">3.3</h3>
                                    <span class="funfact-counter-number-postfix">k</span>
                                </div><!-- funfact-counter-number -->
                            </div><!-- funfact-counter-box -->
                            <p class="funfact-text">Square kilometres<br> Region Covers</p>
                        </div><!--funfact-counter-item-->
                    </div><!--col-xl-3 col-md-6-->
                    <div class="col-xl-3 col-md-6">
                        <div class="funfact-counter-item">
                            <div class="funfact-counter-box">
                                <div class="funfact-counter-icon">
                                    <i class="flaticon-landscape"></i>
                                </div><!-- funfact-counter-icon -->
                                <div class="funfact-counter-number">
                                    <h3 class="counter-number">26</h3>
                                    <span class="funfact-counter-number-postfix">%</span>
                                </div><!-- funfact-counter-number -->
                            </div><!-- funfact-counter-box -->
                            <p class="funfact-text">Private & Domestic <br>Garden Land</p>
                        </div><!--funfact-counter-item-->
                    </div><!--col-xl-3 col-md-6-->
                    <div class="col-xl-3 col-md-6">
                        <div class="funfact-counter-item">
                            <div class="funfact-counter-box">
                                <div class="funfact-counter-icon">
                                    <i class="flaticon-barn-3"></i>
                                </div><!-- funfact-counter-icon -->
                                <div class="funfact-counter-number">
                                    <h3 class="counter-number">4</h3>
                                    <span class="funfact-counter-number-postfix">th</span>
                                </div><!-- funfact-counter-number -->
                            </div><!-- funfact-counter-box -->
                            <p class="funfact-text">Average Costs of Home <br> Ownership</p>
                        </div><!--funfact-counter-item-->
                    </div><!--col-xl-3 col-md-6-->
                </div><!-- row -->
            </div><!-- container -->
        </section><!-- /.funfact-section -->
        <section class="mayor-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mayor-box">
                            <div class="section-title-box">
                                <div class="section-tagline">MAYOR OF GOWRNX</div><!-- section-tagline -->
                                <h2 class="section-title">Major Voice of City Government</h2>
                                <p>There cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo
                                    massa mollis estiegittis miristum nulla sed medy fringilla vitae.</p>
                            </div><!--section-title-box-->
                            <div class="mayor-icon-box">
                                <div class="mayor-icon">
                                    <i class="flaticon-professor"></i>
                                </div><!-- mayor-icon -->
                                <h4 class="mayor-icon-title">Meet Ideological Leader for Youth Generation</h4>
                            </div><!--mayor-icon-box-->
                            <ul class="list-unstyled list-style-one">
                                <li>
                                    <i class="fa-solid fa-circle-check"></i>
                                    <p>Making this the first true generator on the Internet</p>
                                </li><!-- li -->
                                <li>
                                    <i class="fa-solid fa-circle-check"></i>
                                    <p>Lorem Ipsum is not simply random text</p>
                                </li><!-- li -->
                                <li>
                                    <i class="fa-solid fa-circle-check"></i>
                                    <p>If you are going to use a passage</p>
                                </li><!-- li -->
                            </ul><!-- ul -->
                        </div><!--mayor-box-->
                    </div><!-- col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="mayor-img">
                            <img src="assets/image/shapes/shape-1.png" class="floated-image-one" alt="img-7">
                            <img src="assets/image/gallery/mayor-2.jpg" alt="img-8">
                            <div class="mayor-name">
                                Mr. Kevin Martin
                            </div><!-- mayor-name -->
                        </div><!--mayor-img-->
                    </div><!--col-lg-6"-->
                </div><!-- row -->
            </div><!-- container -->
        </section><!--mayor-section-->
        <section class="portfolio-section">
            <div class="section-title-box text-center">
                <div class="section-tagline">recent work portfolio</div>
                <h2 class="section-title">Explore City Highlights <br>Portfolios</h2>
            </div><!-- section-title-box -->
            <div class="portfolio-content conatainer-fluid">
                <div class="portfolio-carousel owl-carousel owl-theme">
                    <div class="item">
                        <div class="portfolio-card">
                            <img src="assets/image/portfolio/portfolio-1.jpg" class="img-fluid" alt="img-9">
                            <div class="portfolio-card-meta">
                                <div class="portfolio-card-text"><a href="portfolio-details.html">Places</a></div>
                                <div class="portfolio-card-title"><a href="portfolio-details.html">Broadway Road</a>
                                </div>
                            </div><!-- portfolio-card-meta -->
                        </div><!--portfolio-card-->
                    </div><!-- item -->
                    <div class="item">
                        <div class="portfolio-card">
                            <img src="assets/image/portfolio/portfolio-2.jpg" class="img-fluid" alt="img-10">
                            <div class="portfolio-card-meta">
                                <div class="portfolio-card-text"><a href="portfolio-details.html">Intercity</a></div>
                                <div class="portfolio-card-title"><a href="portfolio-details.html"> Grand Central
                                        Terminal</a></div>
                            </div><!-- portfolio-card-meta -->
                        </div><!--portfolio-card-->
                    </div><!-- item -->
                    <div class="item">
                        <div class="portfolio-card">
                            <img src="assets/image/portfolio/portfolio-3.jpg" class="img-fluid" alt="img-11">
                            <div class="portfolio-card-meta">
                                <div class="portfolio-card-text"><a href="portfolio-details.html">Business</a></div>
                                <div class="portfolio-card-title"><a href="portfolio-details.html">Empire State
                                        Building</a></div>
                            </div><!-- portfolio-card-meta -->
                        </div><!--portfolio-card-->
                    </div><!-- item -->
                    <div class="item">
                        <div class="portfolio-card">
                            <img src="assets/image/portfolio/portfolio-4.jpg" class="img-fluid" alt="img-12">
                            <div class="portfolio-card-meta">
                                <div class="portfolio-card-text"><a href="portfolio-details.html">Travel</a></div>
                                <div class="portfolio-card-title"><a href="portfolio-details.html">Fulton Center</a>
                                </div>
                            </div><!-- portfolio-card-meta -->
                        </div><!--portfolio-card-->
                    </div><!-- item -->
                </div><!--portfolio-carousel-->
            </div><!--portfolio-content-->
        </section><!--portfolio-section-->
        <section class="client-section">
            <h5 class="client-text">Our partners & suppoters</h5>
            <div class="container">
                <div class="client-carousel owl-carousel owl-theme">
                    <div class="item">
                        <img src="assets/image/shapes/client-1.png" class="img-fluid" alt="img-13">
                    </div><!--item-->
                    <div class="item">
                        <img src="assets/image/shapes/client-1.png" class="img-fluid" alt="img-14">
                    </div><!--item-->
                    <div class="item">
                        <img src="assets/image/shapes/client-1.png" class="img-fluid" alt="img-15">
                    </div><!--item-->
                    <div class="item">
                        <img src="assets/image/shapes/client-1.png" class="img-fluid" alt="img-16">
                    </div><!--item-->
                </div><!--client-carousel owl-carousel owl-theme-->
            </div><!--container-->
        </section><!--client-section-->
        <section class="testimonial-section">
            <div class="container">
                <div class="testimonial-name">TESTIMONIALS</div>
                <div class="testimonial-slider">
                    <div class="swiper testimonial-reviews">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-content">
                                    <div class="testimonial-ratings">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div><!-- testimonial-ratings -->
                                    <div class="testimonial-text">
                                        This is due to their excellent service, competitive pricing and customer
                                        support. It’s throughly refresing to get such a personal touch. Duis aute lorem
                                        ipsum is simply free text irure dolor in reprehenderit in esse nulla pariatur.
                                    </div><!-- testimonial-text -->
                                    <div class="testimonial-thumb-card">
                                        <h5>Martin McLaughlin</h5>
                                        <span>Customer</span>
                                    </div><!-- testimonial-thumb-card -->
                                </div><!--testimonial-content-->
                            </div><!--swiper-slide-->
                            <div class="swiper-slide">
                                <div class="testimonial-content">
                                    <div class="testimonial-ratings">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div><!-- testimonial-ratings -->
                                    <div class="testimonial-text">
                                        This is due to their excellent service, competitive pricing and customer
                                        support. It’s throughly refresing to get such a personal touch. Duis aute lorem
                                        ipsum is simply free text irure dolor in reprehenderit in esse nulla pariatur.
                                    </div><!-- testimonial-text -->
                                    <div class="testimonial-thumb-card">
                                        <h5>Aleesha Brown</h5>
                                        <span>Customer</span>
                                    </div><!-- testimonial-thumb-card -->
                                </div><!--testimonial-content-->
                            </div><!--swiper-slide-->
                            <div class="swiper-slide">
                                <div class="testimonial-content">
                                    <div class="testimonial-ratings">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div><!-- testimonial-ratings -->
                                    <div class="testimonial-text">
                                        This is due to their excellent service, competitive pricing and customer
                                        support. It’s throughly refresing to get such a personal touch. Duis aute lorem
                                        ipsum is simply free text irure dolor in reprehenderit in esse nulla pariatur.
                                    </div><!-- testimonial-text -->
                                    <div class="testimonial-thumb-card">
                                        <h5>Kevin Martin</h5>
                                        <span>Member</span>
                                    </div><!-- testimonial-thumb-card -->
                                </div><!--testimonial-content-->
                            </div><!--swiper-slide-->
                        </div><!-- swiper-wrapper -->
                        <div class="swiper-pagination"></div>
                    </div><!--swiper testimonial-reviews-->
                    <div class="testimonial-thumb">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="assets/image/testimonial/testimonial-2.jpg" class="img-fluid" alt="img-17">
                                <i class="fa-solid fa-quote-left"></i>
                            </div><!-- swiper-slide -->
                            <div class="swiper-slide">
                                <img src="assets/image/testimonial/testimonial-3.jpg" class="img-fluid" alt="img-18">
                                <i class="fa-solid fa-quote-left"></i>
                            </div><!-- swiper-slide -->
                            <div class="swiper-slide">
                                <img src="assets/image/testimonial/testimonial-4.jpg" class="img-fluid" alt="img-19">
                                <i class="fa-solid fa-quote-left"></i>
                            </div><!-- swiper-slide -->
                        </div><!--swiper-wrapper-->
                    </div><!--testimonial-thumb-->
                </div><!--testimonial-slider-->
            </div><!-- container -->
        </section><!--testimonial-section-->
        <section class="event-section">
            <div class="container">
                <div class="event-section-inner">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section-title-box">
                                <div class="section-tagline">LATEST EVENTS</div>
                                <h2 class="section-title">Explore Upcoming City Event Schedule</h2>
                            </div><!-- section-title-box -->
                        </div><!--col-lg-6-->
                        <div class="col-lg-6">
                            <div class="event-content-box">
                                <div class="section-text">
                                    <p>Aliquam viverra arcu. Donec aliquet blandit enim feugiat.
                                        Suspendisse id quam sed eros tincidunt luctus sit amet eu nibh egestas tempus
                                        turpis.</p>
                                </div><!-- section-text -->
                            </div><!--event-content-box-->
                        </div><!-- col-lg-6 -->
                    </div><!-- row -->
                    <div class="row row-gutter-y-40">
                        <div class="col-xl-5">
                            <div class="event-subscribe-card">
                                <div class="event-details-card-title">
                                    <div class="event-icon">
                                        <i class="flaticon-envelope"></i>
                                    </div><!-- event-icon -->
                                    <h5>Subscribe</h5>
                                    <p>Get latest news & events details</p>
                                </div><!-- event-details-card-title -->
                                <div class="event-details-card-content">
                                    <form action="assets/inc/sendemail.php" class="contact-form" method="post">
                                        <div class="form-group">
                                            <input type="email" id="Email" class="input-text"
                                                placeholder="Email address" name="email" required>
                                        </div><!-- form-group -->
                                        <button class="btn btn-primary w-100">Subscribe</button><!-- button -->
                                        <p>Never share your email with others.</p>
                                    </form><!-- form -->
                                </div><!-- event-details-card-content -->
                            </div><!-- event-subscribe-card -->
                        </div><!-- col-xl-5 -->
                        <div class="col-xl-7">
                            <div class="event-card">
                                <div class="event-card-image">
                                    <div class="event-card-image-inner">
                                        <a href="event-details.html"><img src="assets/image/event/event-2.jpg"
                                                class="img-fluid" alt="img-20"></a>
                                        <div class="event-card-meta">
                                            <div class="event-meta-number">
                                                <span>28</span>
                                            </div><!-- event-meta-number -->
                                            <div class="event-meta-date">
                                                <span>October 2022</span>
                                            </div><!-- event-meta-date -->
                                        </div><!-- event-card-meta -->
                                    </div><!-- event-card-image-inner -->
                                </div><!--event-card-image-->
                                <div class="event-card-content">
                                    <div class="event-card-info">
                                        <ul class="list-unstyled">
                                            <li>
                                                <i class="fa-solid fa-clock"></i>
                                                <span>08:00am - 05:00pm</span>
                                            </li><!-- li -->
                                            <li>
                                                <i class="fa-sharp fa-solid fa-location-pin"></i>
                                                <span>New Hyde Park, NY 11040</span>
                                            </li><!-- li -->
                                        </ul><!-- list-unstyled -->
                                    </div><!--event-card-info-->
                                    <div class="event-card-title">
                                        <h4><a href="event-details.html">Organizing 2022 city photography new
                                                contest</a></h4>
                                    </div><!-- event-card-title -->
                                </div><!--"event-card-content-->
                            </div><!--event-card-->
                            <div class="event-card">
                                <div class="event-card-image">
                                    <div class="event-card-image-inner">
                                        <a href="event-details.html"><img src="assets/image/event/event-3.jpg"
                                                class="img-fluid" alt="img-21"></a>
                                        <div class="event-card-meta">
                                            <div class="event-meta-number">
                                                <span>28</span>
                                            </div><!-- event-meta-number -->
                                            <div class="event-meta-date">
                                                <span>October 2022</span>
                                            </div><!-- event-meta-date -->
                                        </div><!-- event-card-meta -->
                                    </div><!-- event-card-image-inner -->
                                </div><!-- event-card-image -->
                                <div class="event-card-content">
                                    <div class="event-card-info">
                                        <ul class="list-unstyled">
                                            <li>
                                                <i class="fa-solid fa-clock"></i>
                                                <span>08:00am - 05:00pm</span>
                                            </li><!-- li -->
                                            <li>
                                                <i class="fa-sharp fa-solid fa-location-pin"></i>
                                                <span>New Hyde Park, NY 11040</span>
                                            </li><!-- li -->
                                        </ul><!-- list-unstyled -->
                                    </div><!--event-card-info-->
                                    <div class="event-card-title">
                                        <h4><a href="event-details.html">Organizing 2022 city photography new
                                                contest</a></h4>
                                    </div><!-- event-card-title -->
                                </div><!--event-card-content-->
                            </div><!--event-card-->
                        </div><!-- col-xl-7 -->
                    </div><!-- row -->
                </div><!--event-section-inner-->
            </div><!--container-->
        </section><!--event-section-->
        <section class="cta-five-section">
            <div class="container">
                <div class="cta-five-card">
                    <div class="cta-five-card-icon">
                        <i class="flaticon-file"></i>
                    </div><!-- cta-five-card-icon -->
                    <div class="cta-five-content">
                        <h4>Download Recent Documents</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority<br> have
                            suffered in some form, by injected humour words.</p>
                    </div><!-- cta-five-content -->
                    <div class="cta-five-button">
                        <a href="#" class="btn btn-primary">Download Files</a>
                    </div><!-- cta-five-button -->
                    <div class="cta-five-img">
                        <i class="flaticon-file"></i>
                    </div><!-- cta-five-img -->
                </div><!--cta-five-card-->
            </div><!-- container -->
        </section><!--cta-five-section-->
        <section class="blog-section">
            <div class="container">
                <div class="blog-box">
                    <div class="section-title-box text-center">
                        <div class="section-tagline">DIRECT FROM THE BLOG POSTS</div>
                        <h2 class="section-title">Checkout Latest News <br>and Articles</h2>
                    </div><!-- section-title-box -->
                </div><!--blog-box-->
                <div class="row row-gutter-y-155">
                    <div class="col-lg-4">
                        <div class="blog-card">
                            <div class="blog-card-image">
                                <img src="assets/image/blog/blog-1.jpg" class="img-fluid" alt="img-22">
                                <a href="news-details.html"></a>
                            </div><!-- blog-card-image -->
                            <div class="blog-card-date">
                                <a href="news-details.html">28SEP</a>
                            </div><!-- blog-card-date -->
                            <div class="blog-card-content">
                                <div class="blog-card-meta">
                                    <span class="author">
                                        by<a href="news-details.html">Admin</a>
                                    </span><!-- author -->
                                    <span class="comment">
                                        <a href="news-details.html">02 Comments</a>
                                    </span><!-- comment -->
                                </div><!-- blog-card-meta -->
                                <h4><a href="news-details.html">Supporting local business to bounce back</a></h4>
                                <p>Tellus amet vel nisi, vel felis morbi sit et. Risus, pulvinar ultricie</p>
                            </div><!-- blog-card-content -->
                        </div><!-- blog-card -->
                    </div><!-- col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="blog-card">
                            <div class="blog-card-image">
                                <img src="assets/image/blog/blog-2.jpg" class="img-fluid" alt="img-23">
                                <a href="news-details.html"></a>
                            </div><!-- blog-card-image -->
                            <div class="blog-card-date">
                                <a href="news-details.html">28SEP</a>
                            </div><!-- blog-card-date -->
                            <div class="blog-card-content">
                                <div class="blog-card-meta">
                                    <span class="author">
                                        by<a href="news-details.html">Admin</a>
                                    </span><!-- author -->
                                    <span class="comment">
                                        <a href="news-details.html">02 Comments</a>
                                    </span><!-- comment -->
                                </div><!-- blog-card-meta -->
                                <h4><a href="news-details.html">Resilience for TownGov Green Project</a></h4>
                                <p>Tellus amet vel nisi, vel felis morbi sit et. Risus, pulvinar ultricie</p>
                            </div><!-- blog-card-content -->
                        </div><!-- blog-card -->
                    </div><!-- col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="blog-card">
                            <div class="blog-card-image">
                                <img src="assets/image/blog/blog-3.jpg" class="img-fluid" alt="img-24">
                                <a href="news-details.html"></a>
                            </div><!-- blog-card-image -->
                            <div class="blog-card-date">
                                <a href="news-details.html">28SEP</a>
                            </div><!-- blog-card-date -->
                            <div class="blog-card-content">
                                <div class="blog-card-meta">
                                    <span class="author">
                                        by<a href="news-details.html">Admin</a>
                                    </span><!-- author -->
                                    <span class="comment">
                                        <a href="news-details.html">02 Comments</a>
                                    </span><!-- comment -->
                                </div><!-- blog-card-meta -->
                                <h4><a href="news-details.html">Save soil and save world project in 2022</a></h4>
                                <p>Tellus amet vel nisi, vel felis morbi sit et. Risus, pulvinar ultricie</p>
                            </div><!-- blog-card-content -->
                        </div><!-- blog-card -->
                    </div><!-- col-lg-4 -->
                </div><!-- row -->
            </div><!-- container -->
        </section><!-- blog-section -->
        <section class="cta-two-section">
            <div class="container">
                <div class="cta-two-section-inner">
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="cta-two-title">
                                <div class="cta-two-card-icon">
                                    <i class="flaticon-envelope-2"></i>
                                </div><!-- cta-two-card-icon -->
                                <div class="cta-two-card-content">
                                    <p>Stay Connected</p>
                                    <h3>Join Our Newsletter</h3>
                                </div><!-- cta-two-card-content -->
                            </div><!--cta-two-title-->
                        </div><!--col-xl-5-->
                        <div class="col-xl-7">
                            <form action="assets/inc/sendemail.php" class="cta-two-form" method="post">
                                <div class="cta-two-form-group">
                                    <input type="email" id="email" class="input-text" placeholder="Email address"
                                        name="email" required>
                                </div><!-- cta-two-card-form -->
                                <button class="btn btn-primary">Subscribe</button>
                            </form><!-- cta-two-form -->
                        </div><!-- col-xl-7-->
                    </div><!-- row -->
                </div><!-- cta-two-section-inner -->
            </div><!-- container -->
        </section><!--cta-two-section-->
    </div><!--page-wrapper-->

    <!-- plugins js -->
@endsection
