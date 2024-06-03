@extends('homeLayout/index')
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
                    <h3>e-Survey Persepsi Korupsi</h3>
                </div>
            </div>
        </section>
        <section class="news-details-section">
            <div class="container">
                <div class="row">


                    <div class="col-lg-8">
                        <div class="news-details-content-box mb-5">
                            <h2 class="department-details-title">E-Survey Persepsi Korupsi</h2>
                            {{-- <span>Survey Kepuasan Masyarakat bertujuan untuk mengetahui tingkat kinerja Mall Pelayanan
                                Publik Kabupaten Bangka secara berkala sebagai bahan untuk menetapkan kebijakan dalam rangka
                                peningkatan kualitas pelayanan publik selanjutnya.</span> --}}
                            {{-- <br> --}}
                        </div>

                        <form class="contact-form" id="form_survey" action="{{ route('survey-kpk-post') }}">
                            <div class="row">
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
                            <label>Pesan / Kesan / Saran / Masukan</label>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12 message-box">
                                <textarea id="message" rows="6" class="input-text" name="alasan"
                                    placeholder="Pesan / Kesan / Saran / Masukan"></textarea>
                                {{-- <span class="form-icon"><i class="fas fa-edit"></i></span> --}}
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>Secara umum / keseluruhan, menurut anda bagaimana proses pelayanan yang diberikan
                                    oleh Dinas Kesehatan Kab. Bangka ?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="respon" id="respon4"
                                            value="4" required
                                            oninvalid="this.setCustomValidity('Pilih salahsatu jawaban')"
                                            onclick="clearValidity()">
                                        <label class=" form-check-label" for="respon4">
                                            Sangat Baik
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="respon" id="respon3"
                                            value="3" onclick="clearValidity()">
                                        <label class="form-check-label" for="respon3">
                                            Cukup Baik
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="respon" id="respon2"
                                            value="2" onclick="clearValidity()">
                                        <label class="form-check-label" for="respon2">
                                            Kurang Baik
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="respon" id="respon1"
                                            value="1" onclick="clearValidity()">
                                        <label class="form-check-label" for="respon1">
                                            Tidak Baik
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>1. Prosedur/alur pelayanan dapat dipahami dengan jelas?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="prosedur" id="prosedur4"
                                            value="4">
                                        <label class="form-check-label" for="prosedur4">
                                            Sangat Setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="prosedur" id="prosedur3"
                                            value="3">
                                        <label class="form-check-label" for="prosedur3">
                                            Setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="prosedur" id="prosedur2"
                                            value="2">
                                        <label class="form-check-label" for="prosedur2">
                                            Kurang Setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prosedur" id="prosedur1"
                                            value="1">
                                        <label class="form-check-label" for="prosedur1">
                                            Tidak Setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>2. Persyaratan pelayanan dipenuhi dengan mudah ?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="persyaratan"
                                            id="persyaratan4" value="4">
                                        <label class="form-check-label" for="persyaratan4">
                                            Sangat Setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="persyaratan"
                                            id="persyaratan3" value="3">
                                        <label class="form-check-label" for="persyaratan3">
                                            Setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="persyaratan"
                                            id="persyaratan2" value="2">
                                        <label class="form-check-label" for="persyaratan2">
                                            Kurang Setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="persyaratan"
                                            id="persyaratan1" value="1">
                                        <label class="form-check-label" for="persyaratan1">
                                            Tidak Setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>3. Jangka waktu pelayanan dilaksanakan sesuai dengan ketentuan yang
                                    dipublikasikan/standar</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="waktu" id="waktu4"
                                            value="4">
                                        <label class="form-check-label" for="waktu4">
                                            Sangat setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="waktu" id="waktu3"
                                            value="3">
                                        <label class="form-check-label" for="waktu3">
                                            Setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="waktu" id="waktu2"
                                            value="2">
                                        <label class="form-check-label" for="waktu2">
                                            Kurang setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="waktu" id="waktu1"
                                            value="1">
                                        <label class="form-check-label" for="waktu1">
                                            Tidak setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>4. Jam pelayanan sesuai dengan waktu yang dipublikasikan?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="jam" id="jam4"
                                            value="4">
                                        <label class="form-check-label" for="jam4">
                                            Sangat setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="jam" id="jam3"
                                            value="3">
                                        <label class="form-check-label" for="jam3">
                                            Setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="jam" id="jam2"
                                            value="2">
                                        <label class="form-check-label" for="jam2">
                                            Kurang setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jam" id="jam1"
                                            value="1">
                                        <label class="form-check-label" for="jam1">
                                            Tidak setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>5. Petugas memberikan pelayanan dengan cepat dan responsif ?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="petugas" id="petugas4"
                                            value="4">
                                        <label class="form-check-label" for="petugas4">
                                            Sangat Setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="petugas" id="petugas3"
                                            value="3">
                                        <label class="form-check-label" for="petugas3">
                                            Setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="petugas" id="petugas2"
                                            value="2">
                                        <label class="form-check-label" for="petugas2">
                                            Kurang Setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="petugas" id="petugas1"
                                            value="1">
                                        <label class="form-check-label" for="petugas1">
                                            Tidak Setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>6. Aplikasi sistem pelayanan mudah digunakan (jika pelayanan menggunakan aplikasi)
                                    ?</label>
                                <div class="col-12">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="aplikasi" id="aplikasi4"
                                            value="4">
                                        <label class="form-check-label" for="aplikasi4">
                                            Sangat setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="aplikasi" id="aplikasi3"
                                            value="3">
                                        <label class="form-check-label" for="aplikasi3">
                                            setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="aplikasi" id="aplikasi2"
                                            value="2">
                                        <label class="form-check-label" for="aplikasi2">
                                            Kurang setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="aplikasi" id="aplikasi1"
                                            value="1">
                                        <label class="form-check-label" for="aplikasi1">
                                            Tidak setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>7. Fasilitas tidak_meminta (tempat tidak_meminta/hotline/call center) jelas, mudah
                                    akses dan
                                    responsif?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="fasilitas" id="fasilitas4"
                                            value="4">
                                        <label class="form-check-label" for="fasilitas4">
                                            Sangat setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="fasilitas" id="fasilitas3"
                                            value="3">
                                        <label class="form-check-label" for="fasilitas3">
                                            Setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="fasilitas" id="fasilitas2"
                                            value="2">
                                        <label class="form-check-label" for="fasilitas2">
                                            Kurang setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fasilitas" id="fasilitas1"
                                            value="1">
                                        <label class="form-check-label" for="fasilitas1">
                                            Tidak setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>8. Petugas tidak menerima imbalan uang/barang (gratifikasi) ?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="tidak_menerima"
                                            id="tidak_menerima4" value="4">
                                        <label class="form-check-label" for="tidak_menerima4">
                                            Sangat setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="tidak_menerima"
                                            id="tidak_menerima3" value="3">
                                        <label class="form-check-label" for="tidak_menerima3">
                                            Setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="tidak_menerima"
                                            id="tidak_menerima2" value="2">
                                        <label class="form-check-label" for="tidak_menerima2">
                                            Kurang setuju
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tidak_menerima"
                                            id="tidak_menerima1" value="1">
                                        <label class="form-check-label" for="tidak_menerima1">
                                            Tidak setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>9. Petugas tidak meminta imbalan atas pelayanan yang diberikan</label>
                                <div class="col-12">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_meminta"
                                            id="tidak_meminta4" value="4">
                                        <label class="form-check-label" for="tidak_meminta4">
                                            Sangat setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_meminta"
                                            id="tidak_meminta3" value="3">
                                        <label class="form-check-label" for="tidak_meminta3">
                                            Setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_meminta"
                                            id="tidak_meminta2" value="2">
                                        <label class="form-check-label" for="tidak_meminta2">
                                            Kurang setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_meminta"
                                            id="tidak_meminta1" value="1">
                                        <label class="form-check-label" for="tidak_meminta1">
                                            Tidak setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>10. Petugas tidak menawarkan pelayanan diluar ketentuan yang berlaku</label>
                                <div class="col-12">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_menawarkan"
                                            id="tidak_menawarkan4" value="4">
                                        <label class="form-check-label" for="tidak_menawarkan4">
                                            Sangat setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_menawarkan"
                                            id="tidak_menawarkan3" value="3">
                                        <label class="form-check-label" for="tidak_menawarkan3">
                                            Setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_menawarkan"
                                            id="tidak_menawarkan2" value="2">
                                        <label class="form-check-label" for="tidak_menawarkan2">
                                            Kurang setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_menawarkan"
                                            id="tidak_menawarkan1" value="1">
                                        <label class="form-check-label" for="tidak_menawarkan1">
                                            Tidak setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>11. Tidak terdapat praktik pungutan liar</label>
                                <div class="col-12">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_pungli"
                                            id="tidak_pungli4" value="4">
                                        <label class="form-check-label" for="tidak_pungli4">
                                            Sangat setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_pungli"
                                            id="tidak_pungli3" value="3">
                                        <label class="form-check-label" for="tidak_pungli3">
                                            Setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_pungli"
                                            id="tidak_pungli2" value="2">
                                        <label class="form-check-label" for="tidak_pungli2">
                                            Kurang setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_pungli"
                                            id="tidak_pungli1" value="1">
                                        <label class="form-check-label" for="tidak_pungli1">
                                            Tidak setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>12. Tidak terdapat praktik percaloan/prantara yang tidak resmi</label>
                                <div class="col-12">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_percaloan"
                                            id="tidak_percaloan4" value="4">
                                        <label class="form-check-label" for="tidak_percaloan4">
                                            Sangat setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_percaloan"
                                            id="tidak_percaloan3" value="3">
                                        <label class="form-check-label" for="tidak_percaloan3">
                                            Setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_percaloan"
                                            id="tidak_percaloan2" value="2">
                                        <label class="form-check-label" for="tidak_percaloan2">
                                            Kurang setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_percaloan"
                                            id="tidak_percaloan1" value="1">
                                        <label class="form-check-label" for="tidak_percaloan1">
                                            Tidak setuju
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>13. Tidak ada deskriminasi dalam pemberian pelayanan</label>
                                <div class="col-12">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_deskriminasi"
                                            id="tidak_deskriminasi4" value="4">
                                        <label class="form-check-label" for="tidak_deskriminasi4">
                                            Sangat setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_deskriminasi"
                                            id="tidak_deskriminasi3" value="3">
                                        <label class="form-check-label" for="tidak_deskriminasi3">
                                            Setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_deskriminasi"
                                            id="tidak_deskriminasi2" value="2">
                                        <label class="form-check-label" for="tidak_deskriminasi2">
                                            Kurang setuju
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="tidak_deskriminasi"
                                            id="tidak_deskriminasi1" value="1">
                                        <label class="form-check-label" for="tidak_deskriminasi1">
                                            Tidak setuju
                                        </label>
                                    </div>
                                </div>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.full.min.js"
        integrity="sha512-orfBhUXN61JpjXpFeA1NkJ1c2IOtytP4aMxpKqpE2ToIEn5wz4+BiM8xLXEJVxCVubpQOQhFbQWdbF3qLkYYcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script>
        function clearValidity() {
            document.getElementById('respon4').setCustomValidity('');
        }
        // $(document).ready(function() {
        //     document.getElementById("menu_informasi").classList.add("active")

        form_survey = $('#form_survey');
        sub_btn = $('#sub_btn');
        $('.select2').select2();


        function clearValidity() {
            document.getElementById('respon4').setCustomValidity('');
        }

        form_survey.submit(function(ev) {
            event.preventDefault();
            $.ajax({
                method: 'POST',
                url: '{{ route('survey-kpk-post') }}',
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
    </script>
@endsection
