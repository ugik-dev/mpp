@extends('panel/layout/userLayout');
@section('vendor-style')
@endsection



@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $data->jenis_content . ' / ' . $data->judul }}</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 item-center align-items-center">
                <div class="col-lg-12 d-flex">
                    @if (!empty($data->sampul))
                        <img class="mb-2 mt-3 rounded mx-auto " src="{{ url('/upload/content/' . $data->sampul) }}"
                            class="img-thumbnail" />
                    @endif
                </div>
                <div class="col-lg-12">
                    {!! $data->content !!}
                </div>
            </div>
        </div>
    </div>

    <style>
        .close {
            font-size: 1.5rem;
        }

        .galeri-grid img {
            opacity: 0.7;
            cursor: pointer;
            margin: 2rem;
            width: 100%;
        }

        .galeri-grid img:hover {
            opacity: 1;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
    <div class="container">
        <div class="row d-flex flex-wrap align-items-center" data-toggle="modal" data-target="#lightbox">
            <div class="col-12 col-md-6 col-lg-3 galeri-grid">
                <img src="{{ url('/upload/content/' . $data->sampul) }}" data-target="#indicators" data-slide-to="0"
                    alt="" />
            </div>
            <?php $i = 1; ?>
            @foreach ($galeriImage as $img)
                <div class="col-12 col-md-6 col-lg-3 galeri-grid">
                    <img src="{{ url('/upload/content_image/' . $img->filename) }}" data-target="#indicators"
                        data-slide-to="{{ $i++ }}" alt="" />
                </div>
            @endforeach
        </div>

        <!-- Modal -->
        <div class="modal fade" id="lightbox" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close text-right p-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div id="indicators" class="carousel slide" data-interval="false">
                        <ol class="carousel-indicators">
                            <li data-target="#indicators" data-slide-to="0" class="active"></li>
                            <?php $i = 1; ?>
                            @foreach ($galeriImage as $img)
                                <li data-target="#indicators" data-slide-to="{{ $i++ }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ url('/upload/content/' . $data->sampul) }}"
                                    alt="First slide">
                            </div>
                            @foreach ($galeriImage as $img)
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ url('/upload/content_image/' . $img->filename) }}"
                                        alt="Second slide">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#indicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
