@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/inkubasi.css') }}">
    <style>
        section.why-us {
            position: relative;
        }

        section.why-us::after {
            content: "";
            background: url("https://image.freepik.com/free-vector/wavy-background-with-copy-space_52683-65230.jpg");
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

        .lp {
            cursor: pointer;
            margin: 10px 0;
            transition: all 0.7s;
        }

        .lp:hover {
            color: #f5a425;
        }

        .desc {
            background-color: rgba(255, 255, 255, 0.397);
            box-shadow: 10px 5px 20px rgba(0, 0, 0, 0.35);
            padding: 40px;
            text-align: justify;
            border-radius: 20px;
        }

        .desc p {
            font-size: 14px;
            font-weight: 500;
            color: #221807
        }

        h1 {
            font-family: 'PT Serif', serif;
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
                <div class="col-md-12 anot">
                    <h1>Inkubasi Bahasa</h1>
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
                    <div class="body-card">
                        <div class="cont">
                            <ul class="cards">
                                <li class="card cards__item">
                                    <div class="card__frame">
                                        <div class="card__picture">
                                            @if (strpos($deskripsi[0]['file'], 'dokumentasi') !== false)
                                                <img src="{{ Storage::url($deskripsi[0]['file']) }}" alt="">
                                            @else
                                                <iframe
                                                    src="https://www.youtube.com/embed/{{ $deskripsi[0]['file'] }}?autoplay=1&controls=0&mute=1&loop=1&playlist={{ $deskripsi[0]['file'] }}"
                                                    frameborder="0" id="bg-video1" allowfullscreen
                                                    allow="autoplay"></iframe>
                                            @endif
                                        </div>
                                        <h2 class="card__title"></h2>
                                    </div>
                                    @if (strpos($deskripsi[0]['file'], 'dokumentasi') !== false)
                                        <a target="_blank" href="{{ Storage::url($deskripsi[0]['file']) }}">
                                        @else
                                            <a href="https://www.youtube.com/v={{ $deskripsi[0]['file'] }}"
                                                target="_blank">
                                    @endif
                                    <div class="card__overlay"></div>
                                    </a>
                                    <div class="card__content">
                                        <h2></h2>
                                        <p>{{ $deskripsi[0]['deskripsi'] ?? '' }}</p>
                                    </div>
                                </li>
                                <li class="card cards__item">
                                    <div class="card__frame">
                                        <div class="card__picture">
                                            @if (strpos($deskripsi[1]['file'], 'dokumentasi') !== false)
                                                <img src="{{ Storage::url($deskripsi[1]['file']) }}" alt="">
                                            @else
                                                <iframe
                                                    src="https://www.youtube.com/embed/{{ $deskripsi[1]['file'] }}?autoplay=1&controls=0&mute=1&loop=1&playlist={{ $deskripsi[1]['file'] }}"
                                                    frameborder="0" id="bg-video1" allowfullscreen
                                                    allow="autoplay"></iframe>
                                            @endif
                                        </div>
                                        <h2 class="card__title"></h2>
                                    </div>
                                    @if (strpos($deskripsi[1]['file'], 'dokumentasi') !== false)
                                        <a target="_blank" href="{{ Storage::url($deskripsi[1]['file']) }}">
                                        @else
                                            <a href="https://www.youtube.com/v={{ $deskripsi[1]['file'] }}"
                                                target="_blank">
                                    @endif
                                    <div class="card__overlay"></div>
                                    </a>
                                    <div class="card__content">
                                        <h2></h2>
                                        <p>{{ $deskripsi[1]['deskripsi'] ?? '' }}</p>
                                    </div>
                                </li>
                                <li class="card cards__item">
                                    <div class="card__frame">
                                        <div class="card__picture">
                                            @if (strpos($deskripsi[2]['file'], 'dokumentasi') !== false)
                                                <img src="{{ Storage::url($deskripsi[2]['file']) }}" alt="">
                                            @else
                                                <iframe
                                                    src="https://www.youtube.com/embed/{{ $deskripsi[2]['file'] }}?autoplay=1&controls=0&mute=1&loop=1&playlist={{ $deskripsi[2]['file'] }}"
                                                    frameborder="0" id="bg-video1" allowfullscreen
                                                    allow="autoplay"></iframe>
                                            @endif
                                        </div>
                                        <h2 class="card__title"></h2>
                                    </div>
                                    @if (strpos($deskripsi[2]['file'], 'dokumentasi') !== false)
                                        <a target="_blank" href="{{ Storage::url($deskripsi[2]['file']) }}">
                                        @else
                                            <a href="https://www.youtube.com/v={{ $deskripsi[2]['file'] }}"
                                                target="_blank">
                                    @endif
                                    <div class="card__overlay"></div>
                                    </a>
                                    <div class="card__content">
                                        <h2></h2>
                                        <p>{{ $deskripsi[2]['deskripsi'] ?? '' }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="tabs">

                        <input type="radio" id="tab1" name="tab-control" @if ($section === 'toefl-itp')
                        checked
                        @endif>
                        <input type="radio" id="tab2" name="tab-control" @if ($section === 'toefl-ibt')
                        checked
                        @endif>
                        <input type="radio" id="tab3" name="tab-control" @if ($section === 'toeic')
                        checked
                        @endif>
                        <input type="radio" id="tab4" name="tab-control" @if ($section === 'ielts')
                        checked
                        @endif>
                        <input type="radio" id="tab5" name="tab-control" @if ($section === 'typeset')
                        checked
                        @endif>
                        <ul>
                            <li title="Toefl-itp"><label for="tab1" role="button">
                                    <svg viewBox="0 0 24 24">
                                        <path
                                            d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z" />
                                    </svg><br>
                                    <span>TOEFL-ITP</span></label>
                            </li>
                            <li title="Toefl-ibt"><label for="tab2" role="button">
                                    <svg viewBox="0 0 24 24">
                                        <path
                                            d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z" />
                                    </svg><br>
                                    <span>TOEFL-IBT</span></label>
                            </li>
                            <li title="Toeic"><label for="tab3" role="button">
                                    <svg viewBox="0 0 24 24">
                                        <path
                                            d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z" />
                                    </svg><br><span>TOEIC</span></label>
                            </li>
                            @if ($status != 'mahasiswa')
                                <li title="Ielts"><label for="tab4" role="button">
                                        <svg viewBox="0 0 24 24">
                                            <path
                                                d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z" />
                                        </svg><br><span>IELTS</span></label>
                                </li>
                                @auth
                                    <li title="Typeset"><label for="tab5" role="button">
                                            <svg viewBox="0 0 24 24">
                                                <path
                                                    d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z" />
                                            </svg><br><span>Typeset</span></label>
                                    </li>
                                @endauth
                            @endif
                        </ul>

                        <div class="slider">
                        </div>
                        <div class="content sec-cont">
                            <section class="">
                                <h2>TOEFL-ITP</h2>
                                <div class="container ver">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="vertical-tab" role="tabpanel">

                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li role="presentation" class="active side">
                                                        <a aria-controls="home" role="tab" data-toggle="tab">Subject</a>
                                                    </li>
                                                    <li class="side" role="presentation">
                                                        <a aria-controls="profile" role="tab" data-toggle="tab">Practice</a>
                                                    </li>
                                                    <li class="side" role="presentation">
                                                        <a aria-controls="messages" role="tab" data-toggle="tab">Test</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content tabs">
                                                    <div role="tabpanel" class="t1 tab-pane fade active show" id="Section1">
                                                        <div class="list_">
                                                            <div class="items">
                                                                <div class="items-head">
                                                                    <p>Category</p>
                                                                    <hr>
                                                                </div>
                                                                @foreach ($allSesi as $sesi)
                                                                    <a
                                                                        href="{{ url('/toefl-itp') . '/' . $sesi . '/1' }}">
                                                                        <div class="items-body">
                                                                            <div class="items-body-content">
                                                                                <span>{{ $sesi }}</span>
                                                                                <i class="fa fa-angle-right"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="t1 tab-pane" id="Section2">
                                                        <div class="list_">
                                                            <div class="items">
                                                                <div class="items-head">
                                                                    <p>Practice</p>
                                                                    <hr>
                                                                </div>
                                                                <div class="items-body">
                                                                    <ol class="att-desc">
                                                                        @foreach (config('app.toefl-itp') as $item)
                                                                            <li class="ti lp"
                                                                                id="latihan/toefl-itp/{{ $item['sesi'] }}/pendek">
                                                                                Pendek - {{ $item['sesi'] }}
                                                                            </li>
                                                                            <li class="ti lp"
                                                                                id="latihan/toefl-itp/{{ $item['sesi'] }}/penuh">
                                                                                Penuh - {{ $item['sesi'] }}
                                                                            </li>
                                                                        @endforeach
                                                                        <li class="ti lp" id="latihan/toefl-itp">
                                                                            Semua sesi
                                                                        </li>
                                                                    </ol>
                                                                </div>


                                                                <div class="section full-height mdl">
                                                                    <input class="modal-btn" type="checkbox"
                                                                        id="modal-btn" name="modal-btn" />
                                                                    <label id="practice_itp" for="modal-btn"
                                                                        class="d-none"></label>
                                                                    <div class="modal">
                                                                        <div class="modal-wrap">
                                                                            <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg"
                                                                                alt="">
                                                                            <p>Are you sure to start practice?</p>
                                                                            <div class="d-flex justify-content-around">
                                                                                <a id="cancel_practice_itp" type="button"
                                                                                    class="cancel btn btn-danger">Cancel</a>
                                                                                <a id="ti1" type="button"
                                                                                    class="btn btn-info">Start</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="t1 tab-pane" id="Section3">
                                                        <div class="list_">
                                                            <div class="items">
                                                                <div class="items-head">
                                                                    <p>Test</p>
                                                                    <hr>
                                                                </div>
                                                                <div class="items-body">
                                                                    <ol class="att-desc">
                                                                        <li>Listening Comprehension (50 questions) (35
                                                                            minutes)</li>
                                                                        <li>Structure & Written Expression (40 questions)
                                                                            (25 minutes)</li>
                                                                        <li>Reading Comprehension (50 questions) (55
                                                                            minutes)</li>
                                                                        <li>Total (140 questions) (155 minutes)</li>
                                                                    </ol>
                                                                </div>
                                                                <div class="section full-height mdl">
                                                                    <input class="modal-btn" type="checkbox" id="2"
                                                                        name="modal-btn" />
                                                                    <label id="test_itp" for="2">Start Test <i
                                                                            class="fas fa-expand-arrows-alt"></i></label>
                                                                    <div class="modal">
                                                                        <div class="modal-wrap">
                                                                            <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg"
                                                                                alt="">
                                                                            <p>Are you sure to start Test?</p>
                                                                            <div class="d-flex justify-content-around">
                                                                                <a id="cancel_test_itp" type="button"
                                                                                    class="cancel btn btn-danger">Cancel</a>
                                                                                <a href="{{ url('/test/toefl-itp') }}"
                                                                                    type="button"
                                                                                    class="btn btn-info">Start</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section>
                                <h2>TOEFL-IBT</h2>
                                <div class="container ver">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="vertical-tab" role="tabpanel">

                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li role="presentation" class="active side2">
                                                        <a aria-controls="home" role="tab" data-toggle="tab">Subject</a>
                                                    </li>
                                                    <li class="side2" role="presentation">
                                                        <a aria-controls="profile" role="tab" data-toggle="tab">Practice</a>
                                                    </li>
                                                    <li class="side2" role="presentation">
                                                        <a aria-controls="messages" role="tab" data-toggle="tab">Test</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content tabs">
                                                    <div role="tabpanel" class="t2 tab-pane fade active show"
                                                        id="Section1">
                                                        <div class="list_">
                                                            <div class="items">
                                                                <div class="items-head">
                                                                    <p>Category</p>
                                                                    <hr>
                                                                </div>
                                                                @foreach ($allSesi as $sesi)
                                                                    <a
                                                                        href="{{ url('/toefl-ibt') . '/' . $sesi . '/1' }}">
                                                                        <div class="items-body">
                                                                            <div class="items-body-content">
                                                                                <span>{{ $sesi }}</span>
                                                                                <i class="fa fa-angle-right"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="t2 tab-pane" id="Section2">
                                                        <div class="list_">
                                                            <div class="items">
                                                                <div class="items-head">
                                                                    <p>Practice</p>
                                                                    <hr>
                                                                </div>
                                                                <div class="items-body">
                                                                    <ol class="att-desc">
                                                                        @foreach (config('app.toefl-ibt') as $item)
                                                                            <li class="tii lp"
                                                                                id="latihan/toefl-ibt/{{ $item['sesi'] }}/pendek">
                                                                                Pendek - {{ $item['sesi'] }}
                                                                            </li>
                                                                            <li class="tii lp"
                                                                                id="latihan/toefl-ibt/{{ $item['sesi'] }}/penuh">
                                                                                Penuh - {{ $item['sesi'] }}
                                                                            </li>
                                                                        @endforeach
                                                                        <li class="tii lp" id="latihan/toefl-ibt">
                                                                            Semua sesi
                                                                        </li>
                                                                    </ol>
                                                                </div>


                                                                <div class="section full-height mdl">
                                                                    <input class="modal-btn" type="checkbox" id="3"
                                                                        name="modal-btn" />
                                                                    <label id="practice_ibt" for="3"
                                                                        class="d-none"><i
                                                                            class="fas fa-expand-arrows-alt"></i></label>
                                                                    <div class="modal">
                                                                        <div class="modal-wrap">
                                                                            <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg"
                                                                                alt="">
                                                                            <p>Are you sure?</p>
                                                                            <div class="d-flex justify-content-around">
                                                                                <a id="cancel_practice_ibt" type="button"
                                                                                    class="btn btn-danger">Cancel</a>
                                                                                <a id="ti2" type="button"
                                                                                    class="btn btn-info">Start</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="t2 tab-pane" id="Section3">
                                                        <div class="list_">
                                                            <div class="items">
                                                                <div class="items-head">
                                                                    <p>Test</p>
                                                                    <hr>
                                                                </div>
                                                                <div class="items-body">
                                                                    <ol class="att-desc">
                                                                        <li>Listening Comprehension (50 questions) (35
                                                                            minutes)</li>
                                                                        <li>Structure & Written Expression (40 questions)
                                                                            (25 minutes)</li>
                                                                        <li>Reading Comprehension (50 questions) (55
                                                                            minutes)</li>
                                                                        <li>Total (140 questions) (155 minutes)</li>
                                                                    </ol>
                                                                </div>
                                                                <div class="section full-height mdl">
                                                                    <input class="modal-btn" type="checkbox" id="4"
                                                                        name="modal-btn" />
                                                                    <label id="test_ibt" for="4">Start Test <i
                                                                            class="fas fa-expand-arrows-alt"></i></label>
                                                                    <div class="modal">
                                                                        <div class="modal-wrap">
                                                                            <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg"
                                                                                alt="">
                                                                            <p>Are you sure to start Test?</p>
                                                                            <div class="d-flex justify-content-around">
                                                                                <a id="cancel_test_ibt" type="button"
                                                                                    class="cancel btn btn-danger">Cancel</a>
                                                                                <a href="{{ url('/test/toefl-ibt') }}"
                                                                                    type="button"
                                                                                    class="btn btn-info">Start</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section>
                                <h2>TOEIC</h2>
                                <div class="container ver">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="vertical-tab" role="tabpanel">

                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li role="presentation" class="active side3">
                                                        <a aria-controls="home" role="tab" data-toggle="tab">Subject</a>
                                                    </li>
                                                    <li class="side3" role="presentation">
                                                        <a aria-controls="profile" role="tab" data-toggle="tab">Practice</a>
                                                    </li>
                                                    <li class="side3" role="presentation">
                                                        <a aria-controls="messages" role="tab" data-toggle="tab">Test</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content tabs">
                                                    <div role="tabpanel" class="t3 tab-pane fade active show"
                                                        id="Section1">
                                                        <div class="list_">
                                                            <div class="items">
                                                                <div class="items-head">
                                                                    <p>Category</p>
                                                                    <hr>
                                                                </div>
                                                                @foreach ($allSesi as $sesi)
                                                                    <a href="{{ url('/toeic') . '/' . $sesi . '/1' }}">
                                                                        <div class="items-body">
                                                                            <div class="items-body-content">
                                                                                <span>{{ $sesi }}</span>
                                                                                <i class="fa fa-angle-right"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="t3 tab-pane" id="Section2">
                                                        <div class="list_">
                                                            <div class="items">
                                                                <div class="items-head">
                                                                    <p>Practice</p>
                                                                    <hr>
                                                                </div>
                                                                <div class="items-body">
                                                                    <ol class="att-desc">
                                                                        @foreach (config('app.toeic') as $item)
                                                                            <li class="tiii lp"
                                                                                id="latihan/toeic/{{ $item['sesi'] }}/pendek">
                                                                                Pendek - {{ $item['sesi'] }}
                                                                            </li>
                                                                            <li class="tiii lp"
                                                                                id="latihan/toeic/{{ $item['sesi'] }}/penuh">
                                                                                Penuh - {{ $item['sesi'] }}
                                                                            </li>
                                                                        @endforeach
                                                                        <li class="tiii lp" id="latihan/toeic">
                                                                            Semua sesi
                                                                        </li>
                                                                    </ol>
                                                                </div>


                                                                <div class="section full-height mdl">
                                                                    <input class="modal-btn" type="checkbox" id="5"
                                                                        name="modal-btn" />
                                                                    <label id="practice_toeic" for="5"
                                                                        class="d-none"><i
                                                                            class="fas fa-expand-arrows-alt"></i></label>
                                                                    <div class="modal">
                                                                        <div class="modal-wrap">
                                                                            <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg"
                                                                                alt="">
                                                                            <p>Are you sure?</p>
                                                                            <div class="d-flex justify-content-around">
                                                                                <a id="cancel_practice_toeic" type="button"
                                                                                    class="btn btn-danger">Cancel</a>
                                                                                <a id="ti3" type="button"
                                                                                    class="btn btn-info">Start</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="t3 tab-pane" id="Section3">
                                                        <div class="list_">
                                                            <div class="items">
                                                                <div class="items-head">
                                                                    <p>Test</p>
                                                                    <hr>
                                                                </div>
                                                                <div class="items-body">
                                                                    <ol class="att-desc">
                                                                        <li>Listening Comprehension (50 questions) (35
                                                                            minutes)</li>
                                                                        <li>Structure & Written Expression (40 questions)
                                                                            (25 minutes)</li>
                                                                        <li>Reading Comprehension (50 questions) (55
                                                                            minutes)</li>
                                                                        <li>Total (140 questions) (155 minutes)</li>
                                                                    </ol>
                                                                </div>
                                                                <div class="section full-height mdl">
                                                                    <input class="modal-btn" type="checkbox" id="6"
                                                                        name="modal-btn" />
                                                                    <label id="test_toeic" for="6">Start Test <i
                                                                            class="fas fa-expand-arrows-alt"></i></label>
                                                                    <div class="modal">
                                                                        <div class="modal-wrap">
                                                                            <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg"
                                                                                alt="">
                                                                            <p>Are you sure to start Test?</p>
                                                                            <div class="d-flex justify-content-around">
                                                                                <a id="cancel_test_toeic" type="button"
                                                                                    class="cancel btn btn-danger">Cancel</a>
                                                                                <a href="{{ url('/test/toeic') }}"
                                                                                    type="button"
                                                                                    class="btn btn-info">Start</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            @if ($status != 'mahasiswa')
                                <section>
                                    <h2>IELTS</h2>
                                    <div class="container ver">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="vertical-tab" role="tabpanel">

                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li role="presentation" class="active side4">
                                                            <a aria-controls="home" role="tab" data-toggle="tab">Subject</a>
                                                        </li>
                                                        <li class="side4" role="presentation">
                                                            <a aria-controls="profile" role="tab"
                                                                data-toggle="tab">Practice</a>
                                                        </li>
                                                        <li class="side4" role="presentation">
                                                            <a aria-controls="messages" role="tab"
                                                                data-toggle="tab">Test</a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content tabs">
                                                        <div role="tabpanel" class="t4 tab-pane fade active show"
                                                            id="Section1">
                                                            <div class="list_">
                                                                <div class="items">
                                                                    <div class="items-head">
                                                                        <p>Category</p>
                                                                        <hr>
                                                                    </div>
                                                                    @foreach ($allSesi as $sesi)
                                                                        <a
                                                                            href="{{ url('/ielts') . '/' . $sesi . '/1' }}">
                                                                            <div class="items-body">
                                                                                <div class="items-body-content">
                                                                                    <span>{{ $sesi }}</span>
                                                                                    <i class="fa fa-angle-right"></i>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div role="tabpanel" class="t4 tab-pane" id="Section2">
                                                            <div class="list_">
                                                                <div class="items">
                                                                    <div class="items-head">
                                                                        <p>Practice</p>
                                                                        <hr>
                                                                    </div>
                                                                    <div class="items-body">
                                                                        <ol class="att-desc">
                                                                            @foreach (config('app.toeic') as $item)
                                                                                <li class="tiiii lp"
                                                                                    id="latihan/ielts/{{ $item['sesi'] }}/pendek">
                                                                                    Pendek - {{ $item['sesi'] }}
                                                                                </li>
                                                                                <li class="tiiii lp"
                                                                                    id="latihan/ielts/{{ $item['sesi'] }}/penuh">
                                                                                    Penuh - {{ $item['sesi'] }}
                                                                                </li>
                                                                            @endforeach
                                                                            <li class="tiiii lp" id="latihan/toeic">
                                                                                Semua sesi
                                                                            </li>
                                                                        </ol>
                                                                    </div>
                                                                    <div class="section full-height mdl">
                                                                        <input class="modal-btn" type="checkbox"
                                                                            id="7" name="modal-btn" />
                                                                        <label id="practice_ielts" for="7" class="d-none">Start Practice <i
                                                                                class="fas fa-expand-arrows-alt"></i></label>
                                                                        <div class="modal">
                                                                            <div class="modal-wrap">
                                                                                <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg"
                                                                                    alt="">
                                                                                <p>Are you sure to start practice?</p>
                                                                                <div class="d-flex justify-content-around">
                                                                                    <a id="cancel_practice_ielts"
                                                                                        type="button"
                                                                                        class="btn btn-danger">Cancel</a>
                                                                                    <a id="ti4"
                                                                                        type="button"
                                                                                        class="btn btn-info">Start</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div role="tabpanel" class="t4 tab-pane" id="Section3">
                                                            <div class="list_">
                                                                <div class="items">
                                                                    <div class="items-head">
                                                                        <p>Test</p>
                                                                        <hr>
                                                                    </div>
                                                                    <div class="items-body">
                                                                        <ol class="att-desc">
                                                                            <li>Listening Comprehension (50 questions) (35
                                                                                minutes)</li>
                                                                            <li>Structure & Written Expression (40
                                                                                questions) (25 minutes)</li>
                                                                            <li>Reading Comprehension (50 questions) (55
                                                                                minutes)</li>
                                                                            <li>Total (140 questions) (155 minutes)</li>
                                                                        </ol>
                                                                    </div>
                                                                    <div class="section full-height mdl">
                                                                        <input class="modal-btn" type="checkbox" id="8"
                                                                            name="modal-btn" />
                                                                        <label id="test_toeic" for="8">Start Test <i
                                                                                class="fas fa-expand-arrows-alt"></i></label>
                                                                        <div class="modal">
                                                                            <div class="modal-wrap">
                                                                                <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg"
                                                                                    alt="">
                                                                                <p>Are you sure to start Test?</p>
                                                                                <div class="d-flex justify-content-around">
                                                                                    <a id="cancel_test_ielts" type="button"
                                                                                        class="cancel btn btn-danger">Cancel</a>
                                                                                    <a href="{{ url('/test/ielts') }}"
                                                                                        type="button"
                                                                                        class="btn btn-info">Start</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div role="tabpanel" class="t4 tab-pane" id="Section4">
                                                            <div class="list_">
                                                                <div class="items">
                                                                    <div class="items-head">
                                                                        <p>Typeset</p>
                                                                        <hr>
                                                                    </div>
                                                                    <div class="items-body">
                                                                        <p>Gunakan akun gmail berikut untuk login ke typeset
                                                                        </p>
                                                                        <p>email: pelatihanbahasa005@gmail.com | paswd:
                                                                            bahasaekp005</p>
                                                                        <p>email: pelatihanbahasa010@gmail.com | paswd:
                                                                            bahasaekp010</p>
                                                                    </div>
                                                                    <div class="section full-height mdl">
                                                                        <input class="modal-btn" type="checkbox"
                                                                            id="8" name="modal-btn" />
                                                                        <label id="test_ielts" for="8">Start Test <i
                                                                                class="fas fa-expand-arrows-alt"></i></label>
                                                                        <div class="modal">
                                                                            <div class="modal-wrap">
                                                                                <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg"
                                                                                    alt="">
                                                                                <p>Are you sure to start Test?</p>
                                                                                <div class="d-flex justify-content-around">
                                                                                    <a id="cancel_test_ielts" type="button"
                                                                                        class="cancel btn btn-danger">Cancel</a>
                                                                                    <a href="{{ url('/test/ielts') }}"
                                                                                        type="button"
                                                                                        class="btn btn-info">Start</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                @if (auth()->user() and auth()->user()->status !== 'mahasiswa')
                                    <section>
                                        <h2>Typeset</h2>
                                        <div class="container ver">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="vertical-tab" role="tabpanel">

                                                        <div role="tabpanel" class="t5 tab-pane" id="Section4">
                                                            <div class="list_">
                                                                <div class="items">
                                                                    <div class="items-head">
                                                                        <p>Typeset</p>
                                                                        <hr>
                                                                    </div>
                                                                    <div class="items-body">
                                                                        <p>Gunakan akun gmail berikut untuk login ke typeset
                                                                        </p>
                                                                        <p>email: pelatihanbahasa005@gmail.com | paswd:
                                                                            bahasaekp005</p>
                                                                        <p>email: pelatihanbahasa010@gmail.com | paswd:
                                                                            bahasaekp010</p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-around">
                                                                        <a href="https://typeset.io/" style="
                                                                                                background-color: rgb(76, 76, 109);
                                                                                                width: 240px;
                                                                                                height: 50px;
                                                                                                line-height: 50px;
                                                                                                padding:0;
                                                                                                border:none;
                                                                                                margin: 20px;
                                                                                                color: rgb(255, 225, 148);
                                                                                                " type="button"
                                                                            class="btn btn-info">Open
                                                                            Typeset</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                @endif
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@stop

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <script>
        //according to loftblog tut
        let link_materi = $('#linkitp');
        const link = "{{ url('/') }}";
        $('#opsiitp').on('change', function() {
            link_materi.attr('href', link + "/toefl-itp/" + this.value.toLowerCase() + "/1");
        });

        let link_materi_ibt = $('#linkibt');
        $('#opsiibt').on('change', function() {
            link_materi_ibt.attr('href', link + "/toefl-ibt/" + this.value.toLowerCase() + "/1");
        });
        let link_materi_toeic = $('#linktoeic');
        $('#opsitoeic').on('change', function() {
            link_materi_toeic.attr('href', link + "/toeic/" + this.value.toLowerCase() + "/1");
        });

        let link_materi_ielts = $('#linkielts');
        $('#opsiielts').on('change', function() {
            link_materi_ielts.attr('href', link + "/ielts/" + this.value.toLowerCase() + "/1");
        });

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
        let sidenav2 = $('.side2')
        let tab2 = $('.t2')
        sidenav2.on('click', function() {
            sidenav2.removeClass('active')
            tab2.removeClass('active show')
            this.classList.toggle('active')
            for (let i = 0; i < sidenav2.length; i++) {
                if (sidenav2[i] == this) {
                    tab2[i].classList.add('active', 'show')
                }
            }
        })
        let sidenav3 = $('.side3')
        let tab3 = $('.t3')
        sidenav3.on('click', function() {
            sidenav3.removeClass('active')
            tab3.removeClass('active show')
            this.classList.toggle('active')
            for (let i = 0; i < sidenav3.length; i++) {
                if (sidenav3[i] == this) {
                    tab3[i].classList.add('active', 'show')
                }
            }
        })
        let sidenav4 = $('.side4')
        let tab4 = $('.t4')
        sidenav4.on('click', function() {
            sidenav4.removeClass('active')
            tab4.removeClass('active show')
            this.classList.toggle('active')
            for (let i = 0; i < sidenav4.length; i++) {
                if (sidenav4[i] == this) {
                    tab4[i].classList.add('active', 'show')
                }
            }
        })
        let practiceItp = $('#practice_itp')
        $('#cancel_practice_itp').on('click', function() {
            practiceItp.click()
        })
        let testItp = $('#test_itp')
        $('#cancel_test_itp').on('click', function() {
            testItp.click()
        })
        let practiceIbt = $('#practice_ibt')
        $('#cancel_practice_ibt').on('click', function() {
            practiceIbt.click()
        })
        let testIbt = $('#test_ibt')
        $('#cancel_test_ibt').on('click', function() {
            testIbt.click()
        })
        let practiceToeic = $('#practice_toeic')
        $('#cancel_practice_toeic').on('click', function() {
            practiceToeic.click()
        })
        let testToeic = $('#test_toeic')
        $('#cancel_test_toeic').on('click', function() {
            testToeic.click()
        })
        let practiceIelts = $('#practice_ielts')
        $('#cancel_practice_ielts').on('click', function() {
            practiceIelts.click()
        })
        let testIelts = $('#test_ielts')
        $('#cancel_test_ielts').on('click', function() {
            testIelts.click()
        })

        let tujuan = ''

        let ti = $('.ti')
        let url = '{{ url('/') }}'

        ti.on('click', function() {
            tujuan = url + "/" + this.id
            practiceItp.click()
        })
        $('#ti1').on('click', function() {
            window.location = tujuan
        })

        let ti2 = $('.tii')

        ti2.on('click', function() {
            tujuan = url + '/' + this.id
            practiceIBT.click()
        })
        $('#ti2').on('click', function() {
            window.location = tujuan
        })

        let ti3 = $('.tiii')

        ti3.on('click', function() {
            tujuan = url + '/' + this.id
            practiceToeic.click()
        })
        $('#ti3').on('click', function() {
            window.location = tujuan
        })

        let ti4 = $('.tiiii')

        ti4.on('click', function(){
            tujuan = url + '/'+ this.id
            practiceIelts.click()
        })
        $('#ti4').on('click', function(){
            window.location = tujuan
        })

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
