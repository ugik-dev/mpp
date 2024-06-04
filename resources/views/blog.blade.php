@extends('homeLayout/index')
@section('style')
    <style>
        .captcha {
            width: 50%;
        }

        .captcha img {
            width: 75%;
            height: auto;
        }

        .captcha button {
            width: 25%;
        }
    </style>
@endsection
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
                        <li><a href="{{ $data->prefix }}">{{ $data->ref_content_name }}</a>
                        </li>
                    </ul>
                </div>
                <div class="page-banner-title">
                    <h3>{{ $data->judul }}</h3>
                </div>
            </div>
        </section>
        <section class="news-details-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="news-details-box-image">
                            <div class="news-details-box-image-inner">
                                @if ($data->sampul)
                                    <img src="{{ url('upload/content/' . $data->sampul) }}" class="img-fluid"
                                        alt="{{ $data->judul }}">
                                @endif
                                <a href="#"
                                    class="news-details-box-date">{{ \Carbon\Carbon::parse($data->tanggal)->format('j F Y') }}</a>
                            </div>
                        </div>
                        <div class="news-details-meta-box">
                            <div class="news-details-meta-box-inner">
                                <span class="author">
                                    by <a href="{{ url('search?s=' . $data->user_name) }}">{{ $data->user_name }}</a>
                                </span>
                                <span class="comment">
                                    <a href="#komentar"> {{ count($data->comment) }} Komentar</a>
                                </span>
                                <span class="view">
                                    <a href="{{ url('') }}">{{ $data->view }} Dilikat</a>
                                </span>
                            </div><!-- news-details-meta-box-inner -->
                        </div><!-- news-details-meta-box -->
                        <div class="news-details-content-box">
                            <h4>{{ $data->judul }}</h4>
                            <div class="content-area">
                                {!! $data->content !!}
                            </div>
                        </div>
                        <div class="news-details-share-box">
                            <div class="news-details-inner">
                                <div class="news-details-list">
                                    <div class="news-details-socials">
                                        @php
                                            $urlencode = urlencode($data->judul . "\n" . url()->full());
                                            $encodedTitle = urlencode($data->judul);
                                            $encodedUrl = urlencode(url()->full());
                                        @endphp

                                        <a target="_blank" href="https://api.whatsapp.com/send?text={{ $urlencode }}"><i
                                                class="fa-brands fa-whatsapp"></i></a>
                                        <a target="_blank"
                                            href="https://twitter.com/intent/tweet?text={{ $encodedTitle }}&url={{ $encodedUrl }}"><i
                                                class="fa-brands fa-twitter"></i></a>
                                        <a target="_blank"
                                            href="https://www.facebook.com/sharer/sharer.php?u={{ $encodedUrl }}"><i
                                                class="fa-brands fa-facebook"></i></a>
                                        <a target="_blank" href="https://www.instagram.com/?url={{ url()->full() }}"
                                            rel="noopener"><i class="fa-brands fa-instagram"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-details-comment-list-box" id="komentar">
                            <h6>
                                <span class="ml-2 mr-2"><i class="fa fa-comments"></i> {{ count($data->comment) }} Komentar
                                </span>
                                &nbsp;&nbsp;| &nbsp;&nbsp;
                                <span class="mr-3 ml-3"><i class="fa fa-eye"></i> {{ $data->view }} Dilihat</span>
                            </h6>
                            @foreach ($data->comment as $index => $comment)
                                <div class="news-details-comment-image">
                                    {{-- <img src="assets/image/blog/blog-details-6.jpg" alt="195"> --}}
                                    <div class="news-details-comment-content w-100">
                                        <div class="news-details-meta">
                                            <div class="news-details-meta-number">
                                                <h5>{{ $comment->name }}</h5>
                                            </div><!-- news-details-meta-number -->
                                            <div class="news-details-meta-date">
                                                <span>{{ $comment->created_at->format('j M y') }}</span>
                                            </div><!-- news-details-meta-date -->
                                        </div><!-- news-details-meta-->
                                        <div class="news-details-comment-text">
                                            <p>{{ $comment->message }}</p>
                                        </div><!-- news-details-comment-text -->
                                    </div><!--news-details-comment-content -->
                                    <div class="news-details-comment-button">
                                        <button href="#" class="btn btn-primary reply-btn"
                                            data-id="{{ $index }}">Reply</button>
                                    </div><!-- news-details-comment-button -->
                                </div>
                            @endforeach
                        </div><!-- news-details-comment-list-box -->
                        <div class="news-details-comment-form">
                            <h3>Tinggalkan komentar</h3>
                            <form class="contact-form contact-form-validated" id="form_comment" autocomplete="off">
                                @csrf
                                <div class="row row-gutter-10">
                                    <div class="col-12" id="replylayout">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="input-text" placeholder="Nama Anda" name="name"
                                            aria-required="true">
                                    </div>
                                    <!-- col-12 col-lg-6 -->
                                    <div class="col-12 col-lg-6">
                                        <input type="email" class="input-text" placeholder="Email" name="email"
                                            aria-required="true">
                                    </div>
                                    <!-- col-12 col-lg-6 -->
                                    <div class="col-12 col-lg-12">
                                        <textarea name="message" placeholder="Tulis komentar disini" class="input-text " aria-required="true"></textarea>
                                    </div>
                                    <div class="col-12 col-lg-12 captcha d-flex justify-content-between align-items-center">
                                        {!! captcha_img() !!}
                                        <button type="button" class="ml-4 btn btn-danger" style="margin-left: 0.65rem"
                                            id="reload">
                                            &#x21bb;
                                        </button>
                                    </div>

                                    <div class="col-12 col-lg-12">
                                        <input id="captcha" type="text" class="input-text"
                                            placeholder="Masukkan Captcha" name="captcha">
                                    </div>
                                    <!-- col-12 col-lg-12 -->
                                    <div class="col-12 col-lg-12">
                                        <button class="btn btn-primary" type="submit">Kirim</button>
                                    </div>
                                    <!-- col-12 col-lg-12 -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            @include('sidebar.search')
                            @include('sidebar.recent')
                            @include('sidebar.category')
                            @include('sidebar.tag')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            document.getElementById("menu_informasi").classList.add("active")
            FormComment = {
                'form': $('#form_comment'),
                'replylayout': $('#form_comment').find('#replylayout'),
            }
            var dataKomentar = {!! json_encode($data->comment) !!};

            $('.reply-btn').on('click', function() {
                FormComment.replylayout.html('Balas Untuk')
            })
            FormComment.form.on('submit', (ev) => {
                ev.preventDefault();
                s = FormComment.form.validate();
                Swal.fire({
                    title: "Konfirmasi",
                    icon: 'question',
                    text: "Apakah anda yakin akan mengirimkan komentar ini ?",
                    allowOutsideClick: false,

                    showCancelButton: true,
                    confirmButtonText: "Ya !!",

                }, ).then((result) => {
                    if (!result.isConfirmed) {
                        return;
                    }
                    Swal.fire({
                        title: "Loading!",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: "btn btn-primary waves-effect waves-light d-none",
                        },
                        buttonsStyling: false,
                    });
                    Swal.showLoading();

                    $.ajax({
                        url: '{{ route('blog-comment', $data->id) }}',
                        'type': 'POST',
                        data: FormComment.form.serialize(),
                        success: function(data) {
                            if (data['error']) {
                                Swal.fire({
                                    title: "Gagal",
                                    icon: "error",
                                    text: data['message'],
                                    showClass: {
                                        popup: "animate__animated animate__flipInX",
                                    },
                                    allowOutsideClick: true,
                                    customClass: {
                                        confirmButton: `btn btn-primary waves-effect waves-light`,
                                    },
                                    buttonsStyling: false,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $('#reload').click();
                                    }
                                });

                                return;
                            }
                            let timerInterval;
                            Swal.fire({
                                title: "Berhasil!",
                                icon: 'success',
                                timer: 2500,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const timer = Swal.getPopup()
                                        .querySelector("b");
                                    timerInterval = setInterval(() => {
                                        timer.textContent =
                                            `${Swal.getTimerLeft()}`;
                                    }, 100);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }
                            }).then((result) => {
                                location.reload();
                                // if (result.dismiss === Swal.DismissReason
                                //     .timer) {
                                //     console.log("I was closed by the timer");
                                // }
                            });
                            // var user = data['data']
                            // dataUser[user['id']] = user;
                            // swalBerhasil();
                            // UserForm.modal.modal('hide');
                            // datatable.ajax.reload(null, false);
                        },
                        error: function(e) {}
                    });
                });
                // return;
            })
            $('#reload').click(function() {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('reloadCaptcha') }}',
                    success: function(data) {
                        $('.captcha img').fadeOut('slow', function() {
                            $(this).replaceWith(data.captcha).fadeIn('slow');
                        });
                    }
                });
            });
        })
    </script>
@endsection
