@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@stop

@section('slot')
<section class="section coming-soon" data-section="section3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="continer centerIt">
                    <h4>Tentang <em>Aplikasi</em></h4>
                    <div>
                    <p style="font-weight: bold;font-size: 15px" color="black">- &nbspAplikasi Sistem Sistem Rumah Jawara Kampus Merdeka EKP Innovation Center (Jaka
                        Kece) dibuat untuk membantu Fakultas Ekonomi Universitas Negeri Malang dalam menyediakan layanan
                        berbasis teknologi.
                        <br><br>- &nbspLayanan Pendidikan ini telah diterapkan pada sistem akademik di semua Program Studi
                        dengan tujuan memudahkan akademisi (tenaga pendidik dan mahasiswa) dalam mendapatkan informasi terkait
                        pendidikan, kegiatan akademik, dan lowongan pekerjaan.
                    </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-content">
                    @if(!auth()->user())
                        <div class="center">
                            <h1>Selamat Datang</h1>

                            @if(session()->has('error'))
                                <div id="InfoBanner" style="">
                                    <span class="reversed reversedRight">
                                    <span>
                                        &#9888;
                                    </span>
                                    </span>
                                    <span class="reversed reversedLeft">
                                        {{ session()->get('error') }}
                                    </span>
                                </div>
                            @endif

                            <form action="" method="post">
                                @csrf
                                <div class="inputbox">
                                    <input name="identity" id="identity" type="text" required="required">
                                    <span><label for="identity">Id</label></span>
                                </div>
                                <div class="inputbox">
                                    <input name="password" id="password" type="password" required="required">
                                    <span><label for='password'> Password</label></span>
                                </div>
                                <div class="inputbox">
                                    <input type="submit" value="submit">
                                </div>
                            </form>

                        </div>

                    @else
                    <div class="center">
                        <h1>Selamat Datang</h1>
                        <div class="name">
                            {{ auth()->user()->name }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section courses" data-section="section4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Choose Your Features</h2>
          </div>
        </div>
        <div class="owl-carousel owl-theme">
          <div class="item">
            <img src="assets/images/courses-02.jpg" alt="Course #1">
            <div class="down-content">
              <h4>Inkubasi Bahasa</h4>
              <p>Terdapat 4 course dengan materi dan latihan soal yang lengkap.</p>
              <div class="text-button-pay">
                <a href="{{ url('/inkubasi') }}">visit <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="assets/images/courses-05.jpg" alt="Course #2">
            <div class="down-content">
              <h4>Jawara Center</h4>
              <p>Jadilah juara dunia!</p>
              <div class="text-button-pay">
                <a href="{{ url('/jawara') }}">visit <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="assets/images/courses-03.jpg" alt="Course #3">
            <div class="down-content">
              <h4>Student Exchange</h4>
              <p>Dapatkan pengalaman belajar di luar.</p>
              <div class="text-button-pay">
                <a href="{{ url('/exchange') }}">visit <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="assets/images/courses-04.jpg" alt="Course #4">
            <div class="down-content">
              <h4>On the Job Training</h4>
              <p>Perbanyak pengalaman dengan mengikuti kegiatan magang</p>
              <div class="text-button-pay">
                <a href="{{ url('/training') }}">visit <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
@section('script')
@stop
