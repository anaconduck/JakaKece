@extends('layouts.app')

@section('css')
    <style>
        section.why-us {
            position: relative;
            min-height: 85vh;
        }

        section.why-us::after {
            content: "";
            background: url('https://image.freepik.com/free-vector/gradient-golden-luxury-background_23-2149025598.jpg');
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;
            opacity: 0.2;
            top: -150px;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
            z-index: -1;
        }

        .container.left {
            width: 100%;
            background: #f5a5259a;
            padding: 10px 0px 20px 0px;
            border: 1px solid #111;
            border-radius: 4px;
            box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.75);
        }

        .link {
            font-size: 16px;
            font-weight: 300;
            text-align: center;
            position: relative;
            height: 40px;
            line-height: 40px;
            margin-top: 10px;
            overflow: hidden;
            width: 90%;
            margin-left: 5%;
            cursor: pointer;
        }

        .link:after {
            content: '';
            position: absolute;
            width: 80%;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            bottom: 50%;
            left: -100%;
            transition-delay: all 0.5s;
            transition: all 0.5s;
        }

        .link:hover:after,
        .link.hover:after {
            left: 100%;
        }

        .link .text {
            text-shadow: 0px -40px 0px rgb(43, 43, 43);
            transition: all 0.75s;
            transform: translateY(100%) translateZ(0);
            transition-delay: all 0.25s;
        }

        .link.active .text {
            text-shadow: 0px -40px 0px rgba(255, 255, 255, 0);
            transform: translateY(0%) translateZ(0) scale(1.1);
            font-weight: 600;
        }

        .link:not(.active):hover .text,
        .link.hover .text {
            text-shadow: 0px -40px 0px rgba(255, 255, 255, 0);
            transform: translateY(0%) translateZ(0) scale(1.1);
            font-weight: 600;
        }

        .close-container {
            width: 20px;
            height: 20px;
            margin-top: 30px;
            cursor: pointer;
        }

        .leftright {
            height: 4px;
            width: 20px;
            position: absolute;
            background-color: #F4A259;
            border-radius: 2px;
            transform: rotate(45deg);
            transition: all 0.3s ease-in;
        }

        .rightleft {
            height: 4px;
            width: 20px;
            position: absolute;
            background-color: #F4A259;
            border-radius: 2px;
            transform: rotate(-45deg);
            transition: all 0.3s ease-in;
        }

        .close {
            margin: 60px 0 0 5px;
            position: absolute;
        }

        .close-container:hover .leftright {
            transform: rotate(-45deg);
            background-color: #F25C66;
        }

        .close-container:hover .rightleft {
            transform: rotate(45deg);
            background-color: #F25C66;
        }

        .ef {
            margin-top: 18px;
        }

    </style>
@stop

