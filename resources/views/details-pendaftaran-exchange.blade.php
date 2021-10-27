@extends('layouts.app')

@section('slot')

<section class="section video" data-section="section5">
    <div class="container ">
        <h2 style="margin: 20px 0 40px;color:white;text-align:center;">Pendaftaran Student Exchange </h2>
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
                <h4>Informasi Universitas</h4>
                <hr>
                <dl class="row sec1">
                    <dt class="col-sm-4">Instansi</dt>
                    <dd class="col-sm-8">{{ $event->nama_universitas??'University' }}</dd>

                    <dt class="col-sm-4">Nama Fakultas</dt>
                    <dd class="col-sm-8">
                      {{ $event->nama_fakultas??'-' }}
                    </dd>

                    <dt class="col-sm-4">Status Akreditasi</dt>
                    <dd class="col-sm-8">{{ $event->status_akreditasi ?? '-' }}</dd>

                    <dt class="col-sm-4">Mulai Pendaftaran</dt>
                    <dd class="col-sm-8">{{ date('d-M-Y', strtotime($event->mulai)) ?? 'Belum ada' }}</dd>

                    <dt class="col-sm-4">Akhir Pendaftaran</dt>
                    <dd class="col-sm-8">{{ date('d-M-Y', strtotime($event->akhir)) ?? 'Sudah Berakhir' }}</dd>

                    <dt class="col-sm-4">Persyaratan</dt>
                    <dd class="col-sm-8">
                            @foreach ($event->persyaratan as $persyaratan)

                            <dl class="row">
                                <dd class="col-sm">{{ $persyaratan }}</dd>
                            </dl>
                            @endforeach
                    </dd>

                </dl>
                <h4>Informasi Pendaftar</h4>
                <hr>
                <dl class="row sec1">
                    <dt class="col-sm-4">Nama Pendaftar</dt>
                    <dd class="col-sm-8">{{ $user->name ??'Nama Pendaftar' }}</dd>

                    <dt class="col-sm-4">NIM</dt>
                    <dd class="col-sm-8">{{ $user->id??'-' }}</dd>

                    <dt class="col-sm-4">Fakultas</dt>
                    <dd class="col-sm-8">
                      {{ $user->fakultas??'-' }}
                    </dd>

                    <dt class="col-sm-4">Jurusan</dt>
                    <dd class="col-sm-8">{{ $user->jurusan ?? '-' }}</dd>

                    <dt class="col-sm-4">Alamat</dt>
                    <dd class="col-sm-8">{{ $user->alamat ?? 'Malang' }}</dd>

                    <dt class="col-sm-4">Tanggal Lahir</dt>
                    <dd class="col-sm-8">{{ date('d-M-Y', strtotime($user->tanggal_lahir)) ?? '-' }}</dd>

                </dl>
                <div class="d-flex flex-row-reverse">
                    <div class="p-3">
                        @if ($mulai and !$selesai)
                            <button type="button" class="btn btn-primary d-none" id="modal" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pendaftaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda ingin mendaftar dalam program student exchange ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                    <button type="button" class="btn btn-primary" id="konfirmasi">Ya</button>
                                </div>
                                </div>
                            </div>
                            </div>

                            <form method="post" action="{{ url('/daftar-exchange') }}" id="form">
                                @csrf
                                <input type="text" name="id" value="{{ $id }}" class="d-none"/>
                                <button class="btn btn-info" type="submit" form="myList" id="daftar" value="Submit">Daftar</button>
                            </form>
                        @elseif (!$mulai)
                            <div class="alert alert-warning" role="alert">
                                Pendaftaran Student Exchange untuk event ini belum dimulai!
                            </div>
                        @elseif ($selesai)
                            <div class="alert alert-warning" role="alert">
                                Pendaftaran Student Exchange untuk event ini telah berakhir!
                            </div>
                        @endif
                    </div>
                  </div>
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

@if ($mulai and !$selesai)
    @section('script')
            <script>
                let form = $('#form')
                let modal = $('#modal')
                let konfirmasi = $('#konfirmasi')
                $('#daftar').click(function(el){
                    modal.click()
                })
                konfirmasi.click(function(el){
                    form.submit()
                })
            </script>
    @stop
@endif
