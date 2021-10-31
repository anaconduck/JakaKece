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
          <div id='tabs'>
            <ul>
              @foreach ($data as $inkubasi_)
              <li><a href='#tabs-{{ ++$ind }}'>{{ $inkubasi_->nama_course }}</a></li>
              @endforeach
              <li><a href='#tabs-{{ ++$ind }}'>Konsultasi</a></li>
            </ul>
            <section class='tabs-content'>
              <article id='tabs-1'>
                <div class="row">
                    <div class="col-md-12 ">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list1" data-toggle="list"
                              href="#list-home1" role="tab" aria-controls="home">Materi</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list1" data-toggle="list"
                              href="#list-profile1" role="tab" aria-controls="profile">Latihan Soal (Practice)</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list1" data-toggle="list"
                              href="#list-messages1" role="tab" aria-controls="messages">Tes Online</a>
                          </div>
                        </div>
                        <div class="col-md-8 ">
                          <div class="tab-content m-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home1" role="tabpanel" aria-labelledby="list-home-list">
                              <div class="form-group">
                                <h4>Pilih Materi :</h4>
                                <select class="form-control" id="opsiitp">
                                    @foreach ($opsiitp as $opsi)
                                        <option>{{ $opsi['materi'] }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <!-- Temp anchor for replacing php form action -->
                                @if(sizeof($opsiitp) == 0)
                                <button type="submit" class="btn btn-primary mb-2" disabled>Belum Ada data
                                </button>
                                @else
                                <button type="submit" class="btn btn-primary mb-2">
                                    <a href="{{ url("/TOEFL-ITP") }}/{{ $opsiitp[0]['materi'] }}/1" id="linkitp" style="color: white;">Pilih</a>
                                </button>
                                @endif
                              </div>
                            </div>
                            <div class="tab-pane fade" id="list-profile1" role="tabpanel" aria-labelledby="list-profile-list">
                              <h4>Ketentuan</h4>

                              <ol style="color: aliceblue; ">
                                <li>Sesi Listening Terdriri dari 10 Soal Dengan Waktu Pengerjaan 35 Menit</li>
                                <li>Sesi Reading Terdiri dari 50 Soal Dengan Waktu Pengerjaan 55 Menit</li>
                                <li>Sesi Structure & Written Expression Terdiri dari 40 Soal Dengan Waktu Pengerjaan 25 Menit</li>
                              </ol>
                              <div class="col-md-12">
                                <div class="section-heading main-button mt-5">
                                <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testtoefl">
                                        Mulai Tes!
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="testtoefl" tabindex="-1" aria-labelledby="testtoefl" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Latihan TOEFL</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            Apakah anda yakin ingin memulai sesi latihan TOEFL?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="{{ url('/latihan/toefl-itp') }}"
                                            class="p-0"
                                            >
                                                <button type="button" class="btn btn-primary">Mulai</button>
                                            </a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="tab-pane fade" id="list-messages1" role="tabpanel" aria-labelledby="list-messages-list">
                              <h4>Ketentuan</h4>

                              <ol style="color: aliceblue; ">
                                <li>
                                    Halaman test dilaksanakan di website resmi test TOEFL.
                                </li>
                                <li>
                                    Silahkan gunakan token <strong>f23sd234w</strong> untuk masuk dalam tes.
                                </li>
                                <li>
                                    Test terdiri dari 4 tahap, yaitu Reading, Listening, Writing, Speaking.
                                </li>
                              </ol>
                              <div class="col-md-12">
                                <div class="section-heading main-button mt-5">
                                <a rel="nofollow" href="https://www.ets.org/toefl/test-takers/" target="_parent">Mulai Tes</a>
                                </div>
                            </div>
                            </div>

                          </div>
                        </div>
                    </div>
                </div>
              </article>
              <article id='tabs-2'>
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="list-group" id="list-tab" role="tablist">
                          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                            href="#list-home" role="tab" aria-controls="home">Materi</a>
                          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                            href="#list-profile" role="tab" aria-controls="profile">Latihan Soal (Practice)</a>
                          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                            href="#list-messages" role="tab" aria-controls="messages">Tes Online</a>
                        </div>
                      </div>
                      <div class="col-md-8 ">
                        <div class="tab-content m-3" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <div class="form-group">

                              <h4>Pilih Materi :</h4>
                              <select class="form-control" id="opsiibt">
                                  @foreach ($opsiibt as $opsi)
                                  <option>{{ $opsi['materi'] }}</option>
                                  @endforeach
                              </select>
                              <br>
                              @if(sizeof($opsiibt) == 0)
                                <button type="submit" class="btn btn-primary mb-2" disabled>Belum Ada data
                                </button>
                              @else
                                <button type="submit" class="btn btn-primary mb-2"><a href="{{ url("/TOEFL-IBT") }}/{{ $opsiibt[0]['materi'] }}/1" id="linkibt" style="color: white;">Pilih</a></button>
                                @endif
                            </div>
                          </div>
                          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <h4>Ketentuan</h4>

                            <ol style="color: aliceblue; ">
                                <li>Sesi Listening Terdriri dari 10 Soal Dengan Waktu Pengerjaan 35 Menit</li>
                                <li>Sesi Reading Terdiri dari 50 Soal Dengan Waktu Pengerjaan 55 Menit</li>
                                <li>Sesi Structure & Written Expression Terdiri dari 40 Soal Dengan Waktu Pengerjaan 25 Menit</li>
                                <li>Sesi Speaking terdapat di akhir sesi.</li>
                            </ol>
                            <div class="col-md-12">
                                <div class="section-heading main-button mt-5">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testibt">
                                        Mulai Tes!
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="testibt" tabindex="-1" aria-labelledby="testielts" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Latihan Toefl IBT</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            Apakah anda yakin ingin memulai sesi latihan Toefl IBT?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="{{ url('/latihan/toefl-ibt') }}"
                                            class="p-0"
                                            >
                                                <button type="button" class="btn btn-primary">Mulai</button>
                                            </a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                            </div>
                          </div></div>
                          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                            <h4>Ketentuan</h4>

                            <ol style="color: aliceblue; ">
                                <li>
                                    Halaman test dilaksanakan di website resmi test TOEFL IBT.
                                </li>
                                <li>
                                    Silahkan gunakan token <strong>f23sd234w</strong> untuk masuk dalam tes.
                                </li>
                                <li>
                                    Test terdiri dari 4 tahap, yaitu Reading, Listening, Writing, Speaking.
                                </li>
                            </ol>
                            <div class="col-md-12">
                                <div class="section-heading main-button mt-5">
                                    <a rel="nofollow" href="https://www.ielts.org/for-test-takers/book-a-test" target="_parent">Mulai Tes</a>
                                </div>
                            </div>
                          </div>

                        </div>
                      </div>
                </div>
               </div>
              </article>
              <article id='tabs-5'>
                <div class="row d-flex justify-content-center">

                  <!--Grid column-->
                    <div class="mesgs" style="background-color: white;">
                      <div class="msg_history">
                        <div class="incoming_msg">
                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                          <div class="received_msg">
                            <div class="received_withd_msg">
                              <p style="color: black;">Test which is a new approach to have all
                                solutions</p>
                              <span class="time_date"> 11:01 AM    |    June 9</span></div>
                          </div>
                        </div>
                        <div class="outgoing_msg">
                          <div class="sent_msg">
                            <p>Test which is a new approach to have all
                              solutions</p>
                            <span class="time_date"> 11:01 AM    |    June 9</span> </div>
                        </div>
                        <div class="incoming_msg">
                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                          <div class="received_msg">
                            <div class="received_withd_msg blk">
                              <p style="color: black;">Test, which is a new approach to have</p>
                              <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
                          </div>
                        </div>
                        <div class="outgoing_msg">
                          <div class="sent_msg">
                            <p>Apollo University, Delhi, India Test</p>
                            <span class="time_date"> 11:01 AM    |    Today</span> </div>
                        </div>
                        <div class="incoming_msg">
                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                          <div class="received_msg">
                            <div class="received_withd_msg blk">
                              <p style="color: black;">We work directly with our designers and suppliers,
                                and sell direct to you, which means quality, exclusive
                                products, at a price anyone can afford.</p>
                              <span class="time_date"> 11:01 AM    |    Today</span></div>
                          </div>
                        </div>
                      </div>
                      <div class="type_msg">
                        <div class="input_msg_write">
                          <input type="text" class="write_msg" placeholder="Type a message" />
                          <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
              </article>
              <article id='tabs-3'>
                <div class="row">
                    <div class="col-md-12 ">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list1" data-toggle="list"
                              href="#tab-materi-toeic" role="tab" aria-controls="home">Materi</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list1" data-toggle="list"
                              href="#tab-prac-toeic" role="tab" aria-controls="profile">Latihan Soal (Practice)</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list1" data-toggle="list"
                              href="#tab-tes-toeic" role="tab" aria-controls="messages">Tes Online</a>
                          </div>
                        </div>
                        <div class="col-md-8 ">
                          <div class="tab-content m-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="tab-materi-toeic" role="tabpanel" aria-labelledby="list-home-list">
                              <div class="form-group">
                                <h4>Pilih Materi :</h4>
                                <select class="form-control" id="opsitoeic">
                                    @foreach ($opsitoeic as $opsi)
                                    <option>{{ $opsi['materi'] }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <!-- Temp anchor for replacing php form action -->
                                @if(sizeof($opsitoeic) == 0)
                                <button type="submit" class="btn btn-primary mb-2" disabled>Belum Ada data
                                </button>
                                @else
                                <button type="submit" class="btn btn-primary mb-2"><a href="{{ url("/TOEIC") }}/{{ $opsitoeic[0]['materi'] }}/1" id="linktoeic" style="color: white;">Pilih</a></button>
                                @endif
                              </div>
                            </div>
                            <div class="tab-pane fade" id="tab-prac-toeic" role="tabpanel" aria-labelledby="list-profile-list">
                              <h4>Ketentuan</h4>

                              <ol style="color: aliceblue; ">
                                <li>Sesi Listening Terdriri dari 10 Soal Dengan Waktu Pengerjaan 35 Menit</li>
                                <li>Sesi Reading Terdiri dari 50 Soal Dengan Waktu Pengerjaan 55 Menit</li>
                                <li>Sesi Structure & Written Expression Terdiri dari 40 Soal Dengan Waktu Pengerjaan 25 Menit</li>
                              </ol>
                              <div class="col-md-12">
                                <div class="section-heading main-button mt-5">
                                <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testtoeic">
                                        Mulai Tes!
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="testtoeic" tabindex="-1" aria-labelledby="testtoefl" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Latihan TOEIC</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            Apakah anda yakin ingin memulai sesi latihan TOEIC?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="{{ url('/latihan/toeic') }}"
                                            class="p-0"
                                            >
                                                <button type="button" class="btn btn-primary">Mulai</button>
                                            </a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="tab-pane fade" id="tab-tes-toeic" role="tabpanel" aria-labelledby="list-messages-list">
                              <h4>Ketentuan</h4>

                              <ol style="color: aliceblue; ">
                                <li>
                                    Halaman test dilaksanakan di website resmi test TOEIC.
                                </li>
                                <li>
                                    Silahkan gunakan token <strong>f23sd234w</strong> untuk masuk dalam tes.
                                </li>
                                <li>
                                    Test terdiri dari 4 tahap, yaitu Reading, Listening, Writing, Speaking.
                                </li>
                              </ol>
                              <div class="col-md-12">
                                <div class="section-heading main-button mt-5">
                                <a rel="nofollow" href="https://www.ets.org/toefl/test-takers/" target="_parent">Mulai Tes</a>
                                </div>
                            </div>
                            </div>

                          </div>
                        </div>
                    </div>
                </div>
              </article>
              <article id='tabs-4'>
                <div class="row">
                    <div class="col-md-12 ">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list1" data-toggle="list"
                              href="#tab-materi-ielts" role="tab" aria-controls="home">Materi</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list1" data-toggle="list"
                            href="#tab-prac-ielts" role="tab" aria-controls="profile">Latihan Soal (Practice)</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list1" data-toggle="list"
                              href="#tab-test-ielts" role="tab" aria-controls="messages">Tes Online</a>
                          </div>
                        </div>
                        <div class="col-md-8 ">
                          <div class="tab-content m-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="tab-materi-ielts" role="tabpanel" aria-labelledby="list-home-list">
                              <div class="form-group">
                                <h4>Pilih Materi :</h4>
                                <select class="form-control" id="opsiielts">
                                    @foreach ($opsiielts as $opsi)
                                    <option>{{ $opsi['materi'] }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <!-- Temp anchor for replacing php form action -->
                                @if(sizeof($opsiielts) == 0)
                                <button type="submit" class="btn btn-primary mb-2" disabled>Belum Ada data
                                </button>
                                @else
                                <button type="submit" class="btn btn-primary mb-2"><a href="{{ url("/IELTS") }}/{{ $opsiielts[0]['materi'] }}/1" id="linkielts" style="color: white;">Pilih</a></button>
                                @endif
                              </div>
                            </div>
                            <div class="tab-pane fade" id="tab-prac-ielts" role="tabpanel" aria-labelledby="list-profile-list">
                              <h4>Ketentuan</h4>

                              <ol style="color: aliceblue; ">
                                <li>Sesi Listening Terdriri dari 10 Soal Dengan Waktu Pengerjaan 35 Menit</li>
                                <li>Sesi Reading Terdiri dari 50 Soal Dengan Waktu Pengerjaan 55 Menit</li>
                                <li>Sesi Structure & Written Expression Terdiri dari 40 Soal Dengan Waktu Pengerjaan 25 Menit</li>
                              </ol>
                              <div class="col-md-12">
                                <div class="section-heading main-button mt-5">
                                <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testielts">
                                        Mulai Tes!
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="testielts" tabindex="-1" aria-labelledby="testtoefl" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Latihan IELTS</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            Apakah anda yakin ingin memulai sesi latihan IELTS?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="{{ url('/latihan/ielts') }}"
                                            class="p-0"
                                            >
                                                <button type="button" class="btn btn-primary">Mulai</button>
                                            </a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="tab-pane fade" id="tab-test-ielts" role="tabpanel" aria-labelledby="list-messages-list">
                              <h4>Ketentuan</h4>

                              <ol style="color: aliceblue; ">
                                <li>
                                    Halaman test dilaksanakan di website resmi test IELTS.
                                </li>
                                <li>
                                    Silahkan gunakan token <strong>f23sd234w</strong> untuk masuk dalam tes.
                                </li>
                                <li>
                                    Test terdiri dari 4 tahap, yaitu Reading, Listening, Writing, Speaking.
                                </li>
                              </ol>
                              <div class="col-md-12">
                                <div class="section-heading main-button mt-5">
                                <a rel="nofollow" href="https://www.ets.org/toefl/test-takers/" target="_parent">Mulai Tes</a>
                                </div>
                            </div>
                            </div>

                          </div>
                        </div>
                    </div>
                </div>
              </article>
            </section>
          </div>
        </div>
      </div>
    </div>
</section>
@stop

@section('script')
<script>
    //according to loftblog tut
    let link_materi= $('#linkitp');
      const link = "{{ url('/') }}";
      $('#opsiitp').on('change',function(){
          link_materi.attr('href',link+"/toefl-itp/"+this.value.toLowerCase()+"/1");
      });

      let link_materi_ibt= $('#linkibt');
      $('#opsiibt').on('change',function(){
          link_materi_ibt.attr('href',link+"/toefl-ibt/"+this.value.toLowerCase()+"/1");
      });
      let link_materi_toeic= $('#linktoeic');
      $('#opsitoeic').on('change',function(){
          link_materi_toeic.attr('href',link+"/toeic/"+this.value.toLowerCase()+"/1");
      });

      let link_materi_ielts= $('#linkielts');
      $('#opsiielts').on('change',function(){
          link_materi_ielts.attr('href',link+"/ielts/"+this.value.toLowerCase()+"/1");
      });

    $('.nav li:first').addClass('active');

  </script>
@stop
