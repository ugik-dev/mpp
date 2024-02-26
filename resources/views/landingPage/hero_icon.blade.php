<section class="department-section">
    <div class="container">
        <div class="department-section-inner">
            <div class="row row-gutter-y-40 d-flex justify-content-center">
                @foreach ($hero_icon as $icon)
                    @php
                        if ($icon->button == 'Y') {
                            if ($icon->button_type == 'content') {
                                $link = url('content/' . $icon->key);
                            } elseif ($icon->button_type == 'link') {
                                $link = $icon->link;
                            } else {
                                $link = '#';
                            }
                        } else {
                            $link = '#';
                        }
                    @endphp
                    <div class="col-xl-2 col-lg-4 col-md-6">
                        <div class="department-card">
                            <div class="department-card-icon">
                                <a href="{{ $link }}"><i class="{{ $icon->icon }}"></i></a>
                            </div>
                            <div class="department-card-content">
                                <h5><a href="{{ $link }}">{{ $icon->text }} </a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-xl-2 col-lg-4 col-md-6">
                    <div class="department-card">
                        <div class="department-card-icon">
                            <a href="departments.html"><i class="flaticon-parthenon"></i></a>
                        </div>
                        <div class="department-card-content">
                            <h5><a href="department-details.html">Your Government</a></h5>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-xl-2 col-lg-4 col-md-6">
                    <div class="department-card">
                        <div class="department-card-icon">
                            <a href="departments.html"><i class="flaticon-suitcase"></i></a>
                        </div><!-- department-card-icon -->
                        <div class="department-card-content">
                            <h5><a href="department-details.html">Jobs & Unemployment</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <div class="department-card">
                        <div class="department-card-icon">
                            <a href="departments.html"><i class="flaticon-industry"></i></a>
                        </div><!-- department-card-icon -->
                        <div class="department-card-content">
                            <h5><a href="department-details.html">Business & Industry</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <div class="department-card">
                        <div class="department-card-icon">
                            <a href="departments.html"><i class="flaticon-bus"></i></a>
                        </div><!-- department-card-icon -->
                        <div class="department-card-content">
                            <h5><a href="department-details.html">Roads & Transport</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <div class="department-card">
                        <div class="department-card-icon">
                            <a href="departments.html"><i class="flaticon-lotus"></i></a>
                        </div><!-- department-card-icon -->
                        <div class="department-card-content">
                            <h5><a href="department-details.html">Culture & Recreation</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6">
                    <div class="department-card">
                        <div class="department-card-icon">
                            <a href="departments.html"><i class="flaticon-balance-1"></i></a>
                        </div><!-- department-card-icon -->
                        <div class="department-card-content">
                            <h5><a href="department-details.html">Justice, Safety Law</a></h5>
                        </div>
                    </div>
                </div> --}}
            </div><!-- row -->
        </div><!--department-section-inner-->
    </div><!-- container -->
    {{-- <div class="department-search-section">
        <div class="container">
            <form class="department-search-form">
                <input type="text" placeholder="Get our quick services from the city municipal" name="search">
                <button type="submit">View All Services</button>
            </form>
        </div>
    </div> --}}
</section>
