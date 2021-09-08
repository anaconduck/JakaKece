<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <title>JAKA KECE</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/templatemo-grad-school.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
</head>

<body>
 <!-- ***** Main Banner Area Start ***** -->
  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em>JAKA</em> KECE</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="{{ ('home') }}" class="external">Home</a></li>
        <li class="selected"><a href="{{ ('inkubasi') }}">Inkubasi Digital Bahasa</a></li>
        <li><a href="{{ ('jawara') }}" class="external">Jawara Center</a></li>
        <li><a href="{{ ('exchange') }}" class="external">Student Exchange</a></li>
        <li><a href="{{ ('training') }}" class="external">On The Job Training</a></li>
      </ul>
    </nav>
  </header>

  <!-- ***** Main Banner Area End ***** -->
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
              <li><a href='#tabs-1'>TOEFL</a></li>
              <li><a href='#tabs-2'>IELTS</a></li>
              <li><a href='#tabs-3'>Konsultasi</a></li>
            </ul>
            <section class='tabs-content'>
              <article id='tabs-1'>
                <div class="row">
                    <div class="col-md-12 ">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                              href="#list-home1" role="tab" aria-controls="home">Materi</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                              href="#list-profile1" role="tab" aria-controls="profile">Latihan Soal (Practice)</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                              href="#list-messages1" role="tab" aria-controls="messages">Tes Online</a>
                          </div>
                        </div>
                        <div class="col-md-8 ">
                          <div class="tab-content m-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-home1" role="tabpanel" aria-labelledby="list-home-list">
                              <div class="form-group">
                                <h4>Pilih Materi :</h4>
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>Listening</option>
                                  <option>Structure</option>
                                  <option>Reading</option>
                                  <option>Writing</option>
                                </select>
                                <br>
                                <!-- Temp anchor for replacing php form action -->
                                <button type="submit" class="btn btn-primary mb-2"><a href="{{ ('inkubasi1') }}"
                                    style="color: white;">Pilih</a></button>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="list-profile1" role="tabpanel" aria-labelledby="list-profile-list">
                              <h4>Ketentuan</h4>

                              <ol style="color: aliceblue; ">
                                <li>Sesi Listening Terdriri dari 50 Soal Dengan Waktu Pengerjaan 35 Menit</li>
                                <li>Sesi Reading Terdiri dari 50 Soal Dengan Waktu Pengerjaan 55 Menit</li>
                                <li>Pengerjaan Sesi Structure Adalah 40 Menit</li>
                                <li>Pengerjaan Sesi Writing Adalah 40 Menit</li>
                              </ol>

                            </div>
                            <div class="tab-pane fade" id="list-messages1" role="tabpanel" aria-labelledby="list-messages-list">
                              <h4>Ketentuan</h4>

                              <ol style="color: aliceblue; ">
                                <li>Sesi Listening Terdriri dari 50 Soal Dengan Waktu Pengerjaan 35 Menit</li>
                                <li>Sesi Reading Terdiri dari 50 Soal Dengan Waktu Pengerjaan 55 Menit</li>
                                <li>Pengerjaan Sesi Structure Adalah 40 Menit</li>
                                <li>Pengerjaan Sesi Writing Adalah 40 Menit</li>
                              </ol>
                            </div>

                          </div>
                        </div>
                    <!--
                    <h4>TOEFL</h4>
                    <p>TOEFL (Test of English as a Foreign Language) adalah tes yang terstandarisasi untuk mengukur
                      kemampuan Bahasa Inggris dan orang tersebut bertujuan untuk bekerja atau kuliah.
                      TOEFL mencakup empat
                      aspek yaitu Listening Comprehension, Structure and Written
                      Expression, Reading Comprehension, dan Test of Written English (TWE).</p>
                    <div class="form-group">
                       Temp anchor for replacing php form action
                      <button type="submit" class="btn btn-primary mb-2"><a href="inkubasi_inside1.html"
                          style="color: white;">Pilih</a></button>
                    </div>-->
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
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option>Listening</option>
                                <option>Reading</option>
                                <option>Writing</option>
                                <option>Speaking</option>
                              </select>
                              <br>
                              <!-- Temp anchor for replacing php form action -->
                              <button type="submit" class="btn btn-primary mb-2"><a href="{{ ('inkubasi1') }}"
                                  style="color: white;">Pilih</a></button>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <h4>Ketentuan</h4>

                            <ol style="color: aliceblue; ">
                              <li>Listening Terdiri Dari 4 Sesi Dengan Total 40 Soal Dan Waktu Pengerjaan 30 Menit</li>
                              <li>Reading Terdiri Dari 3 Sesi Dengan Total 40 Soal Dan Waktu Pengerjaan 60  Menit</li>
                              <li>Writing Terdiri Dari 2 Soal Dengan Waktu Pengerjaan 60 Menit</li>
                              <li>Speanking Terdiri dari 3 Sesi Selama 11-14 Menit. Peserta Tes Akan Diminta Untuk Berbicara Dengan Native Speaker Secara Langsung. Peserta Akan Ditanya Beberapa Pertanyaan Tentang Dirinya Sendiri Dan Sebuah Topik.</li>
                            </ol>

                          </div>
                          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                            <h4>Ketentuan</h4>

                            <ol style="color: aliceblue; ">
                                <li>Listening Terdiri Dari 4 Sesi Dengan Total 40 Soal Dan Waktu Pengerjaan 30 Menit</li>
                                <li>Reading Terdiri Dari 3 Sesi Dengan Total 40 Soal Dan Waktu Pengerjaan 60  Menit</li>
                                <li>Writing Terdiri Dari 2 Soal Dengan Waktu Pengerjaan 60 Menit</li>
                                <li>Speanking Terdiri dari 3 Sesi Selama 11-14 Menit. Peserta Tes Akan Diminta Untuk Berbicara Dengan Native Speaker Secara Langsung. Peserta Akan Ditanya Beberapa Pertanyaan Tentang Dirinya Sendiri Dan Sebuah Topik.</li>
                            </ol>
                          </div>

                        </div>
                      </div>
                  <!--
                  <h4>TOEFL</h4>
                  <p>TOEFL (Test of English as a Foreign Language) adalah tes yang terstandarisasi untuk mengukur
                    kemampuan Bahasa Inggris dan orang tersebut bertujuan untuk bekerja atau kuliah.
                    TOEFL mencakup empat
                    aspek yaitu Listening Comprehension, Structure and Written
                    Expression, Reading Comprehension, dan Test of Written English (TWE).</p>
                  <div class="form-group">
                     Temp anchor for replacing php form action
                    <button type="submit" class="btn btn-primary mb-2"><a href="inkubasi_inside1.html"
                        style="color: white;">Pilih</a></button>
                  </div>-->
                </div>
               </div>
              </article>
              <article id='tabs-3'>
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
            </section>
          </div>
        </div>
        <div class="col-md-12">
          <div class="section-heading main-button">
            <br><br><br><br><br>
            <a rel="nofollow" href="{{ ('inkubasi1') }}" target="_parent">Info Pengguna</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><i class="fa fa-copyright"></i> Copyright 2021 by Wahyu & Ziyad

            | Design: <a href="https://https://mziyadam.github.io/JAKA/" rel="sponsored" target="_parent">JAKA</a></p>
        </div>
      </div>
    </div>
  </footer>
