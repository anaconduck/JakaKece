@extends('layouts.app')

@section('slot')
<section class="section coming-soon" data-section="section3">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-xs-12">
          <div class="continer centerIt">
            <h4>Tentang <em>Aplikasi</em></h4>
            <div>
              <font color="white">- &nbspAplikasi Sistem Sistem Rumah Jawara Kampus Merdeka EKP Innovation Center (Jaka
                Kece) dibuat untuk membantu Fakultas Ekonomi Universitas Negeri Malang dalam menyediakan layanan
                berbasis teknologi.
                <br><br>- &nbspLayanan Pendidikan ini telah diterapkan pada sistem akademik di semua Program Studi
                dengan tujuan memudahkan akademisi (tenaga pendidik dan mahasiswa) dalam mendapatkan informasi terkait
                pendidikan, kegiatan akademik, dan lowongan pekerjaan.
              </font>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="right-content">
            <div class="top-content">
                <h3>Selamat Datang</h3>
                <div class="row role-chose justify-content-center">
                  <div class="col-md-4 act">Mahasiswa</div>
                  <div class="col-md-4">Dosen</div>
                  <div class="col-md-4">Admin</div>
                </div>
              </div>
            <form id="contact" action="" method="post">
                @csrf
                <input type="text" name="status" id="status" class="d-none" required>
              <div class="row">
                <div class="col-md-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="username" placeholder="Your Username"
                      required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <input name="password" type="password" class="form-control" id="password"
                      placeholder="Your Password" required="">
                  </fieldset>
                </div>
                <div class="col-md-12">
                  <br>
                  <br>
                </div>
                <div class="col-md-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="button">Login</button>
                  </fieldset>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
@section('script')
<script>
    let roleU = $('#status');
    roleU[0].value = "MAHASISWA"
    let role = $('.role-chose');
    $('.role-chose div').click(function (){
      $.each(role.children(),function (ind, val){
        $(val).removeClass('act');
      });
      $(this).addClass('act');
      roleU[0].value = this.innerText
    });
</script>
@stop
