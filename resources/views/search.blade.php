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
    </style>
    <div class="page-wrapper">
        <section class="page-banner">
            <div class="container">
                <div class="page-breadcrumbs">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Search</li>
                    </ul><!-- list-unstyled -->
                </div><!-- page-breadcrumbs -->
                <div class="page-banner-title">
                    <h3>Search</h3>
                </div><!-- page-banner-title -->
            </div><!-- container -->
        </section><!--page-banner-->
        <section class="blog-section blog-section-two">
            <div class="container">
                <div class="row row-gutter-y-155">
                    @foreach ($contents as $item)
                        @php
                            $url = route('blog', [$item->prefix, $item->slug]);
                        @endphp
                        <div class="col-lg-6 col-xl-4">
                            <div class="blog-card">
                                <div class="blog-card-image">
                                    @if ($item->sampul)
                                        <img src="{{ url('storage/upload/content/' . $item->sampul) }}"
                                            class="img-fluid img-search" alt="">
                                    @else
                                        <img src="assets/background/bg-{{ str_pad(rand(1, 23), 2, '0', STR_PAD_LEFT) }}.jpg"
                                            class="img-fluid img-search" alt="img-22">
                                    @endif
                                    <a href="{{ $url }}"></a>
                                </div><!-- blog-card-image -->
                                <div class="blog-card-date">
                                    <a
                                        href="{{ $url }}">{{ \Carbon\Carbon::parse($item->tanggal)->format('j M y') }}</a>
                                </div><!-- blog-card-date -->
                                <div class="blog-card-content">
                                    <div class="blog-card-meta">
                                        <span class="author">
                                            by <a href="{{ $url }}"> {{ $item->user_name }}</a>
                                        </span><!-- author -->
                                        @if (count($item->comment) > 0)
                                            <span class="comment">
                                                <a href="{{ $url }}"> {{ count($item->comment) }} Komentar</a>
                                            </span>
                                        @endif
                                        @if ($item->view > 0)
                                            <span class="view">
                                                <a href="{{ $url }}">{{ $item->view }} Dilikat</a>
                                            </span>
                                        @endif
                                    </div><!-- blog-card-meta -->
                                    <h4><a href="{{ $url }}">{{ $item->judul }}</a></h4>
                                    <p>{{ substr(strip_tags($item->content), 0, 100) }}</p>
                                </div><!-- blog-card-content -->
                            </div><!-- blog-card -->
                        </div>
                    @endforeach
                </div><!-- row -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="blog-pagination-outer">
                            <div class="blog-pagination">
                                {{ $contents->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- container -->
        </section><!--blog-section-->
    </div>
@endsection
