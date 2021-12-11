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
        h3 {
            color: #262626;
            font-size: 17px;
            line-height: 24px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        p {
            font-size: 17px;
            font-weight: 400;
            line-height: 20px;
            color: #666666;
        }

        p.small {
            font-size: 14px;
        }

        .go-corner {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            width: 32px;
            height: 32px;
            overflow: hidden;
            top: 0;
            right: 0;
            background-color: #00838d;
            border-radius: 0 4px 0 32px;
        }

        .go-arrow {
            margin-top: -4px;
            margin-right: -4px;
            color: white;
            font-family: courier, sans;
        }

        .card2 {
            display: block;
            top: 0px;
            position: relative;
            max-width: 262px;
            background-color: #f2f8f9;
            border-radius: 4px;
            padding: 32px 24px;
            margin: 12px;
            text-decoration: none;
            z-index: 0;
            overflow: hidden;
            border: 1px solid #f2f8f9;
        }

        .card2:hover {
            transition: all 0.2s ease-out;
            box-shadow: 0px 4px 8px rgba(38, 38, 38, 0.2);
            top: -4px;
            border: 1px solid #cccccc;
            background-color: white;
        }

        .card2:before {
            content: "";
            position: absolute;
            z-index: -1;
            top: -16px;
            right: -16px;
            background: #00838d;
            height: 32px;
            width: 32px;
            border-radius: 32px;
            transform: scale(2);
            transform-origin: 50% 50%;
            transition: transform 0.15s ease-out;
        }

        .card2:hover:before {
            transform: scale(2.15);
        }

        h3.ex {
            width: 100%;
            text-align: center;
            color: rgb(243, 115, 115);
        }

        h3.ex a {
            color: rgb(243, 115, 115);
            text-decoration: underline
        }

        h3.ex a:hover {
            color: rgb(168, 60, 60);
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
                    <h1>Riwayat Pendaftaran Jawara</h1>
                    <hr>
                    <div class="row">
                        <div class="col-md-12" style="border-left: 5px solid rgba(0, 0, 0, 0.075)">
                            @if ($riwayat->count())
                                <div class="row">
                                    @foreach ($riwayat as $data)

                                        <a class="card2 col-sm-4" href="{{ url("/user/riwayat-jawara/$data->id") }}">
                                            <h3>{{ $data->nama }}</h3>
                                            <p class="small">Status :
                                                @switch($data->status)
                                                    @case(1)
                                                        Terdaftar
                                                    @break
                                                    @case(2)
                                                        Tersetujui
                                                    @break
                                                    @default
                                                        Belum Terdaftar
                                                @endswitch
                                            </p>

                                            <div class="go-corner">
                                                <div class="go-arrow">
                                                    →
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="d-flex justify-content-center col-12 mt-5">
                                        {{ $riwayat->links() }}
                                    </div>
                                </div>
                            @else
                                <div class="container ex">
                                    <h3>Anda belum terdaftar dalam perlombaan apapun. <br><a
                                            href="{{ url('/jawara') }}">Daftar Lomba Sekarang!</a></h3>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
