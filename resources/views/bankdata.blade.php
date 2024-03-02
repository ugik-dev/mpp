@extends('homeLayout/index')
@section('style')
    <public href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <public href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <style>
        label {
            /* display: inline-block; */
            margin-bottom: 0.5rem;
            cursor: default;

        }

        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }

        .custom-control-label::before,
        .custom-file-label,
        .custom-select {
            transition: background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .custom-select {
            display: inline-block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 1.75rem 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #6e707e;
            vertical-align: middle;
            background: #fff url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%235a5c69' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e) right 0.75rem center / 8px 10px no-repeat;
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .dataTables_length>label {
            min-width: 100px;
        }

        .dataTables_filter>label {
            width: 100%
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #6e707e;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        [type=search] {
            outline-offset: -2px;
            -webkit-appearance: none;
        }
    </style>
@endsection
@section('content')
    <div class="page-wrapper">
        <section class="page-banner">
            <div class="container">
                <div class="page-breadcrumbs">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Bank Data</li>
                    </ul><!-- list-unstyled -->
                </div><!-- page-breadcrumbs -->
                <div class="page-banner-title">
                    <h3>Bank Data</h3>
                </div><!-- page-banner-title -->
            </div><!-- container -->
        </section><!--page-banner-->
        <section class="blog-section blog-section-two">
            <div class="container">
                <div class="row row-gutter-y-155">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">

                                    <table id="datatable" class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal Dokumen</th>
                                                <th>Nama Bank Data</th>
                                                <th>Description</th>
                                                <th>Jenis</th>
                                                <th>Instansi</th>
                                                <th>Jumlah<br>Download</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                    </div>
                </div>
            </div><!-- container -->
        </section><!--blog-section-->
    </div>
@endsection

@section('script')
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
                    url: "{{ route('bank-data') }}",
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
                        data: "tanggal_dokumen",
                        name: "tanggal_dokumen"
                    }, {
                        data: "name",
                        name: "name"
                    }, {
                        data: "description",
                        name: "description"
                    }, {
                        data: "ref_name",
                        name: "ref_name"
                    }, {
                        data: "agency_name",
                        name: "agency_name"
                    }, {
                        data: "view",
                        name: "view"
                    },
                    {
                        data: "filename_span",
                        name: "filename_span"
                    }
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


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });



            datatable.on('click', '.delete-btn', function(ev) {
                event.preventDefault();
                var id = $(ev.currentTarget).data('id');
                Swal.fire(SwalOpt('Konfirmasi hapus ?', 'Data ini akan dihapus!', )).then((result) => {
                    if (!result.isConfirmed) {
                        return;
                    }
                    $.ajax({
                        url: "<?= url('download-bank-data') ?>/",
                        'type': 'get',
                        data: {
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
        });
    </script>
@endsection
