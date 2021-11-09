@extends('layouts.app')

@section('slot')
<section class="section why-us" data-section="section2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading"></div>
            </div>
            <div class="col-md-12 anot">
                <div class="row">
                    <div class="col-md-4">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-events-list" data-toggle="list"
                            href="#list-events" role="tab" aria-controls="events">Pendaftaran Event Dalam</a>
                            <a class="list-group-item list-group-item-action" id="list-luar-list" data-toggle="list"
                            href="#list-luar" role="tab" aria-controls="luar">Pendaftaran Event Luar</a>
                            <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list"
                            href="#list-home" role="tab" aria-controls="home">Event Mendatang</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                            href="#list-profile" role="tab" aria-controls="profile">Event Terlaksana</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                            href="#list-messages" role="tab" aria-controls="messages">Riwayat Pertukaran</a>
                        </div>
                    </div>
                    <div class="col-md-8 ">
                        <div class="tab-content m-3" style="color: white;" id="nav-tabContent">
                            <div class="tab-pane fade show scrol" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                <ol>
                                    <hr>
                                    @if ($mendatang)
                                        @foreach ($mendatang as $event)
                                            <li class="p-1">
                                                {{ $event->nama_universitas . " - " . $event->nama_fakultas }}
                                                <br>
                                                <cek>
                                                    <a href="{{ url('/persyaratan-exchange').'/'.$event->id }}">Cek persyaratan...</a>
                                                </cek>
                                                <hr>
                                            </li>
                                        @endforeach
                                    @endif
                                </ol>
                            </div>
                            <div class="tab-pane fade scrol" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                <ol>
                                    <hr>
                                    @if ($terlaksana)
                                        @foreach ($terlaksana as $event)
                                            <li class="p-1">
                                                    {{ $event->nama_universitas  . " - " . $event->nama_fakultas }}<br>
                                                <cek>
                                                    <a href="{{ url('/pelaksanaan-exchange') .'/'. $event->id }}">Cek pelaksanaan...</a>
                                                </cek>
                                                <hr>
                                            </li>
                                        @endforeach
                                    @endif
                                </ol>
                            </div>
                            <div class="tab-pane fade scrol" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                                <ol>
                                    <hr>
                                    @if ($riwayat)
                                        @foreach ($riwayat as $event)
                                            <li class="p-1">
                                                {{ $event->nama_universitas  . " - " . $event->nama_fakultas }}<br>
                                                <cek>
                                                    <a href="{{ url('/riwayat-exchange')."/$event->id" }}"> Cek riwayat mahasiswa...</a>
                                                </cek>
                                                <hr>
                                            </li>
                                        @endforeach
                                    @endif
                                </ol>
                            </div>
                            <div class="tab-pane fade show active" id="list-events" role="tabpanel" aria-labelledby="list-events-list">
                                <div class="container">
                                    <input class="form-control" id="listSearch" type="text" placeholder="Masukkan kata kunci...">
                                    <br>
                                    <form method="GET">
                                        <div class="scrol">
                                            <ul class="list-group" id="myList">
                                                @if ($pendaftaranDalam)
                                                    @foreach ($pendaftaranDalam as $event)
                                                        <li class="list-group-item" style="color: black;">
                                                            <div class="row">
                                                                <div class="col-1">
                                                                    <input type="radio" id="{{ $event->id }}" name="exchange" value="{{ $event->id }}">
                                                                </div>
                                                                <div class="col-11">
                                                                    <label for="{{ $event->id }}" class="">{{ $event->nama_universitas  . " - " . $event->nama_fakultas }}</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="d-flex flex-row-reverse">
                                            <div class="p-3">
                                                <button class="btn btn-info" type="submit" form="myList" id="daftar" value="Submit">Daftar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="list-luar" role="tabpanel" aria-labelledby="list-luar-list">
                                <div class="container">
                                    <input class="form-control" id="listSearch" type="text" placeholder="Masukkan kata kunci...">
                                    <br>
                                    <form method="GET">
                                        <div class="scrol">
                                            <ul class="list-group" id="myList">

                                                @if ($pendaftaranLuar)
                                                    @foreach ($pendaftaranLuar as $event)
                                                        <li class="list-group-item" style="color: black;">
                                                            <div class="row">
                                                                <div class="col-1">
                                                                    <input type="radio" id="{{ $event->id }}" name="exchange" value="{{ $event->id }}">
                                                                </div>
                                                                <div class="col-11">
                                                                    <label for="{{ $event->id }}" class="">{{ $event->nama_universitas  . " - " . $event->nama_fakultas }}</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="d-flex flex-row-reverse">
                                            <div class="p-3">
                                                <button class="btn btn-info" type="submit" form="myList" id="daftar" value="Submit">Daftar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</section>

  <style>
    tr {
      border-top: 1px solid white;
      border-bottom: 1px solid white;

    }

    tr>td {
      padding: 0.49em
    }

    hr {
      border-top: 1px solid white;
      margin: 30px -20px 20px -20px;
    }

    cek {
      font-style: italic;
      color: gainsboro;
    }
    .modal.fade{
        color: black;
    }
    </style>
@stop

@section('script')
    <script>
        $('#daftar').click(function (el){
            let input = $('input[type="radio"]')
            let id = 0;
            for(let i = 0; i< input.length; i++){
                if(input[i].checked){
                    id  = input[i].value
                    window.open("{{ url('/daftar-exchange') }}"+"/"+id, '_self')
                    break
                }
            }
        })
    </script>
@stop
