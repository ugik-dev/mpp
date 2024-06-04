@extends('panel/layout/userLayout')
@section('vendor-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
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
            <h1 class="h3 mb-0 text-gray-800">Management Bank Data</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-2 font-weight-bold text-primary">DataTables Example</h6>
                <button id="addBtn" class="btn btn-secondary btn-icon-split font-weight-bold float-end">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Bank Data</span>
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
                                            <th>Nama Bank Data</th>
                                            <th>Description</th>
                                            <th>Tanggal</th>
                                            <th>Jenis</th>
                                            <th>Instansi</th>
                                            <th>Upload By</th>
                                            <th>Publik</th>
                                            <th>File</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">Form Bank Data</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="id" class="" name="id" />
                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Nama File:</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder=""
                                required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="basicFullname" class="form-label">Description:</label>
                            <input type="text" id="description" class="form-control" name="description" placeholder=""
                                required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="basicFullname" class="form-label">Tanggal Dokumen:</label>
                            <input type="date" id="tanggal_dokumen" class="form-control" name="tanggal_dokumen"
                                placeholder="" required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="basicFullname" class="form-label">Jenis:</label>
                            <select type="text" id="ref_id" class="form-control" name="ref_id">
                                <option value="">-</option>
                                @foreach ($refBankData as $ref)
                                    <option value="{{ $ref->id }}">{{ $ref->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Instansi :</label>
                            <select type="text" id="agency_id" class="form-control" name="agency_id">
                                <option value="">-</option>
                                @foreach ($refAgency as $ref)
                                    <option value="{{ $ref->id }}">{{ $ref->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Publik Aksess :</label>
                            <select type="text" id="public" class="form-control" name="public">
                                <option value="">-</option>
                                <option value="Y">Tampilkan</option>
                                <option value="N">Tutup</option>

                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="basicFullname" class="form-label">Metode :</label>
                            <select type="text" id="metode" class="form-control" name="metode">
                                <option value="">-</option>
                                <option value="upload">Upload File</option>
                                <option value="link">Link (Grive dll..)</option>
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="basicFullname" class="form-label">Link :</label>
                            <input type="text" id="link" class="form-control" name="link" placeholder="">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">File:</label>
                            <input type="file" id="file_bank_data" name="file_bank_data_upload"
                                accept="image/*, .pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx" class="form-control">
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
                    url: "{{ route('manage.bank-data.index') }}",
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
                        data: "tanggal_dokumen",
                        name: "tanggal_dokumen"
                    }, {
                        data: "ref_name",
                        name: "ref_name"
                    }, {
                        data: "agency_name",
                        name: "agency_name"
                    }, {
                        data: "user_name",
                        name: "user_name"
                    },
                    {
                        data: "public_span",
                        name: "public_span"
                    }, {
                        data: "filename_span",
                        name: "filename_span"
                    }, {
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
                ref_id: {
                    required: false,
                },
                agency_id: {
                    required: false,
                },
            };

            var BankDataForm = {
                'form': $('#form-bank-data'),
                'modal': $('#user_modal'),
                'insertBtn': $('#form-bank-data').find('#insertBtn'),
                'updateBtn': $('#form-bank-data').find('#updateBtn'),
                'id': $('#form-bank-data').find('#id'),
                'name': $('#form-bank-data').find('#name'),
                'description': $('#form-bank-data').find('#description'),
                'tanggal_dokumen': $('#form-bank-data').find('#tanggal_dokumen'),
                'agency_id': $('#form-bank-data').find('#agency_id'),
                'public': $('#form-bank-data').find('#public'),
                'metode': $('#form-bank-data').find('#metode'),
                'link': $('#form-bank-data').find('#link'),
                'email': $('#form-bank-data').find('#email'),
                'ref_id': $('#form-bank-data').find('#ref_id'),
                'file_bank_data': $('#form-bank-data').find('#file_bank_data'),
            }

            datatable.on('click', '.edit-btn', (ev) => {
                var id = $(ev.currentTarget).data('id');
                currentData = dataRow[id];
                BankDataForm.form.trigger('reset')
                BankDataForm.insertBtn.attr('style', 'display: none !important');
                BankDataForm.updateBtn.attr('style', 'display: ""');
                activeBtn = BankDataForm.updateBtn;
                BankDataForm.file_bank_data.prop('required', false);
                BankDataForm.modal.modal('show');
                BankDataForm.id.val(currentData['id']);
                BankDataForm.name.val(decodeHTML(currentData['name']));
                BankDataForm.description.val(decodeHTML(currentData['description']));
                BankDataForm.tanggal_dokumen.val(decodeHTML(currentData['tanggal_dokumen']));
                BankDataForm.ref_id.val(currentData['ref_id']);
                BankDataForm.agency_id.val(currentData['agency_id']);
                BankDataForm.public.val(currentData['public']);
                BankDataForm.email.val(currentData['email']);
                BankDataForm.metode.val(currentData['metode']).trigger('change');
                BankDataForm.link.val(currentData['link']);
            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });


            BankDataForm.metode.on('change', function(ev) {
                console.log('ch')
                console.log(BankDataForm.metode.val())
                if (BankDataForm.metode.val() == 'link') {
                    BankDataForm.link.prop('disabled', false);
                    BankDataForm.file_bank_data.prop('disabled', true);
                } else {
                    BankDataForm.link.prop('disabled', true);
                    BankDataForm.file_bank_data.prop('disabled', false);
                }
            })

            datatable.on('click', '.delete-btn', function(ev) {
                event.preventDefault();
                var id = $(ev.currentTarget).data('id');
                var token = $("[name='_token']").val();
                Swal.fire(SwalOpt('Konfirmasi hapus ?', 'Data ini akan dihapus!', )).then((result) => {
                    if (!result.isConfirmed) {
                        return;
                    }
                    $.ajax({
                        url: "<?= route('manage.bank-data.delete') ?>/",
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
                BankDataForm.form.trigger('reset')
                // var $newOption4 = $("<option selected='selected'></option>").val('').text("--");
                // BankDataForm.user_id.append($newOption4).trigger('change');
                BankDataForm.updateBtn.attr('style', 'display: none !important');
                BankDataForm.insertBtn.attr('style', 'display: ""');
                BankDataForm.file_bank_data.prop('required', false);
                activeBtn = BankDataForm.insertBtn;
                BankDataForm.modal.modal('show')
            })

            $('#form-bank-data input,select').on('keyup change', function() {
                validateForm(validationRules, activeBtn)
            });


            BankDataForm.form.on('submit', function(event) {
                event.preventDefault();

                if (!validateForm(validationRules, activeBtn)) {
                    return false;
                }

                if (BankDataForm.insertBtn.is(":visible")) {
                    url = '{{ route('manage.bank-data.create') }}';
                    metode = 'POST';
                } else {
                    url = '{{ route('manage.bank-data.update') }}';
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
                        data: new FormData(BankDataForm.form[0]),
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data['error']) {
                                swalError(data['message'], "Simpan Gagal !!");
                                return;
                            }
                            var bank_data = data['data']
                            swalBerhasil();
                            BankDataForm.modal.modal('hide');
                            datatable.ajax.reload(null, false);
                        },
                        error: function(e) {}
                    });
                });
            });
        });
    </script>
@endpush
