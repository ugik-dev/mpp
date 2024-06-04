@extends('panel/layout/userLayout')
@section('vendor-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.bootstrap4.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.css" rel="stylesheet" type="text/css" />

    <style>
        .select2-container--bootstrap {
            border: 1px solid #d1d3e2 !important;
            padding: 0.375rem 0.75rem;
            border-radius: 0.35rem;
            width: 100%
        }

        .dataTables_filter {
            display: flex;
            justify-content: end;
        }

        .dataTables_length>label {
            display: flex;
            justify-content: space-between;
            width: 50%;
            gap: 2px;
            margin-bottom: 0;
        }

        .dataTables_length>label>select {
            width: 50%;
        }

        div.dataTables_wrapper>.row:nth-child(2) {
            margin-top: 0.875rem;
            margin-bottom: 0.875rem;
        }

        div.dataTables_wrapper>.row:first-child {
            align-items: center;
            overflow-x: scroll;
        }

        div.dataTables_wrapper>.row:first-child * {
            overflow-x: scroll;
        }

        .visibility-btn>span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .dataTables_wrapper {
            overflow-x: scroll;
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
            <h1 class="h3 mb-0 text-gray-800">Kelola e-Survei / SKM</h1>
        </div>
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Waktu</th>
                                            <th>Nama</th>
                                            <th>Pesan</th>
                                            <th>Respon</th>
                                            <th>Kesesuaian</th>
                                            <th>Kemudahan</th>
                                            <th>Kecepatan</th>
                                            <th>Tarif</th>
                                            <th>SOP</th>
                                            <th>Kompetensi</th>
                                            <th>Prilaku</th>
                                            <th>Sarpras</th>
                                            <th>Pengaduan</th>
                                            <th>Visibilitas Publik</th>
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
                        <input type="text" id="id" class="" name="id" />
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
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.bootstrap4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/select.dataTables.js"></script>
    <script src="https://cdn.datatables.net/colvis/1.1.0/js/dataTables.colVis.js"></script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            var dataRow = [];
            var status_slect2 = false;
            datatable = $('#datatable').DataTable({
                processing: true,
                pagination: true,
                responsive: true,
                serverSide: true,
                searching: true,
                ordering: true,
                order: [
                    [1, "desc"]
                ],
                ajax: {
                    url: "{{ route('panel.monitoring.survey') }}",
                    dataSrc: function(response) {
                        dataRes = response.data;
                        dataRow = [];
                        dataRes.forEach(function(data) {
                            dataRow[data.id] = data;
                        });
                        return response.data;
                    }
                },

                select: {
                    style: 'os',
                    selector: 'td:first-child'
                },
                columns: [{
                        'targets': 0,
                        'searchable': false,
                        'orderable': false,
                        'className': 'dt-body-center',
                        'render': function(data, type, rowData, meta) {
                            return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(
                                rowData.id).html() + '">';
                        }
                    },
                    {
                        data: "created_at",
                        name: "created_at"
                    }, {
                        data: "nama",
                        name: "nama"
                    }, {
                        data: "alasan",
                        name: "alasan"
                    }, {
                        data: "respon",
                        name: "respon"
                    }, {
                        data: "kesesuaian",
                        name: "kesesuaian"
                    }, {
                        data: "kemudahan",
                        name: "kemudahan"
                    }, {
                        data: "kecepatan",
                        name: "kecepatan"
                    }, {
                        data: "tarif",
                        name: "tarif"
                    }, {
                        data: "sop",
                        name: "sop"
                    }, {
                        data: "kompetensi",
                        name: "kompetensi"
                    }, {
                        data: "prilaku",
                        name: "prilaku"
                    }, {
                        data: "sarpras",
                        name: "sarpras"
                    }, {
                        data: "pengaduan",
                        name: "pengaduan"
                    }, {
                        data: function(colData) {
                            return colData['show_public'] === 'N' ? 'Tidak' : 'Ya';
                        },
                        name: "show_public"
                    }
                ],
                dom: "<'row'<'col-sm-6 col-lg-4'l><'col-sm-6 col-lg-4'B><'col-sm-6 col-lg-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12'p>>",
                buttons: {
                    buttons: [{
                            className: 'btn btn-primary visibility-btn',
                            text: '<i class="far fa-eye"></i> Visibilitas Publik',
                            action: function() {
                                let selectedRows = $("input[name='id[]']:checked").map(function() {
                                    return this.value;
                                }).get();
                                if (selectedRows.length === 0) {
                                    swalError('Pilih atau Centang data terlebih dahulu.',
                                        "Data tidak ada yang dipilih!");
                                    return;
                                }
                                Swal.fire({
                                    title: 'Tampilkan ke Publik?',
                                    showDenyButton: true,
                                    showCancelButton: true,
                                    confirmButtonText: 'Ya',
                                    denyButtonText: 'Tidak',
                                    cancelButtonText: 'Batalkan',
                                    html: "Pilih Ya atau Tidak <br/>untuk menampilkan data tanggapan yang <br> dipilih/dicentang ke publik"
                                }).then((result) => {
                                    let url =
                                        '{{ route('panel.monitoring.toggle-public-visibility-survey') }}';
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: url,
                                            'type': "POST",
                                            data: {
                                                showPublic: 'Y',
                                                ids: selectedRows
                                            },

                                            success: function(data) {
                                                if (data['error']) {
                                                    swalError(data['message'],
                                                        "Simpan Gagal !!");
                                                    return;
                                                }
                                                // swalBerhasil();
                                                datatable.ajax.reload(null,
                                                    false);
                                            },
                                            error: function(e) {
                                                // console.log(e)
                                            }
                                        });
                                    } else if (result.isDenied) {
                                        $.ajax({
                                            url: url,
                                            'type': "POST",
                                            data: {
                                                showPublic: 'N',
                                                ids: selectedRows
                                            },

                                            success: function(data) {
                                                if (data['error']) {
                                                    swalError(data['message'],
                                                        "Simpan Gagal !!");
                                                    return;
                                                }
                                                // swalBerhasil();
                                                datatable.ajax.reload(null,
                                                    false);
                                            },
                                            error: function(e) {
                                                // console.log(e)
                                            }
                                        });
                                    }
                                })
                            }
                        },
                        {
                            extend: 'copy',
                            text: '<i class="far fa-copy"></i> Salin Baris Data',
                            className: 'btn btn-success'
                        },
                    ],
                    dom: {
                        button: {
                            className: 'btn'
                        }
                    }
                }
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
