@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/exchange-paket.css') }}" />
    <style>
        h1 {
            color: #f5a425;
            text-align: center;
        }
    </style>
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
                        @if ($tujuan->file_penjelas)
                            <div class="col-md-12">
                                <div class="section-heading">
                                    <a href="{{ Storage::url($tujuan->file_penjelas) }}">
                                        <h2>Download Dokumen Pelaksanaan</h2>
                                    </a>
                                </div>
                            </div>
                        @endif
                        <div class="card">

                            @if ($mk->count() > 0)
                                <div class="demo">
                                    <form method="POST" action="">
                                        @csrf
                                        @foreach ($mk as $m)
                                            <label class="toggle" for="{{ $m->id }}">
                                                <input name="mk_{{ $m->id }}" type="checkbox" class="toggle__input"
                                                    id="{{ $m->id }}" value="{{ $m->id }}" />
                                                <span class="toggle-track">
                                                    <span class="toggle-indicator">
                                                        <!-- 	This check mark is optional	 -->
                                                        <span class="checkMark">
                                                            <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation"
                                                                aria-hidden="true">
                                                                <path
                                                                    d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                </span>
                                                {{ $m->sks . ' sks - ' . $m->nama_mata_kuliah }}
                                            </label>
                                        @endforeach
                                        <input class="btn btn-dark mt-5" type="submit" value="Daftar" />
                                    </form>
                                </div>
                            @else
                                <h4 style="color: rgb(255, 115, 115);text-align: center;">Belum Ada matkul yang tersedia!
                                </h4>
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

    </script>
@stop
