@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <style>
        .untitled__slide:nth-child(1) .untitled__slideBg {
            background-image: url({{ Storage::url($dashboard->background['inkubasi']) }})
        }
        .untitled__slide:nth-child(2) .untitled__slideBg {
            background-image: url({{ Storage::url($dashboard->background['jawara']) }})
        }
        .untitled__slide:nth-child(3) .untitled__slideBg {
            background-image: url({{ Storage::url($dashboard->background['exchange']) }})
        }
        .untitled__slide:nth-child(4) .untitled__slideBg {
            background-image: url({{ Storage::url($dashboard->background['training']) }})
        }
    </style>
@stop

@section('slot')

    <section class="section main-banner" id="top" data-section="section1">
        <iframe src="https://www.youtube.com/embed/{{ $dashboard->banner  }}?autoplay=1&mute=1&loop=1&playlist={{ $dashboard->banner }}"
            frameborder="0" id="bg-video" allowfullscreen allow="autoplay"></iframe>

        <div class="video-overlay header-text">
            <div class="caption">
                <h2><em>Jaka</em> Kece</h2>
                @if (!auth()->user())
                    <div class="main-button">
                        <div class="scroll-to-section"><a href="{{ url('/login') }}">Login</a></div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="section courses" data-section="section4" id="section2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2><b>Berita Terbaru</b></h2>
                    </div>
                </div>
                <div class="owl-carousel owl-theme">
                    @foreach ($berita as $b)
                        <div class="item">
                            <img src="
                            @if ($b->file)
                                {{ Storage::url($b->file) }}
                            @else
                                assets/images/courses-04.jpg
                            @endif
                            " alt="{{ $b->judul }}">
                            <div class="down-content">
                                <h4>{{ $b->judul }}</h4>
                                <p>{{ substr($b->deskripsi, 3, 20) }} ...</p>
                                <div class="text-button-pay">
                                    <a href="{{ url('/berita/' . $b->id) }}"> Detail <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container ctr"">
            @foreach ($top as $t)
                <div class=" card">
                    <figure class="card__thumb">
                        <img src="{{ Storage::url($t->file) }}" alt="{{ $t->judul }} Cottrell" class="card__image">
                        <figcaption class="card__caption">
                            <h2 class="card__title">{{ $t->judul }}</h2>
                            <p class="card__snippet">{{ substr($b->deskripsi, 5, 40) }} ...</p>
                            <a href="{{ url('/berita/'.$t->id) }}" class="card__button">Baca Selengkapnya</a>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
        </div>
    </section>

    <section class="section coming-soon ce" data-section="section3" style="overflow: hidden;padding: 0;">
        <div class="row he">
            <div class="col-md-12">
                <h2>Fitur JakaKece</h2>
            </div>
        </div>
        <div class="uy">

            <div class="untitled">
                <div class="untitled__slides">
                    <div class="untitled__slide">
                        <div class="untitled__slideBg"></div>
                        <div class="untitled__slideContent">
                            <span>Inkubasi</span>
                            <span>Bahasa</span>
                            <a class="button" href="{{ url('/inkubasi') }}">Kunjungi Inkubasi Bahasa</a>
                        </div>
                    </div>
                    <div class="untitled__slide">
                        <div class="untitled__slideBg"></div>
                        <div class="untitled__slideContent">

                            <span>Jawara</span>
                            <span>Center</span>
                            <a class="button" href="{{ url('/jawara') }}">Kunjungi Jawara</a>
                        </div>
                    </div>
                    <div class="untitled__slide">
                        <div class="untitled__slideBg"></div>
                        <div class="untitled__slideContent">
                            <span>Student</span>
                            <span>Exchange</span>
                            <a class="button" href="{{ url('/exchange') }}">Kunjungi Student Exchange</a>
                        </div>
                    </div>
                    <div class="untitled__slide">
                        <div class="untitled__slideBg"></div>
                        <div class="untitled__slideContent">
                            <span>On The Job</span>
                            <span>Training</span>
                            <a class="button" href="{{ url('/magang') }}">Kunjungi Magang</a>
                        </div>
                    </div>
                </div>
                <div class="untitled__shutters"></div>
            </div>
        </div>
    </section>

    <section class="section coming-soon" data-section="section3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="continer centerIt">
                        <h4 style="margin: 0; margin-bottom: 30px;">Tentang <em>Aplikasi</em></h4>
                        <div>
                            <p style="font-weight: bold;font-size: 15px; text-align: justify" color="black">
                                {{ $dashboard->tentangAplikasi['deskripsi1'] }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="continer centerIt">
                        <div>
                            <p style="font-weight: bold;font-size: 15px; text-align: justify" color="black">
                                {{ $dashboard->tentangAplikasi['deskripsi2'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('script')
    <script>
       const items = document.querySelectorAll('.item'),
            controls = document.querySelectorAll('.control'),
            headerItems = document.querySelectorAll('.item-header'),
            descriptionItems = document.querySelectorAll('.item-description'),
            activeDelay = .76,
            interval = 5000;

        let current = 0;

        const slider = {
            init: () => {
                controls.forEach(control => control.addEventListener('click', (e) => {
                    slider.clickedControl(e)
                }));
                controls[current].classList.add('active');
                items[current].classList.add('active');
            },
            nextSlide: () => {
                slider.reset();
                if (current === items.length - 1) current = -1;
                current++;
                controls[current].classList.add('active');
                items[current].classList.add('active');
                slider.transitionDelay(headerItems);
                slider.transitionDelay(descriptionItems);
            },
            clickedControl: (e) => {
                slider.reset();
                clearInterval(intervalF);

                const control = e.target,
                    dataIndex = Number(control.dataset.index);

                control.classList.add('active');
                items.forEach((item, index) => {
                    if (index === dataIndex) {
                        item.classList.add('active');
                    }
                })
                current = dataIndex;
                slider.transitionDelay(headerItems);
                slider.transitionDelay(descriptionItems);
                intervalF = setInterval(slider.nextSlide, interval);
            },
            reset: () => {
                items.forEach(item => item.classList.remove('active'));
                controls.forEach(control => control.classList.remove('active'));
            },
            transitionDelay: (
                items
            ) => {
                let seconds;

                items.forEach(item => {
                    const children = item.childNodes;
                    let count = 1,
                        delay;

                    item.classList.value === 'item-header' ? seconds = .015 : seconds = .007;

                    children.forEach(child => {
                        if (child.classList) {
                            item.parentNode.classList.contains('active') ? delay = count * seconds +
                                activeDelay : delay = count * seconds;
                            child.firstElementChild.style.transitionDelay =
                                `${delay}s`;
                            count++;
                        }
                    })
                })
            },
        }

        let intervalF = setInterval(slider.nextSlide, interval);
        slider.init();
    </script>
@stop
