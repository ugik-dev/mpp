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
                                <a href="mailto:dinpmp2kukm@gmail.com">dinpmp2kukm@gmail.com</a>
                            </div><!-- topbar-text -->
                        </li><!-- li -->
                        <li>
                            <div class="topbar-icon">
                                <i class="fa-solid fa-clock"></i>
                            </div><!-- topbar-icon -->
                            <div class="topbar-text">
                                <span>Jam Pelayanan: Senin - Sabtu 8.00 - 16.00 </span>
                            </div><!-- topbar-text -->
                        </li><!-- li -->
                    </ul><!-- ul -->
                </div><!--topbar-info-->
            </div><!-- topbar-left -->
            <div class="topbar-right">
                <ul>
                    <li><a href="department-details.html">MPP</a></li>
                    <li><a href="departments.html">Pemkab Bangka</a></li>
                    <li><a href="contact.html">Komplain</a></li>
                </ul><!-- ul -->
            </div><!--topbar-right-->
        </div><!-- topbar-inner -->
    </div><!--topbar-->
    <div class="main-menu sticky-header">
        <div class="main-menu-inner">
            <div class="main-menu-left">
                <div class="main-menu-logo">
                    <a href="index.html"><img src="{{ asset('assets/image/logo.png') }}" alt="img-1"
                            width="140"></a>
                </div><!-- main-menu-logo -->
                <div class="navigation">
                    @php
                        $menus = menus();
                    @endphp
                    <ul class="main-menu-list list-unstyled">
                        <li class=" " id="menu_home">

                            <a href="http://127.0.0.1:8000">Home</a>
                        </li>
                        <li class="has-dropdown " id="menu_tentang">

                            <a href="#">Tentang Kami</a>
                            <ul class="list-unstyled">
                                <li class=""><a href="http://127.0.0.1:8000/page/tentang/moto">Moto</a>


                                </li>
                                <li class=""><a href="http://127.0.0.1:8000/page/tentang/sambutan">Sambutan Kepala
                                        Dinas</a>


                                </li>
                                <li class=""><a href="http://127.0.0.1:8000/page/tentang/visi-misi">Visi dan
                                        Misi</a>


                                </li>
                                <li class=""><a href="http://127.0.0.1:8000/page/tentang/slogan">Slogan</a>


                                </li>
                                <li class=""><a href="http://127.0.0.1:8000/page/tentang/fakta-integritas">Fakta
                                        Integritas</a>


                                </li>
                            </ul>
                        </li>
                        <li class="has-dropdown " id="menu_layanan">

                            <a href="http://127.0.0.1:8000/layanan">Layanan</a>
                            <ul class="list-unstyled">
                                <li class=""><a href="#">MPP</a>


                                </li>
                                <li class=""><a href="#">Dinas PMP2KUKM</a>


                                </li>
                                <li class="has-dropdown"><a href="http://127.0.0.1:8000/layanan/dinas-kesehatan">Dinas
                                        Kesehatan</a>

                                    <ul class="list-unstyled">
                                        <li class=""><a href="http://dinkes.bangka.go.id">Website</a>
                                        </li>
                                        <li class=""><a
                                                href="http://127.0.0.1:8000/layanan/dinas-kesehatan/bpjs-baru">BPJS
                                                Baru</a>
                                        </li>
                                        <li class=""><a
                                                href="http://127.0.0.1:8000/layanan/dinas-kesehatan/bpjs-migrasi">BPJS
                                                Migrasi</a>
                                        </li>
                                    </ul>

                                </li>
                                <li class=""><a href="#">Dinas Sosial</a>


                                </li>
                            </ul>
                        </li>
                        <li class=" " id="menu_bank-data">

                            <a href="#">Bank Data</a>
                        </li>
                        <li class=" " id="menu_pengaduan">

                            <a href="#">Pengaduan</a>
                        </li>
                        <li class=" " id="menu_informasi">

                            <a href="#">Informasi</a>
                        </li>
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
