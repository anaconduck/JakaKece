@extends('layouts.app')

@section('css')
    <style>
        section.why-us{
    position: relative;
}
section.why-us::after{
    content: "";
    background: url("https://image.freepik.com/free-vector/flat-geometric-background_23-2148957201.jpg");
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
h1{
            color: #f5a425;
            text-align: center;
        }

        .body-card {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
            font-family: "Poppins", sans-serif;
            color: #ffffff;
        }

        .cont {
            flex-grow: 1;
            max-width: 960px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 20px;
            padding-right: 20px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 32px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .cards__item {
            height: 200px;
        }

        .card {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #000000;
        }

        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            z-index: 20;
            width: 50%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.1);
            pointer-events: none;
        }

        .card:nth-child(1) {
            background-image: linear-gradient(45deg, #3503ad, #f7308c);
        }

        .card:nth-child(2) {
            background-image: linear-gradient(45deg, #ccff00, #09afff);
        }

        .card:nth-child(3) {
            background-image: linear-gradient(45deg, #e91e63, #ffeb3b);
        }

        .card__frame {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .card__picture {
            margin-bottom: 12px;
            filter: invert(1);
        }

        .card__picture img {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .card__title {
            margin: 0;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .card__overlay {
            position: absolute;
            bottom: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 52px;
            height: 52px;
            background-color: #ffffff;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: 0.5s;
            cursor: pointer;
        }

        .card__overlay::before {
            content: "Read";
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 0.02em;
        }

        .card__overlay:hover,
        .card__overlay:focus {
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            box-shadow: none;
            border-radius: 0;
            opacity: 0.9;
        }

        .card__overlay:hover::before,
        .card__overlay:focus::before {
            content: none;
        }

        .card:nth-child(1) .card__overlay {
            background-image: linear-gradient(45deg, #3503ad, #f7308c);
        }

        .card:nth-child(2) .card__overlay {
            background-image: linear-gradient(45deg, #ccff00, #09afff);
        }

        .card:nth-child(3) .card__overlay {
            background-image: linear-gradient(45deg, #e91e63, #ffeb3b);
        }

        .card__content {
            z-index: 1;
            padding: 20px;
            line-height: 1.4;
            opacity: 0;
            visibility: hidden;
            box-sizing: border-box;
            pointer-events: none;
            transition: 0s;
        }

        .card__overlay:hover~.card__content {
            opacity: 1;
            visibility: visible;
            transition: 0.2s 0.3s;
        }

        .card__content h2 {
            margin: 0;
            margin-bottom: 16px;
        }

        @keyframes tonext {
            75% {
                left: 0;
            }

            95% {
                left: 100%;
            }

            98% {
                left: 100%;
            }

            99% {
                left: 0;
            }
        }

        @keyframes tostart {
            75% {
                left: 0;
            }

            95% {
                left: -300%;
            }

            98% {
                left: -300%;
            }

            99% {
                left: 0;
            }
        }

        @keyframes snap {
            96% {
                scroll-snap-align: center;
            }

            97% {
                scroll-snap-align: none;
            }

            99% {
                scroll-snap-align: none;
            }

            100% {
                scroll-snap-align: center;
            }
        }

        * {
            box-sizing: border-box;
            scrollbar-color: transparent transparent;
            /* thumb and track color */
            scrollbar-width: 0px;
        }

        *::-webkit-scrollbar {
            width: 0;
        }

        *::-webkit-scrollbar-track {
            background: transparent;
        }

        *::-webkit-scrollbar-thumb {
            background: transparent;
            border: none;
        }

        * {
            -ms-overflow-style: none;
        }

        .carousel ol,
        li {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .carousel {
            position: relative;
            padding-top: 75%;
            filter: drop-shadow(0 0 10px #0003);
            perspective: 100px;
        }

        .carousel__viewport {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: flex;
            overflow-x: scroll;
            counter-reset: item;
            scroll-behavior: smooth;
            scroll-snap-type: x mandatory;
        }

        .carousel__slide {
            position: relative;
            flex: 0 0 100%;
            width: 100%;
            background-color: #f99;
            counter-increment: item;
        }

        .carousel__slide:nth-child(even) {
            background-color: #99f;
        }

        .carousel__slide:before {
            content: counter(item);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate3d(-50%, -40%, 70px);
            color: #fff;
            font-size: 2em;
        }

        .carousel__snapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            scroll-snap-align: center;
        }

        @media (hover: hover) {
            .carousel__snapper {
                animation-name: tonext, snap;
                animation-timing-function: ease;
                animation-duration: 4s;
                animation-iteration-count: infinite;
            }

            .carousel__slide:last-child .carousel__snapper {
                animation-name: tostart, snap;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .carousel__snapper {
                animation-name: none;
            }
        }

        .carousel:hover .carousel__snapper,
        .carousel:focus-within .carousel__snapper {
            animation-name: none;
        }

        .carousel__navigation {
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            text-align: center;
        }

        .carousel__navigation-list,
        .carousel__navigation-item {
            display: inline-block;
        }

        .carousel__navigation-button {
            display: inline-block;
            width: 1.5rem;
            height: 1.5rem;
            background-color: #333;
            background-clip: content-box;
            border: 0.25rem solid transparent;
            border-radius: 50%;
            font-size: 0;
            transition: transform 0.1s;
        }

        .carousel::before,
        .carousel::after,
        .carousel__prev,
        .carousel__next {
            position: absolute;
            top: 0;
            margin-top: 37.5%;
            width: 4rem;
            height: 4rem;
            transform: translateY(-50%);
            border-radius: 50%;
            font-size: 0;
            outline: 0;
        }

        .carousel::before,
        .carousel__prev {
            left: -1rem;
        }

        .carousel::after,
        .carousel__next {
            right: -1rem;
        }

        .carousel::before,
        .carousel::after {
            content: '';
            z-index: 1;
            background-color: #333;
            background-size: 1.5rem 1.5rem;
            background-repeat: no-repeat;
            background-position: center center;
            color: #fff;
            font-size: 2.5rem;
            line-height: 4rem;
            text-align: center;
            pointer-events: none;
        }

        .carousel::before {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolygon points='0,50 80,100 80,0' fill='%23fff'/%3E%3C/svg%3E");
        }

        .carousel::after {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolygon points='100,50 20,100 20,0' fill='%23fff'/%3E%3C/svg%3E");
        }

        .tab {
            width: 100%;
            min-width: 100%;
        }

        .search-bar {
            display: flex;
        }

        .search-bar input,
        .search-btn,
        .search-btn:before,
        .search-btn:after {
            transition: all 0.25s ease-out;
        }

        .search-bar input,
        .search-btn {
            width: 3em;
            height: 40px;
        }

        .search-bar input:invalid:not(:focus),
        .search-btn {
            cursor: pointer;
        }

        .search-bar,
        .search-bar input:focus,
        .search-bar input:valid {
            width: 100%;
        }

        .search-bar input:focus,
        .search-bar input:not(:focus)+.search-btn:focus {
            outline: transparent;
        }

        .search-bar {
            margin: auto;
            padding: 1.5em;
            justify-content: center;
            max-width: 30em;
        }

        .search-bar input {
            background: transparent;
            border-radius: 1.5em;
            box-shadow: 0 0 0 0.4em #171717 inset;
            padding: 0.75em;
            transform: translate(0.5em, 0.5em) scale(0.5);
            transform-origin: 100% 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .search-bar input::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        .search-bar input:focus,
        .search-bar input:valid {
            background: #fff;
            border-radius: 0.375em 0 0 0.375em;
            box-shadow: 0 0 0 0.1em #d9d9d9 inset;
            transform: scale(1);
        }

        .search-btn {
            background: #171717;
            border-radius: 0 0.75em 0.75em 0 / 0 1.5em 1.5em 0;
            position: relative;
            transform: translate(0.25em, 0.25em) rotate(45deg) scale(0.25, 0.125);
            transform-origin: 0 50%;
        }

        .search-btn:before,
        .search-btn:after {
            content: "";
            display: block;
            opacity: 0;
            position: absolute;
        }

        .search-btn:before {
            border-radius: 50%;
            box-shadow: 0 0 0 0.2em #f1f1f1 inset;
            top: 0.75em;
            left: 0.75em;
            width: 20px;
            height: 20px;
        }

        .search-btn:after {
            background: #f1f1f1;
            border-radius: 0 0.25em 0.25em 0;
            top: 51%;
            left: 51%;
            width: 15px;
            height: 5px;
            transform: translate(0.2em, 0) rotate(45deg);
            transform-origin: 0 50%;
        }

        .search-btn span {
            display: inline-block;
            overflow: hidden;
            width: 1px;
            height: 1px;
        }

        /* Active state */
        .search-bar input:focus+.search-btn,
        .search-bar input:valid+.search-btn {
            background: #2762f3;
            border-radius: 0 0.375em 0.375em 0;
            transform: scale(1);
        }

        .search-bar input:focus+.search-btn:before,
        .search-bar input:focus+.search-btn:after,
        .search-bar input:valid+.search-btn:before,
        .search-bar input:valid+.search-btn:after {
            opacity: 1;
        }

        .search-bar input:focus+.search-btn:hover,
        .search-bar input:valid+.search-btn:hover,
        .search-bar input:valid:not(:focus)+.search-btn:focus {
            background: #0c48db;
        }

        .search-bar input:focus+.search-btn:active,
        .search-bar input:valid+.search-btn:active {
            transform: translateY(1px);
        }

        @media screen and (prefers-color-scheme: dark) {
            .search-bar input {
                box-shadow: 0 0 0 0.4em #f1f1f1 inset;
            }

            .search-bar input:focus,
            .search-bar input:valid {
                background: #3d3d3d;
                box-shadow: 0 0 0 0.1em #3d3d3d inset;
            }

            .search-btn {
                background: #f1f1f1;
            }
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
                    <h1>Student Exchange</h1>
                    @if ($message[0] == 1)
                        <div class="alert alert-success" role="alert">
                            {{ $message[1] }}
                        </div>
                    @elseif ($message[0]==0))
                        <div class="alert alert-danger" role="alert">
                            {{ $message[1] }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error.', ' }}
                            @endforeach
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
                                        <h2 class="card__title">Mahasiswa Exchange</h2>
                                    </div>
                                    <div class="card__overlay"></div>
                                    <div class="card__content">
                                        <h2>Total Mahasiswa Exchange</h2>
                                        <p>{{ $totalMahasiswaExchange }} Mahasiswa</p>
                                    </div>
                                </li>
                                <li class="card cards__item">
                                    <div class="card__frame">
                                        <div class="card__picture">
                                            <img src="https://image.flaticon.com/icons/svg/1336/1336494.svg" alt=""
                                                width="120">
                                        </div>
                                        <h2 class="card__title">Exchange Event</h2>
                                    </div>
                                    <div class="card__overlay"></div>
                                    <div class="card__content">
                                        <h2>Total Event</h2>
                                        <p>{{ $totalExchangeEvent }} Event</p>
                                    </div>
                                </li>
                                <li class="card cards__item">
                                    <div class="card__frame">
                                        <div class="card__picture">
                                            <img src="https://image.flaticon.com/icons/svg/478/478543.svg" alt=""
                                                width="120">
                                        </div>
                                        <h2 class="card__title">Pendaftar</h2>
                                    </div>
                                    <div class="card__overlay"></div>
                                    <div class="card__content">
                                        <h2>Total Pendaftar Exchange</h2>
                                        <p>{{ $totalPendaftar }} Pendaftar</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <hr>
                    <section class="">
                        <h2>Informasi Pendaftaran Student Exchange</h2>
                        <div class="container ver">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="vertical-tab" role="tabpanel">

                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active side">
                                                <a aria-controls="home" role="tab" data-toggle="tab">Kampus Dalam Negeri</a>
                                            </li>
                                            <li class="side" role="presentation">
                                                <a aria-controls="profile" role="tab" data-toggle="tab">Kampus Luar
                                                    Negeri</a>
                                            </li>
                                            <li class="side" role="presentation">
                                                <a aria-controls="typeset" role="tab" data-toggle="tab">Riwayat</a>
                                            </li>
                                        </ul>
                                        @livewire('exchange-c')
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
