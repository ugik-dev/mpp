@extends('panel/layout/userLayout')
@section('vendor-style')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Management User</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">

                <button id="addBtn" class="btn btn-secondary btn-icon-split font-weight-bold float-end">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah User</span>
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
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Instansi</th>
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

    <div class="modal fade " id="user_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="" id="form-user" novalidate="novalidate">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form User</h5>
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
                        <div class="col-sm-12">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="basicFullname" class="form-label">Username:</label>
                                    <input type="text" id="username" class="form-control" pattern="[a-z0-9]+"
                                        name="username" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Masukkan username hanya menggunakan huruf kecil dan angka, tanpa spasi dan karakter
                                        spesial
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="basicSalary" class="form-label">Role:</label>
                                    <select id="role_id" name="role_id" class="form-control" required>
                                        <option value="">--</option>
                                        @foreach ($dataContent['refRole'] as $rd)
                                            <option value="{{ $rd->id }}">{{ $rd->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Role harus diisi
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="basicSalary" class="form-label">Instansi:</label>
                                    <select id="agency_id" name="agency_id" class="form-control">
                                        <option value="">--</option>
                                        @foreach ($dataContent['refAgency'] as $rd)
                                            <option value="{{ $rd->id }}">{{ $rd->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Alamat:</label>
                            <input type="text" id="alamat" class="form-control" name="alamat" placeholder="">
                        </div>
                        <div class="col-sm-12">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="basicFullname" class="form-label">Telepon:</label>
                                    <input type="text" id="phone" class="form-control" name="phone" placeholder=""
                                        required>
                                    <div class="invalid-feedback">
                                        Telepon harus diisi
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="basicFullname" class="form-label">Email:</label>
                                    <input type="text" id="email" class="form-control" name="email"
                                        placeholder="" required>
                                    <div class="invalid-feedback">
                                        Email tidak valid!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="basicFullname" class="form-label">Password <small id="span_cp">*kosongkan jika
                                    tidak diganti</small>:</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder=""
                                required>
                            <div class="invalid-feedback">
                                Password harus menggunakan 8 digit
                            </div>
                        </div>
                        {{-- <div class="col-sm-12 mb-3">
                            <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1 text-white"
                                id="insertBtn" data-metod="ins">Tambah</button>
                            <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1 text-white"
                                id="updateBtn" data-act="upd">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-outline-secondary"
                                data-bs-dismiss="offcanvas">Cancel</button>
                        </div> --}}

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
            datatable = $('#datatable').DataTable({
                processing: true,
                paggination: true,
                responsive: false,
                serverSide: true,
                searching: true,
                ordering: true,
                ajax: {
                    url: "{{ route('manage.user.index') }}",
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
                    data: "username",
                    name: "username"
                }, {
                    data: "name",
                    name: "name"
                }, {
                    data: "phone",
                    name: "phone"
                }, {
                    data: "role_title",
                    name: "role_title"
                }, {
                    data: "agency_name",
                    name: "agency_name"
                }, {
                    data: "aksi",
                    name: "aksi"
                }, ]
            });
            var activeBtn;
            var validationRules = {
                name: {
                    required: true
                },
                username: {
                    required: true,
                    pattern: /^[a-z0-9]+$/
                },
                role_id: {
                    required: true
                },
                agency_id: {
                    required: false
                },
                phone: {
                    required: true,
                    digits: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
            };
            var UserForm = {
                'form': $('#form-user'),
                'modal': $('#user_modal'),
                'insertBtn': $('#form-user').find('#insertBtn'),
                'updateBtn': $('#form-user').find('#updateBtn'),
                'id': $('#form-user').find('#id'),
                'name': $('#form-user').find('#name'),
                'role_id': $('#form-user').find('#role_id'),
                'agency_id': $('#form-user').find('#agency_id'),
                'alamat': $('#form-user').find('#alamat'),
                'password': $('#form-user').find('#password'),
                'span_cp': $('#form-user').find('#span_cp'),
                'phone': $('#form-user').find('#phone'),
                'email': $('#form-user').find('#email'),
                'long': $('#form-user').find('#long'),
                'lat': $('#form-user').find('#lat'),
                'username': $('#form-user').find('#username'),
            }
            datatable.on('click', '.edit-btn', (ev) => {
                validationRules['password']['required'] = false
                validationRules['password']['minlength'] = -1
                var id = $(ev.currentTarget).data('id');
                currentData = dataRow[id];
                console.log(dataRow)
                UserForm.form.trigger('reset')
                // var $newOption4 = $("<option selected='selected'></option>").val('').text("--");
                // UserForm.user_id.append($newOption4).trigger('change');
                UserForm.insertBtn.attr('style', 'display: none !important');
                UserForm.updateBtn.attr('style', 'display: ""');
                UserForm.password.prop('required', false);
                UserForm.modal.modal('show');
                UserForm.span_cp.show();
                UserForm.id.val(currentData['id']);
                UserForm.name.val(decoderValue(currentData['name']));
                UserForm.alamat.val(decoderValue(currentData['alamat']));
                UserForm.role_id.val(currentData['role_id']);
                UserForm.agency_id.val(currentData['agency_id']);
                console.log(decoderValue("jum&#039;at@gmail.com"));
                UserForm.email.val(decoderValue(currentData['email']));
                UserForm.username.val(currentData['username']);
                UserForm.phone.val(currentData['phone']);
                activeBtn = UserForm.updateBtn;
                validateForm(validationRules, activeBtn)
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
                        url: "<?= route('manage.user.delete') ?>/",
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
                UserForm.form.trigger('reset')
                validationRules['password']['required'] = true
                validationRules['password']['minlength'] = 8
                // var $newOption4 = $("<option selected='selected'></option>").val('').text("--");
                // UserForm.user_id.append($newOption4).trigger('change');
                UserForm.updateBtn.attr('style', 'display: none !important');
                UserForm.span_cp.hide();
                UserForm.insertBtn.attr('style', 'display: ""');
                UserForm.password.prop('required', true);
                activeBtn = UserForm.insertBtn;
                UserForm.modal.modal('show')
            })

            $('#form-user input,select').on('keyup change', function() {
                validateForm(validationRules, activeBtn)
            });


            UserForm.form.on('submit', function(event) {
                event.preventDefault();

                if (!validateForm(validationRules, activeBtn)) {
                    return false;
                }

                if (UserForm.insertBtn.is(":visible")) {
                    url = '{{ route('manage.user.create') }}';
                    metode = 'POST';
                } else {
                    url = '{{ route('manage.user.update') }}';
                    metode = 'PUT';
                }
                Swal.fire(SwalOpt()).then((result) => {
                    if (!result.isConfirmed) {
                        return;
                    }
                    swalLoading();
                    $.ajax({
                        url: url,
                        'type': metode,
                        data: UserForm.form.serialize(),
                        success: function(data) {
                            if (data['error']) {
                                swalError(data['message'], "Simpan Gagal !!");
                                return;
                            }
                            var user = data['data']
                            // dataUser[user['id']] = user;
                            swalBerhasil();
                            UserForm.modal.modal('hide');
                            datatable.ajax.reload(null, false);

                        },
                        error: function(e) {}
                    });
                });
            });
        });
    </script>
@endpush
