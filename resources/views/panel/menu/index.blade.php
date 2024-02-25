@extends('panel/layout/userLayout');
@section('vendor-style')
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        td.details-control {
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAMDSURBVHjarFXdS5NRGH/eufyK2ZZWvqKiyZQQpQ9hNKVIHZLzpq7Ey8SbQhG66R+IPqCuCqKLrsK8kbCMhcOwNdimglZ24WSVHyxzVjqZQ9+P0/Mcz1upE7vwjB/nnOfjt3Oej/NKkHqYEGmIA4h0saahITYQiljr2x2lFHszIgthQeQgDgpSEGQJRByxikgiVARLdSoiy0QcRVR2dHRc8fv9nmg0OqvrukagNclIRzbCNjPFwbiATlWAcPT39z9VFGWD7TJIRzZkK3y2kEriSvmyLJ+LRCIfySmpJZk3Nsiuf+pmLaGLrDnYxLonO9mr7wMsoSY4MdmSD/oeExySJBJAsSoOBoN3HQ5H07KyDI+/PoI3S0M8OGTEpM1I0VR7uA6ull6D3PQ8CAQCHqfTeQPFMxRXI5O2rq6uhvb29k4NNOlO+DYMx4bRH386gv0DXYeZ5AxE1iJw4Ug9FBcWl8VisYnR0dFZSpJJEB5qbW29JEmS6d2SD3wxH2gaUmsqqLoG3roh8NYO8T1mB1TUjf0Yg7f4p+TT1tZ2WdzSbBBml5eXn6SAeqKvQVWRTFdBUdFZVf9kjuRch4QKknu+ebi8oqKCfLMpjmZRtOlWqzWXlFPxKXRQ8LISBFyBLaXgq/fz2ek9y+fPq1/4bLFYrEYDmLfXD8WMTrazsv4OVVN5qtaVjc0ywWsbOrPRTvF4/JfNZsuTM2SYW53nKT01cJrP4y3j3NjYi7xDQU4Bl6PvT9FFmkn05Vo4HJ4gpSvfxeO2GS+VJ8AYioghnZDWjXIjl09PT38gDjIxCFd6enr6sCz05sJmqLJWcSIOdDzRV8nBsy5kdosdWorcVEp6b2/vc9HfSppxh1AoFHe73faSopKyM3k1EF4J49XnttSizvgOqm3VcKvmJsjZMoyMjAxibz9Bjph4LFK33mJykT2YfMgaXrrY8Wd2Voo4/6Ke3Xt/n0UT0e2tl2+03n49Dlm7vTg7nq+FhYV5g4jWez1f//vAZgj9+l4PrLTfn4DfAgwAXP8AAdHdgRsAAAAASUVORK5CYII=') no-repeat center left;
            cursor: pointer;
            background-origin: content-box;
        }

        tr.details td.details-control {
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABGdBTUEAANbY1E9YMgAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAALbSURBVHjarFVNTFNBEJ4tFVuw0gaj1Jhe5OdgJV5Iaw+CGAMKIdET4Sgh4SIHDcYLN07oiZOGqyFcjOECISEhwRpoGxLExAMVAi9NadIgWNLW8t7bdWa7L0Ap6oFtvsy+3Zlvd2ZnpnYoP2yICsQFRKWa0zARhwhdzXmpob3km6k1J8KFuIyoVqSgyLKIDOIAkUcYCFHuVkTmQFxF3BoYGHgWDodnk8mkxjk3CTSnNdojHaXrULanyOhW1xGB6enpD7quH4ozBu2RDukqmxOkTLlU5/V6721sbHwjI57Pi9z8vNgdHhY7PT0i1d0tdl+8FNmZGcGzWUlMumSDttcUB2PqAShWvuXl5bFAINDB9/chMzEBuYWF4rGMgsSACQECTRyhENQMDkJFbS0sLS3NhkKh16i1TXG1XtIzNDT0oL+//zmYJtt7Mwa5xc+Al0AmDlwKJKMfrunaNhibm+Bsa4MbPt/NdDq9GovFNHokmyKs6e3tfcIYs+XDYciGvwA3TQnT5EXJaW6qdQ65lRU8dBHIpq+v76ny0m4RVjU2Nt4h7w7m5qRhKY4OOALp0mhqaiLbKoqjXSVtpdvtrqXNfDwuldE3qMcblBs/WlulLGxtSelyudxWAZQmtkx90zTgb8M0DPlQTNeLaYJuH68UWU6ZTGbP4/FcqfB64XciIZ/2e/CuSixVCMeErAJvnfxG25+qikybqsvc+vr6qrx+e7uKkXEEQ8WNcxXPorx0v10SxuPxNeIgLovw1+Tk5EfKZ3dHBzj8/qIxt0gUkUWMh1TW14Pn8SNKIz41NfVJ1bd+IrGj0ejblpaWhwVNA210FA6iEfSPFV203EZnq5ubwTcyAs6GBohEInPBYPAVbmiKtHzpHabTIvnuvVjr6hIx/20R9fvF185OkRgfF4WdndLSq7NK77yag/OsjnOqfaVSqYRFRPN/tS/2nw32otov/KvBsvP+C/gjwAC23ACdhngbNwAAAABJRU5ErkJggg==') no-repeat center left;
            background-origin: content-box;
        }

        td.details-control.level-1 {
            padding-left: 30px;
        }

        tr.details td.details-control.level-1 {
            padding-left: 30px;
        }

        td.details-control.level-2 {
            padding-left: 50px;
        }

        tr.details td.details-control.level-2 {
            padding-left: 50px;
        }

        td.item-level-1 {
            padding-left: 30px;
        }

        td.item-level-2 {
            padding-left: 60px;
        }
    </style>
