@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@stop

@section('slot')

    <section class="section main-banner" id="top" data-section="section1">
        <iframe src="https://www.youtube.com/embed/LsTMccNX8LA?autoplay=1&mute=1&loop=1&playlist=LsTMccNX8LA" frameborder="0" id="bg-video" allowfullscreen allow="autoplay"></iframe>

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
                        <h2><b>Berita</b></h2>
                    </div>
                </div>
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="assets/images/courses-02.jpg" alt="Course #1">
                        <div class="down-content">
                            <h4>Inkubasi Bahasa</h4>
                            <p>Terdapat 4 course dengan materi dan latihan soal yang lengkap.</p>
                            <div class="text-button-pay">
                                <a href="{{ url('/inkubasi') }}">visit <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="assets/images/courses-05.jpg" alt="Course #2">
                        <div class="down-content">
                            <h4>Jawara Center</h4>
                            <p>Jadilah juara dunia!</p>
                            <div class="text-button-pay">
                                <a href="{{ url('/jawara') }}">visit <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="assets/images/courses-03.jpg" alt="Course #3">
                        <div class="down-content">
                            <h4>Student Exchange</h4>
                            <p>Dapatkan pengalaman belajar di luar.</p>
                            <div class="text-button-pay">
                                <a href="{{ url('/exchange') }}">visit <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="assets/images/courses-04.jpg" alt="Course #4">
                        <div class="down-content">
                            <h4>On the Job Training</h4>
                            <p>Perbanyak pengalaman dengan mengikuti kegiatan magang</p>
                            <div class="text-button-pay">
                                <a href="{{ url('/training') }}">visit <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container ctr"">
                    <div class="  card">
            <figure class="card__thumb">
                <img src="" alt="Picture by Kyle Cottrell" class="card__image">
                <figcaption class="card__caption">
                    <h2 class="card__title">ttess</h2>
                    <p class="card__snippet">deskripsi sinkgat</p>
                    <a href="" class="card__button">Read more</a>
                </figcaption>
            </figure>
        </div>

        <div class="card">
            <figure class="card__thumb">
                <img src="" alt="Picture by Nathan Dumlao" class="card__image">
                <figcaption class="card__caption">
                    <h2 class="card__title">ttess</h2>
                    <p class="card__snippet">deskripsi sinkgat</p>
                    <a href="" class="card__button">Read more</a>
                </figcaption>
            </figure>
        </div>

        <div class="card">
            <figure class="card__thumb">
                <img src="" alt="Picture by Daniel Lincoln" class="card__image">
                <figcaption class="card__caption">
                    <h2 class="card__title">ttess</h2>
                    <p class="card__snippet">deskripsi sinkgat</p>
                    <a href="" class="card__button">Read more</a>
                </figcaption>
            </figure>
        </div>

        <div class="card">
            <figure class="card__thumb">
                <img src="" alt="Picture by Daniel Lincoln" class="card__image">
                <figcaption class="card__caption">
                    <h2 class="card__title">ttess</h2>
                    <p class="card__snippet">deskripsi sinkgat</p>
                    <a href="" class="card__button">Read more</a>
                </figcaption>
            </figure>
        </div>
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
                        <h4>Tentang <em>Aplikasi</em></h4>
                        <div>
                            <p style="font-weight: bold;font-size: 15px; text-align: justify" color="black">- &nbspAplikasi
                                Sistem Rumah Jawara Kampus Merdeka EKP Innovation Center (Jaka
                                Kece) dibuat untuk membantu Fakultas Ekonomi Universitas Negeri Malang dalam menyediakan
                                layanan
                                berbasis teknologi.
                                <br><br>- &nbspInovasi Layanan ini diterapkan di jurusan ekonomi pembangunan dengan tujuan
                                memudahkan akademisi (tenaga pendidik dan mahasiswa) dalam mendapatkan informasi terkait
                                dengan
                                pendidikan, kegiatan akademik, kegiatan kemahasiswaan, magang mahasiswa, dan pertukaran
                                mahasiswa.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
    </section>
@stop
@section('script')
    <script>
        // Master DOManipulator v2 ------------------------------------------------------------
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
            nextSlide: () => { // Increment current slide and add active class
                slider.reset();
                if (current === items.length - 1) current = -1; // Check if current slide is last in array
                current++;
                controls[current].classList.add('active');
                items[current].classList.add('active');
                slider.transitionDelay(headerItems);
                slider.transitionDelay(descriptionItems);
            },
            clickedControl: (e) => { // Add active class to clicked control and corresponding slide
                slider.reset();
                clearInterval(intervalF);

                const control = e.target,
                    dataIndex = Number(control.dataset.index);

                control.classList.add('active');
                items.forEach((item, index) => {
                    if (index === dataIndex) { // Add active class to corresponding slide
                        item.classList.add('active');
                    }
                })
                current = dataIndex; // Update current slide
                slider.transitionDelay(headerItems);
                slider.transitionDelay(descriptionItems);
                intervalF = setInterval(slider.nextSlide, interval); // Fire that bad boi back up
            },
            reset: () => { // Remove active classes
                items.forEach(item => item.classList.remove('active'));
                controls.forEach(control => control.classList.remove('active'));
            },
            transitionDelay: (
                items
            ) => { // Set incrementing css transition-delay for .item-header & .item-description, .vertical-part, b elements
                let seconds;

                items.forEach(item => {
                    const children = item.childNodes; // .vertical-part(s)
                    let count = 1,
                        delay;

                    item.classList.value === 'item-header' ? seconds = .015 : seconds = .007;

                    children.forEach(child => { // iterate through .vertical-part(s) and style b element
                        if (child.classList) {
                            item.parentNode.classList.contains('active') ? delay = count * seconds +
                                activeDelay : delay = count * seconds;
                            child.firstElementChild.style.transitionDelay =
                                `${delay}s`; // b element
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
