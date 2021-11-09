@extends('layouts.app')

@section('slot')
<section class="section video" data-section="section5">
    <div class="container ">
        <h2 style="margin: 20px 0 40px;color:white;text-align:center;">Pelaksanaan Student Exchange - {{ $event->nama_universitas . '-' . $event->nama_fakultas }}</h2>
      <div class="row align-items-start">
          <div class="col-sm-3">
            <a href="{{ url('/exchange')}}">
                <div class="back">
                    <img src="{{ asset('assets/images/left-chevron.png') }}" alt="">
                    Kembali
                </div>
            </a>
          </div>
        <div class="col-sm-9">
            <article class="content">
                <h4>Informasi Universitas</h4>
                <hr>
                <dl class="row sec1">
                    <dt class="col-sm-4">Instansi</dt>
                    <dd class="col-sm-8">{{ $event->nama_universitas??'University' }}</dd>

                    <dt class="col-sm-4">Tujuan Exchange</dt>
                    <dd class="col-sm-8">{{ $event->dalam_negeri?'Dalam Negeri' : 'Luar Negeri' }}</dd>

                    <dt class="col-sm-4">Nama Mata Kuliah</dt>
                    <dd class="col-sm-8">
                      {{ $event->nama_fakultas??'-' }}
                    </dd>

                    <dt class="col-sm-4">Status Akreditasi</dt>
                    <dd class="col-sm-8">{{ $event->status_akreditasi ?? '-' }}</dd>

                    <dt class="col-sm-4">Status Pendaftaran</dt>
                    <dd class="col-sm-8">Berakhir</dd>

                    <dt class="col-sm-4">Persyaratan</dt>
                    <dd class="col-sm-8">
                            @foreach ($event->persyaratan as $persyaratan)

                            <dl class="row">
                                <dd class="col-sm">{{ $persyaratan }}</dd>
                            </dl>
                            @endforeach
                    </dd>

                    <dt class="col-sm-4">Kelengkapan Berkas</dt>
                    <dd class="col-sm-8">
                            @foreach ($event->kelengkapan as $kelengkapan)

                            <dl class="row">
                                <dd class="col-sm">{{ $kelengkapan }}</dd>
                            </dl>
                            @endforeach
                    </dd>

                    <dt class="col-sm-4">Hasil</dt>
                    <dd class="col-sm-8">
                        Belum Keluar
                    </dd>

                </dl>

            </article>
        </div>
      </div>
    </div>

    </section>
  <style>
      .content hr{
          border: 1px solid white;
      }
      .back{
            margin-bottom: 20px;
            margin-left: 10px;
            background-color: rgba(240, 240, 240, 0.205);
            border-radius: 30px;
            padding-left: 10px;
            cursor: pointer;
            transition: all 0.5s;
        }
        .back img{
            transition: all 0.5s;
            margin-right: 10px;
            width: 35px;
        }
        .back:hover{
            font-size: 13pt;
        }
        .back:hover img{
            transform: translateX(-10px);
        }
        .sec1{
            margin-bottom: 50px;
        }
        .modal.fade{
            color: black;
        }
  </style>


@stop