<style>
  .blk{
    color: black;
  }
  .inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;

}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 320px;
  overflow-y: auto;
}
</style>
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>

  <script src="{{ asset('assets/js/isotope.min.js')}}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js')}}"></script>
  <script src="{{ asset('assets/js/lightbox.js')}}"></script>
  <script src="{{ asset('assets/js/tabs.js')}}"></script>
  <script src="{{ asset('assets/js/video.js')}}"></script>
  <script src="{{ asset('assets/js/slick-slider.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>
  <script>
    //according to loftblog tut
    $('.nav li:first').addClass('active');

    var showSection = function showSection(section, isAnimate) {
      var
        direction = section.replace(/#/, ''),
        reqSection = $('.section').filter('[data-section="' + direction + '"]'),
        reqSectionPos = reqSection.offset().top - 0;

      if (isAnimate) {
        $('body, html').animate({
            scrollTop: reqSectionPos
          },
          800);
      } else {
        $('body, html').scrollTop(reqSectionPos);
      }

    };

    var checkSection = function checkSection() {
      $('.section').each(function () {
        var
          $this = $(this),
          topEdge = $this.offset().top - 80,
          bottomEdge = topEdge + $this.height(),
          wScroll = $(window).scrollTop();
        if (topEdge < wScroll && bottomEdge > wScroll) {
          var
            currentId = $this.data('section'),
            reqLink = $('a').filter('[href*=\\#' + currentId + ']');
          reqLink.closest('li').addClass('active').
          siblings().removeClass('active');
        }
      });
    };

    $('.main-menu, .scroll-to-section').on('click', 'a', function (e) {
      if ($(e.target).hasClass('external')) {
        return;
      }
      e.preventDefault();
      $('#menu').removeClass('active');
      showSection($(this).attr('href'), true);
    });

    $(window).scroll(function () {
      checkSection();
    });
  </script>


  <style>
    :root {
      --backgroundColor: rgba(246, 241, 209);
      --colorShadeA: rgb(106, 163, 137);
      --colorShadeB: rgb(121, 186, 156);
      --colorShadeC: rgb(150, 232, 195);
      --colorShadeD: rgb(187, 232, 211);
      --colorShadeE: rgb(205, 255, 232);
    }

    @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");

    * {
      box-sizing: border-box;
    }

    *::before,
    *::after {
      box-sizing: border-box;
    }

    button {
      position: relative;
      display: inline-block;
      cursor: pointer;
      outline: none;
      border: 0;
      vertical-align: middle;

      text-decoration: none;
      font-size: 1.5rem;
      color: var(--colorShadeA);
      font-weight: 700;
      text-transform: uppercase;
      font-family: inherit;
    }

    button.big-button {
      padding: 1em 2em;
      border: 2px solid var(--colorShadeA);
      border-radius: 1em;
      background: var(--colorShadeE);
      transform-style: preserve-3d;
      transition: all 175ms cubic-bezier(0, 0, 1, 1);
    }

    button.big-button::before {
      position: absolute;
      content: '';
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: var(--colorShadeC);
      border-radius: inherit;
      box-shadow: 0 0 0 2px var(--colorShadeB), 0 0.75em 0 0 var(--colorShadeA);
      transform: translate3d(0, 0.75em, -1em);
      transition: all 175ms cubic-bezier(0, 0, 1, 1);
    }


    button.big-button:hover {
      background: var(--colorShadeD);
      transform: translate(0, 0.375em);
    }

    button.big-button:hover::before {
      transform: translate3d(0, 0.75em, -1em);
    }

    button.big-button:active {
      transform: translate(0em, 0.75em);
    }

    button.big-button:active::before {
      transform: translate3d(0, 0, -1em);

      box-shadow: 0 0 0 2px var(--colorShadeB), 0 0.25em 0 0 var(--colorShadeB);

    }
  </style>
  <script src="http://code.jquery.com/jquery.js"></script>

  <!-- If no online access, fallback to our hardcoded version of jQuery -->
  <script>
      window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')
  </script>

  <!-- Bootstrap JS -->
  <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

  <!-- Custom JS -->
  <script src="includes/js/script.js"></script>
</body>

</html>
