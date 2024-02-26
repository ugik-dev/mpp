@extends('panel/layout/userLayout');
@section('vendor-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('vendor-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/super-build/ckeditor.js"></script>
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
                    <input type="text" hidden id="id" value="{{ $dataEdit->id ?? '' }}" name="id" />
                    <div class="col-sm-12">
                        <label for="basicFullname">Nama Menu:</label>
                        <div class="input-group">
                            <input type="text" id="name" class="form-control dt-full-name" name="name"
                                value="{{ $dataEdit->name ?? '' }}" placeholder="" aria-label=""
                                aria-describedby="basicFullname2" />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="basicSalary">Jenis :</label>
                                <div class="input-group">
                                    <div class="form-floating form-floating-outline w-100">
                                        <!-- <input type="number" id="user_id" name="user_id" class="form-control dt-salary" aria-label="" aria-describedby="basicSalary2" /> -->
                                        <select id="jenis" name="jenis" class="form-control">
                                            <option value="">--</option>
                                            @foreach ($dataContent['jenis_menu'] as $key => $rd)
                                                <option
                                                    {{ !empty($dataEdit->jenis) ? ($dataEdit->jenis == $key ? 'selected' : '') : '' }}
                                                    value="{{ $key }}">
                                                    {{ $rd }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="basicSalary">Parent :</label>
                                <div class="input-group">
                                    <div class="form-floating form-floating-outline w-100">
                                        <select id="parent_id" name="parent_id" class="form-control w-100 select2">
                                            <option value="">--</option>
                                            @foreach ($dataContent['parentData'] as $rd)
                                                <option
                                                    {{ !empty($dataEdit->parent_id) ? ($dataEdit->parent_id == $rd->id ? 'selected' : '') : '' }}
                                                    value="{{ $rd->id }}">
                                                    {{ $rd->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="basicFullname">Key / Link :</label>
                                <div class="input-group">
                                    <input type="text" id="key" class="form-control dt-full-name" name="key"
                                        value="{{ $dataEdit->key ?? '' }}" placeholder="" aria-label=""
                                        aria-describedby="basicFullname2" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .ck-editor__editable_inline {
                            min-height: 400px;
                        }
                    </style>
                    <div class="col-lg-12 h-100 mb-3">
                        <label for="basicFullname">Isi :</label>
                        <textarea id="content_field" hidden name="content">{{ $dataEdit->content ?? '' }}</textarea>
                        <textarea id="html_content">{{ $dataEdit->content ?? '' }}</textarea>
                        {{-- <div id="quill" style="width: 100%">
                            <p></p>
                        </div> --}}
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="col-sm-12">
                                    <label for="basicFullname">Gambar Sampul :</label>
                                    <div class="input-group">
                                        <input type="file" id="file_sampul" class="form-control dt-full-name"
                                            name="file_sampul" accept="image/*" aria-label=""
                                            aria-describedby="basicFullname2" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    @if (!empty($dataEdit->sampul))
                                        <img class="mb-2 mt-3"
                                            src="{{ url('/storage/upload/content/' . $dataEdit->sampul) }}"
                                            class="img-thumbnail">
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-sm-12">
                        <a type="" {{ !empty($dataEdit->id) ? 'hidden' : '' }}
                            class="btn btn-primary data-submit me-sm-3 me-1 text-white" id="insertBtn"
                            data-metod="ins">Tambah</a>
                        <a type="" {{ !empty($dataEdit->id) ? '' : 'hidden' }}
                            class="btn btn-primary data-submit me-sm-3 me-1 text-white" id="updateBtn" data-act="upd">Simpan
                            Perubahan</a>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.select2').select2();
            let html_content;
            CKEDITOR.ClassicEditor.create(document.getElementById("html_content"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'exportPDF', 'exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript',
                        'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock',
                        'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                ckfinder: {
                    uploadUrl: '{{ route('manage.menu.storeimage') . '?_token=' . csrf_token() }}',
                },

                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Buat kontent disini',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [10, 12, 14, 'default', 18, 20, 22],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [{
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [{
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy',
                            '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake',
                            '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum',
                            '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }]
                },
                // The "superbuild" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'AIAssistant',
                    'CKBox',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced',
                    'CaseChange'
                ]
            }).then(editor => {
                html_content = editor;
            }).catch(error => {
                console.error(error);
            });;

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
                'name': $('#form-content').find('#name'),
                'content': $('#form-content').find('#content_field'),
                'jenis': $('#form-content').find('#jenis'),
                'parent_id': $('#form-content').find('#parent_id'),
                'file_sampul': $('#form-content').find('#file_sampul'),
            }

            swalLoading();
            $.when().then((e) => {
                Swal.close();
            }).fail((e) => {
                console.log(e)
            });


            ContentForm.insertBtn.on('click', () => {
                event.preventDefault();
                submit_form('{{ route('manage.menu.create') }}', 'POST');
            });
            ContentForm.updateBtn.on('click', () => {
                event.preventDefault();
                submit_form('{{ route('manage.menu.update') }}', 'POST');
            });

            function submit_form(url, metode) {
                // conten = fullEditor.root.innerHTML;
                // console.log(conten);
                ContentForm.content.val(html_content.getData());
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
                            swalBerhasil('Berhasil', true,
                                "{{ route('manage.menu.index') }}");

                        },
                        error: function(e) {}
                    });
                });
            };
        });
    </script>
@endsection
