@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/exchange-paket.css') }}" />
    <style>
        .section.why-us{
            min-height: 85vh;
        }
    </style>
@stop

@section('slot')
    <section class="section why-us" data-section="section5">
        <div class="container">
            <h1 style="text-align: center;margin-bottom: 50px; width: 100%;color:#ad7418;">Daftar Training - {{ $tujuan->nama_instansi }}</h1>
            <div class="row align-items-start">
                <div class="col-sm-12 right">
                    <div class="container">

                        @foreach ($paket as $no => $ev)
                        <a class="card1" href="{{ url("/training/$tujuan->id/$ev->id") }}">
                            <h3>Paket-{{ $ev->nama_event ?? '' }}</h3>
                            <ol>
                                @foreach ($mk[$ev->id] as $item)
                                    <li>{{ $item->sks." sks - ".$item->nama_mata_kuliah }}</li>
                                @endforeach
                            </ol>
                            <p class="small">
                                konversi sks maks : {{ $ev->max_konversi_sks ?? '' }}
                            </p>
                            <div class="go-corner" href="#">
                                <div class="go-arrow">
                                    →
                                </div>
                            </div>
                        </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('script')
    <script>

    </script>
@stop
