<!DOCTYPE html>
<html lang="en">
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "jaka";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$today = date("Y-m-d");
$sql = "SELECT * FROM event where id=$id";
$result = $conn->query($sql);
$nama = "";
$deskripsi = "";
$tanggal_pendaftaran_mulai = "";
$tanggal_pendaftaran_selesai = "";
$tanggal_event = "";
if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $nama = $row["nama_event"];
    $deskripsi = $row["deskripsi"];
    $tanggal_pendaftaran_mulai = $row["tanggal_pendaftaran_mulai"];
    $tanggal_pendaftaran_selesai = $row["tanggal_pendaftaran_selesai"];
    $tanggal_event = $row["tanggal_event"];
  }
} else {
  echo "0 results";
}
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
          <li><a href="{{ url('/home') }}" class="{{ $home ?? 'external' }}">Home</a></li>
          <li class="{{ $inkubasi ?? 'external' }}"><a href="{{ url('/inkubasi') }}">Inkubasi Digital Bahasa</a></li>
          <li class="{{ $jawara ?? 'external' }}"><a href="{{ ('/jawara') }}" >Jawara Center</a></li>
          <li class="{{ $exchange ?? 'external' }}"><a href="{{ url('/exchange') }}" >Student Exchange</a></li>
          <li class="{{ $training ?? 'eksternal' }}"><a href="{{ url('/training') }}" class="{{ $training ?? 'eksternal' }}">On The Job Training</a></li>
          <li class="{{ $user_s ?? 'eksternal' }}"><a href="{{ url('/user') }}" ><img src="{{ asset('assets/images/businessman.png') }}" width="20px"></a></li>
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
        <div class="col-md-12 m-2 p2 anot">
          <div class="row">
            <div class="col-md-1 m-2 p-3 anot">
              <a href="{{ url('training') }}" class="external">Kembali</a>
            </div>
            <div class="col-md-10 scrol m-3 p-5 anot" style="background-color: whitesmoke;">
              <h1>
                <?php echo $nama;
                ?>
              </h1>
              <br>
              <h6>
                <div id="container">
                  <form action="" method="post" id="form">
                    @csrf
                    <div>
                    <table>
                        <tbody  id="inpcontainer">
                            <tr>
                            <td align="left">Name:</td>
                            <td align="right"><input class="m-2 p-1" type="text" name="Name" required/></td>
                            </tr>
                            <tr>
                            <td align="left">NIM:</td>
                            <td align="right"><input class="m-2 p-1" type="number" name="Nim" required/></td>
                            </tr>

                        </tbody>
                      </table>
                    </div>

                    <button id="tambah" type="button">+</button>

                    <div class="p-3">
                      <input class="btn btn-info" type="submit" value="Submit">
                    </div>

                  </form>

                </div>
              </h6>
            </div>
          </div>
        </div>



      </div>
    </div>
    <br><br>
  </section>
  <style>
      section{
        min-height: 100vh;
    }
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
    let container = $('#inpcontainer'); //container dari semua inputan
    let tambah = $('#tambah'); //tombol tambah inputan
    let index = 2; //increment name input
    function tambahInput(type, name) {
      return '<td align="left">'+name+':</td><td align="right"><input class="m-2 p-1" type="'+type+'" name="'+name+index+'" required/></td>';
    } //fungsi untuk nambah input, tinggal modifikasi sesuai style sama kebutuhan

    tambah.click(function() {
        let temps = "<tr>"
        temps += tambahInput('text', 'Name')
        temps += '</tr><tr>'
        temps += tambahInput('number', 'Nim')
        temps+= '</tr>'
      container.append(temps)
      index++;
    }) //nambahin listener ke tombol tambah
  </script>
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

</html>
