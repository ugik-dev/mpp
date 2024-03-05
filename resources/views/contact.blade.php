@extends('homeLayout/index')
@section('style')
@endsection
@section('content')
    <section class="page-banner mb-5">
        <div class="container">
            <div class="page-breadcrumbs">
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Kontak</li>
                </ul><!-- list-unstyled -->
            </div><!-- page-breadcrumbs -->
            <div class="page-banner-title">
                <h3>Kontak</h3>
            </div><!-- page-banner-title -->
        </div><!-- container -->
    </section><!--page-banner-->
    {{-- <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-box">
                        <div class="section-tagline">
                            WRITE A MESSAGE
                        </div><!-- section-tagline -->
                        <h1 class="section-title">Always Here to Help you</h1>
                        <p>There are certain attributes of a profession and one has to catch hold of them in order to
                            efficiently and grow in that business. I share my experience as an interior designer. </p>
                    </div><!-- contact-box -->
                </div><!-- col-lg-4 -->
                <div class="col-lg-8">
                    <form action="assets/inc/sendemail.php" class="contact-form  contact-form-validated" method="post">
                        <div class="row row-gutter-10">
                            <div class="col-12 col-lg-6">
                                <input type="text" id="name" class="input-text" placeholder="Your name"
                                    name="name" aria-required="true">
                            </div><!-- col-12 col-lg-6 -->
                            <div class="col-12 col-lg-6">
                                <input type="email" id="email" class="input-text" placeholder="Email address"
                                    name="email" aria-required="true">
                            </div><!-- col-12 col-lg-6 -->
                            <div class="col-12 col-lg-6">
                                <input type="text" id="phone" class="input-text" placeholder="Phone number"
                                    name="phone" aria-required="true">
                            </div><!-- col-12 col-lg-6 -->
                            <div class="col-12 col-lg-6">
                                <input type="text" id="subject" class="input-text" placeholder="Subject" name="subject"
                                    aria-required="true">
                            </div><!-- col-12 col-lg-6 -->
                            <div class="col-12 col-lg-12">
                                <textarea name="message" placeholder="Write a message" class="input-text" aria-required="true"></textarea>
                            </div><!-- col-12 col-lg-12 -->
                            <div class="col-12 col-lg-12">
                                <button class="btn btn-primary">Send a Message</button>
                            </div><!-- col-12 col-lg-12 -->
                        </div><!-- row -->
                    </form><!-- contact-form -->
                </div><!-- col-lg-8 -->
            </div><!-- row -->
        </div><!-- container -->
    </section><!-- contact-section --> --}}
    <!-- contact-gmap-section -->
    <div class="cta-four-section">
        <div class="container">
            <div class="cta-four-inner">
                <div class="row row-gutter-y-20 ">
                    <div class="col-12 col-lg-12 col-xl-12">
                        <div class="cta-four-content">
                            <div class="cta-four-widget-socials">
                                @if ($profile->twitter)
                                    <a href="{{ $profile->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                @endif
                                @if ($profile->facebook)
                                    <a href="{{ $profile->facebook }}"><i class="fa-brands fa-facebook"></i></a>
                                @endif
                                @if ($profile->pinterest)
                                    <a href="{{ $profile->pinterest }}"><i class="fa-brands fa-pinterest-p"></i></a>
                                @endif
                                @if ($profile->instagram)
                                    <a href="{{ $profile->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                                @endif
                            </div><!-- cta-four-widget-socials -->
                        </div><!-- cta-four-content -->
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="cta-four-content">
                            <i class="flaticon-help"></i>
                            <div class="cta-four-content-box">
                                <span>Punya Pertanyaan?</span>
                                <p>
                                    <a class="text-white"
                                        href="tel:+{{ formatTelphone($profile->telephone, false, false) }}">Telp :
                                        {{ $profile->telephone }}</a>
                                </p>
                                <p>
                                    <a class="text-white" href="{{ formatTelphone($profile->whatsapp) }}">WA :
                                        {{ $profile->whatsapp }}</a>
                                </p>
                            </div><!-- cta-four-content-box -->
                        </div><!-- cta-four-content -->
                    </div><!-- col-12 col-lg-6 col-xl-3 -->
                    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="cta-four-content">
                            <i class="flaticon-envelope-3"></i>
                            <div class="cta-four-content-box">
                                <span>Email</span>
                                <p> <a class="text-white" href="mailto:+{{ $profile->email }}">
                                        {{ $profile->email }}</a></p>
                            </div><!-- cta-four-content-box -->
                        </div><!-- cta-four-content -->
                    </div><!-- col-12 col-md-6 col-lg-6 col-xl-3 -->
                    <div class="col-12 col-lg-6 col-xl-6">
                        <div class="cta-four-content">
                            <i class="flaticon-location-pin"></i>
                            <div class="cta-four-content-box">
                                <span>Alamat</span>
                                <p>{!! $profile->address !!}</p>
                            </div><!-- cta-four-content-box -->
                        </div><!-- cta-four-content -->
                    </div><!-- col-12 col-lg-6 col-xl-4 -->
                    <!-- col-12 col-lg-6 col-xl-2 -->
                </div><!-- row -->
            </div><!-- cta-four-inner -->
        </div><!-- container -->
    </div>
    <div class="contact-gmap-section">
        <div class="container">
            <div class="responsive-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d30696.65428472184!2d106.09072206595089!3d-1.8570593396542443!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e22f300309be4a3%3A0x5f4715fc05da4518!2sMal%20Pelayanan%20Publik%20(MPP)%20Kab.Bangka!5e0!3m2!1sid!2sid!4v1709557119811!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                {{-- <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12083.735079362054!2d-74.01702461732008!3d40.785470167558394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258131938b8d5%3A0xe39c30a8afef2d96!2sWest%20New%20York%2C%20NJ%2007093%2C%20USA!5e0!3m2!1sen!2sin!4v1668832966742!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
            </div><!-- responsive-map -->
        </div><!-- container -->
    </div>
@endsection
