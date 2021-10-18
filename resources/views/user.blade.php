@extends('layouts.app')

@section('slot')
<section class="section why-us" data-section="section2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">

          </div>
        </div>
        <div class="col-md-12 anot">
          <div class="row">
            <div class="col-md-4">
              <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                  href="#list-home" role="tab" aria-controls="home">Info Pengguna</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                  href="#list-profile" role="tab" aria-controls="profile">Riwayat Tes</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                  href="#list-messages" role="tab" aria-controls="messages">Notifikasi</a>
                 </div>
            </div>
            <div class="col-md-8 ">
              <div class="tab-content m-3" style="color: white;" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

                  <table style="width: 100%;" >
                    <tr>
                      <td>Nama</td>
                    <td>: {{ auth()->user()->name }}</td></tr>
                    <tr>
                      <td>NIM</td>
                    <td>: {{ $user->id }}</td></tr><tr>
                      <td>Tempat Lahir</td>
                    <td>: {{ $user->tempat_lahir }}</td></tr><tr>
                      <td>Tanggal Lahir</td>
                    <td>: {{ date('d M Y',strtotime($user->tanggal_lahir)) }}</td></tr><tr>
                      <td>Jurusan</td>
                    <td>: {{ $user->jurusan }}</td></tr><tr>
                      <td>Fakultas</td>
                    <td>: {{ $user->fakultas }}</td></tr><tr>
                      <td>Alamat</td>
                    <td>: {{ $user->alamat }}</td></tr>
                  </table>
                </div>
                <div class="tab-pane fade scrol" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                <h2>Riwayat tes</h2>
                <br>
                <h6>Tes TOEFL yang diambil : {{ $numTOEFL }}</h6>
                <h6>Tes IELTS yang diambil : {{ $numIELTS }}</h6>
                <br>
                  <div class="tab-pane fade show active hide-sc" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <ol>
                      <hr>
                      @foreach ($reports as $report)
                        <li class="p-1">
                            {{ $report->type }}<br>
                            <cek><a href="{{ url("/report/$report->id") }}"> Total Score : {{ ($report->score_reading + $report->score_listening + $report->score_writing)*10 }}</a>
                            </cek>
                            <hr>
                        </li>
                      @endforeach
                    </ol>
                  </div>
                </div>
                <div class="tab-pane fade scrol" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                  <h2>Notif</h2>
                  <div class="tab-pane fade show active hide-sc" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

                    <ol>
                      <hr>
                      <li class="p-1">
                        Hasil Tes TOEFL Telah Keluar<br>
                        <cek><a href="#">Cek Status..</a>
                        </cek>
                        <hr>
                      </li>
                      <li class="p-1">
                        Hasil Tes IELTS Telah Keluar<br>
                        <cek><a href="#">Cek Status..</a>
                        </cek>
                        <hr>
                      </li><li class="p-1">
                        Ada Materi Baru Dalam Latihan Soal TOEFL<br>
                        <cek><a href="#">Cek Status..</a>
                        </cek>
                        <hr>
                    </ol>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="col-md-12 mt-4">
          <div class="section-heading main-button">
            <a rel="nofollow" href="inkubasi.html" target="_parent">Kembali</a>
          </div>
        </div>

      </div>
    </div>
</section>

<style>
tr{
  border-top: 1px solid white;
  border-bottom: 1px solid white;

}
tr>td{
  padding:0.49em
}
hr{
  border-top: 1px solid white;
}
</style>
@stop
