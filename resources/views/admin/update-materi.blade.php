@extends('layouts.admin')

@section('css')
    <style>
        .file {
            padding: 0 !important;
        }

    </style>
@stop

@section('slot')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Update Materi</h2>
                        @if ($errors->any())
                            {{ implode(', ', $errors->all()) }}
                        @endif
                    </div>
                    <form id="contact" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label>Judul</label>
                                <fieldset>
                                    <input name="judul" type="text" class="form-control" id="title" placeholder="Title..."
                                        required" value="{{ $materi->judul }}">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label>Sesi</label>
                                <fieldset>
                                    <select name="sesi" id="sesi" required>
                                        <option value="1" @if ($materi->sesi == 1) selected @endif>Introduction</option>
                                        <option value="2" @if ($materi->sesi == 2) selected @endif>Listening</option>
                                        <option value="3" @if ($materi->sesi == 3) selected @endif">Reading</option>
                                        <option value="4" @if ($materi->sesi == 4) selected @endif>Structure</option>
                                        <option value="5" @if ($materi->sesi == 5) selected @endif>Writing</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <label>Kategori Course</label>
                                <select name="id_course" id="id_course" required>
                                    <option value="-1" @if ($materi->id_course < 1 and $materi->id_course > 4)
                                        selected
                                        @endif>Select Category</option>

                                    <option value="1" @if ($materi->id_course == 1)
                                        selected
                                        @endif>TOEFL ITP</option>

                                    <option value="2" @if ($materi->id_course == 2)
                                        selected
                                        @endif>TOEFL IBT</option>
                                    <option value="3" @if ($materi->id_course == 3)
                                        selected
                                        @endif>TOEIC</option>
                                    <option value="4" @if ($materi->id_course == 4)
                                        selected
                                        @endif>IELTS</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label>File/Video</label>
                                File yang diterima : jpeg, jpg, png, gif, mp4, docx, doc, pdf
                                <fieldset>
                                    @if ($materi->file)
                                        current file : {{ $materi->file }}
                                    @endif
                                    <input name="file" class="form-control file" type="file" id="formFileMultiple">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <label>Transcript</label>
                                <p>File yang diterima :docx, pdf</p>
                                <fieldset>
                                    @if ($materi->transcript)
                                        current file : {{ $materi->transcript }}
                                    @endif
                                    <input name="transcript" class="form-control file" type="file" id="formFileMultiple">
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <label>Teks</label>
                                <textarea name="teks" id="teks" placeholder="Enter your text"
                                    rows="6">{{ $materi->teks ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mt-4">
                                <button name="submit" value="update" type="submit" id="form-submit"
                                    class="button">Update</button>
                            </div>
                            <div class="col-md-6 mt-4">
                                <button name="submit" value="delete" type="submit" name="delete" value="delete"
                                    id="forn-delete" class="button btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: '#teks',
                plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
                imagetools_cors_hosts: ['picsum.photos'],
                menubar: 'file edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
                toolbar_sticky: true,
                autosave_ask_before_unload: true,
                autosave_interval: "30s",
                autosave_prefix: "{path}{query}-{id}-",
                autosave_restore_when_empty: false,
                autosave_retention: "2m",
                image_advtab: true,
                /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
                link_list: [{
                        title: 'My page 1',
                        value: 'https://www.codexworld.com'
                    },
                    {
                        title: 'My page 2',
                        value: 'https://www.xwebtools.com'
                    }
                ],
                image_list: [{
                        title: 'My page 1',
                        value: 'https://www.codexworld.com'
                    },
                    {
                        title: 'My page 2',
                        value: 'https://www.xwebtools.com'
                    }
                ],
                image_class_list: [{
                        title: 'None',
                        value: ''
                    },
                    {
                        title: 'Some class',
                        value: 'class-name'
                    }
                ],
                importcss_append: true,
                file_picker_callback: function(callback, value, meta) {
                    /* Provide file and text for the link dialog */
                    if (meta.filetype === 'file') {
                        callback('https://www.google.com/logos/google.jpg', {
                            text: 'My text'
                        });
                    }

                    /* Provide image and alt text for the image dialog */
                    if (meta.filetype === 'image') {
                        callback('https://www.google.com/logos/google.jpg', {
                            alt: 'My alt text'
                        });
                    }

                    /* Provide alternative source and posted for the media dialog */
                    if (meta.filetype === 'media') {
                        callback('movie.mp4', {
                            source2: 'alt.ogg',
                            poster: 'https://www.google.com/logos/google.jpg'
                        });
                    }
                },
                templates: [{
                        title: 'New Table',
                        description: 'creates a new table',
                        content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                    },
                    {
                        title: 'Starting my story',
                        description: 'A cure for writers block',
                        content: 'Once upon a time...'
                    },
                    {
                        title: 'New list with dates',
                        description: 'New List with dates',
                        content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                    }
                ],
                template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
                template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
                height: 600,
                image_caption: true,
                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                noneditable_noneditable_class: "mceNonEditable",
                toolbar_mode: 'sliding',
                contextmenu: "link image imagetools table",
            });
        })
    </script>
@stop
