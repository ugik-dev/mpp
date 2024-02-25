<header class="header">
    <div class="topbar">
        <div class="topbar-inner">
            <div class="topbar-left">
                <div class="topbar-socials">
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </div>
                <div class="topbar-info">
                    <ul>
                        <li>
                            <div class="topbar-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div><!-- topbar-icon -->
                            <div class="topbar-text">
                                <a href="mailto:needhelp@company.com">needhelp@company.com</a>
                            </div><!-- topbar-text -->
                        </li><!-- li -->
                        <li>
                            <div class="topbar-icon">
                                <i class="fa-solid fa-clock"></i>
                            </div><!-- topbar-icon -->
                            <div class="topbar-text">
                                <span>Open Hours: Mon - Fri 8.00 am - 6.00 pm</span>
                            </div><!-- topbar-text -->
                        </li><!-- li -->
                    </ul><!-- ul -->
                </div><!--topbar-info-->
            </div><!-- topbar-left -->
            <div class="topbar-right">
                <ul>
                    <li><a href="department-details.html">Council</a></li>
                    <li><a href="departments.html">Government</a></li>
                    <li><a href="contact.html">Complaints</a></li>
                </ul><!-- ul -->
            </div><!--topbar-right-->
        </div><!-- topbar-inner -->
    </div><!--topbar-->
    <div class="main-menu sticky-header">
        <div class="main-menu-inner">
            <div class="main-menu-left">
                <div class="main-menu-logo">
                    <a href="index.html"><img src="assets/image/logo.png" alt="img-1" width="140"></a>
                </div><!-- main-menu-logo -->
                <div class="navigation">
                    @php
                        $menus = menus();
                    @endphp
                    <ul class="main-menu-list list-unstyled">
                        @foreach ($menus as $menu)
                            @php
                                $children = $menu->children;
                            @endphp
                            <li class="{{ $children ? 'has-dropdown' : '' }}">
                                <a href="{{ $menu->jenis == 'rotute' ? route('home') : '#' }}">{{ $menu->name }}</a>
                                @if ($children)
                                    <ul class="list-unstyled">
                                        @foreach ($menu->children as $ch)
                                            @php
                                                $sub_children = $ch->children;
                                            @endphp
                                            <li class="{{ $sub_children ? 'has-dropdown' : '' }}"><a
                                                    href="#">{{ $ch->name }}</a>
                                                {{-- j --}}
                                                @if ($sub_children)
                                                    <ul class="list-unstyled">
                                                        @foreach ($ch->children as $ch2)
                                                            <li class=""><a
                                                                    href="{{ $ch2->jenis == 'pages' ? url('page/' . $menu->slug . '/' . $ch->slug . '/' . $ch2->slug) : '#' }}">{{ $ch2->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                {{-- j --}}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        <li class="active has-dropdown">
                            <a href="#">Home</a>
                            <ul class="list-unstyled">
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                            </ul><!-- list-unstyled -->
                        </li>
                        {{-- <li class="has-dropdown">
                            <a href="#">Pages</a>
                            <ul class="list-unstyled">
                                <li><a href="about.html">About</a></li>
                                <li><a href="team.html">Team</a></li>
                                <li><a href="team-details.html">Team Details</a></li>
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                <li><a href="causes.html">Causes</a></li>
                                <li><a href="cause-details.html">Cause Details</a></li>
                            </ul><!-- list-unstyled -->
                        </li>
                        <li class="has-dropdown">
                            <a href="#">Services</a>
                            <ul class="list-unstyled">
                                <li><a href="services.html">Services</a></li>
                                <li><a href="service-details.html">Service Details</a></li>
                            </ul><!-- list-unstyled -->
                        </li>
                        <li class="has-dropdown">
                            <a href="#">Departments</a>
                            <ul class="list-unstyled">
                                <li><a href="departments.html">Departments</a></li>
                                <li><a href="department-details.html">Department Details</a></li>
                            </ul><!-- list-unstyled -->
                        </li>
                        <li class="has-dropdown">
                            <a href="#">Events</a>
                            <ul class="list-unstyled">
                                <li><a href="events.html">Events</a></li>
                                <li><a href="event-details.html">Event Details</a></li>
                            </ul><!-- list-unstyled -->
                        </li> --}}
                        {{-- <li class="has-dropdown">
                            <a href="#">News</a>
                            <ul class="list-unstyled">
                                <li><a href="news.html">News</a></li>
                                <li><a href="news-details.html">News Details</a></li>
                            </ul><!-- list-unstyled -->
                        </li> --}}
                        <li><a href="contact.html">Contact</a>
                        </li>
                        <!-- li -->
                    </ul><!-- main-menu-list -->
                </div><!-- navigation -->
            </div><!-- main-menu-left -->
            <div class="main-menu-right">
                <div class="mobile-menu-button mobile-nav-toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- mobile-menu-button -->
                <div class="search-box">
                    <a href="#" class="search-toggler">
                        <i class="flaticon-search-interface-symbol"></i>
                    </a><!-- search-toggler -->
                </div><!-- search-box -->
                <div class="main-menu-right-button">
                    <a href="{{ route('login') }}" class="btn btn-primary">Panel</a>
                </div>
            </div>
        </div>
    </div>
</header>
