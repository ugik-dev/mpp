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
                                            <th>Waktu</th>
                                            <th>Nama</th>
                                            <th>No Telp</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>Pesan</th>
                                            <th>Dirahasiakan</th>
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
                order: [
                    [1, "desc"]
                ],
                ajax: {
                    url: "{{ route('panel.monitoring.pengaduan') }}",
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
                    data: "created_at",
                    name: "created_at"
                }, {
                    data: "nama",
                    name: "nama"
                }, {
                    data: "no_hp",
                    name: "no_hp"
                }, {
                    data: "alamat",
                    name: "alamat"
                }, {
                    data: "email",
                    name: "email"
                }, {
                    data: "message",
                    name: "message"
                }, {
                    data: "sensor_indentitas",
                    name: "sensor_indentitas"
                }]
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
