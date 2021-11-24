@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/exchange-paket.css') }}" />
@stop

@section('slot')
    <section class="section why-us" data-section="section5">
        <div class="container">
            <h1 style="text-align: center;margin-bottom: 50px;">Daftar Paket Student Exchange
                {{ $tujuan->nama_universitas }}</h1>
            <div class="row align-items-start">
                <div class="col-sm-4 left">
                    <h6>Persyaratan Mahasiswa</h6>
                    <ol class="list">
                        @foreach ($persyaratan as $syarat)
                            @if ($syarat->kategori_persyaratan == 'persyaratan')
                                <li class="item">
                                    <span>{{ $syarat->nama_persyaratan ?? '' }}</span>
                                </li>
                            @endif
                        @endforeach
                    </ol>
                    <h6>Kelengkapan Berkas</h6>
                    <ol class="list">
                        @foreach ($persyaratan as $syarat)
                            @if ($syarat->kategori_persyaratan == 'kelengkapan berkas')
                                <li class="item">
                                    <span>{{ $syarat->nama_persyaratan ?? '' }}</span>
                                </li>
                            @endif
                        @endforeach
                    </ol>
                </div>
                <div class="col-sm-8 right">
                    <div class="container">

                        @foreach ($paket as $no => $mk)
                        <a class="card1" href="{{ url("/exchange/$lokasi/$tujuan->id/$no") }}">
                            <h3>Paket-{{ $no }}</h3>
                            <p class="small">
                                <ul>
                                    @foreach ($mk as $m)
                                    <li>{{ $m->nama_mata_kuliah.' - '.$m->sks }} sks </li>
                                    @endforeach
                                </ul>
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
