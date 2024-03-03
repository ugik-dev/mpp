<section class="footer">
    <div class="footer-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-widget-logo">
                        <a href="index.html"><img src="{{ asset('assets/image/logo.png') }}" class="img-fluid"
                                alt="img-25"></a>
                    </div><!-- footer-widget-logo -->
                    <div class="footer-widget-text">
                        <p>{{ $profile->description_footer }}</p>
                    </div><!-- footer-widget-text -->
                    <div class="footer-widget-socials">
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
                    </div><!-- footer-widget-socials -->
                </div><!--col-lg-4-->
                <div class="col-lg-3">
                    {{-- <div class="footer-widget">
                        <div class="footer-widget-explore">
                            <h4 class="footer-widget-title">Explore</h4>
                            <ul class="list-unstyled">
                                <li><a href="department-details.html">Administration</a></li>
                                <li><a href="service-details.html">Fire Services</a></li>
                                <li><a href="event-details.html">Business & Taxation</a></li>
                                <li><a href="team-details.html">Circular’s And Go’s</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul><!-- list-unstyled -->
                        </div><!-- footer-widget-explore -->
                    </div><!--footer-widget--> --}}
                </div><!--col-lg-3-->
                <div class="col-lg-2">
                    {{-- <div class="footer-widget">
                        <div class="footer-widget-department">
                            <h4 class="footer-widget-title">Departments</h4>
                            <ul class="list-unstyled">
                                <li><a href="department-details.html">Health & Safety</a></li>
                                <li><a href="department-details.html">Housing & Land</a></li>
                                <li><a href="department-details.html">Legal & Finance</a></li>
                                <li><a href="department-details.html">Transport & Traffic</a></li>
                                <li><a href="department-details.html">Arts & Culture</a></li>
                            </ul><!-- list-unstyled -->
                        </div><!-- footer-widget-department -->
                    </div><!--footer-widget--> --}}
                </div><!--col-lg-2-->
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <div class="footer-widget-contact">
                            <h4 class="footer-widget-title">Contact</h4>
                            <p>{!! $profile->address !!}</p>
                        </div><!-- footer-widget-contact -->
                        <div class="footer-widget-contact-list">
                            <i class="fa-solid fa-envelope"></i>
                            <div class="footer-widget-contact-item">
                                <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                            </div><!-- footer-widget-contact-item -->
                        </div><!-- footer-widget-contact-list -->
                        <div class="footer-widget-contact-list">
                            <i class="fa-solid fa-phone"></i>
                            <div class="footer-widget-contact-item">
                                <a href="tel:{{ $profile->telephone }}">{{ $profile->telephone }}</a>
                            </div>
                        </div>
                        <div class="footer-widget-contact-list">
                            <i class="fa fa-solid fa-whatsapp"></i>
                            <div class="footer-widget-contact-item">
                                <a href="{{ formatWhatsAppNumber($profile->whatsapp) }}">{{ $profile->whatsapp }}</a>
                            </div>
                        </div>
                    </div><!--footer-widget-->
                </div><!--col-lg-3-->
            </div><!-- row -->
        </div><!-- container -->
    </div><!--footer-inner-->
    <div class="bottom-footer">
        <div class="conatiner">
            <p><a href="https://ugikdev.site/">© Copyright 2024 by CV. Bangka Musi Tekno</a></p>
        </div><!-- container -->
    </div><!--bottom-footer-->
</section><!--footer-->
<div class="mobile-nav-wrapper">
    <div class="mobile-nav-overlay mobile-nav-toggler"></div><!-- mobile-nav-overlay -->
    <div class="mobile-nav-content">
        <a href="#" class="mobile-nav-close mobile-nav-toggler">
            <span></span>
            <span></span>
        </a><!-- mobile-nav-close -->
        <div class="logo-box">
            <a href="index.html"><img src="{{ asset('assets/image/logo-light.png') }}" width="160" height="40"
                    alt="26"></a>
        </div><!-- logo-box -->
        <div class="mobile-nav-container"></div><!-- mobile-nav-container -->
        <ul class="mobile-nav-contact list-unstyled">
            <li>
                <i class="fa-solid fa-phone"></i>
                <a href="tel:+8898006802">+ 88 ( 9800 ) 6802</a>
            </li><!-- li -->
            <li>
                <i class="fa-solid fa-envelope"></i>
                <a href="mailto:needhelp@company.com">needhelp@company.com</a>
            </li><!-- li -->
            <li>
                <i class="fa-solid fa-map-marker-alt"></i>
                88 Broklyn Golden Road Street <br> New York. USA
            </li><!-- li -->
        </ul><!-- mobile-nav-contact -->
        <ul class="mobile-nav-social list-unstyled">
            @if ($profile->twitter)
                <li>
                    <a href="{{ $profile->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                </li>
            @endif
            @if ($profile->facebook)
                <li>
                    <a href="{{ $profile->facebook }}"><i class="fa-brands fa-facebook"></i></a>
                </li>
            @endif
            @if ($profile->pinterest)
                <li>
                    <a href="{{ $profile->pinterest }}"><i class="fa-brands fa-pinterest-p"></i></a>
                </li>
            @endif
            @if ($profile->instagram)
                <li>
                    <a href="{{ $profile->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                </li>
            @endif
        </ul><!-- mobile-nav-social -->
    </div><!-- mobile-nav-content -->
</div><!--mobile-nav-wrapper-->
<div class="search-popup">
    <div class="search-popup-overlay search-toggler"></div><!-- search-popup-overlay -->
    <div class="search-popup-content">
        <form action="{{ route('search') }}">
            <label for="search" class="sr-only">search here</label><!-- sr-only -->
            <input type="text" id="s" name="s" placeholder="Search Here..."
                value="{{ request()->input('s') }}">
            <button type="submit" aria-label="search submit" class="search-btn">
                <span><i class="flaticon-search-interface-symbol"></i></span>
            </button><!-- search-btn -->
        </form><!-- form -->
    </div><!-- search-popup-content -->
</div><!-- search-popup -->