@endsection
@section('vendor-script')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Management User</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-2 font-weight-bold text-primary">Menu</h6>
                <a href="{{ route('manage.menu.createnew') }}"
                    class="btn btn-secondary btn-icon-split font-weight-bold float-end">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Buat Menu Baru</span>
                </a>
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
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    {{-- <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script> --}}
    <script src="{{ asset('admin/js/tree-datatable.js') }}"></script>
    <script>
        $(document).ready(function() {

        });
    </script>
    <script>
        $(document).ready(function() {

            var dataRow = [];
            var dt = datatable = $("#example").DataTable({
                ajax: "{{ route('manage.menu.get') }}",
                columns: [{
                        class: "details-control",
                        orderable: false,
                        data: null,
                        defaultContent: "",
                        width: 50,
                        // createdRow: function(row, data, index) {
                        //     $('tr', row).addClass('font-weight-bold');
                        // },
                        createdCell: function(td, cellData, rowData, row, col) {
                            if (rowData.level > 0) {
                                td.className = td.className + " level-" + rowData.level;
                            }

                            if (col == 1) {
                                $(td).addClass("item-level-" + rowData.level);
                            }
                        },

                    },
                    {
                        data: "level",
                        visible: false,
                    },
                    {
                        data: "key",
                        visible: false,
                    },
                    {
                        data: "parent",
                        visible: false,
                    },
                    {
                        data: "name",
                        type: "custom",
                        render: function(data, type, full, meta) {
                            var order = buildOrderObject(dt, full["key"], "name").child;
                            switch (type) {
                                case "display":
                                    return data;
                                case "filter":
                                    return data;
                                case "sort":
                                    return order;
                            }
                            return data;
                        },
                        createdCell: function(td, cellData, rowData, row, col) {
                            td.className = "item-level-" + rowData.level;
                            if (rowData.level == 0) {
                                console.log('lev')
                                td.className = td.className + " font-weight-bold";
                            }
                        },
                    },
                    {
                        data: "value",
                        type: "custom",
                        render: function(data, type, full, meta) {
                            var order = buildOrderObject(
                                dt,
                                full["key"],
                                "value"
                            ).child;
                            switch (type) {
                                case "display":
                                    return data;
                                case "filter":
                                    return data;
                                case "sort":
                                    return order;
                            }
                            return data;
                        },
                    },
                ],
                order: [
                    [4, "asc"]
                ],
            });
            $("#example").on("init.dt", function() {
                dt.columns([3]).search("^(0)$", true, false).draw();
            });
            var displayed = new Set([]);
            $("#example tbody").on("click", "tr td:first-child", function() {
                var tr = $(this).closest("tr");
                var row = dt.row(tr);
                var key = row.data().key;
                if (displayed.has(key)) {
                    displayed.delete(key);
                    tr.removeClass("details");
                } else {
                    displayed.add(key);
                    tr.addClass("details");
                }
                var regex = "^(0";
                displayed.forEach(function(value) {
                    regex = regex + "|" + value;
                });
                regex = regex + ")$";
                dt.columns([3]).search(regex, true, false).draw();
            });
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
        });
    </script>
@endpush
