@extends('homeLayout/index')
@section('content')
    <!--header-->
    <div class="page-wrapper">
        @include('landingPage.hero')
        @include('landingPage.hero_icon')

        {{-- <div class="row">
            <div class="col-lg-9"> --}}

        @include('landingPage.blog')
        {{-- </div>
    <div class="col-lg-2 mt-5">
        <div class="inside mt-5">
            <div class="panel-pane pane-custom pane-2">
                <p><a href="https://simbg.pu.go.id/" target="_blank"><img alt=""
                            src="{{ url('storage/upload/banner/SIMBG.png') }}" style=""></a>
                </p>
            </div>
        </div>
    </div>
    </div> --}}

        <!--about-section-->
        <section class="service-section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <div class="section-title-box">
                            <div class="section-tagline">{{ $conf_home->sec_2_title }}</div>
                            <h2 class="section-title text-white">{{ $conf_home->sec_2_sub_title }}</h2>
                            <div class="section-text">
                                <p>{{ $conf_home->sec_2_description }}</p>
                            </div>
                            <div class="service-arrow-image">
                                <img src="assets/image/shapes/arrow.png" alt="img-6">
                            </div>
                        </div>
                    </div><!--col-lg-6-->
                    <div class="col-lg-5">
                        <div class="service-card" {!! $conf_home->sec_2_sidebar_background
                            ? 'style="background-image:url(' . url('storage/upload/images/' . $conf_home->sec_2_sidebar_background) . ')"'
                            : '' !!}>
                            <div class="service-card-video">
                                <a href="{{ $conf_home->sec_2_video }}" class="video-popup">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                            <ul class="list-unstyled">
                                @php
                                    $sec_2_sidebar =
                                        $conf_home->sec_2_sidebar == null ? [] : json_decode($conf_home->sec_2_sidebar);
                                @endphp
                                @foreach ($sec_2_sidebar as $item)
                                    <li><a href="{{ $item->link }}">{{ $item->label }} <i
                                                class="fa-solid fa-chevron-right"></i></a></li>
                                @endforeach
                            </ul>
                            @if ($conf_home->sec_2_button)
                                <div class="service-button">
                                    <a href="{{ $conf_home->sec_2_button }}" class="btn btn-primary">Discover More</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section><!--service-section-->
        @if ($conf_home->sec_3 == 'Y')
            <section class="funfact-section">
                <div class="container">
                    <div class="row">
                        @php
                            $sec_3_data = $conf_home->sec_3_data == null ? [] : json_decode($conf_home->sec_3_data);
                        @endphp
                        @foreach ($sec_3_data as $item)
                            <div class="col-xl-3 col-md-6">
                                <div class="funfact-counter-item">
                                    <div class="funfact-counter-box">
                                        <div class="funfact-counter-icon">
                                            <i class="{{ $item->icon }}"></i>
                                        </div>
                                        <div class="funfact-counter-number">
                                            <h3 class="counter-number">{{ $item->value }}</h3>
                                            <span class="funfact-counter-number-postfix">{{ $item->satuan }}</span>
                                        </div>
                                    </div>
                                    <p class="funfact-text">{{ $item->desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <section class="mayor-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mayor-box">
                            <div class="section-title-box">
                                <div class="section-tagline">{{ $conf_home->sec_4_title }}</div><!-- section-tagline -->
                                <h2 class="section-title">{{ $conf_home->sec_4_sub_title }}</h2>
                                {{-- <p></p> --}}
                            </div><!--section-title-box-->
                            <div class="mayor-icon-box">
                                <div class="mayor-icon">
                                    <i class="flaticon-professor"></i>
                                </div><!-- mayor-icon -->
                                <h4 class="mayor-icon-title">{{ $conf_home->sec_4_description }}</h4>
                            </div><!--mayor-icon-box-->
                            <ul class="list-unstyled list-style-one">
                                @foreach (json_decode($conf_home->sec_4_list) ?? [] as $list)
                                    <li>
                                        <i class="fa-solid fa-circle-check"></i>
                                        <p>{{ $list }}</p>
                                    </li>
                                @endforeach
                            </ul><!-- ul -->
                        </div><!--mayor-box-->
                    </div><!-- col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="mayor-img">
                            <img src="assets/image/shapes/shape-1.png" class="floated-image-one" alt="img-7">
                            <img src="{{ $conf_home->sec_4_image ? url('storage/upload/images/' . $conf_home->sec_4_image) : 'assets/image/gallery/mayor-2.jpg' }}"
                                alt="img-8">
                            <div class="mayor-name">
                                Dian Firnandy, SE
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--mayor-section-->
        <section class="portfolio-section">
            <div class="section-title-box text-center">
                <div class="section-tagline">Galeri</div>
                <h2 class="section-title">Beberapa Event Kami</h2>
            </div><!-- section-title-box -->
            <div class="portfolio-content conatainer-fluid">
                <div class="portfolio-carousel owl-carousel owl-theme">
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="item">
                            <div class="portfolio-card">
                                <img style="height: 10rem"
                                    src="assets/background/bg-{{ str_pad(rand(1, 23), 2, '0', STR_PAD_LEFT) }}.jpg"
                                    class="img-fluid" alt="img-9">
                                <div class="portfolio-card-meta">
                                    <div class="portfolio-card-text"><a href="portfolio-details.html">Places</a></div>
                                    <div class="portfolio-card-title"><a href="portfolio-details.html">Broadway Road</a>
                                    </div>
                                </div><!-- portfolio-card-meta -->
                            </div><!--portfolio-card-->
                        </div>
                    @endfor
                </div><!--portfolio-carousel-->
            </div><!--portfolio-content-->
        </section><!--portfolio-section-->
        {{-- Patner --}}
        <section class="client-section">
            <h5 class="client-text">Patner</h5>
            <div class="container">
                <div class="client-carousel owl-carousel owl-theme">
                    @foreach ($patners as $p)
                        <div class="item" title="{{ $p->name }}">
                            <div class="image-item">
                                <a href="{{ $p->link }}" alt="{{ $p->name }}">
                                    <img src="{{ $p->image ? url('storage/upload/images/' . $p->image) : url('assets/image/shapes/client-1.png') }}"
                                        class="img-fluid" title="{{ $p->name }}">
                                </a>
                            </div>
                            <h6 class="text-center">{{ $p->name }}</h6>
                        </div>
                    @endforeach
                </div><!--client-carousel owl-carousel owl-theme-->
            </div><!--container-->
        </section><!--client-section-->
        {{-- Tanggapan Publik --}}
        <section class="testimonial-section">
            <div class="container">
                <div class="section-title-box text-center">
                    <h2 class="section-title text-white">Tanggapan Publik</h2>
                </div>
                <div class="testimonial-name">Tanggapan Publik </div>
                <div class="testimonial-slider">
                    <div class="swiper testimonial-reviews">
                        <div class="swiper-wrapper">
                            @foreach ($surveys as $survey)
                                <div class="swiper-slide">
                                    <div class="testimonial-content">
                                        <div class="testimonial-ratings">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fa fa-star{{ $survey->respon >= $i ? '' : '-o' }}"></i>
                                            @endfor
                                            {{-- <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i> --}}
                                        </div><!-- testimonial-ratings -->
                                        <div class="testimonial-text">
                                            {{ $survey->alasan }}
                                        </div><!-- testimonial-text -->
                                        <div class="testimonial-thumb-card">
                                            <h5>{{ $survey->nama }}</h5>
                                            <span>{{ $survey->alamat }}</span>
                                        </div><!-- testimonial-thumb-card -->
                                    </div><!--testimonial-content-->
                                </div>
                            @endforeach
                        </div><!-- swiper-wrapper -->
                        <div class="swiper-pagination"></div>
                    </div><!--swiper testimonial-reviews-->
                    {{-- <div class="testimonial-thumb">
                        <div class="swiper-wrapper">
                            @foreach ($surveys as $survey)
                                <div class="swiper-slide">
                                    <img src="assets/image/testimonial/testimonial-2.jpg" class="img-fluid"
                                        alt="img-17">
                                    <i class="fa-solid fa-quote-left"></i>
                                </div>
                            @endforeach
                        </div><!--swiper-wrapper-->
                    </div><!--testimonial-thumb--> --}}
                </div><!--testimonial-slider-->
            </div><!-- container -->
        </section><!--testimonial-section-->
        {{-- Event --}}
        <section class="event-section">
            <div class="container">
                <div class="event-section-inner">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section-title-box">
                                <div class="section-tagline">EVENTS TERBARU</div>
                                {{-- <h2 class="section-title">Explore Upcoming City Event Schedule</h2> --}}
                            </div><!-- section-title-box -->
                        </div><!--col-lg-6-->
                        {{-- <div class="col-lg-6">
                            <div class="event-content-box">
                                <div class="section-text">
                                    <p>Aliquam viverra arcu. Donec aliquet blandit enim feugiat.
                                        Suspendisse id quam sed eros tincidunt luctus sit amet eu nibh egestas tempus
                                        turpis.</p>
                                </div><!-- section-text -->
                            </div><!--event-content-box-->
                        </div><!-- col-lg-6 --> --}}
                    </div><!-- row -->
                    <div class="row row-gutter-y-40">
                        {{-- <div class="col-xl-5">
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
                        </div><!-- col-xl-5 --> --}}
                        <div class="col-xl-12">
                            <div class="row">
                                @foreach ($events as $event)
                                    <div class="col-xl-6">
                                        <div class="event-card">
                                            <div class="event-card-image">
                                                <div class="event-card-image-inner">
                                                    <a href="event-details.html">
                                                        @if ($event->sampul)
                                                            <img src="{{ url('storage/upload/content/' . $event->sampul) }}"
                                                                class="img-fluid" style="width: 250px; height: 250px"
                                                                alt="img-22">
                                                        @else
                                                            <img src="assets/background/bg-{{ str_pad(rand(1, 23), 2, '0', STR_PAD_LEFT) }}.jpg"
                                                                style="width: 250px; height: 250px" class="img-fluid"
                                                                alt="img-22">
                                                        @endif
                                                        <div class="event-card-meta">
                                                            <div class="event-meta-number">
                                                                <span>{{ \Carbon\Carbon::parse($event->tanggal)->format('d') }}</span>
                                                            </div><!-- event-meta-number -->
                                                            <div class="event-meta-date">
                                                                <span>{{ \Carbon\Carbon::parse($event->tanggal)->format('F Y') }}</span>
                                                            </div><!-- event-meta-date -->
                                                        </div><!-- event-card-meta -->
                                                </div><!-- event-card-image-inner -->
                                            </div><!--event-card-image-->
                                            <div class="event-card-content">
                                                <div class="event-card-title">
                                                    <h4><a
                                                            href="{{ route('blog', [$event->prefix, $event->judul]) }}">{{ $event->judul }}</a>
                                                    </h4>
                                                </div><!-- event-card-title -->
                                            </div><!--"event-card-content-->
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div><!-- col-xl-7 -->
                    </div><!-- row -->
                </div><!--event-section-inner-->
            </div><!--container-->
        </section><!--event-section-->
        {{-- Subscribe --}}
        <section class="cta-two-section">
            <div class="container">
                <div class="cta-two-section-inner">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="cta-two-title">
                                <div class="cta-two-card-icon">
                                    <i class="flaticon-envelope-2"></i>
                                </div><!-- cta-two-card-icon -->
                                <div class="cta-two-card-content">
                                    <p>Tetap Terhubung Untuk Mendapatkan Update Terbaru</p>
                                    <h3>Bergabung dengan kami</h3>
                                </div><!-- cta-two-card-content -->
                            </div><!--cta-two-title-->
                        </div><!--col-xl-5-->
                        <div class="col-xl-6">
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
    <script>
        document.getElementById("menu_home").classList.add("active")
    </script>
    <!-- plugins js -->
@endsection
