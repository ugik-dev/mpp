@extends('homeLayout/index')
@section('content')
    <style>
        .blog-pagination-outer {
            border-top: 1px solid rgba(var(--thm-black-rgb, 0, 59, 73), 0.1);
            padding-top: 50px;
            margin-top: 70px;
        }

        .blog-pagination {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-left: -10px;
            margin-bottom: -10px;
        }

        .blog-pagination a,
        .blog-pagination span {
            margin-left: 10px;
            margin-bottom: 10px;
            width: 46px;
            height: 46px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            background-color: var(--thm-light-bg, #f3f6f7);
            color: var(--thm-black, #003b49);
            font-weight: bold;
            font-size: 14px;
            position: relative;
            border: 1px solid rgba(var(--thm-black-rgb, 0, 59, 73), 0.05);
            overflow: hidden;
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
        }

        .blog-pagination a:hover,
        .blog-pagination span:hover {
            color: #fff;
            background-color: var(--thm-black, #003b49);

        }

        .img-search {
            width: 100% !important
        }

        /* .blog-card-image img {
                                                margin-top: 0px;
                                                height: 120px;
                                            } */
    </style>
    <style>
        .gslide-description {
            background: rgba(0, 0, 0, 0.5) !important;
        }

        .gslide-desc,
        .gslide-title {
            color: white !important;
            text-align: center !important;
            padding: 10px;
            border-radius: 5px;
        }

        .gslide-title {
            font-weight: bold;
            color: white !important;
            text-align: center !important;
            padding: 10px;
            border-radius: 5px;
        }

        .gtitle {
            margin-bottom: 5px;
            /* Space between title and description */
        }

        .thumbnail-gallery {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .thumbnail-gallery a {
            margin: 5px;
            border: 2px solid transparent;
        }

        .thumbnail-gallery a img {
            max-width: 100px;
            max-height: 100px;
            cursor: pointer;
        }

        .thumbnail-gallery a.active {
            border-color: white;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">


    <div class="page-wrapper">
        <section class="page-banner">
            <div class="container">
                <div class="page-breadcrumbs">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Album</li>
                    </ul><!-- list-unstyled -->
                </div><!-- page-breadcrumbs -->
                <div class="page-banner-title">
                    <h3>{{ $album->name }}</h3>
                </div><!-- page-banner-title -->
            </div>
        </section>
        <section class="blog-section blog-section-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row row-gutter-y-155">
                            @foreach ($galeries as $item)
                                <div class="col-lg-6 col-xl-6">
                                    <div class="blog-card">
                                        <div class="blog-card-image">
                                            @if ($item->image)
                                                <img src="{{ url('upload/gallery/' . $item->image) }}"
                                                    class="glightbox img-fluid img-search" data-title="{{ $item->name }}"
                                                    data-description="{{ $item->description }}"
                                                    alt="{{ $item->description }}">
                                            @else
                                                <img data-glightbox="type: image" data-title="{{ $item->name }}"
                                                    data-description="{{ $item->description }}"
                                                    src="{{ url('assets/background') }}/bg-{{ str_pad(rand(1, 23), 2, '0', STR_PAD_LEFT) }}.jpg"
                                                    class="glightbox img-fluid img-search" alt="img-22">
                                            @endif
                                        </div>
                                        <div class="blog-card-content">
                                            <div class="blog-card-meta">
                                            </div>
                                            <h4><a href="#">{{ $item->name }}</a></h4>
                                            <p>{{ substr(strip_tags($item->description), 0, 100) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4" style="margin-top: -120px">
                        <div class="sidebar">
                            @include('sidebar.albums')
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-pagination-outer">
                            <div class="blog-pagination">
                                {{ $galeries->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        const lightbox = GLightbox({
            touchNavigation: true,
            loop: true,
            width: "90vw",
            height: "90vh"
        });
    </script>
@endsection
