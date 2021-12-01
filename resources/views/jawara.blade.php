@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/jawara.css') }}"/>
    <style>
        section.why-us{
    position: relative;
}
section.why-us::after{
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
                                                <a aria-controls="profile" role="tab" data-toggle="tab">Mendatang</a>
                                            </li>
                                            <li class="side" role="presentation">
                                                <a aria-controls="messages" role="tab" data-toggle="tab">Terlaksana</a>
                                            </li>
                                            <li class="side" role="presentation">
                                                <a aria-controls="typeset" role="tab" data-toggle="tab">Riwayat</a>
                                            </li>
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
