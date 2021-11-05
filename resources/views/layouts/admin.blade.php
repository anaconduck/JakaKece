<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>JAKA KECE | {{ $title ?? 'Admin' }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    @yield('css')

  </head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

      <!-- Main -->
        <div id="main">
          <div class="inner">

            <!-- Header -->
            <header id="header">
              <div class="logo">
                <a href="index.html">JakaKece</a>
              </div>
            </header>

            @yield('slot')

          </div>
        </div>

      <!-- Sidebar -->
        <div id="sidebar">

          <div class="inner">

            <!-- Menu -->
            <nav id="menu">
              <ul>
                <li><a href="index.html">Homepage</a></li>
                <li>
                    <span class="opener">Inkubasi Digital Bahasa</span>
                    <ul>
                      <li><a href="#">Materi</a></li>
                      <li><a href="#">Latihan Soal</a></li>
                    </ul>
                </li>
                <li>
                  <span class="opener">Jawara Center</span>
                  <ul>
                    <li><a href="#">Daftar Event</a></li>
                    <li><a href="#">Pendaftar</a></li>
                  </ul>
                </li>
                <li>
                  <span class="opener">Student Exchange</span>
                  <ul>
                    <li><a href="#">Daftar Exchange</a></li>
                    <li><a href="#">Pendaftar</a></li>
                  </ul>
                </li>
                <li>
                    <span class="opener">On The Job Training</span>
                    <ul>
                      <li><a href="#">Daftar OJT</a></li>
                      <li><a href="#">Pendaftar</a></li>
                    </ul>
                </li>
              </ul>
            </nav>


            <!-- Footer -->
            <footer id="footer">
              <p class="copyright">Copyright &copy; 2021 JAKA KECE
            </footer>

          </div>
        </div>

    </div>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/transition.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/custom_admin.js') }}"></script>
    @yield('js')
</body>


  </body>

</html>
