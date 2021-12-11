@extends('layouts.app')

@section('slot')
    <section class="section why-us" data-section="section5">
        <div class="container">
            <h1>Detail Tujuan {{ $tujuan->nama_universitas }}</h1>
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

                            <dt class="col-sm-4">Nama Universitas</dt>
                            <dd class="col-sm-8">
                                {{ $tujuan->nama_universitas }}
                            </dd>

                            <dt class="col-sm-4">Posisi</dt>
                            <dd class="col-sm-8">{{ $tujuan ? 'Dalam Negeri' : 'Luar Negeri' }}</dd>

                            <dt class="col-sm-4">File Penjelas</dt>
                            <dd class="col-sm-8"><a href="{{ Storage::url($tujuan->file_penjelas) }}">file
                                    penjelas</a> </dd>

                            <dt class="col-sm-4">Mata Kuliah</dt>
                            <dd class="col-sm-8">
                                <ol style="list-style-type: none">
                                    @foreach ($mk as $m)
                                        <li>{{ $m->sks . ' sks - ' . $m->nama_mata_kuliah }}</li>
                                    @endforeach
                                </ol>
                            </dd>

                            @if ($dokumentasi->count() !== 0 and $dokumentasi[0]->dokumentasi !== null)
                                <dt class="col-sm-4">Dokumentasi Kegiatan</dt>
                                <dd class="col-sm-8">
                                    <ol>
                                        @foreach ($dokumentasi as $d)
                                            @php
                                                $d = json_decode($d['dokumentasi']);
                                            @endphp
                                            @if ($d)
                                                @foreach ($d as $item)
                                                    <li>
                                                        <a href="{{ asset($item) }}"></a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </ol>
                                    {{ $dokumentasi->links() }}
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

    </style>
@stop