@section('slot')
    <section class="section why-us" data-section="section2">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="section-heading">

                    </div>
                </div>
                <div class="col-md-12 anot">
                    <h1>Riwayat Pendaftaran <br> {{ $event->nama }}</h1>
                    <hr>
                    <div class="row">

                        <div class="col-md-4">

                            <div class="container left">
                                <div class="link active" data-target="0">
                                    <div class="text">Informasi Lomba</div>
                                </div>
                                <div class="link" data-target="1">
                                    <div class="text">Informasi Pendaftar</div>
                                </div>
                                <div class="link" data-target="2">
                                    <div class="text">Info Dosen Pembimbing</div>
                                </div>
                                <div class="link" data-target="3">
                                    <div class="text">Fail Kegiatan</div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-8">
                            <div class="card" id="0">
                                <div class="card-header text-center">
                                    Informasi Lomba
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $event->nama }}</h5>
                                    <dl class="row">
                                        <dt class="col-sm-5">Maksimum Pendaftar</dt>
                                        <dd class="col-sm-7">{{ $event->max_anggota }}</dd>

                                        <dt class="col-sm-5">Mulai Pendaftaran</dt>
                                        <dd class="col-sm-7">
                                            <p>{{ date('d M Y', strtotime($event->mulai_daftar)) }}</p>
                                        </dd>

                                        <dt class="col-sm-5">Akhir Pendaftaran</dt>
                                        <dd class="col-sm-7">{{ date('d M Y', strtotime($event->akhir_daftar)) }}
                                        </dd>

                                        <dt class="col-sm-5">Mulai Perlombaan</dt>
                                        <dd class="col-sm-7">{{ date('d M Y', strtotime($event->mulai)) }}</dd>

                                        <dt class="col-sm-5">Poster</dt>
                                        <dd class="col-sm-7"><a href="{{ url($event->file) }}">Poster</a></dd>
                                    </dl>
                                </div>
                                <div class="card-footer text-muted">

                                </div>
                            </div>


                            <div class="card d-none" id="1">
                                <div class="card-header text-center">
                                    Informasi Pendaftar
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $event->nama }}</h5>
                                    <dl class="row">
                                        <dt class="col-sm-5">Pendaftar</dt>
                                        <dd class="col-sm-7">
                                            <ol>
                                                @foreach ($mahasiswa as $mhs)
                                                    <li>
                                                        {{ $mhs->name . ' - ' . $mhs->identity }}
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </dd>

                                        <dt class="col-sm-5">Email Pendaftar</dt>
                                        <dd class="col-sm-7">
                                            <ol>
                                                @foreach ($mahasiswa as $mhs)
                                                    <li>
                                                        {{ $mhs->email }}
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </dd>

                                        <dt class="col-sm-5">Status Pendaftaran</dt>
                                        <dd class="col-sm-7">
                                            @if ($pendaftar->status == 0)
                                                Belum Terdaftar
                                            @elseif($pendaftar->status == 1)
                                                Terdaftar
                                            @elseif($pendaftar->status == 2)
                                                Tersetujui
                                            @else
                                                Tidak Terdaftar
                                            @endif
                                        </dd>

                                        <dt class="col-sm-5">Status Pendanaan</dt>
                                        <dd class="col-sm-7">
                                            @if ($pendaftar->status == 0)
                                                Belum Diterima
                                            @elseif($pendaftar->status == 1)
                                                Diterima
                                            @endif
                                        </dd>

                                        <dt class="col-sm-5 mt-4">Catatan</dt>
                                        <dd class="col-sm-7 mt-4">{{ $pendaftar->catatan_pendanaan ?? '-' }}</dd>
                                    </dl>
                                </div>
                                <div class="card-footer text-muted">

                                </div>
                            </div>

                            <div class="card d-none" id="2">
                                <div class="card-header text-center">
                                    Informasi Dosen Pembimbing
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $event->nama }}</h5>
                                    <dl class="row">
                                        <dt class="col-sm-5">Nama Dosen Pembimbing</dt>
                                        <dd class="col-sm-7">{{ $dosen->nama_lengkap ?? '-' }}</dd>

                                        <dt class="col-sm-5">Email Dosen Pembimbing</dt>
                                        <dd class="col-sm-7">{{ $dosen->email ?? '-' }}</dd>

                                        <dt class="col-sm-5 mt-4">Catatan</dt>
                                        <dd class="col-sm-7 mt-4">{{ $pendaftar->catatan_pembimbing ?? '-' }}</dd>
                                    </dl>
                                </div>
                                <div class="card-footer text-muted">

                                </div>
                            </div>
                            @if ($pendaftar->status)
                                <div class="card d-none" id="3">
                                    <div class="card-header text-center">
                                        Fail Kegiatan
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ $event->nama }}</h5>
                                        @if ($errors->any())
                                            <p style="color: #F25C66">
                                                {{ implode(', ', $errors->all()) }}
                                            </p>
                                        @endif
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <dl class="row">
                                                @csrf
                                                @if ($pendaftar->file)
                                                    @foreach ($pendaftar->file as $file)
                                                        <dt class="col-sm-2">
                                                            <div id="{{ $ind - 1 }}" class="close-container">
                                                                <div class="leftright"></div>
                                                                <div class="rightleft"></div>
                                                            </div>
                                                        </dt>
                                                        <dd class="col-sm-10 ef">
                                                            <a target="_blank" href="{{ '/' . $file }}">
                                                                {{ $file }}
                                                            </a>
                                                        </dd>
                                                    @endforeach
                                                    <input id="delete" type="submit" name="delete" class="d-none" />
                                                @endif

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <button type="submit" class="input-group-text">Upload</button>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="file" name="file"
                                                            required>
                                                        <label class="custom-file-label" for="file" id="labelfile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </dl>
                                        </form>
                                    </div>
                                    <div class="card-footer text-muted">

                                    </div>
                                </div>
                            @else
                                <div class="card d-none" id="3">
                                    <div class="card-header text-center">
                                        Fail Kegiatan
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ $event->nama }}</h5>
                                        <h6 style="color: #F25C66; text-align: center">Anda belum dapat mengunggah
                                            dokumentasi kegiatan karena status pendaftaran anda belum terdaftar. Hubungi
                                            admin untuk info lebih lanjut!</h6>
                                    </div>
                                    <div class="card-footer text-muted">

                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('script')
    <script>
        let dlt = $('#delete')
        let cls = $('.close-container')
        let fl = $('#file')
        let lblfl = $('#labelfile')
        let frm = $('form')
        cls.on('click', function() {
            dlt[0].value = this.id
            fl[0].required = false
            dlt[0].click()
        })
        fl.on('change', function() {
            lblfl[0].innerText = fl[0].value
        })

        let lnk = $('.link')
        let crd = $('.card')
        let w;
        lnk.on('click', function() {
            lnk.removeClass('active')
            this.classList.toggle('active')
            crd.addClass('d-none')
            crd[this.dataset['target']].classList.toggle('d-none')
        })
    </script>
@stop
