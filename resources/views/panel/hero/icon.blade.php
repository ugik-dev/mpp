@extends('panel/layout/userLayout')
@section('vendor-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .select2-container--bootstrap {
            border: 1px solid #d1d3e2 !important;
            padding: 0.375rem 0.75rem;
            border-radius: 0.35rem;
            width: 100%
        }
    </style>
    {{-- <link href="{{ asset('admin/select2/css/select2.min.css') }}" rel="stylesheet"> --}}
@endsection
@section('vendor-script')
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.full.min.js"
        integrity="sha512-orfBhUXN61JpjXpFeA1NkJ1c2IOtytP4aMxpKqpE2ToIEn5wz4+BiM8xLXEJVxCVubpQOQhFbQWdbF3qLkYYcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('admin/select2/js/select2.full.min.js') }}"></script> --}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Management Hero Icon</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-2 font-weight-bold text-primary">DataTables Example</h6>
                <button id="addBtn" class="btn btn-secondary btn-icon-split font-weight-bold float-end">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Hero Icon</span>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Icon</th>
                                            <th>Text</th>
                                            <th>Tombol</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " data-backdrop="static" data-keyboard="false" id="user_modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="" id="form-hero" novalidate="novalidate">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Hero Icon</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="text" id="id" class="" name="id" />
                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Text:</label>
                            <input type="text" id="text" class="form-control" name="text" placeholder=""
                                required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="basicFullname" class="form-label">Icon (silahkan lihat di <a
                                    href="https://www.flaticon.com/" target="_blank">flaticon.com</a>):</label>
                            <input type="text" id="icon" class="form-control" name="icon" placeholder=""
                                required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="basicSalary" class="form-label">Button:</label>
                                    <select id="button" name="button" class="form-control" required>
                                        <option value="">--</option>
                                        @php
                                            $button = ['Y' => 'Aktif', 'N' => 'Tidak'];
                                        @endphp
                                        @foreach ($button as $key => $rd)
                                            <option value="{{ $key }}">{{ $rd }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="basicFullname" class="form-label">Jenis Button:</label>
                                    <select id="button_type" name="button_type" class="form-control" required>
                                        <option value="">--</option>
                                        @php
                                            $jenis = ['link' => 'Link', 'page' => 'Page', 'content' => 'Konten Berita/Informasi/Pengumuman'];
                                        @endphp
                                        @foreach ($jenis as $key => $rd)
                                            <option value="{{ $key }}">{{ $rd }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="basicFullname" class="form-label">Tulisan di Tombol:</label>
                                    <input type="text" id="button_text" class="form-control" name="button_text">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="basicFullname" class="form-label">Key:</label>
                            <div class="col-md-12 mb-3">
                                <select type="text" id="key" style="width: 100%" class="form-control"
                                    name="key"></select>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Link :</label>
                            <input type="text" id="link" class="form-control" name="link" placeholder="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Urutan Ke :</label>
                            <input type="number" id="number" class="form-control" name="number" placeholder="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1 text-white" id="insertBtn"
                            data-metod="ins">Tambah</button>
                        <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1 text-white" id="updateBtn"
                            data-act="upd">Simpan Perubahan</button>
                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            var dataRow = [];
            var status_slect2 = false;
            datatable = $('#datatable').DataTable({
                processing: true,
                paggination: true,
                responsive: false,
                serverSide: true,
                searching: true,
                ordering: true,
                ajax: {
                    url: "{{ route('manage.hero-icon.index') }}",
                    dataSrc: function(response) {
                        dataRes = response.data;
                        dataRow = [];
                        dataRes.forEach(function(data) {
                            dataRow[data.id] = data;
                        });

                        return response.data;
                    }
                },
                columns: [{
                    data: "number",
                    name: "number"
                }, {
                    data: "icon",
                    name: "icon"
                }, {
                    data: "text",
                    name: "text"
                }, {
                    data: "button",
                    name: "button"
                }, {
                    data: "aksi",
                    name: "aksi"
                }, ]
            });
            var activeBtn;
            var validationRules = {
                text: {
                    required: false
                },
                icon: {
                    required: false,
                },
                button: {
                    required: true
                },
                button_text: {
                    required: false,
                },
                number: {
                    required: true,
                },
            };

            var HeroForm = {
                'form': $('#form-hero'),
                'modal': $('#user_modal'),
                'insertBtn': $('#form-hero').find('#insertBtn'),
                'updateBtn': $('#form-hero').find('#updateBtn'),
                'id': $('#form-hero').find('#id'),
                'text': $('#form-hero').find('#text'),
                'button': $('#form-hero').find('#button'),
                'button_type': $('#form-hero').find('#button_type'),
                'number': $('#form-hero').find('#number'),
                'link': $('#form-hero').find('#link'),
                'span_cp': $('#form-hero').find('#span_cp'),
                'key': $('#form-hero').find('#key'),
                'button_text': $('#form-hero').find('#button_text'),
                'icon': $('#form-hero').find('#icon'),
            }

            datatable.on('click', '.edit-btn', (ev) => {
                var id = $(ev.currentTarget).data('id');
                currentData = dataRow[id];
                HeroForm.form.trigger('reset')
                HeroForm.insertBtn.attr('style', 'display: none !important');
                HeroForm.updateBtn.attr('style', 'display: ""');
                activeBtn = HeroForm.updateBtn;
                HeroForm.modal.modal('show');
                HeroForm.span_cp.show();
                HeroForm.id.val(currentData['id']);
                HeroForm.text.val(decodeHTML(currentData['text']));
                HeroForm.button.val(currentData['button']).trigger('change');
                HeroForm.button_type.val(currentData['button_type']).trigger('change');
                HeroForm.button_text.val(currentData['button_text']);
                HeroForm.icon.val(currentData['icon']);
                HeroForm.number.val(currentData['number']);
                HeroForm.link.val(currentData['link']);
                // HeroForm.key.select2(currentData['key'], currentData['key_label']);
                var $newOption4 = $("<option selected='selected'></option>").val(currentData['key']).text(
                    currentData['key_label']);
                HeroForm.key.append($newOption4).trigger('change');
                // validateForm(validationRules, activeBtn)
            })
            HeroForm.button.on('change', (ev) => {
                if (HeroForm.button.val() == 'Y') {
                    HeroForm.button_type.val('');
                    HeroForm.button_type.prop('disabled', false);
                    HeroForm.button_text.prop('disabled', false);
                    HeroForm.key.prop('disabled', false);
                } else {
                    HeroForm.button_type.prop('disabled', true);
                    HeroForm.button_text.prop('disabled', true);
                    HeroForm.key.prop('disabled', true);
                }
            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            HeroForm.button_type.on('change', (ev) => {
                if (HeroForm.button_type.val() == 'content' || HeroForm.button_type.val() ==
                    'page') {
                    HeroForm.key.prop('disabled', false)
                    // status_slect2 = true;
                } else {
                    // if (status_slect2) HeroForm.key.select2('destroy');
                    HeroForm.key.prop('disabled', true)
                    status_slect2 = false;
                    return;
                }
                source = HeroForm.button_type.val();
                HeroForm.key.select2({
                    dropdownParent: HeroForm.modal,
                    ajax: {
                        url: '{{ route('manage.hero-icon.search-key') }}',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            console.log(params)
                            return {
                                q: params.term,
                                source: source,
                                page: params.page
                            };
                        },
                        processResults: function(data, params) {
                            params.page = params.page || 1;
                            return {
                                results: data.data,
                                pagination: {
                                    more: (params.page * 20) < data.total
                                }
                            };
                        },
                        cache: true
                    },
                    placeholder: 'Cari Kunci Tombol',
                    // allowClear: true,
                    theme: "bootstrap"
                });

            })
            HeroForm.button.trigger('change');
            HeroForm.button_type.trigger('change');


            HeroForm.button_type.trigger('change');
            datatable.on('click', '.delete-btn', function(ev) {
                event.preventDefault();
                var id = $(ev.currentTarget).data('id');
                var token = $("[name='_token']").val();
                Swal.fire(SwalOpt('Konfirmasi hapus ?', 'Data ini akan dihapus!', )).then((result) => {
                    if (!result.isConfirmed) {
                        return;
                    }
                    $.ajax({
                        url: "<?= route('manage.hero-icon.delete') ?>/",
                        'type': 'DELETE',
                        data: {
                            '_token': token,
                            'id': id
                        },
                        success: function(data) {
                            if (data['error']) {
                                swalError(data['message'], "Simpan Gagal !!");
                                return;
                            }
                            swalBerhasil('Data berhasil di Hapus');
                            datatable.ajax.reload(null, false);
                        },
                        error: function(e) {}
                    });
                });
            });

            $('#addBtn').on('click', function() {
                HeroForm.form.trigger('reset')
                HeroForm.updateBtn.attr('style', 'display: none !important');
                HeroForm.span_cp.hide();
                HeroForm.insertBtn.attr('style', 'display: ""');
                activeBtn = HeroForm.insertBtn;
                HeroForm.modal.modal('show')
            })

            $('#form-hero input,select').on('keyup change', function() {
                validateForm(validationRules, activeBtn)
            });


            HeroForm.form.on('submit', function(event) {
                event.preventDefault();

                if (!validateForm(validationRules, activeBtn)) {
                    return false;
                }

                if (HeroForm.insertBtn.is(":visible")) {
                    url = '{{ route('manage.hero-icon.create') }}';
                    metode = 'POST';
                } else {
                    url = '{{ route('manage.hero-icon.update') }}';
                    metode = 'POST';
                }
                Swal.fire(SwalOpt()).then((result) => {
                    if (!result.isConfirmed) {
                        return;
                    }
                    swalLoading();
                    $.ajax({
                        url: url,
                        'type': metode,
                        data: new FormData(HeroForm.form[0]),
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data['error']) {
                                swalError(data['message'], "Simpan Gagal !!");
                                return;
                            }
                            var hero = data['data']
                            swalBerhasil();
                            HeroForm.modal.modal('hide');
                            datatable.ajax.reload(null, false);
                        },
                        error: function(e) {}
                    });
                });
            });
        });
    </script>
@endpush
