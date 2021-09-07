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
  <link href="{{ ('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ ('template/assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ ('template/assets/css/templatemo-grad-school.css') }}">
  <link rel="stylesheet" href="{{ ('template/assets/css/owl.css') }}">
  <link rel="stylesheet" href="{{ ('template/assets/css/lightbox.css') }}">
</head>

<body>
  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em>JAKA</em> KECE</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li class="selected"><a href="{{ ('home') }}">Home</a></li>
        <li><a href="{{ ('inkubasi') }}" class="external">Inkubasi Digital Bahasa</a></li>
        <li><a href="{{ ('jawara') }}" class="external">Jawara Center</a></li>
        <li><a href="{{ ('exchange') }}" class="external">Student Exchange</a></li>
        <li><a href="{{ ('training') }}" class="external">On The Job Training</a></li>
      </ul>
    </nav>
  </header>


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
            </div>
            <form id="contact" action="" method="get">
              <div class="row">
                <div class="col-md-12">
                  <fieldset>
                    <input name="username" type="text" class="form-control" id="username" placeholder="Your Username"
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
  <script src="{{('template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{ ('template/assets/js/isotope.min.js')}}"></script>
  <script src="{{ ('template/assets/js/owl-carousel.js')}}"></script>
  <script src="{{ ('template/assets/js/lightbox.js')}}"></script>
  <script src="{{ ('template/assets/js/tabs.js')}}"></script>
  <script src="{{ ('template/assets/js/video.js')}}"></script>
  <script src="{{ ('template/assets/js/slick-slider.js')}}"></script>
  <script src="{{ ('template/assets/js/custom.js')}}"></script>
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
</body>

</html>