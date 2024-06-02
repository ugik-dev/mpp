@extends('panel/layout/userLayout')
@section('vendor-style')
@endsection
@section('vendor-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/super-build/ckeditor.js"></script>
@endsection


@section('content')
    <div class="container-fluid">
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Kontent</h1>
        </div> --}}

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <form class="add-new-record pt-0 row g-3" id="form-content" onsubmit="return false">
                    @csrf
                    <div class="col-lg-12 mb-3">
                        <div class="row">
                            <h3>Section 2</h3>
                            <div class="col-lg-12">
                                <label for="basicFullname">Title:</label>
                                <div class="input-group">
                                    <input type="text" name="sec_2_title" class="form-control dt-full-name"
                                        value="{{ $data->sec_2_title ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="basicFullname">Sub Title:</label>
                                <div class="input-group">
                                    <input type="text" name="sec_2_sub_title" class="form-control dt-full-name"
                                        value="{{ $data->sec_2_sub_title ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="basicFullname">Deskripsi:</label>
                                <div class="input-group">
                                    <textarea type="text" name="sec_2_description" class="form-control dt-full-name">{{ $data->sec_2_description ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="basicFullname">Video:</label>
                                <div class="input-group">
                                    <input type="text" name="sec_2_video" class="form-control dt-full-name"
                                        value="{{ $data->sec_2_video ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-lg-12" id='list_sec_2_sidebar'>
                                <label for="basicFullname">Sidebar:</label>
                                @php
                                    $sec_2_sidebar =
                                        $data->sec_2_sidebar == null ? [] : json_decode($data->sec_2_sidebar);
                                @endphp
                                @foreach ($sec_2_sidebar as $item)
                                    <div class="input-group mb-2 vision-input">
                                        <input type="text" name="sec_2_sidebar_label[]" class="form-control"
                                            value="{{ $item->label }}" placeholder="Label">
                                        <input type="text" name="sec_2_sidebar_link[]" class="form-control"
                                            value="{{ $item->link }}" placeholder="Link">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-danger remove-vision"
                                                onclick="removeVision(this)">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="col-lg-12">
                                <a class="btn btn-info" id="add_sec_2_sidebar"><i class="fa fa-plus"></i>Tambah</a>
                            </div>
                            <div class="col-lg-12">
                                <label for="basicFullname">Button:</label>
                                <div class="input-group">
                                    <input type="text" name="sec_2_button" class="form-control dt-full-name"
                                        value="{{ $data->sec_2_button ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="basicFullname">Gambar Sidebar:</label>
                                <div class="input-group">
                                    <input type="file" name="sec_2_sidebar_background_upload"
                                        class="form-control dt-full-name" />
                                </div>
                                <img class="thumb-image"
                                    src="{{ url('upload/images/' . $data->sec_2_sidebar_background) }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-5 mt-5">
                        <hr style="height:3px;border:none;color:#060505;background-color:#100f0f;">
                        <div class="row">
                            <h3>Section 3</h3>
                            <div class="col-lg-12">
                                <label for="basicSalary">Tampilkan :</label>
                                <div class="input-group mb-2">
                                    {{-- <div class="form-floating form-floating-outline"> --}}
                                    <!-- <input type="number" id="user_id" name="user_id" class="form-control dt-salary" aria-label="" aria-describedby="basicSalary2" /> -->
                                    <select name="sec_3" class="form-control">
                                        <option value="Y" {{ $data->sec_3 == 'Y' ? 'selected' : '' }}>Y
                                        </option>
                                        <option value="N" {{ $data->sec_3 == 'N' ? 'selected' : '' }}>N
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12" id='list_icon'>
                                @php
                                    $sec_3_data = $data->sec_3_data == null ? [] : json_decode($data->sec_3_data);
                                @endphp
                                @foreach ($sec_3_data as $item)
                                    <div class="input-group mb-2 vision-input">
                                        <input type="text" name="sec_3_data_icon[]" class="form-control"
                                            value="{{ $item->icon }}" placeholder="Icon">
                                        <input type="number" name="sec_3_data_value[]" class="form-control"
                                            value="{{ $item->value ?? '' }}" placeholder="Value">
                                        <input type="text" name="sec_3_data_satuan[]" class="form-control"
                                            value="{{ $item->satuan ?? '' }}" placeholder="Satuan">
                                        <input type="text" name="sec_3_data_desc[]" class="form-control"
                                            value="{{ $item->desc }}" placeholder="Deskripsi">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-danger remove-vision"
                                                onclick="removeVision(this)">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="col-lg-12">
                                <a class="btn btn-info" id="add_icon"><i class="fa fa-plus"></i>Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <hr style="height:3px;border:none;color:#060505;background-color:#100f0f;">
                        <div class="row">
                            <h3>Section 4</h3>
                            <div class="col-lg-12">
                                <label for="basicFullname">Title:</label>
                                <div class="input-group">
                                    <input type="text" name="sec_4_title" class="form-control dt-full-name"
                                        value="{{ $data->sec_4_title ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="basicFullname">Sub Title:</label>
                                <div class="input-group">
                                    <input type="text" name="sec_4_sub_title" class="form-control dt-full-name"
                                        value="{{ $data->sec_4_sub_title ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="basicFullname">Deskripsi:</label>
                                <div class="input-group">
                                    <textarea type="text" name="sec_4_description" class="form-control dt-full-name">{{ $data->sec_4_description ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="basicFullname">Nama:</label>
                                <div class="input-group">
                                    <input type="text" name="sec_4_name" class="form-control dt-full-name"
                                        value="{{ $data->sec_4_name ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-lg-12" id='list_sec_4_list'>
                                <label for="basicFullname">List Point:</label>
                                @php
                                    $sec_4_list = $data->sec_4_list == null ? [] : json_decode($data->sec_4_sidebar);
                                @endphp
                                @foreach (json_decode($data->sec_4_list) ?? [] as $item)
                                    <div class="input-group mb-2 vision-input">
                                        <input type="text" name="sec_4_list[]" class="form-control"
                                            value="{{ $item }}" placeholder="Label">

                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-danger remove-vision"
                                                onclick="removeVision(this)">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="col-lg-12">
                                <a class="btn btn-info" id="add_sec_4_list"><i class="fa fa-plus"></i>Tambah</a>
                            </div>
                            <div class="col-lg-12">
                                <label for="basicFullname">Gambar:</label>
                                <div class="input-group">
                                    <input type="file" name="sec_4_image_upload" class="form-control dt-full-name" />
                                </div>
                                <img class="thumb-image" src="{{ url('upload/images/' . $data->sec_4_image) }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="" class="btn btn-primary data-submit me-sm-3 me-1 text-white"
                            type="submit">Simpan</button>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            let html_content;
            var toolbar = {
                'form': $('#toolbar_form'),
                'id_role': $('#toolbar_form').find('#id_role'),
                'id_opd': $('#toolbar_form').find('#id_opd'),
                'newBtn': $('#new_btn'),
            }

            var ContentForm = {
                'form': $('#form-content'),
                'insertBtn': $('#form-content').find('#insertBtn'),
                'updateBtn': $('#form-content').find('#updateBtn'),
                'id': $('#form-content').find('#id'),
                'judul': $('#form-content').find('#judul'),
                'content': $('#form-content').find('#content_field'),
                'ref_content_id': $('#form-content').find('#ref_content_id'),
                'tanggal': $('#form-content').find('#tanggal'),
                'file_sampul': $('#form-content').find('#file_sampul'),
            }

            swalLoading();
            $.when().then((e) => {
                Swal.close();
            }).fail((e) => {
                console.log(e)
            });
            console.log('add')
            $('#add_icon').on('click', function() {
                console.log('add')
                const container = $(`#list_icon`);
                container.append(`
                                    <div class="input-group mb-2 vision-input">
                                        <input type="text" name="sec_3_data_icon[]" class="form-control" value=""
                                          placeholder="Icon">
                                        <input type="text" name="sec_3_data_label[]" class="form-control" value=""
                                         placeholder="Label">
                                        <input type="text" name="sec_3_data_desc[]" class="form-control" value=""
                                        placeholder="Deskripsi">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-danger remove-vision"
                                                onclick="removeVision(this)">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                `);
            })
            $('#add_sec_2_sidebar').on('click', function() {
                console.log('add')
                $(`#list_sec_2_sidebar`).append(`
                                    <div class="input-group mb-2 vision-input">
                                        <input type="text" name="sec_2_sidebar_label[]" class="form-control" value=""
                                          placeholder="Label">
                                        <input type="text" name="sec_2_sidebar_link[]" class="form-control" value=""
                                         placeholder="Link">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-danger remove-vision"
                                                onclick="removeVision(this)">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                `);
            })


            $('#add_sec_4_list').on('click', function() {
                console.log('add')
                $(`#list_sec_4_list`).append(`
                                    <div class="input-group mb-2 vision-input">
                                        <input type="text" name="sec_4_list[]" class="form-control" value=""
                                          placeholder="Label">

                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-danger remove-vision"
                                                onclick="removeVision(this)">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                `);
            })
            window.removeVision = function(button) {
                $(button).closest(".vision-input").remove();
            };


            ContentForm.form.on('submit',
                function() {
                    Swal.fire(SwalOpt()).then((result) => {
                        if (!result.isConfirmed) {
                            return;
                        }
                        // swalLoading();
                        $.ajax({
                            url: '{{ route('manage.home.update') }}',
                            'type': 'POST',
                            processData: false,
                            contentType: false,
                            data: new FormData(ContentForm.form[0]),
                            success: function(data) {
                                if (data['error']) {
                                    swalError(data['message'], "Simpan Gagal !!");
                                    return;
                                }
                                swalBerhasil('Berhasil', true,
                                    "{{ route('manage.home') }}");

                            },
                            error: function(e) {}
                        });
                    });
                }
            );
        });
    </script>
@endsection
