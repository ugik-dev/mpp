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
                    <h3>e-Survey</h3>
                </div>
            </div>
        </section>
        <section class="news-details-section">
            <div class="container">
                <div class="row">


                    <div class="col-lg-8">
                        <div class="news-details-content-box mb-5">
                            <h2 class="department-details-title">E-Survey Kepuasan Masyarakat</h2>
                            <span>Survey Kepuasan Masyarakat bertujuan untuk mengetahui tingkat kinerja Mall Pelayanan
                                Publik Kabupaten Bangka secara berkala sebagai bahan untuk menetapkan kebijakan dalam rangka
                                peningkatan kualitas pelayanan publik selanjutnya.</span>
                            {{-- <br> --}}
                        </div>

                        <form class="contact-form" id="form_survey" action="{{ route('survey-post') }}">
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
                                <label>1. Bagaimana pendapat anda tentang kesesuaian persyaratan pelayanan dengan jenis
                                    pelayanan ?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="kesesuaian"
                                            id="kesesuaian4" value="4">
                                        <label class="form-check-label" for="kesesuaian4">
                                            Sangat Baik
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="kesesuaian"
                                            id="kesesuaian3" value="3">
                                        <label class="form-check-label" for="kesesuaian3">
                                            Cukup Baik
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="kesesuaian"
                                            id="kesesuaian2" value="2">
                                        <label class="form-check-label" for="kesesuaian2">
                                            Kurang Baik
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kesesuaian"
                                            id="kesesuaian1" value="1">
                                        <label class="form-check-label" for="kesesuaian1">
                                            Tidak Baik
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>2. Bagaimana pemahaman anda tentang kemudahan prosedur pelayanan di Dinas Kesehatan
                                    Kab. Bangka ?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="kemudahan" id="kemudahan4"
                                            value="4">
                                        <label class="form-check-label" for="kemudahan4">
                                            Sangat Mudah
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="kemudahan" id="kemudahan3"
                                            value="3">
                                        <label class="form-check-label" for="kemudahan3">
                                            Cukup Mudah
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="kemudahan" id="kemudahan2"
                                            value="2">
                                        <label class="form-check-label" for="kemudahan2">
                                            Kurang Mudah
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kemudahan" id="kemudahan1"
                                            value="1">
                                        <label class="form-check-label" for="kemudahan1">
                                            Tidak Mudah
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>3. Bagaimana pendapat anda tentang kecepatan waktu dalam memberikan pelayanan
                                    ?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="kecepatan" id="kecepatan4"
                                            value="4">
                                        <label class="form-check-label" for="kecepatan4">
                                            Sangat Cepat
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="kecepatan" id="kecepatan3"
                                            value="3">
                                        <label class="form-check-label" for="kecepatan3">
                                            Cukup Cepat
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="kecepatan" id="kecepatan2"
                                            value="2">
                                        <label class="form-check-label" for="kecepatan2">
                                            Kurang Cepat
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kecepatan" id="kecepatan1"
                                            value="1">
                                        <label class="form-check-label" for="kecepatan1">
                                            Tidak Cepat
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>4. Bagaimana pendapat anda tentang biaya / tarif dalam pelayanan ?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="tarif" id="tarif4"
                                            value="4">
                                        <label class="form-check-label" for="tarif4">
                                            Gratis Tampa Biaya
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="tarif" id="tarif3"
                                            value="3">
                                        <label class="form-check-label" for="tarif3">
                                            Murah
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="tarif" id="tarif2"
                                            value="2">
                                        <label class="form-check-label" for="tarif2">
                                            Lumayan Mahal
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tarif" id="tarif1"
                                            value="1">
                                        <label class="form-check-label" for="tarif1">
                                            Sangat Mahal
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>5. Bagaimana pendapat anda tentang kesesuaian produk pelayanan antara yang tercantum
                                    dalam standar pelayanan dengan yang diberikan ?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="sop" id="sop4"
                                            value="4">
                                        <label class="form-check-label" for="sop4">
                                            Sangat Sesuai
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="sop" id="sop3"
                                            value="3">
                                        <label class="form-check-label" for="sop3">
                                            Cukup Sesuai
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="sop" id="sop2"
                                            value="2">
                                        <label class="form-check-label" for="sop2">
                                            Kurang Sesuai
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sop" id="sop1"
                                            value="1">
                                        <label class="form-check-label" for="sop1">
                                            Tidak Sesuai
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>6. Bagaimana pendapat anda tentang kompetensi / kemampuan petugas dalam memberikan
                                    pelayanan ?</label>
                                <div class="col-12">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="kompetensi"
                                            id="kompetensi4" value="4">
                                        <label class="form-check-label" for="kompetensi4">
                                            Sangat Kompeten / Sangat Mampu
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="kompetensi"
                                            id="kompetensi3" value="3">
                                        <label class="form-check-label" for="kompetensi3">
                                            Cukup Kompeten / Sangat Mampu
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="kompetensi"
                                            id="kompetensi2" value="2">
                                        <label class="form-check-label" for="kompetensi2">
                                            Kurang Kompeten / Sangat Mampu
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="kompetensi"
                                            id="kompetensi1" value="1">
                                        <label class="form-check-label" for="kompetensi1">
                                            Tidak Kompeten / Sangat Mampu
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>7. Bagaimana pendapat anda terhadap perilaku terkait kesopanan dan keramahan petugas
                                    dalam memberikan pelayanan ?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="prilaku" id="prilaku4"
                                            value="4">
                                        <label class="form-check-label" for="prilaku4">
                                            Sangat Baik
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="prilaku" id="prilaku3"
                                            value="3">
                                        <label class="form-check-label" for="prilaku3">
                                            Cukup Baik
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="prilaku" id="prilaku2"
                                            value="2">
                                        <label class="form-check-label" for="prilaku2">
                                            Kurang Baik
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prilaku" id="prilaku1"
                                            value="1">
                                        <label class="form-check-label" for="prilaku1">
                                            Tidak Baik
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>8. Bagaimana pendapat anda tentang kualitas sarana dan prasarana ?</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="sarpras" id="sarpras4"
                                            value="4">
                                        <label class="form-check-label" for="sarpras4">
                                            Sangat Baik
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="sarpras" id="sarpras3"
                                            value="3">
                                        <label class="form-check-label" for="sarpras3">
                                            Cukup Baik
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline mr-4">
                                        <input class="form-check-input" type="radio" name="sarpras" id="sarpras2"
                                            value="2">
                                        <label class="form-check-label" for="sarpras2">
                                            Kurang Baik
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sarpras" id="sarpras1"
                                            value="1">
                                        <label class="form-check-label" for="sarpras1">
                                            Tidak Baik
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-12 col-md-12 col-sm-12 col-xl-12">
                                <label>9. Bagaimana pendapat anda tentang penanganan pengaduan, saran dan masukan pengguna
                                    layanan</label>
                                <div class="col-12">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="pengaduan" id="pengaduan4"
                                            value="4">
                                        <label class="form-check-label" for="pengaduan4">
                                            Sangat baik, cepat ditindak lanjuti
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="pengaduan" id="pengaduan3"
                                            value="3">
                                        <label class="form-check-label" for="pengaduan3">
                                            Bersungsi kurang maksimal, lambat ditindak lanjuti
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="pengaduan" id="pengaduan2"
                                            value="2">
                                        <label class="form-check-label" for="pengaduan2">
                                            Ada tetapi tidak berfungsi
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="pengaduan" id="pengaduan1"
                                            value="1">
                                        <label class="form-check-label" for="pengaduan1">
                                            Tidak Ada
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="send-message text-center">
                                <div class="form-inline">
                                    @csrf
                                    {{-- <label class="mr-2" for="pengaduan1">
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
                url: '{{ route('survey-post') }}',
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
