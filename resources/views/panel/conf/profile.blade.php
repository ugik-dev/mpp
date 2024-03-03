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
                    <div class="col-sm-12">
                        <label for="basicFullname">Telepon:</label>
                        <div class="input-group">
                            <input type="text" name="telephone" class="form-control dt-full-name"
                                value="{{ $data->telephone ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="basicFullname">Email:</label>
                        <div class="input-group">
                            <input type="email" name="email" class="form-control dt-full-name"
                                value="{{ $data->email ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="basicFullname">Whatsapp:</label>
                        <div class="input-group">
                            <input type="text" name="whatsapp" class="form-control dt-full-name"
                                value="{{ $data->whatsapp ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="basicFullname">Facebook:</label>
                        <div class="input-group">
                            <input type="text" name="facebook" class="form-control dt-full-name"
                                value="{{ $data->facebook ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="basicFullname">Instagram:</label>
                        <div class="input-group">
                            <input type="text" name="instagram" class="form-control dt-full-name"
                                value="{{ $data->instagram ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="basicFullname">Pinterest:</label>
                        <div class="input-group">
                            <input type="text" name="pinterest" class="form-control dt-full-name"
                                value="{{ $data->pinterest ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="basicFullname">Twitter:</label>
                        <div class="input-group">
                            <input type="text" name="twitter" class="form-control dt-full-name"
                                value="{{ $data->twitter ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="basicFullname">Jam Operasional:</label>
                        <div class="input-group">
                            <input type="text" name="operational_time" class="form-control dt-full-name"
                                value="{{ $data->operational_time ?? '' }}" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="basicFullname">Deskripsi Footer:</label>
                        <div class="input-group">
                            <textarea type="text" name="description_footer" class="form-control dt-full-name">{{ $data->description_footer ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="basicFullname">Alamat :</label>
                        <div class="input-group">
                            <textarea type="text" name="address" class="form-control dt-full-name">{{ $data->address ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
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

            ContentForm.form.on('submit',
                function() {
                    Swal.fire(SwalOpt()).then((result) => {
                        if (!result.isConfirmed) {
                            return;
                        }
                        // swalLoading();
                        $.ajax({
                            url: '{{ route('manage.profile.update') }}',
                            'type': 'POST',
                            processData: false,
                            contentType: false,
                            data: new FormData(ContentForm.form[0]),
                            success: function(data) {
                                if (data['error']) {
                                    swalError(data['message'], "Simpan Gagal !!");
                                    return;
                                }
                                swalBerhasil('Berhasil di Update', true,
                                    '{{ route('manage.profile') }}');

                            },
                            error: function(e) {}
                        });
                    });
                }
            );
        });
    </script>
@endsection
