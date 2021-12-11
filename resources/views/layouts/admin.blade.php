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
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('css')
    @livewireStyles
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
                        <a href="{{ url('/admin') }}">JakaKece | Admin</a>
                    </div>
                </header>
                @if (!empty($nav))
                    <div class="container2 container-md-fluid">
                        <div class="row ">
                            <div class="col-auto col-md-10 ">
                                <nav aria-label="breadcrumb " class="first d-md-flex">
                                    <ol class="breadcrumb indigo lighten-6 first-1 shadow-lg ">
                                        @for ($i = 0; $i < sizeof($nav) - 1; $i++)
                                            <li class="breadcrumb-item font-weight-bold"><a
                                                    class="black-text text-uppercase "
                                                    href="{{ $nav[$i]['link'] }}"><span>{{ $nav[$i]['title'] }}</span></a> </li>
                                        @endfor

                                        <li class="breadcrumb-item font-weight-bold mr-0 pr-0"><a
                                                class="black-text active-1"
                                                href="#"><span>{{ $nav[sizeof($nav) - 1]['title'] }}</span></a> </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('slot')

            </div>
        </div>

        <!-- Sidebar -->
        <div id="sidebar">

            <div class="inner">

                <!-- Menu -->
                <nav id="menu">
                    <ul>
                        <li><a href="{{ url('/admin') }}">Homepage</a></li>
                        <li>
                            <span class="opener">Inkubasi Digital Bahasa</span>
                            <ul>
                                <li><a href="{{ url('/admin/inkubasi/materi') }}">Materi</a></li>
                                <li><a href="{{ url('/admin/inkubasi/practice') }}">Latihan Soal</a></li>
                            </ul>
                        </li>
                        <li>
                            <span class="opener">Jawara Center</span>
                            <ul>
                                <li><a href="{{ url('/admin/jawara/event') }}">Daftar Event</a></li>
                                <li><a href="{{ url('admin/jawara/pendaftar') }}">Pendaftar</a></li>
                                <li><a href="{{ url('admin/jawara/tanya') }}">Tanya Admin</a></li>
                            </ul>
                        </li>
                        <li>
                            <span class="opener">Student Exchange</span>
                            <ul>
                                <li><a href="{{ url('/admin/se/tujuan') }}">Tujuan SE</a></li>
                                <li><a href="{{ url('/admin/se/mk') }}">Daftar MK SE</a></li>
                                <li><a href="{{ url('/admin/se/pendaftar') }}">Pendaftar</a></li>
                                <li><a href="{{ url('admin/se/tanya') }}">Tanya Admin</a></li>
                            </ul>
                        </li>
                        <li>
                            <span class="opener">On The Job Training</span>
                            <ul>
                                <li><a href="{{ url('/admin/ojt/magang') }}">Daftar Magang Tersedia</a></li>
                                <li><a href="{{ url('/admin/ojt/event') }}">Daftar Event OJT</a></li>
                                <li><a href="{{ url('/admin/ojt/tujuan') }}">Daftar Instansi Magang</a></li>
                                <li><a href="{{ url('/admin/ojt/mk') }}">Daftar MK</a></li>
                                <li><a href="{{ url('admin/ojt/pendaftar') }}">Pendaftar</a></li>
                                <li><a href="{{ url('admin/ojt/tanya') }}">Tanya Admin</a></li>
                            </ul>
                        </li>
                        <li>
                            <form method="POST" action="{{ url('/admin/logout') }}">
                                @csrf
                                <input type="submit" class="btn btn-danger mt-5" value="Logout">
                            </form>
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

    <script src="{{ asset('assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/transition.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/custom_admin.js') }}"></script>
    @yield('js')
    @livewireScripts
</body>


</body>

</html>
