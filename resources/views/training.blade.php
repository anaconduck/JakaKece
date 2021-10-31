<!DOCTYPE html>
<html lang="en">
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "jakakece";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
$today=date("Y-m-d");
$sql = "SELECT * FROM ojt where tanggal_pendaftaran_mulai<='$today' and '$today'<=tanggal_pendaftaran_selesai";
$resultpe = $conn->query($sql);
$sql = "SELECT * FROM ojt where '$today'<=tanggal_pendaftaran_selesai";
$resultem = $conn->query($sql);
$sql = "SELECT * FROM ojt where tanggal_pendaftaran_selesai<='$today' and '$today'<=tanggal_ojt";
$resultet = $conn->query($sql);
$sql = "SELECT * FROM prestasi_mahasiswa";
$resultpm = $conn->query($sql);

?>

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
        <li><a href="{{ ('inkubasi') }}" class="external">Inkubasi Digital Bahasa</a></li>
        <li><a href="{{ ('jawara') }}" class="external">Jawara Center</a></li>
        <li><a href="{{ ('exchange') }}" class="external">Student Exchange</a></li>
        <li class="selected"><a href="{{ ('training') }}">On The Job Training</a></li>
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
          <div class="row">
            <div class="col-md-4">
              <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-events-list" data-toggle="list" href="#list-events" role="tab" aria-controls="events">Pendaftaran Event</a>
                <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Event Mendatang</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Event Terlaksana</a>
              </div>
            </div>
            <!-- em -->
            <div class="col-md-8 ">
              <div class="tab-content m-3" style="color: white;" id="nav-tabContent">
                <div class="tab-pane fade show scrol" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

                  <ol>
                    <hr>
                    <?php
                    if ($resultem->num_rows > 0) {
                      // output data of each row
                      while ($row = $resultem->fetch_assoc()) {
                        echo '<li class="p-1">';
                        echo $row["nama_ojt"];
                        echo '<br><cek><a href="detailsojtm/' . $row["id"] . '">Cek persyaratan...</a></cek>
                      <hr>
                    </li>';
                      }
                    } else {
                      echo "0 results";
                    }

                    ?>

                  </ol>
                </div>
                <!-- et -->
                <div class="tab-pane fade scrol" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

                  <ol>

                    <hr>
                    <?php
                    if ($resultet->num_rows > 0) {
                      // output data of each row
                      while ($row = $resultet->fetch_assoc()) {
                        echo '<li class="p-1">';
                        echo $row["nama_ojt"];
                        echo '<br><cek><a href="detailsojtt/' . $row["id"] . '">Cek pelaksanaan...</a></cek>
                      <hr>
                    </li>';
                      }
                    } else {
                      echo "0 results";
                    }

                    ?>

                    </li>
                  </ol>
                </div>

                <!--pm-->

                <div class="tab-pane fade show active" id="list-events" role="tabpanel" aria-labelledby="list-events-list">


                  <div class="container">
                    <input class="form-control" id="listSearch" type="text" placeholder="Masukkan kata kunci...">
                    <br>

                      <div class="scrol">
                        <ul class="list-group" id="myList">
                          <?php
                          if ($resultpe->num_rows > 0) {
                            // output data of each row
                            while ($row = $resultpe->fetch_assoc()) {
                              echo '<li class="list-group-item" style="color: black;"><div class="row">
                        <div class="col-1">';
                              echo '</div>
                        <div class="col-12">';
                              echo '<a href="daftarojt/' . $row["id"] . '" style="color:black">' . $row["nama_ojt"] . '</a>
                        <br><cek><a href="detailspojt/' . $row["id"] . '">Cek persyaratan...</a></cek>
                        </div>
                    </div>
                    </li>';
                            }
                          } else {
                            echo "0 results";
                          }

                          ?>
                          </li>



                        </ul>
                      </div>

                    <div class="d-flex flex-row-reverse">

                    </div>
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
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/js/bootstrap.js')}}"></script>
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
    $(document).ready(function() {
      $("#listSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
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
    $('.mdb-select').materialSelect({});
    var checkSection = function checkSection() {
      $('.section').each(function() {
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

    $('.main-menu, .scroll-to-section').on('click', 'a', function(e) {
      if ($(e.target).hasClass('external')) {
        return;
      }
      e.preventDefault();
      $('#menu').removeClass('active');
      showSection($(this).attr('href'), true);
    });

    $(window).scroll(function() {
      checkSection();
    });
  </script>
</body>
<!--                       <li class="p-1">
                        Juara 1 - Joints Competition 2020 UGM<br>
                      <cek><a href="#"> Cek prestasi mahasiswa...</a>
                      </cek>
                      <hr>
                    </li><li class="p-1">
                        Juara 3  - Hackavidia - ARKAVIDIA 2020 ITB<br>
                      <cek><a href="#"> Cek prestasi mahasiswa...</a>
                      </cek>
                      <hr>
                    </li><li class="p-1">
                        Gold Medal  - The 5th World Invention Innovation Contest Korea<br>
                      <cek><a href="#"> Cek prestasi mahasiswa...</a>
                      </cek>
                      <hr>
                    </li><li class="p-1">
                        Gold Medal  - International Invention & Innovative Competition Series 1 Malaysia<br>
                      <cek><a href="#"> Cek prestasi mahasiswa...</a>
                      </cek>
                      <hr>
                    </li><li class="p-1">
                        Gold Medal  - International Student Affairs Invention, Inovation & Design Competition Utm<br>
                      <cek><a href="#"> Cek prestasi mahasiswa...</a>
                      </cek>
                      <hr>
                    </li><li class="p-1">
                        Most Favourite Gamein Indigo Game Startuo Incubation's Gamejam Roadshow - Indigo Game Startup Incubation's Game Jam Roadshow<br>
                      <cek><a href="#"> Cek prestasi mahasiswa...</a>
                      </cek>
                      <hr>
                    </li>
                    <li class="p-1">
                        Juara 1 Bisnis Model - Kompetisi 4c Virtuality National Competition<br>
                      <cek><a href="#"> Cek prestasi mahasiswa...</a>
                      </cek>
                      <hr>
                    </li>
                    <li class="p-1">
                        Juara 1 Video Infografis - Kompetisi 4c Virtuality National Competition<br>
                      <cek><a href="#"> Cek prestasi mahasiswa...</a>
                      </cek>
                      <hr>
                    </li>
                    <li class="p-1">
                        Juara 3 Video Infografis - Kompetisi 4c Virtuality National Competition <br>
                      <cek><a href="#"> Cek prestasi mahasiswa...</a>
                      </cek>
                      <hr>
                    </li>
                    <li class="p-1">
                        Juara 2 Video Musik Kolaborasi - Kompetisi 4c Virtuality National Competition<br>
                      <cek><a href="#"> Cek prestasi mahasiswa...</a>
                      </cek>
                      <hr>
                    </li> -->

</html>
