@extends('homeLayout/index')
@section('content')
    <div class="page-wrapper">
        <section class="page-banner"
            style="background-image:   linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url({{ asset('assets/image/bg/gedungmall.jpg') }})
            ;background-repeat:no-repeat;
            background-position: center center;
            ">
            <div class="container">
                <div class="page-breadcrumbs">
                    <ul class="list-unstyled">
                        @php
                            if ($data->jenis == 'page') {
                                $ret_link = 'page';
                            } else {
                                $ret_link = '';
                            }
                            $first = '';
                        @endphp
                        @foreach ($parenting as $parent)
                            @if ($parent['slug'] != $data->slug)
                                @php $first .= '/'.$parent['slug'] @endphp
                                <li><a href="{{ $parent['jenis'] == 'page' ? url($first) : '#' }}">{{ $parent['name'] }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="page-banner-title">
                    <h3>{{ $data->name }}</h3>
                </div>
            </div>
        </section>
        <section class="department-details-section">
            <div class="container">
                <div class="row">
                    @include('homeLayout.menu_sidebar')
                    <div class="col-lg-8">
                        {{-- <div class="department-details-imgbox">
                            <img src="assets/image/department/department-1.jpg" class="img-fluid" alt="img-159">
                            <a href="#"></a>
                            <div class="department-details-img-icon">
                                <i class="flaticon-police-badge-1"></i>
                            </div>
                        </div> --}}
                        <div class="department-details-content-box">
                            <h4 class="department-details-title">{{ $data->name }}</h4>
                        </div>
                        <div class="department-details-box">
                            {!! $data->content !!}
                            <div class="department-details-policy">
                                <span>We stand for quality, safety & credibility, so you could be trust us fully about
                                    private jet charters and our working process.</span><!-- span -->
                            </div>
                        </div>
                        <div class="department-details-benefits-inner-box">
                            <div class="row row-gutter-30">
                                {{--  <div class="col-lg-6">
                                    <div class="department-details-benefits-box-image">
                                        <img src="assets/image/department/department-2.jpg" class="img-fluid"
                                            alt="160">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="department-details-benefits-box">
                                        <h3>Our Benefits</h3>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                                        <ul class="list-unstyled list-style">
                                            <li>
                                                <i class="fa-solid fa-circle-arrow-right"></i>
                                                <h5>Praesent efficitur quam sit amet</h5>
                                            </li><!-- li -->
                                            <li>
                                                <i class="fa-solid fa-circle-arrow-right"></i>
                                                <h5>Nunc cursus dolor id purus euismod</h5>
                                            </li><!-- li -->
                                            <li>
                                                <i class="fa-solid fa-circle-arrow-right"></i>
                                                <h5>Quisque tincidunt eros ac place viverra</h5>
                                            </li><!-- li -->
                                        </ul><!-- ul -->
                                    </div><!-- department-details-benefits-box -->
                                </div> --}}
                            </div>
                        </div>
                        {{-- <div class="department-details-law-box">
                            <h4>Europeon Government Law:</h4>
                            <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur iste natus error
                                sit voluptatem accusantium totam rem aperiam, eaque ipsa quae.</p>
                        </div> --}}
                        <div class="department-details-skill-box">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="service-one-card">
                                        <div class="service-one-icon">
                                            <a href="#"><i class="flaticon-education"></i></a>
                                        </div><!-- service-one-icon -->
                                        <div class="service-one-card-content">
                                            <h4><a href="service-details.html">Education & Skills</a></h4>
                                            <p>When nothing prevents our being able to we like best every.</p>
                                        </div><!-- service-one-card-content -->
                                    </div><!--service-one-card-->
                                </div><!--col-12 col-lg-4-->
                                <div class="col-12 col-lg-6">
                                    <div class="service-one-card">
                                        <div class="service-one-icon">
                                            <a href="#"><i class="flaticon-public-transport-1"></i></a>
                                        </div><!-- service-one-icon -->
                                        <div class="service-one-card-content">
                                            <h4><a href="service-details.html">Roads & Transportation</a></h4>
                                            <p>When nothing prevents our being able to we like best every.</p>
                                        </div><!-- service-one-card-content -->
                                    </div><!--service-one-card-->
                                </div><!-- col-12 col-lg-6 -->
                            </div><!-- row -->
                        </div><!-- service-one-inner -->
                        {{-- <div class="accordian-box">
                            <div class="accordian-box-item">
                                <div class="accordian-title">
                                    <h5>What material are used for house building?</h5>
                                    <i class="fa-solid fa-angle-right"></i>
                                </div><!-- accordian-title -->
                                <div class="accordian-content">
                                    <p>Sed rhoncus facilisis purus, at accumsan purus sagittis vitae. Nullam acelit at eros
                                        imperdiet pulvinar velut nisl. Pellentesque sit placerat neque amet sapien semper
                                        tempus.</p>
                                </div>
                            </div>
                            <div class="accordian-box-item active">
                                <div class="accordian-title">
                                    <h5>What are the easiest way to get qoute?</h5>
                                    <i class="fa-solid fa-angle-right"></i>
                                </div><!-- accordian-title -->
                                <div class="accordian-content">
                                    <p>Sed rhoncus facilisis purus, at accumsan purus sagittis vitae. Nullam acelit at eros
                                        imperdiet pulvinar velut nisl. Pellentesque sit placerat neque amet sapien semper
                                        tempus.</p>
                                </div>
                            </div>
                            <div class="accordian-box-item">
                                <div class="accordian-title">
                                    <h5>How much time will I save on a renovation?</h5>
                                    <i class="fa-solid fa-angle-right"></i>
                                </div><!-- accordian-title -->
                                <div class="accordian-content">
                                    <p>Sed rhoncus facilisis purus, at accumsan purus sagittis vitae. Nullam acelit at eros
                                        imperdiet pulvinar velut nisl. Pellentesque sit placerat neque amet sapien semper
                                        tempus.</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div><!-- row -->
            </div>
        </section><!-- department-details-section -->
    </div><!--page-wrapper-->

    <script>
        document.getElementById("menu_{{ $parenting[0]['slug'] }}").classList.add("active")
    </script>
@endsection
