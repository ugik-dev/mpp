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
    <style>
        /* .form-icon>i {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                position: absolute;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                top: 50%;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                right: 45px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                -webkit-transform: translateY(-50%);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                -ms-transform: translateY(-50%);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                transform: translateY(-50%);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                opacity: 0.8;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            form .message-box .form-icon>i {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                top: 15%;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            } */
    </style>
    <div class="page-wrapper">
        <section class="page-banner"
            style="background-image:   linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url({{ asset('assets/image/bg/gedungmall.jpg') }})
            ;background-repeat:no-repeat;
            background-position: center center;
            ">
            <div class="container">
                <div class="page-breadcrumbs">
                    <ul class="list-unstyled">

                        <li><a href="#">Informasi</a>
                        </li>

                    </ul>
                </div>
                <div class="page-banner-title">
                    <h3>e-Pengaduan</h3>
                </div>
            </div>
        </section>
        <section class="news-details-section">
            <div class="container">
                <div class="row">


                    <div class="col-lg-8">
                        <div class="news-details-content-box mb-5">
                            <h2 class="department-details-title">E-Pengaduan</h2>
                            {{-- <span>Survey Kepuasan Masyarakat bertujuan untuk mengetahui tingkat kinerja Mall Pelayanan
                                Publik Kabupaten Bangka secara berkala sebagai bahan untuk menetapkan kebijakan dalam rangka
                                peningkatan kualitas pelayanan publik selanjutnya.</span> --}}
                            {{-- <br> --}}
                        </div>

                        <form class="contact-form" id="form_survey" action="{{ route('pengaduan-post') }}">
                            <div class="row">
                                <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                    <label>Sensor Indentitas (identitas dirahasiakan)</label>
                                    <div class="col-12">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="sensor_indentitas"
                                                id="sensorY" value="Y">
                                            <label class="form-check-label" for="sensorY">
                                                Ya rahasiakan
                                            </label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="radio" name="sensor_indentitas"
                                                id="sensorN" value="N">
                                            <label class="form-check-label" for="sensorN">
                                                Tidak dirahasiakan
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                    <!-- <input type="text" value="" data-msg-required="Masukkan nama anda." maxlength="100" class="form-control input-text text-3 h-auto py-2" name="nama" id="name_survey" required=""> -->
                                    <input type="text" class="form-control input-text" name="nama" id="name_survey"
                                        required="true" placeholder="Nama"
                                        oninvalid="this.setCustomValidity('Masukkan nama anda')"
                                        oninput="this.setCustomValidity('')">
                                    {{-- <span class="form-icon"><i class="fas fa-user"></i></span> --}}
                                </div>
                                <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                    <input type="email" class="form-control input-text" id="email" name="email"
                                        placeholder="E-Mail" required="required"
                                        oninvalid="this.setCustomValidity('Masukkan e-mail anda')"
                                        oninput="this.setCustomValidity('')">
                                    {{-- <span class="form-icon"><i class="fas fa-envelope"></i></span> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                    <input type="text" class="form-control input-text" name="no_hp" id="no_hp"
                                        placeholder="Nomor Telepon" required="required"
                                        oninvalid="this.setCustomValidity('Masukkan nomor telpon anda')"
                                        oninput="this.setCustomValidity('')">
                                    {{-- <span class="form-icon"><i class="fas fa-phone"></i></span> --}}
                                </div>
                                <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                    <!-- <input type="text" value="" maxlength="200" class="form-control input-text text-3 h-auto py-2" name="alamat" id="alamat"> -->
                                    <input type="text" class="form-control input-text" name="alamat" id="alamat"
                                        placeholder="Alamat" required="required"
                                        oninvalid="this.setCustomValidity('Masukkan alamat anda')"
                                        oninput="this.setCustomValidity('')">
                                    {{-- <span class="form-icon"><i class="fas fa-map"></i></span> --}}
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                    <!-- <input type="text" value="" data-msg-required="Masukkan nama anda." maxlength="100" class="form-control input-text text-3 h-auto py-2" name="nama" id="name_survey" required=""> -->
                                    <label>Umur <small>(tahun)</small></label>
                                    <input type="number" class="form-control input-text" name="umur" id="umur"
                                        required="" placeholder="Umur (tahun)" required="required"
                                        oninvalid="this.setCustomValidity('Masukkan umur anda')"
                                        oninput="this.setCustomValidity('')">
                                    <!-- <span class="form-icon"><i class="fas fa-user"></i></span> -->
                                </div>
                                <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                    <label>Jenis Kelamin</label>
                                    <select class='form-control input-text' name="jk" required="required"
                                        oninvalid="this.setCustomValidity('Pilih jenis kelamin anda')"
                                        oninput="this.setCustomValidity('')">
                                        <option value=""></option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                    <label>Pendidikan</label>
                                    <select class='form-control input-text' name="pendidikan" required="required"
                                        oninvalid="this.setCustomValidity('Masukkan pendidikan anda')"
                                        oninput="this.setCustomValidity('')">
                                        <option value=""></option>
                                        <option>SD / MI</option>
                                        <option>SMP / Mts / Sederajat</option>
                                        <option>SMA / SMK / MA / Sederajat</option>
                                        <option>D-1 / D-3</option>
                                        <option>D-4 / S-1</option>
                                        <option>S2 / S3</option>
                                        <option>Tidak Bersekolah</option>
                                    </select>
                                </div>

                                <div class="form-group col-12 col-md-6 col-sm-6 col-xl-6">
                                    <label>Pekerjaan</label>
                                    <select class='form-control input-text' name="pekerjaan" required="required"
                                        oninvalid="this.setCustomValidity('Masukkan pekerjaan anda')"
                                        oninput="this.setCustomValidity('')">
                                        <option value=""></option>
                                        <option>Wiraswasta / Usahawan</option>
                                        <option>Pelajar / Mahasiswa</option>
                                        <option>Pegawai Swasta</option>
                                        <option>TNI / POLRI</option>
                                        <option>PNS</option>
                                        <option>Lainnya</option>
                                    </select>
                                </div>

                                <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                    <label>Faskes / Layanan yang diterima</label>
                                    <select class='form-control input-text select2' name="layanan">
                                        <option value=""></option>
                                        @foreach ($layanan as $l1)
                                            <optgroup value="1" label="{{ $l1->name }}">
                                                @foreach ($l1->childrens as $l2)
                                                    <option value="{{ $l2->id }}">{{ $l2->name }}</option>
                                                @endforeach
                                                <option value="{{ $l1->id }}">Layanan lainnya {{ $l1->name }}
                                                </option>
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label>Masukkan pesan pengaduan</label>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12 message-box">
                                <textarea id="message" rows="6" class="input-text" name="message"
                                    placeholder="Pesan / Kesan / Saran / Masukan"></textarea>
                                {{-- <span class="form-icon"><i class="fas fa-edit"></i></span> --}}
                            </div>

                            <div style="margin-top: 1rem"
                                class="col-12 col-lg-12 captcha d-flex justify-content-between align-items-center">
                                {!! captcha_img() !!}
                                <button type="button" class="ml-4 btn btn-danger" style="margin-left: 0.65rem"
                                    id="reload">
                                    &#x21bb;
                                </button>
                            </div>

                            <div class="col-12 col-lg-12">
                                <input id="captcha" type="text" class="input-text" placeholder="Masukkan Captcha"
                                    name="captcha">
                            </div>
                            <div class="send-message text-center">
                                <div class="form-inline">
                                    @csrf
                                    {{-- <label class="mr-2" for="tidak_meminta1">
                                        Masukkan Captha
                                    </label> --}}
                                    {{-- $captcha  --}}
                                    {{-- <br> <input class="form-control input-text ml-2 mr-2" style="width: 300px !important"
                                        type="text" name="captcha" id="captcha" value=""> --}}
                                </div>
                                <button id="sub_btn" type="submit" class="btn-send btn btn-secondary">Kirim</button>
                            </div>
                            <span class="form-message"></span>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            @include('sidebar.recent')
                        </div>
                    </div>
                </div><!-- row -->
            </div>
        </section><!-- department-details-section -->
    </div><!--page-wrapper-->
@endsection

@section('style')
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    {{--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.full.min.js"
        integrity="sha512-orfBhUXN61JpjXpFeA1NkJ1c2IOtytP4aMxpKqpE2ToIEn5wz4+BiM8xLXEJVxCVubpQOQhFbQWdbF3qLkYYcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script>
        function clearValidity() {
            document.getElementById('respon4').setCustomValidity('');
        }
        // $(document).ready(function() {
        //     document.getElementById("menu_informasi").classList.add("active")

        form_survey = $('#form_survey');
        sub_btn = $('#sub_btn');
        // $('.select2').select2();


        function clearValidity() {
            document.getElementById('respon4').setCustomValidity('');
        }

        form_survey.submit(function(ev) {
            event.preventDefault();
            $.ajax({
                method: 'POST',
                url: '{{ route('pengaduan-post') }}',
                data: form_survey.serialize(),
                success: function(data) {
                    // alert(data);
                    res = data;
                    if (res['error']) {
                        Swal.close();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: res['message'],
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#reload').click();
                            }
                        });
                    } else {
                        let timerInterval
                        Swal.fire({
                            icon: 'success',
                            html: 'Hasil survei berhasil disimpan',
                            timer: 9200,
                            timerProgressBar: true,
                        }).then((result) => {
                            location.reload();
                        })
                    }
                }
            });
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
    </script>
@endsection
