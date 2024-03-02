@extends('homeLayout/index')
@section('style')
    <style>
        .portal-btn {
            border-radius: 30px;
            height: 100%;
            /* margin: 0 auto; */
            vertical-align: middle !important;
            padding: auto !important;
            /* display: table-cell; */
            /* display: inline-block; */
            /* line-height: 0px; */
            /* vertical-align: middle; */
            /* text-align: center; */
            border: 3px solid;
            font-weight: bold;
            opacity: 0.8;
        }
    </style>
@endsection
@section('content')
    {{-- <div class="page-wrapper"> --}}
    <section class="portal-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mayor-box portal-box">
                        <div class="section-title-box">

                            <div class="section-tagline">Portal</div><!-- section-tagline -->
                            {{-- <h6 class="section-title">Major Voice of City Government</h6> --}}
                            <p>Selamat datang di Portal Pelayanan Publik .</p>
                            <div class="col-lg-12 col-sm-7 col-xs-5 group-button-portal">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-7">
                                        <a class="btn btn-primary btn-outline-success w-100 portal-btn align-middle"
                                            href="{{ route('home') }}"><b>Home</b></a>
                                    </div>
                                    <div class="col-lg-6 col-sm-7 ">
                                        <a class="btn btn-primary btn-outline-success w-100 portal-btn"
                                            href="https://dinpmp2kukm.bangka.go.id/">Website DINPMP2KUKM</a>
                                    </div>
                                    <div class="col-lg-6 col-sm-7 ">
                                        <a class="btn btn-primary btn-outline-success w-100 portal-btn"
                                            href="https://bangka.go.id/">Website Kabupaten</a>
                                    </div>
                                    <div class="col-lg-6 col-sm-7 ">
                                        <a class="btn btn-primary btn-outline-success w-100 portal-btn"
                                            href="{{ url('berita') }}">Event</a>
                                    </div>
                                    <div class="col-lg-6 col-sm-7 ">
                                        <a class="btn btn-primary btn-outline-success w-100 portal-btn"
                                            href="{{ url('berita') }}">Layanan</a>
                                    </div>
                                    {{-- @for ($i = 1; $i <= 7; $i++)
                                        <div class="col-lg-6 col-sm-7 ">
                                            <button class="btn btn-primary btn-outline-success w-100 portal-btn"
                                                style="">Website</button>
                                        </div>
                                    @endfor --}}
                                </div>
                            </div>
                        </div>
                        <img src="assets/image/shapes/shape-1.png" class="floated-image-one" alt="img-7">
                        {{-- <img src="assets/image/istri.png" class="floated-image-two" alt="img-7"> --}}
                        <img src="assets/image/woman-service.png" class="floated-image-two" alt="img-7">

                        <!--section-title-box-->
                        {{-- <div class="mayor-icon-box">
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
                            </ul><!-- ul --> --}}
                    </div><!--mayor-box-->
                </div><!-- col-lg-6 -->
                {{-- <div class="col-lg-6"> --}}
                {{-- <div class="mayor-img"> --}}
                {{-- <img src="assets/image/shapes/shape-1.png" class="floated-image-one" alt="img-7"> --}}
                {{-- <img class="w-100" src="assets/image/woman-service.png" alt="img-8"> --}}
                {{-- <div class="mayor-name">
                            Dian Firnandy, SE
                        </div><!-- mayor-name --> --}}
                {{-- </div><!--mayor-img--> --}}
                {{-- </div><!--col-lg-6"--> --}}
            </div><!-- row -->
        </div><!-- container -->
    </section><!--mayor-section-->
    {{-- </div> --}}
    {{-- <script>
        document.getElementById("menu_home").classList.add("active")
    </script> --}}
@endsection
