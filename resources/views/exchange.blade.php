@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/exchange.css') }}" />
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

                    <hr>
                    <main class="main-content">
                        <section class="slideshow">
                            <div class="slideshow-inner">
                                <div class="slides">

                                    @foreach ($slides as $ind => $slide)

                                        <div
                                            class="slide
                                @if ($ind == 0)
                                is-active
                                @endif">
                                            <div class="slide-content">
                                                <div class="caption">
                                                    <div class="text">
                                                        <p>{{ $slide['deskripsi'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="image-container">
                                                <img src="{{ Storage::url($slide['file']) }}" alt=""
                                                    class="image" />
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="pagination">

                                    <div class="item is-active">
                                        <span class="icon">1</span>
                                    </div>
                                    @for ($i = 1; $i < $slides->count(); $i++)

                                        <div class="item">
                                            <span class="icon">{{ $i + 1 }}</span>
                                        </div>
                                    @endfor
                                </div>
                                <div class="arrows">
                                    <div class="arrow prev">
                                        <span class="svg svg-arrow-left">
                                            <svg version="1.1" id="svg4-Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px"
                                                height="26px" viewBox="0 0 14 26" enable-background="new 0 0 14 26"
                                                xml:space="preserve">
                                                <path
                                                    d="M13,26c-0.256,0-0.512-0.098-0.707-0.293l-12-12c-0.391-0.391-0.391-1.023,0-1.414l12-12c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414L2.414,13l11.293,11.293c0.391,0.391,0.391,1.023,0,1.414C13.512,25.902,13.256,26,13,26z" />
                                            </svg>
                                            <span class="alt sr-only"></span>
                                        </span>
                                    </div>
                                    <div class="arrow next">
                                        <span class="svg svg-arrow-right">
                                            <svg version="1.1" id="svg5-Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px"
                                                height="26px" viewBox="0 0 14 26" enable-background="new 0 0 14 26"
                                                xml:space="preserve">
                                                <path
                                                    d="M1,0c0.256,0,0.512,0.098,0.707,0.293l12,12c0.391,0.391,0.391,1.023,0,1.414l-12,12c-0.391,0.391-1.023,0.391-1.414,0s-0.391-1.023,0-1.414L11.586,13L0.293,1.707c-0.391-0.391-0.391-1.023,0-1.414C0.488,0.098,0.744,0,1,0z" />
                                            </svg>
                                            <span class="alt sr-only"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </main>
                    <hr>
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
                                {{ $error . ', ' }}
                            @endforeach
                        </div>
                    @endif
                    <hr>
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
                                            <li role="presentation" class="side
                                            @if ($section === 'dalam-negeri')
                                                active
                                            @endif
                                            ">
                                                <a aria-controls="home" role="tab" data-toggle="tab">Kampus Dalam Negeri</a>
                                            </li>
                                            <li class="side
                                            @if ($section === 'luar-negeri')
                                            active
                                            @endif
                                            " role="presentation">
                                                <a aria-controls="profile" role="tab" data-toggle="tab">Kampus Luar
                                                    Negeri</a>
                                            </li>
                                            <li class="side
                                            @if ($section === 'riwayat')
                                            active
                                            @endif
                                            " role="presentation">
                                                <a aria-controls="typeset" role="tab" data-toggle="tab">Riwayat</a>
                                            </li>
                                            @auth
                                                <li class="side
                                                @if ($section === 'tanya')
                                                active
                                                @endif
                                                " role="presentation">
                                                    <a aria-controls="typeset" role="tab" data-toggle="tab">Tanya Admin</a>
                                                </li>
                                            @endauth
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
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


        var slideshowDuration = 4000;
        var slideshow = $('.main-content .slideshow');

        function slideshowSwitch(slideshow, index, auto) {
            if (slideshow.data('wait')) return;

            var slides = slideshow.find('.slide');
            var pages = slideshow.find('.pagination');
            var activeSlide = slides.filter('.is-active');
            var activeSlideImage = activeSlide.find('.image-container');
            var newSlide = slides.eq(index);
            var newSlideImage = newSlide.find('.image-container');
            var newSlideContent = newSlide.find('.slide-content');
            var newSlideElements = newSlide.find('.caption > *');
            if (newSlide.is(activeSlide)) return;

            newSlide.addClass('is-new');
            var timeout = slideshow.data('timeout');
            clearTimeout(timeout);
            slideshow.data('wait', true);
            var transition = slideshow.attr('data-transition');
            if (transition == 'fade') {
                newSlide.css({
                    display: 'block',
                    zIndex: 2
                });
                newSlideImage.css({
                    opacity: 0
                });

                TweenMax.to(newSlideImage, 1, {
                    alpha: 1,
                    onComplete: function() {
                        newSlide.addClass('is-active').removeClass('is-new');
                        activeSlide.removeClass('is-active');
                        newSlide.css({
                            display: '',
                            zIndex: ''
                        });
                        newSlideImage.css({
                            opacity: ''
                        });
                        slideshow.find('.pagination').trigger('check');
                        slideshow.data('wait', false);
                        if (auto) {
                            timeout = setTimeout(function() {
                                slideshowNext(slideshow, false, true);
                            }, slideshowDuration);
                            slideshow.data('timeout', timeout);
                        }
                    }
                });
            } else {
                if (newSlide.index() > activeSlide.index()) {
                    var newSlideRight = 0;
                    var newSlideLeft = 'auto';
                    var newSlideImageRight = -slideshow.width() / 8;
                    var newSlideImageLeft = 'auto';
                    var newSlideImageToRight = 0;
                    var newSlideImageToLeft = 'auto';
                    var newSlideContentLeft = 'auto';
                    var newSlideContentRight = 0;
                    var activeSlideImageLeft = -slideshow.width() / 4;
                } else {
                    var newSlideRight = '';
                    var newSlideLeft = 0;
                    var newSlideImageRight = 'auto';
                    var newSlideImageLeft = -slideshow.width() / 8;
                    var newSlideImageToRight = '';
                    var newSlideImageToLeft = 0;
                    var newSlideContentLeft = 0;
                    var newSlideContentRight = 'auto';
                    var activeSlideImageLeft = slideshow.width() / 4;
                }

                newSlide.css({
                    display: 'block',
                    width: 0,
                    right: newSlideRight,
                    left: newSlideLeft,
                    zIndex: 2
                });

                newSlideImage.css({
                    width: slideshow.width(),
                    right: newSlideImageRight,
                    left: newSlideImageLeft
                });

                newSlideContent.css({
                    width: slideshow.width(),
                    left: newSlideContentLeft,
                    right: newSlideContentRight
                });

                activeSlideImage.css({
                    left: 0
                });

                TweenMax.set(newSlideElements, {
                    y: 20,
                    force3D: true
                });
                TweenMax.to(activeSlideImage, 1, {
                    left: activeSlideImageLeft,
                    ease: Power3.easeInOut
                });

                TweenMax.to(newSlide, 1, {
                    width: slideshow.width(),
                    ease: Power3.easeInOut
                });

                TweenMax.to(newSlideImage, 1, {
                    right: newSlideImageToRight,
                    left: newSlideImageToLeft,
                    ease: Power3.easeInOut
                });

                TweenMax.staggerFromTo(newSlideElements, 0.8, {
                    alpha: 0,
                    y: 60
                }, {
                    alpha: 1,
                    y: 0,
                    ease: Power3.easeOut,
                    force3D: true,
                    delay: 0.6
                }, 0.1, function() {
                    newSlide.addClass('is-active').removeClass('is-new');
                    activeSlide.removeClass('is-active');
                    newSlide.css({
                        display: '',
                        width: '',
                        left: '',
                        zIndex: ''
                    });

                    newSlideImage.css({
                        width: '',
                        right: '',
                        left: ''
                    });

                    newSlideContent.css({
                        width: '',
                        left: ''
                    });

                    newSlideElements.css({
                        opacity: '',
                        transform: ''
                    });

                    activeSlideImage.css({
                        left: ''
                    });

                    slideshow.find('.pagination').trigger('check');
                    slideshow.data('wait', false);
                    if (auto) {
                        timeout = setTimeout(function() {
                            slideshowNext(slideshow, false, true);
                        }, slideshowDuration);
                        slideshow.data('timeout', timeout);
                    }
                });
            }
        }

        function slideshowNext(slideshow, previous, auto) {
            var slides = slideshow.find('.slide');
            var activeSlide = slides.filter('.is-active');
            var newSlide = null;
            if (previous) {
                newSlide = activeSlide.prev('.slide');
                if (newSlide.length === 0) {
                    newSlide = slides.last();
                }
            } else {
                newSlide = activeSlide.next('.slide');
                if (newSlide.length == 0)
                    newSlide = slides.filter('.slide').first();
            }

            slideshowSwitch(slideshow, newSlide.index(), auto);
        }

        function homeSlideshowParallax() {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > windowHeight) return;
            var inner = slideshow.find('.slideshow-inner');
            var newHeight = windowHeight - (scrollTop / 2);
            var newTop = scrollTop * 0.8;

            inner.css({
                transform: 'translateY(' + newTop + 'px)',
                height: newHeight
            });
        }

        $(document).ready(function() {
            $('.slide').addClass('is-loaded');

            $('.slideshow .arrows .arrow').on('click', function() {
                slideshowNext($(this).closest('.slideshow'), $(this).hasClass('prev'));
            });

            $('.slideshow .pagination .item').on('click', function() {
                slideshowSwitch($(this).closest('.slideshow'), $(this).index());
            });

            $('.slideshow .pagination').on('check', function() {
                var slideshow = $(this).closest('.slideshow');
                var pages = $(this).find('.item');
                var index = slideshow.find('.slides .is-active').index();
                pages.removeClass('is-active');
                pages.eq(index).addClass('is-active');
            });

            /* Lazyloading
            $('.slideshow').each(function(){
              var slideshow=$(this);
              var images=slideshow.find('.image').not('.is-loaded');
              images.on('loaded',function(){
                var image=$(this);
                var slide=image.closest('.slide');
                slide.addClass('is-loaded');
              });
            */

            var timeout = setTimeout(function() {
                slideshowNext(slideshow, false, true);
            }, slideshowDuration);

            slideshow.data('timeout', timeout);
        });

        if ($('.main-content .slideshow').length > 1) {
            $(window).on('scroll', homeSlideshowParallax);
        }
    </script>
@stop
