@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/jawara.css') }}" />
    <style>
        section.why-us {
            position: relative;
        }

        section.why-us::after {
            content: "";
            background: url('https://image.freepik.com/free-vector/flat-geometric-background_23-2148957209.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.2;
            top: -150px;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
            z-index: -1;
        }

        .ta input,
        .ta input[type="radio"]+label,
        .ta input[type="checkbox"]+label:before,
        .ta select option,
        .ta select {
            width: 100%;
            padding: 1em;
            line-height: 1.4;
            background-color: #f9f9f9;
            border: 1px solid #e5e5e5;
            border-radius: 3px;
            -webkit-transition: 0.35s ease-in-out;
            -moz-transition: 0.35s ease-in-out;
            -o-transition: 0.35s ease-in-out;
            transition: 0.35s ease-in-out;
            transition: all 0.35s ease-in-out;
        }

        .ta input:focus {
            outline: 0;
            border-color: #bd8200;
        }

        .ta input:focus+.input-icon i {
            color: #f0a500;
        }

        .ta input:focus+.input-icon:after {
            border-right-color: #f0a500;
        }


        .ta .input-group {
            margin-bottom: 1em;
            zoom: 1;
        }

        .ta .input-group:before,
        .ta .input-group:after {
            content: "";
            display: table;
        }

        .ta .input-group:after {
            clear: both;
        }

        .ta .input-group-icon {
            position: relative;
        }

        .ta .input-group-icon input {
            padding-left: 4.4em;
        }

        .ta .input-group-icon .input-icon {
            position: absolute;
            top: 0;
            left: 0;
            width: 3.4em;
            height: 3.4em;
            line-height: 3.4em;
            text-align: center;
            pointer-events: none;
        }

        .ta .input-group-icon .input-icon:after {
            position: absolute;
            top: 0.6em;
            bottom: 0.6em;
            left: 3.4em;
            display: block;
            border-right: 1px solid #e5e5e5;
            content: "";
            -webkit-transition: 0.35s ease-in-out;
            -moz-transition: 0.35s ease-in-out;
            -o-transition: 0.35s ease-in-out;
            transition: 0.35s ease-in-out;
            transition: all 0.35s ease-in-out;
        }

        .ta .input-group-icon .input-icon i {
            -webkit-transition: 0.35s ease-in-out;
            -moz-transition: 0.35s ease-in-out;
            -o-transition: 0.35s ease-in-out;
            transition: 0.35s ease-in-out;
            transition: all 0.35s ease-in-out;
        }

        .ta.container {
            max-width: 38em;
            padding: 1em 3em 2em 3em;
            margin: 0em auto;
            background-color: #fff;
            border-radius: 4.2px;
            box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
        }

        .ta .row {
            zoom: 1;
        }

        .ta .row:before,
        .ta .row:after {
            content: "";
            display: table;
        }

        .ta .row:after {
            clear: both;
        }

        .ta .col-half {
            padding-right: 10px;
            float: left;
            width: 50%;
        }

        .ta .col-half:last-of-type {
            padding-right: 0;
        }

        .ta .col-third {
            padding-right: 10px;
            float: left;
            width: 33.33333333%;
        }

        .ta .col-third:last-of-type {
            padding-right: 0;
        }

        @media only screen and (max-width: 540px) {
            .ta .col-half {
                width: 100%;
                padding-right: 0;
            }
        }
        h2{
            font-size: 17px;
        }
        .desc{
            background-color: rgba(255, 255, 255, 0.397);
            box-shadow: 10px 5px 20px rgba(0, 0, 0, 0.35);
            padding: 40px;
            text-align: justify;
            border-radius: 20px;
        }
        .desc p{
            font-size: 14px;
            font-weight: 500;
            color: #221807
        }
    </style>
@stop

@section('slot')
    <section class="section why-us" data-section="section2">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="section-heading">

                    </div>
                </div>
                <div class="col-md-12">
                    <h1>Jawara Center</h1>
                    <div class="desc">
                        <p>Halo Mahasiswa EKP! Selamat datang di Jawara Center yang merupakan sebuah wadah bagi mahasiswa EKP dalam mengikuti kegiatan kompetisi/lomba baik secara Regional, Nasional maupun Internasional. Disini kalian bisa melihat daftar list lomba/kompetisi serta melakukan pendaftaran lomba untuk memperoleh bantuan pendanaan lomba dan reward bagi mahasiswa yang berprestasi. Tidak hanya itu jika lomba yang kalian ikuti belum ada dalam daftar, kalian bisa langsung memberikan informasi kepada admin lewat kolom dibawah.   </p>
                        <br>
                        <p>Dalam riwayat Jawa Center kalian juga bisa melihat track record teman-teman kalian yang sudah berhasil meraih kejuaraan. Yuk semangat, jadilah bagian dari Jawara Center EKP yang berprestasi!</p>

                    </div>
                    @if ($message[0] == 1)
                        <div class="alert alert-success" role="alert">
                            {{ $message[1] }}
                        </div>
                    @elseif ($message[0]==0))
                        <div class="alert alert-danger" role="alert">
                            {{ $message[1] }}
                        </div>
                    @endif
                    <hr>
                    <div style="max-width: 60%; margin: 0 auto;">
                        <section class="carousel" aria-label="Gallery">
                            <ol class="carousel__viewport">
                                <li id="carousel__slide1" tabindex="0" class="carousel__slide">
                                    <div class="carousel__snapper">
                                        <a href="#carousel__slide4" class="carousel__prev">Go to last slide</a>
                                        <a href="#carousel__slide2" class="carousel__next">Go to next slide</a>
                                    </div>
                                </li>
                                <li id="carousel__slide2" tabindex="0" class="carousel__slide">
                                    <div class="carousel__snapper"></div>
                                    <a href="#carousel__slide1" class="carousel__prev">Go to previous slide</a>
                                    <a href="#carousel__slide3" class="carousel__next">Go to next slide</a>
                                </li>
                                <li id="carousel__slide3" tabindex="0" class="carousel__slide">
                                    <div class="carousel__snapper"></div>
                                    <a href="#carousel__slide2" class="carousel__prev">Go to previous slide</a>
                                    <a href="#carousel__slide4" class="carousel__next">Go to next slide</a>
                                </li>
                                <li id="carousel__slide4" tabindex="0" class="carousel__slide">
                                    <div class="carousel__snapper"></div>
                                    <a href="#carousel__slide3" class="carousel__prev">Go to previous slide</a>
                                    <a href="#carousel__slide1" class="carousel__next">Go to first slide</a>
                                </li>
                            </ol>
                            <aside class="carousel__navigation">
                                <ol class="carousel__navigation-list">
                                    <li class="carousel__navigation-item">
                                        <a href="#carousel__slide1" class="carousel__navigation-button">Go to slide 1</a>
                                    </li>
                                    <li class="carousel__navigation-item">
                                        <a href="#carousel__slide2" class="carousel__navigation-button">Go to slide 2</a>
                                    </li>
                                    <li class="carousel__navigation-item">
                                        <a href="#carousel__slide3" class="carousel__navigation-button">Go to slide 3</a>
                                    </li>
                                    <li class="carousel__navigation-item">
                                        <a href="#carousel__slide4" class="carousel__navigation-button">Go to slide 4</a>
                                    </li>
                                </ol>
                            </aside>
                        </section>

                    </div>
                    <div class="body-card mt-5 mb-5">
                        <div class="cont">
                            <ul class="cards">
                                <li class="card cards__item">
                                    <div class="card__frame">
                                        <div class="card__picture">
                                            <img src="https://image.flaticon.com/icons/svg/1496/1496034.svg" alt=""
                                                width="120">
                                        </div>
                                        <h2 class="card__title">Total Jawara</h2>
                                    </div>
                                    <div class="card__overlay"></div>
                                    <div class="card__content">
                                        <h2>Total Mahasiswa Berprestasi</h2>
                                        <p>{{ $totalJawara }} Jawara</p>
                                    </div>
                                </li>
                                <li class="card cards__item">
                                    <div class="card__frame">
                                        <div class="card__picture">
                                            <img src="https://image.flaticon.com/icons/svg/1336/1336494.svg" alt=""
                                                width="120">
                                        </div>
                                        <h2 class="card__title">Total Lomba</h2>
                                    </div>
                                    <div class="card__overlay"></div>
                                    <div class="card__content">
                                        <h2>Total Lomba Yang tersedia</h2>
                                        <p>{{ $totalLomba }} Lomba</p>
                                    </div>
                                </li>
                                <li class="card cards__item">
                                    <div class="card__frame">
                                        <div class="card__picture">
                                            <img src="https://image.flaticon.com/icons/svg/478/478543.svg" alt=""
                                                width="120">
                                        </div>
                                        <h2 class="card__title">Total Pendaftar</h2>
                                    </div>
                                    <div class="card__overlay"></div>
                                    <div class="card__content">
                                        <h2>Total Pendaftar Lomba</h2>
                                        <p>{{ $totalPendaftar }} Pendaftar</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <hr>
                    <section class="">
                        <h2></h2>
                        <div class="container ver">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="vertical-tab" role="tabpanel">

                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active side">
                                                <a aria-controls="home" role="tab" data-toggle="tab">Pendaftaran</a>
                                            </li>
                                            <li class="side" role="presentation">
                                                <a aria-controls="messages" role="tab" data-toggle="tab">Terlaksana</a>
                                            </li>
                                            @if (auth()->user())
                                                <li class="side" role="presentation">
                                                    <a aria-controls="typeset" role="tab" data-toggle="tab">Tanya Admin</a>
                                                </li>
                                            @endif
                                        </ul>

                                        @livewire('jawara-c')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </section>
@stop

@section('script')
    <script>
        let sidenav = $('.side')
        let tab = $('.t1')
        sidenav.on('click', function() {
            sidenav.removeClass('active')
            tab.removeClass('active show')
            this.classList.toggle('active')
            for (let i = 0; i < sidenav.length; i++) {
                if (sidenav[i] == this) {
                    tab[i].classList.add('active', 'show')
                }
            }
        })
        $('form').submit(false);
    </script>
@stop
