@extends('panel/layout/userLayout');
@section('vendor-style')
    {{-- <link rel="stylesheet" href="{{ asset('admin/vendor/quill/typography.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/quill/katex.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendor/quill/editor.css') }}" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.snow.css" rel="stylesheet" />
@endsection
@section('vendor-script')
    {{-- <script src="{{ asset('admin/vendor/quill/katex.js') }}"></script>
    <script src="{{ asset('admin/vendor/quill/quill.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Kontent</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">

                <form class="add-new-record pt-0 row g-3" id="form-content" onsubmit="return false">
                    @csrf
                    <input type="text" id="id" class="" name="id" />
                    <div class="col-sm-12">
                        <label for="basicFullname">Judul:</label>
                        <div class="input-group input-group-merge">
                            <span id="basicFullname2" class="input-group-text"><i class="mdi mdi-file"></i></span>
                            <input type="text" id="judul" class="form-control dt-full-name" name="judul"
                                placeholder="" aria-label="" aria-describedby="basicFullname2" />
                        </div>
                    </div>
                    <div class="col-lg-12 h-100 mb-3">
                        <label for="basicFullname">Isi :</label>
                        <textarea hidden id="content" name="content"></textarea>
                        <div id="quill" style="width: 100%">
                            <p></p>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-sm-6">
                            <label for="basicSalary">Jenis :</label>
                            <div class="input-group input-group-merge">
                                <span id="basicSalary2" class="input-group-text"><i
                                        class='mdi mdi-account-outline'></i></span>
                                <div class="form-floating form-floating-outline">
                                    <!-- <input type="number" id="user_id" name="user_id" class="form-control dt-salary" aria-label="" aria-describedby="basicSalary2" /> -->
                                    <select id="ref_content_id" name="ref_content_id" class="form-control">
                                        <option value="">--</option>
                                        @foreach ($dataContent['refContent'] as $rd)
                                            <option value="{{ $rd->id }}">{{ $rd->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="basicFullname">Tanggal :</label>
                            <div class="input-group input-group-merge">
                                <span id="basicFullname2" class="input-group-text"><i class="mdi mdi-file"></i></span>
                                <input type="date" id="tanggal" class="form-control dt-full-name" name="tanggal"
                                    placeholder="" aria-label="" aria-describedby="basicFullname2" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="basicFullname">Gambar Sampul :</label>
                            <div class="input-group input-group-merge">
                                <span id="basicFullname2" class="input-group-text"><i class="mdi mdi-file"></i></span>
                                <input type="file" id="file_sampul" class="form-control dt-full-name" name="file_sampul"
                                    accept="image/*" aria-label="" aria-describedby="basicFullname2" />
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div> --}}
                    <div class="col-sm-12">
                        <a type="" class="btn btn-primary data-submit me-sm-3 me-1 text-white" id="insertBtn"
                            data-metod="ins">Tambah</a>
                        <a type="" class="btn btn-primary data-submit me-sm-3 me-1 text-white" id="updateBtn"
                            data-act="upd">Simpan Perubahan</a>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            // testJS();
            // const fullToolbar = [
            //     handlers: [{
            //         image: this.imageHandler
            //     }],
            //     [{
            //             font: []
            //         },
            //         {
            //             size: []
            //         }
            //     ],
            //     ['bold', 'italic', 'underline', 'strike'],
            //     [{
            //             color: []
            //         },
            //         {
            //             background: []
            //         }
            //     ],
            //     [{
            //             script: 'super'
            //         },
            //         {
            //             script: 'sub'
            //         }
            //     ],
            //     [{
            //             header: '1'
            //         },
            //         {
            //             header: '2'
            //         },
            //         'blockquote',
            //         'code-block'
            //     ],
            //     [{
            //             list: 'ordered'
            //         },
            //         {
            //             list: 'bullet'
            //         },
            //         {
            //             indent: '-1'
            //         },
            //         {
            //             indent: '+1'
            //         }
            //     ],
            //     [{
            //         direction: 'rtl'
            //     }],
            //     ['link', 'image', 'video', 'formula'],
            //     ['clean'],

            // ];

            const fullToolbar = [
                [{
                    'font': []
                }, {
                    'size': []
                }],
                ['bold', 'italic', 'underline', 'strike'],
                [{
                    'color': []
                }, {
                    'background': []
                }],
                [{
                    'script': 'super'
                }, {
                    'script': 'sub'
                }],
                [{
                    'header': 1
                }, {
                    'header': 2
                }, 'blockquote', 'code-block'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }, {
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }],
                [{
                    'direction': 'rtl'
                }],
                ['link', 'image', 'video', 'formula'],
                ['clean']
            ];



            const fullEditor = new Quill('#quill', {
                modules: {
                    toolbar: fullToolbar,
                    imageResize: {
                        displayStyles: {
                            backgroundColor: 'black',
                            border: 'none',
                            color: 'white'
                        },
                        modules: ['Resize', 'DisplaySize', 'Toolbar']
                    }
                },

                placeholder: 'Isi kontent disini...',
                theme: 'snow'
            });

            fullEditor.getModule("toolbar").addHandler("image", imageHandler);

            function imageHandler() {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.click();
                console.log('uploade')
                input.onchange = async function() {
                    const file = input.files[0];
                    console.log('User trying to uplaod this:', file);

                    const link = await uploadFile(file); // I'm using react, so whatever upload function
                    // console.log(id)
                    const range = this.quill.getSelection();
                    // const link = `${ROOT_URL}/file/${id}`;

                    // this part the image is inserted
                    // by 'image' option below, you just have to put src(link) of img here.
                    this.quill.insertEmbed(range.index, 'image', link);
                }.bind(this); // react thing
            }

            function uploadFile(file) {
                return new Promise((resolve, reject) => {
                    const formData = new FormData();
                    formData.append('file', file);
                    var token = $("[name='_token']").val();
                    formData.append('_token', token);


                    $.ajax({
                        url: '{{ route('manage.content.storeimage') }}', // Replace this with your server endpoint for uploading images
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            resolve(response.data); // Resolve with the ID of the uploaded image
                        },
                        error: function(xhr, status, error) {
                            reject(error); // Reject with the error message
                        }
                    });
                });
            }


            // const quill = new Quill('#quill', {
            //     theme: 'snow'
            // });
            var toolbar = {
                'form': $('#toolbar_form'),
                'id_role': $('#toolbar_form').find('#id_role'),
                'id_opd': $('#toolbar_form').find('#id_opd'),
                'newBtn': $('#new_btn'),
            }

            var ContentForm = {
                'form': $('#form-content'),
                'insertBtn': $('#form-content').find('#insertBtn'),
                'updateBtn': $('#form-content').find('#updateBtn'),
                'id': $('#form-content').find('#id'),
                'judul': $('#form-content').find('#judul'),
                'content': $('#form-content').find('#content'),
                'ref_content_id': $('#form-content').find('#ref_content_id'),
                'tanggal': $('#form-content').find('#tanggal'),
                'file_sampul': $('#form-content').find('#file_sampul'),
            }

            var dataContent = {}

            swalLoading();
            $.when().then((e) => {
                Swal.close();
            }).fail((e) => {
                console.log(e)
            });


            ContentForm.insertBtn.on('click', () => {
                event.preventDefault();
                submit_form('{{ route('manage.content.create') }}', 'POST');
            });
            ContentForm.updateBtn.on('click', () => {
                event.preventDefault();
                submit_form('{{ route('manage.content.update') }}', 'POST');
            });

            function submit_form(url, metode) {
                conten = fullEditor.root.innerHTML;
                console.log(conten);
                ContentForm.content.val(conten);
                Swal.fire(SwalOpt()).then((result) => {
                    if (!result.isConfirmed) {
                        return;
                    }
                    swalLoading();
                    $.ajax({
                        url: url,
                        'type': metode,
                        processData: false,
                        contentType: false,
                        data: new FormData(ContentForm.form[0]),
                        success: function(data) {
                            if (data['error']) {
                                swalError(data['message'], "Simpan Gagal !!");
                                return;
                            }
                            var user = data['data']
                            dataContent[user['id']] = user;
                            swalBerhasil();
                            offCanvasEl.hide();
                            renderContent(dataContent);
                            // ContentForm.self.modal('hide');
                        },
                        error: function(e) {}
                    });
                });
            };

        });
    </script>
@endsection
