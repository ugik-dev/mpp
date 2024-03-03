<header class="header">
    <div class="topbar">
        <div class="topbar-inner">
            <div class="topbar-left">
                <div class="topbar-socials">
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
                </div>
                <div class="topbar-info">
                    <ul>
                        @if ($profile->whatsapp)
                            <li>
                                <div class="topbar-icon">
                                    <i class="fa fa-solid fa-whatsapp"></i>
                                </div>
                                <div class="topbar-text">
                                    <a target="_blank"
                                        href="https://wa.me/{{ formatWhatsAppNumber($profile->whatsapp) }}">{{ $profile->whatsapp }}</a>
                                </div>
                            </li>
                        @endif
                        <li>
                            <div class="topbar-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div><!-- topbar-icon -->
                            <div class="topbar-text">
                                <a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                            </div><!-- topbar-text -->
                        </li><!-- li -->
                        <li>
                            <div class="topbar-icon">
                                <i class="fa-solid fa-clock"></i>
                            </div><!-- topbar-icon -->
                            <div class="topbar-text">
                                <span>Jam Pelayanan : {{ $profile->operational_time }} </span>
                            </div><!-- topbar-text -->
                        </li><!-- li -->
                    </ul><!-- ul -->
                </div><!--topbar-info-->
            </div><!-- topbar-left -->
            <div class="topbar-right">
                <ul>
                    <li><a href="{{ route('home') }}">MPP</a></li>
                    <li><a href="https://bangka.go.id/">Pemkab Bangka</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-menu sticky-header">
        <div class="main-menu-inner">
            <div class="main-menu-left">
                <div class="main-menu-logo">
                    <a href="index.html"><img src="{{ asset('assets/image/logo.png') }}" alt="img-1"
                            width="100%"></a>
                </div>
                <div class="navigation">
                    @php
                        $menus = menus();
                    @endphp
                    <ul class="main-menu-list list-unstyled">
                        @foreach ($menus as $menu)
                            @php
                                $children = $menu->children;
                                $origin_slug = $menu->slug;
                                if ($menu->deletable == 'N' && $menu->editable == 'N') {
                                    $menu->slug = $menu->slug;
                                } else {
                                    $menu->slug = 'page/' . $menu->slug;
                                }
                            @endphp <li class="{{ $children ? 'has-dropdown' : '' }} "
                                id="menu_{{ $origin_slug }}">
                                <a
                                    href="{{ $menu->jenis == 'route' ? route($menu->slug) : ($menu->jenis == 'N' ? '#' : ($menu->jenis == 'pages' ? $menu->slug : ($menu->jenis == 'link' ? $menu->key : '#'))) }}">{{ $menu->name }}</a>
                                @if ($children)
                                    <ul class="list-unstyled">
                                        @foreach ($menu->children as $ch)
                                            @php
                                                $sub_children = $ch->children;
                                                if ($ch->jenis == 'link') {
                                                    $ch_link = $ch->key;
                                                } elseif ($ch->jenis == 'page' || $ch->jenis == 'agency') {
                                                    $ch_link = $menu->slug . '/' . $ch->slug;
                                                    if ($menu->jenis == 'route') {
                                                        $ch_link = route($menu->slug, ['slug2' => $ch->slug]);
                                                    } else {
                                                        $ch_link = url($menu->slug . '/' . $ch->slug);
                                                    }
                                                } elseif ($ch->jenis == 'route') {
                                                    $ch_link = route($ch->slug);
                                                } elseif ($ch->jenis == 'N') {
                                                    $ch_link = '#';
                                                } else {
                                                    $ch_link = '#';
                                                }
                                            @endphp
                                            <li class="{{ $sub_children ? 'has-dropdown' : '' }}"><a
                                                    href="{{ $ch_link }}">{{ $ch->name }}</a>
                                                {{-- j --}}
                                                @if ($sub_children)
                                                    <ul class="list-unstyled">
                                                        @foreach ($ch->children as $ch2)
                                                            @php
                                                                if ($ch2->jenis == 'link') {
                                                                    $ch2_link = $ch2->key;
                                                                } elseif ($ch2->jenis == 'page') {
                                                                    if ($menu->jenis == 'route') {
                                                                        $ch2_link = route($menu->slug, [
                                                                            'slug2' => $ch->slug,
                                                                            'slug3' => $ch2->slug,
                                                                        ]);
                                                                    } else {
                                                                        $ch2_link = url(
                                                                            $menu->slug .
                                                                                '/' .
                                                                                $ch->slug .
                                                                                '/' .
                                                                                $ch2->slug,
                                                                        );
                                                                    }
                                                                } elseif ($ch2->jenis == 'route') {
                                                                    $ch2_link = route($ch2->slug);
                                                                } elseif ($ch2->jenis == 'N') {
                                                                    $ch2_link = '#';
                                                                } else {
                                                                    $ch2_link = '#';
                                                                }
                                                            @endphp
                                                            <li class=""><a
                                                                    href="{{ $ch2_link }}">{{ $ch2->name }}</a>
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
                        {{-- <li class="active has-dropdown">
                            <a href="#">Home</a>
                            <ul class="list-unstyled">
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                            </ul>
                        </li> --}}
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
                        {{-- <li><a href="contact.html">Contact</a>
                        </li> --}}
                        <!-- li -->
                    </ul>
                </div><!-- navigation -->
            </div><!-- main-menu-left -->
            <div class="main-menu-right">
                <div class="mobile-menu-button mobile-nav-toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- mobile-menu-button -->
                <div class="search-box">
                    <a href="{{ route('search') }}" class="search-toggler">
                        <i class="flaticon-search-interface-symbol"></i>
                    </a><!-- search-toggler -->
                </div><!-- search-box -->
                <div class="main-menu-right-button">
                    {{-- <a href="{{ route('login') }}" class="btn btn-primary">Panel</a> --}}
                    <a href="{{ route('portal') }}" class="btn btn-primary">Portal</a>
                </div>
            </div>
        </div>
    </div>
</header>
