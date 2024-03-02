@extends('panel/layout/userLayout')
@section('vendor-style')
    <website href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <website href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
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
            <h1 class="h3 mb-0 text-gray-800">Management Instansi</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-2 font-weight-bold text-primary">DataTables Example</h6>
                <button id="addBtn" class="btn btn-secondary btn-icon-split font-weight-bold float-end">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Instansi</span>
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
                                            <th>Nama Instansi</th>
                                            <th>Alamat</th>
                                            <th>Phone</th>
                                            <th>Whatsapp</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th>Logo</th>
                                            <th>Sampul</th>
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
                <form class="" id="form-agency" novalidate="novalidate">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Instansi</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="text" id="id" class="" name="id" />
                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Nama Instansi:</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder=""
                                required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="basicFullname" class="form-label">Alamat:</label>
                            <input type="text" id="alamat" class="form-control" name="alamat" placeholder=""
                                required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="basicFullname" class="form-label">Telepon:</label>
                                    <input type="text" id="phone" class="form-control" name="phone">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="basicFullname" class="form-label">Whatsapp :</label>
                                    <input type="text" id="whatsapp" class="form-control" name="whatsapp"
                                        placeholder="">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="basicFullname" class="form-label">Website :</label>
                                    <input type="text" id="website" class="form-control" name="website" placeholder="">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="basicFullname" class="form-label">Email :</label>
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Logo:</label>
                            <input type="file" id="logo_agency" name="logo_agency_upload" accept="image/*"
                                class="form-control">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Gambar Sampul:</label>
                            <input type="file" id="image_agency" name="image_agency_upload" accept="image/*"
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
                    url: "{{ route('manage.agency.index') }}",
                    dataSrc: function(response) {
                        dataRes = response.data_original;
                        dataRow = [];
                        dataRes.forEach(function(data) {
                            dataRow[data.id] = data;
                        });
                        return response.datatable.original.data;
                    }
                },
                columns: [{
                        data: "id",
                        name: "id"
                    }, {
                        data: "name",
                        name: "name"
                    }, {
                        data: "alamat",
                        name: "alamat"
                    }, {
                        data: "phone",
                        name: "phone"
                    }, {
                        data: "whatsapp",
                        name: "whatsapp"
                    },
                    {
                        data: "email",
                        name: "email"
                    }, {
                        data: "website",
                        name: "website"
                    }, {
                        data: "logo",
                        name: "logo"
                    }, {
                        data: "img",
                        name: "img"
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
                alamat: {
                    required: false,
                },
                button: {
                    required: true
                },
                phone: {
                    required: false,
                },
                whatsapp: {
                    required: true,
                },
            };

            var AgencyForm = {
                'form': $('#form-agency'),
                'modal': $('#user_modal'),
                'insertBtn': $('#form-agency').find('#insertBtn'),
                'updateBtn': $('#form-agency').find('#updateBtn'),
                'id': $('#form-agency').find('#id'),
                'name': $('#form-agency').find('#name'),
                'alamat': $('#form-agency').find('#alamat'),
                'whatsapp': $('#form-agency').find('#whatsapp'),
                'website': $('#form-agency').find('#website'),
                'email': $('#form-agency').find('#email'),
                'phone': $('#form-agency').find('#phone'),
                'logo_agency': $('#form-agency').find('#logo_agency'),
                'image_agency': $('#form-agency').find('#image_agency'),
            }

            datatable.on('click', '.edit-btn', (ev) => {
                var id = $(ev.currentTarget).data('id');
                currentData = dataRow[id];
                AgencyForm.form.trigger('reset')
                AgencyForm.insertBtn.attr('style', 'display: none !important');
                AgencyForm.updateBtn.attr('style', 'display: ""');
                activeBtn = AgencyForm.updateBtn;
                AgencyForm.logo_agency.prop('required', false);
                AgencyForm.image_agency.prop('required', false);
                AgencyForm.modal.modal('show');
                AgencyForm.id.val(currentData['id']);
                AgencyForm.name.val(decodeHTML(currentData['name']));
                AgencyForm.alamat.val(decodeHTML(currentData['alamat']));
                AgencyForm.phone.val(currentData['phone']);
                AgencyForm.whatsapp.val(currentData['whatsapp']);
                AgencyForm.website.val(currentData['website']);
                AgencyForm.email.val(currentData['email']);
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
                        url: "<?= route('manage.agency.delete') ?>/",
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
                AgencyForm.form.trigger('reset')
                // var $newOption4 = $("<option selected='selected'></option>").val('').text("--");
                // AgencyForm.user_id.append($newOption4).trigger('change');
                AgencyForm.updateBtn.attr('style', 'display: none !important');
                AgencyForm.insertBtn.attr('style', 'display: ""');
                AgencyForm.logo_agency.prop('required', false);
                AgencyForm.image_agency.prop('required', false);
                activeBtn = AgencyForm.insertBtn;
                AgencyForm.modal.modal('show')
            })

            $('#form-agency input,select').on('keyup change', function() {
                validateForm(validationRules, activeBtn)
            });


            AgencyForm.form.on('submit', function(event) {
                event.preventDefault();

                if (!validateForm(validationRules, activeBtn)) {
                    return false;
                }

                if (AgencyForm.insertBtn.is(":visible")) {
                    url = '{{ route('manage.agency.create') }}';
                    metode = 'POST';
                } else {
                    url = '{{ route('manage.agency.update') }}';
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
                        data: new FormData(AgencyForm.form[0]),
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data['error']) {
                                swalError(data['message'], "Simpan Gagal !!");
                                return;
                            }
                            var agency = data['data']
                            swalBerhasil();
                            AgencyForm.modal.modal('hide');
                            datatable.ajax.reload(null, false);
                        },
                        error: function(e) {}
                    });
                });
            });
        });
    </script>
@endpush
