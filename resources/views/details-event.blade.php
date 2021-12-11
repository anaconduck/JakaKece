@extends('layouts.app')

@section('slot')
    <section class="section why-us" data-section="section5">
        <div class="container">
            <h1>Detail Lomba {{ $event->nama }}</h1>
            <div class="row align-items-start">
                <div class="col-sm-3 left">
                    <a href="{{ url()->previous() }}">
                        <div class="back">
                            <img src="{{ asset('assets/images/left-chevron.png') }}" alt="">
                            Kembali
                        </div>
                    </a>
                </div>
                <div class="col-sm-9 right">
                    <article class="content">
                        <hr>
                        <dl class="row">

                            <dt class="col-sm-4">Nama Lomba</dt>
                            <dd class="col-sm-8 mb-3">
                                {{ $event->nama }}
                            </dd>

                            <dt class="col-sm-4">Tanggal Pendaftaran</dt>
                            <dd class="col-sm-8 mb-3">{{ date('d / M / Y', strtotime($event->mulai_daftar)) }}</dd>

                            <dt class="col-sm-4">Tanggal Akhir Pendaftaran</dt>
                            <dd class="col-sm-8 mb-3">{{ date('d / M / Y', strtotime($event->akhir_daftar)) }}</dd>

                            <dt class="col-sm-4">Tanggal Pelaksanaan</dt>
                            <dd class="col-sm-8" mb-3>{{ date('d / M / Y', strtotime($event->mulai)) }}</dd>

                            <dt class="col-sm-4">Jumlah Anggota</dt>
                            <dd class="col-sm-8 mb-3">{{ $event->max_anggota }}</dd>

                            @if ($event->file)
                                <dt class="col-sm-4">Poster</dt>
                                <dd class="col-sm-8 mb-3"><a style="color: rgb(73, 152, 255);"
                                        href="{{ asset($event->file) }}"> lihat poster </a></dd>
                            @endif

                            @if ($terlaksana)
                                <dt class="col-sm-4">Jumlah Pendaftar</dt>
                                <dd class="col-sm-8 mb-3">{{ $numPendaftar ?? 0 }}</dd>
                            @endif

                            @if ($event->finish)
                                <dt class="col-sm-4">Jumlah Pemenang</dt>
                                <dd class="col-sm-8 mb-3">{{ $numPemenang ?? 0 }}</dd>
                            @endif

                            @if ($riwayatFile)
                                <dt class="col-sm-4">Dokumentasi Kegiatan</dt>
                                <dd class="col-sm-8 mb-3">
                                    @foreach ($riwayatFile as $file)
                                        @foreach ($file as $dfile)
                                            <dl class="row">
                                                @if (strpos($dfile, 'storage/') !== false)
                                                    <dd class="col-sm-12">
                                                        <a href="{{ url($dfile) }}">
                                                            {{ $dfile }}
                                                        </a>
                                                    </dd>
                                                @else
                                                <dd class="col-sm-12">
                                                    <a href="{{ Storage::url($dfile) }}">
                                                        {{ $dfile }}
                                                    </a>
                                                </dd>
                                                @endif
                                            </dl>
                                        @endforeach
                                    @endforeach
                                </dd>
                            @endif
                        </dl>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <style>
        body {
            position: relative;
        }

        body::after {
            content: "";
            background: url("https://image.freepik.com/free-vector/wavy-background-with-copy-space_52683-65230.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.1;
            top: -60px;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
            z-index: -1;
        }

        .content hr {
            border: 1px solid #333;
        }

        .back {
            margin-bottom: 20px;
            margin-left: 10px;
            background-color: rgba(240, 240, 240, 0.205);
            border-radius: 30px;
            padding-left: 10px;
            cursor: pointer;
            transition: all 0.5s;
        }

        .back img {
            transition: all 0.5s;
            margin-right: 10px;
            width: 35px;
        }

        .back:hover {
            font-size: 13pt;
        }

        .back:hover img {
            transform: translateX(-10px);
        }

        a {
            color: black;
        }

        a:hover {
            color: #444;
            font-weight: 500;
        }

        .why-us {
            min-height: 100vh;
        }

        .why-us .container {
            background-color: #f5a52517;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 1px 1px 20px rgba(51, 51, 51, 0.384)
        }

        .right {
            border-left: 2px solid rgba(0, 0, 0, 0.151);
        }
        h1{
            text-align: center;
        }
    </style>
@stop
