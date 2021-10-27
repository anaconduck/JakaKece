@extends('layouts.app')

@section('slot')
<section class="section video" data-section="section5">
    <div class="container ">
        <h2 style="margin: 20px 0 40px;color:white;text-align:center;">Riwayat Mahasiswa Student Exchange<br> {{ $data[0]->nama_universitas }}</h2>
      <div class="row align-items-start">
          <div class="col-sm-3">
            <a href="{{ url()->previous()}}">
                <div class="back">
                    <img src="{{ asset('assets/images/left-chevron.png') }}" alt="">
                    Kembali
                </div>
            </a>
          </div>
        <div class="col-sm-9">
            <article class="content">
                <h4>Daftar Mahasiswa</h4>
                <hr>
                <dl class="row">
                    @foreach ($data as $mhs)
                        <dt class="col-sm-4">{{ $mhs->name ?? 'Nama Mahasiswa' }}</dt>
                        <dt class="col-sm-8">{{ $mhs->id_mahasiswa??'-' }}</dt>
                    @endforeach
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
