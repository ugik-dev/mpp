@extends('panel/layout/userLayout')
@section('vendor-style')
    <jenis href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <jenis href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container--bootstrap {
            border: 1px solid #d1d3e2 !important;
            padding: 0.375rem 0.75rem;
            border-radius: 0.35rem;
            width: 100%
        }
    </style>
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
            <h1 class="h3 mb-0 text-gray-800">Management Patner dan Banner</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-2 font-weight-bold text-primary">DataTables Example</h6>
                <button id="addBtn" class="btn btn-secondary btn-icon-split font-weight-bold float-end">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Patner dan Banner</span>
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
                                            <th>ID</th>
                                            <th>Nama Patner dan Banner</th>
                                            <th>Description</th>
                                            <th>Jenis</th>
                                            <th>Urutan</th>
                                            <th>Link</th>
                                            <th>Gambar</th>
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
                <form class="" id="form-bank-data" novalidate="novalidate">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Patner dan Banner</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="text" id="id" class="" name="id" />
                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Nama:</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder=""
                                required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="basicFullname" class="form-label">Description:</label>
                            <input type="text" id="description" class="form-control" name="description" placeholder="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="basicFullname" class="form-label">Link:</label>
                            <input type="text" id="link" class="form-control" name="link" placeholder=""
                                required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="basicFullname" class="form-label">Urutan:</label>
                            <input type="number" id="number" class="form-control" name="number" placeholder=""
                                required>
                            <div class="invalid-feedback">
                            </div>
                        </div>


                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Jenis :</label>
                            <select type="text" id="jenis" class="form-control" name="jenis">
                                <option value="">-</option>
                                <option value="Patner">Patner</option>
                                <option value="Banner">Banner</option>

                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Warna Background:</label>
                            <input type="color" id="bg_color" name="bg_color" class="form-control">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">File:</label>
                            <input type="file" id="image" name="image_upload" accept="image/*"
                                class="form-control">
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
                    url: "{{ route('manage.patner.index') }}",
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
                        data: "id",
                        name: "id"
                    }, {
                        data: "name",
                        name: "name"
                    }, {
                        data: "description",
                        name: "description"
                    }, {
                        data: "jenis",
                        name: "jenis"
                    }, {
                        data: "number",
                        name: "number"
                    }, {
                        data: "link_span",
                        name: "link_span"
                    },
                    {
                        data: "image_span",
                        name: "image_span"
                    },
                    {
                        data: "aksi",
                        name: "aksi"
                    },
                ]
            });
            var activeBtn;
            var validationRules = {
                name: {
                    required: false
                },
                description: {
                    required: false,
                },
                button: {
                    required: true
                },
                number: {
                    required: false,
                },
                agency_id: {
                    required: false,
                },
            };

            var PatnerForm = {
                'form': $('#form-bank-data'),
                'modal': $('#user_modal'),
                'insertBtn': $('#form-bank-data').find('#insertBtn'),
                'updateBtn': $('#form-bank-data').find('#updateBtn'),
                'id': $('#form-bank-data').find('#id'),
                'name': $('#form-bank-data').find('#name'),
                'description': $('#form-bank-data').find('#description'),
                'link': $('#form-bank-data').find('#link'),
                'jenis': $('#form-bank-data').find('#jenis'),
                'number': $('#form-bank-data').find('#number'),
                'bg_color': $('#form-bank-data').find('#bg_color'),
                'image': $('#form-bank-data').find('#image'),
            }

            datatable.on('click', '.edit-btn', (ev) => {
                var id = $(ev.currentTarget).data('id');
                currentData = dataRow[id];
                PatnerForm.form.trigger('reset')
                PatnerForm.insertBtn.attr('style', 'display: none !important');
                PatnerForm.updateBtn.attr('style', 'display: ""');
                activeBtn = PatnerForm.updateBtn;
                PatnerForm.image.prop('required', false);
                PatnerForm.modal.modal('show');
                PatnerForm.id.val(currentData['id']);
                PatnerForm.name.val(decodeHTML(currentData['name']));
                PatnerForm.description.val(decodeHTML(currentData['description']));
                PatnerForm.link.val(decodeHTML(currentData['link']));
                PatnerForm.number.val(currentData['number']);
                PatnerForm.jenis.val(currentData['jenis']);
                PatnerForm.bg_color.val(currentData['bg_color']);
            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });



            datatable.on('click', '.delete-btn', function(ev) {
                event.preventDefault();
                var id = $(ev.currentTarget).data('id');
                var token = $("[name='_token']").val();
                Swal.fire(SwalOpt('Konfirmasi hapus ?', 'Data ini akan dihapus!', )).then((result) => {
                    if (!result.isConfirmed) {
                        return;
                    }
                    $.ajax({
                        url: "<?= route('manage.patner.delete') ?>/",
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
                PatnerForm.form.trigger('reset')
                // var $newOption4 = $("<option selected='selected'></option>").val('').text("--");
                // PatnerForm.user_id.append($newOption4).trigger('change');
                PatnerForm.updateBtn.attr('style', 'display: none !important');
                PatnerForm.insertBtn.attr('style', 'display: ""');
                PatnerForm.image.prop('required', false);
                activeBtn = PatnerForm.insertBtn;
                PatnerForm.modal.modal('show')
            })

            $('#form-bank-data input,select').on('keyup change', function() {
                validateForm(validationRules, activeBtn)
            });


            PatnerForm.form.on('submit', function(event) {
                event.preventDefault();

                if (!validateForm(validationRules, activeBtn)) {
                    return false;
                }

                if (PatnerForm.insertBtn.is(":visible")) {
                    url = '{{ route('manage.patner.create') }}';
                    metode = 'POST';
                } else {
                    url = '{{ route('manage.patner.update') }}';
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
                        data: new FormData(PatnerForm.form[0]),
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data['error']) {
                                swalError(data['message'], "Simpan Gagal !!");
                                return;
                            }
                            var patner = data['data']
                            swalBerhasil();
                            PatnerForm.modal.modal('hide');
                            datatable.ajax.reload(null, false);
                        },
                        error: function(e) {}
                    });
                });
            });
        });
    </script>
@endpush
