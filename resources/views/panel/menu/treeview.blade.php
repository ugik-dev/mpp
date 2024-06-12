@extends('panel/layout/userLayout');
@section('vendor-style')
    <link href="{{ asset('admin/css/treeview.css') }}" rel="stylesheet">
@endsection
@section('vendor-script')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Management User</h1>
        </div>
        <div class="treeview-animated w-100 border mx-4 my-4">
            <h6 class="pt-3 pl-3">Folders</h6>
            <hr>
            <ul class="treeview-animated-list mb-3" id="treeview-data">
            </ul>
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
                                <table id="example" class="display table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Path</th>
                                            <th>Key</th>
                                            <th>Parent</th>
                                            <th>Name</th>
                                            <th>Value</th>
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
                        <div class="col-md-12 mb-3">
                            <label for="basicFullname" class="form-label">Nama Menu:</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder=""
                                required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="basicSalary" class="form-label">Parent :</label>
                            <select id="parent_id" name="parent_id" class="form-control" required=false>
                                <option value="">--</option>
                                @foreach ($dataContent['parentData'] as $rd)
                                    <option value="{{ $rd->id }}">{{ $rd->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{-- Role harus diisi --}}
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="basicSalary" class="form-label">Jenis :</label>
                                    <select id="jenis" name="jenis" class="form-control" required>
                                        <option value="">--</option>
                                        <option value="url">Url</option>
                                        <option value="content-page">Static Page</option>
                                    </select>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="basicFullname" class="form-label">Slug:</label>
                                    <input type="text" id="slug" class="form-control" pattern="[a-z0-9]+"
                                        name="slug" placeholder="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="basicFullname" class="form-label">Fungsional:</label>
                                    <input type="text" id="key" class="form-control" name="key">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1 text-white"
                                id="insertBtn" data-metod="ins">Tambah</button>
                            <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1 text-white"
                                id="updateBtn" data-act="upd">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin/js/treeview.js') }}"></script>
    <script>
        $(document).ready(function() {

        });
    </script>
    <script>
        $(document).ready(function() {
            $('.treeview-animated').mdbTreeview();
            var dataRow = [];
            var dt = datatable = $("#treeview-data");


            function getData() {
                $.ajax({
                    url: "<?= route('manage.menu.get') ?>/",
                    'type': 'get',
                    data: {},
                    success: function(data) {
                        if (data['error']) {
                            swalError(data['message'], "Simpan Gagal !!");
                            return;
                        }
                        renderTreeview(data['data']);
                        // swalBerhasil('Data berhasil di Hapus');
                        // datatable.ajax.reload(null, false);
                    },
                    error: function(e) {}
                });
            }

            function renderTreeview(data) {
                if (data == null || typeof data != "object") {
                    console.log("Dasar::UNKNOWN DATA");
                    return;
                }
                var i = 0;

                var renderData = [];
                var html = ""
                btn = "<button class='edit-btn btn btn-primary float-end' style=''>S</button>";
                Object.values(data).forEach((lv1) => {
                    lv1_child = lv1['children'].length > 0 ? true : false;
                    console.log(lv1_child);
                    if (lv1_child)
                        html += `
                    <li class='treeview-animated-items d-flex w-100 justify-content-between align-items-center'>
                            <h6 class='closed'>
                                <i class='fas fa-angle-right '></i>
                                <span><i class='far fa-home ic-w mx-1'></i>${lv1['name']}</span>
                            </h6>
                            ${btn}
                        <ul class='nested'>
                        `;
                    else
                        html += `
                        <li>
                        <div class="treeview-animated-element"><i class="fas fa-home  ic-w mr-1"></i>${lv1['name']}
                        </div></li>
                        `;
                    Object.values(lv1['children']).forEach((lv2) => {

                        lv2_child = lv2['children'].length > 0 ? true : false;
                        if (lv2_child)

                            html += ` <li>
                                    <span class='closed'><i class='fas fa-angle-right'></i>
                                        <span><i class='far fa-calendar-alt ic-w mx-1'></i>${lv2['name']}</span></span>
                                    <ul class='nested'>
                                   `;
                        else
                            html += `<li><div class='treeview-animated-element'><i class='far fa-calendar ic-w mr-1'></i>${lv2['name']}
                        </div>`
                        Object.values(lv2['children']).forEach((lv3) => {
                            html += `   <li>
                                    <div class='treeview-animated-element'><i class='fas fa-mug-hot ic-w mr-1'></i>${lv3['name']}

                                        </div>
                                </li>`;
                        });
                        html += ` ${lv2_child ? '</ul>': ''}</li>`;

                    });
                    html += ` ${lv1_child ? '</ul>': ''}</li>`;
                });
                datatable.append(html);
                $('.treeview-animated').mdbTreeview();

            }
            // = $("#example").DataTable({
            //     ajax: "{{ route('manage.menu.get') }}",
            //     columns: [{
            //             class: "details-control",
            //             orderable: false,
            //             data: null,
            //             defaultContent: "",
            //             width: 50,
            //             // createdRow: function(row, data, index) {
            //             //     $('tr', row).addClass('font-weight-bold');
            //             // },
            //             createdCell: function(td, cellData, rowData, row, col) {
            //                 if (rowData.level > 0) {
            //                     td.className = td.className + " level-" + rowData.level;
            //                 }

            //                 if (col == 1) {
            //                     $(td).addClass("item-level-" + rowData.level);
            //                 }
            //             },

            //         },
            //         {
            //             data: "level",
            //             visible: false,
            //         },
            //         {
            //             data: "key",
            //             visible: false,
            //         },
            //         {
            //             data: "parent",
            //             visible: false,
            //         },
            //         {
            //             data: "name",
            //             type: "custom",
            //             render: function(data, type, full, meta) {
            //                 var order = buildOrderObject(dt, full["key"], "name").child;
            //                 switch (type) {
            //                     case "display":
            //                         return data;
            //                     case "filter":
            //                         return data;
            //                     case "sort":
            //                         return order;
            //                 }
            //                 return data;
            //             },
            //             createdCell: function(td, cellData, rowData, row, col) {
            //                 td.className = "item-level-" + rowData.level;
            //                 if (rowData.level == 0) {
            //                     console.log('lev')
            //                     td.className = td.className + " font-weight-bold";
            //                 }
            //             },
            //         },
            //         {
            //             data: "value",
            //             type: "custom",
            //             render: function(data, type, full, meta) {
            //                 var order = buildOrderObject(
            //                     dt,
            //                     full["key"],
            //                     "value"
            //                 ).child;
            //                 switch (type) {
            //                     case "display":
            //                         return data;
            //                     case "filter":
            //                         return data;
            //                     case "sort":
            //                         return order;
            //                 }
            //                 return data;
            //             },
            //         },
            //     ],
            //     order: [
            //         [4, "asc"]
            //     ],
            // });
            // $("#example").on("init.dt", function() {
            //     dt.columns([3]).search("^(0)$", true, false).draw();
            // });
            // var displayed = new Set([]);
            // $("#example tbody").on("click", "tr td:first-child", function() {
            //     var tr = $(this).closest("tr");
            //     var row = dt.row(tr);
            //     var key = row.data().key;
            //     if (displayed.has(key)) {
            //         displayed.delete(key);
            //         tr.removeClass("details");
            //     } else {
            //         displayed.add(key);
            //         tr.addClass("details");
            //     }
            //     var regex = "^(0";
            //     displayed.forEach(function(value) {
            //         regex = regex + "|" + value;
            //     });
            //     regex = regex + ")$";
            //     dt.columns([3]).search(regex, true, false).draw();
            // });
            var activeBtn;
            var validationRules = {
                name: {
                    required: true
                },
                slug: {
                    required: true,
                    pattern: /^[a-z0-9-]+$/
                },
                parent_id: {
                    required: false
                },
            };
            var UserForm = {
                'form': $('#form-user'),
                'modal': $('#user_modal'),
                'insertBtn': $('#form-user').find('#insertBtn'),
                'updateBtn': $('#form-user').find('#updateBtn'),
                'id': $('#form-user').find('#id'),
                'name': $('#form-user').find('#name'),
                'parent_id': $('#form-user').find('#parent_id'),
                'jenis': $('#form-user').find('#jenis'),
                'key': $('#form-user').find('#key'),
                'slug': $('#form-user').find('#slug'),
            }
            datatable.on('click', '.edit-btn', (ev) => {
                ev.preventDefault();
                console.log('edit')
                return;
                var id = $(ev.currentTarget).data('id');
                currentData = dataRow[id];
                UserForm.form.trigger('reset')
                // var $newOption4 = $("<option selected='selected'></option>").val('').text("--");
                // UserForm.user_id.append($newOption4).trigger('change');
                UserForm.insertBtn.attr('style', 'display: none !important');
                UserForm.updateBtn.attr('style', 'display: ""');
                UserForm.modal.modal('show');
                // UserForm.span_cp.show();
                UserForm.id.val(currentData['id']);
                UserForm.name.val(decoderValue(currentData['name']));
                UserForm.jenis.val(decoderValue(currentData['jenis']));
                UserForm.parent_id.val(currentData['parent_id']);
                UserForm.slug.val(currentData['slug']);
                UserForm.key.val(currentData['key']);
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
                        url: "<?= route('manage.menu.delete') ?>/",
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

                // var $newOption4 = $("<option selected='selected'></option>").val('').text("--");
                // UserForm.user_id.append($newOption4).trigger('change');
                UserForm.updateBtn.attr('style', 'display: none !important');
                // UserForm.span_cp.hide();
                UserForm.insertBtn.attr('style', 'display: ""');
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
                    url = '{{ route('manage.menu.create') }}';
                    metode = 'POST';
                } else {
                    url = '{{ route('manage.menu.update') }}';
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
            getData()
        });
    </script>
@endpush
