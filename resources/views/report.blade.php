@extends('layouts.app')

@section('slot')
    <section class="section why-us" data-section="section5">
        <div class="container">
            <h1>Report - {{ "$tipe $course" }}</h1>
            <div class="row align-items-start">
                <div class="col-sm-3 left">
                    <a href="{{ url('/user/riwayat-latihan') }}">
                        <div class="back">
                            <img src="{{ asset('assets/images/left-chevron.png') }}" alt="">
                            Kembali
                        </div>
                    </a>
                </div>
                <div class="col-sm-9 right">
                    <article class="content">
                        <h4>Hasil Latihan, id : {{ $riwayat->id }}</h4>
                        <hr>
                        <dl class="row">

                            <dt class="col-sm-4">Nama</dt>
                            <dd class="col-sm-8">
                                {{ auth()->user()->name ?? 'Name participant' }}
                            </dd>

                            <dt class="col-sm-4">DOB</dt>
                            <dd class="col-sm-8">{{ date('d / M / Y', strtotime($info->tanggal_lahir)) }}</dd>

                            <dt class="col-sm-4">Program Studi</dt>
                            <dd class="col-sm-8">{{ $info->program_studi }}</dd>

                            <dt class="col-sm-4">Native Country</dt>
                            <dd class="col-sm-8">Indonesia</dd>

                            <dt class="col-sm-4">Native Language</dt>
                            <dd class="col-sm-8">Indonesia</dd>

                            <dt class="col-sm-4">Skor Skala</dt>
                            <dd class="col-sm-8">
                                @foreach ($report as $ind => $sesi)
                                    <dl class="row">
                                        <dt class="col-sm-7">{{ config("app.$course.".$sesi['sesi'])['sesi'] }}</dt>
                                        <dd class="col-sm-5">
                                            {{ $sesi['jumlah_benar'] }}
                                        </dd>
                                    </dl>
                                @endforeach
                            </dd>

                            <dt class="col-sm-4">Waktu Latihan</dt>
                            <dd class="col-sm-8">{{ date('d / M / Y', strtotime($riwayat->created_at)) }}</dd>

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

@section('script')
    <script>

    </script>
@stop
