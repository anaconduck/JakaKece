@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/inkubasi.css') }}">
    <style>
        section.why-us{
    position: relative;
}
section.why-us::after{
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
            <div style="max-width: 60%; margin: 0 auto;">
                <section class="carousel" aria-label="Gallery">
                    <ol class="carousel__viewport">
                      <li id="carousel__slide1"
                          tabindex="0"
                          class="carousel__slide">
                        <div class="carousel__snapper">
                          <a href="#carousel__slide4"
                             class="carousel__prev">Go to last slide</a>
                          <a href="#carousel__slide2"
                             class="carousel__next">Go to next slide</a>
                        </div>
                      </li>
                      <li id="carousel__slide2"
                          tabindex="0"
                          class="carousel__slide">
                        <div class="carousel__snapper"></div>
                        <a href="#carousel__slide1"
                           class="carousel__prev">Go to previous slide</a>
                        <a href="#carousel__slide3"
                           class="carousel__next">Go to next slide</a>
                      </li>
                      <li id="carousel__slide3"
                          tabindex="0"
                          class="carousel__slide">
                        <div class="carousel__snapper"></div>
                        <a href="#carousel__slide2"
                           class="carousel__prev">Go to previous slide</a>
                        <a href="#carousel__slide4"
                           class="carousel__next">Go to next slide</a>
                      </li>
                      <li id="carousel__slide4"
                          tabindex="0"
                          class="carousel__slide">
                        <div class="carousel__snapper"></div>
                        <a href="#carousel__slide3"
                           class="carousel__prev">Go to previous slide</a>
                        <a href="#carousel__slide1"
                           class="carousel__next">Go to first slide</a>
                      </li>
                    </ol>
                    <aside class="carousel__navigation">
                      <ol class="carousel__navigation-list">
                        <li class="carousel__navigation-item">
                          <a href="#carousel__slide1"
                             class="carousel__navigation-button">Go to slide 1</a>
                        </li>
                        <li class="carousel__navigation-item">
                          <a href="#carousel__slide2"
                             class="carousel__navigation-button">Go to slide 2</a>
                        </li>
                        <li class="carousel__navigation-item">
                          <a href="#carousel__slide3"
                             class="carousel__navigation-button">Go to slide 3</a>
                        </li>
                        <li class="carousel__navigation-item">
                          <a href="#carousel__slide4"
                             class="carousel__navigation-button">Go to slide 4</a>
                        </li>
                      </ol>
                    </aside>
                </section>

            </div>
            <hr>
            <div class="body-card">
                <div class="cont">
                    <ul class="cards">
                    <li class="card cards__item">
                        <div class="card__frame">
                        <div class="card__picture">
                            <img src="https://image.flaticon.com/icons/svg/1496/1496034.svg" alt="" width="120">
                        </div>
                        <h2 class="card__title">Courses</h2>
                        </div>
                        <div class="card__overlay"></div>
                        <div class="card__content">
                        <h2>Courses</h2>
                        <p>{{ $numSubject }} Materi</p>
                        </div>
                    </li>
                    <li class="card cards__item">
                        <div class="card__frame">
                        <div class="card__picture">
                            <img src="https://image.flaticon.com/icons/svg/1336/1336494.svg" alt="" width="120">
                        </div>
                        <h2 class="card__title">Questions</h2>
                        </div>
                        <div class="card__overlay"></div>
                        <div class="card__content">
                        <h2>Questions</h2>
                        <p>{{ $numQuest ?? 0 }} Questions</p>
                        </div>
                    </li>
                    <li class="card cards__item">
                        <div class="card__frame">
                        <div class="card__picture">
                            <img src="https://image.flaticon.com/icons/svg/478/478543.svg" alt="" width="120">
                        </div>
                        <h2 class="card__title">Exam</h2>
                        </div>
                        <div class="card__overlay"></div>
                        <div class="card__content">
                        <h2>Exam</h2>
                        <p>{{ $numTaker ?? 0 }} people have taken the exam.</p>
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="tabs">

                <input type="radio" id="tab1" name="tab-control" checked>
                <input type="radio" id="tab2" name="tab-control">
                <input type="radio" id="tab3" name="tab-control">
                <input type="radio" id="tab4" name="tab-control">
                <input type="radio" id="tab5" name="tab-control">
                <ul>
                    <li title="Toefl-itp"><label for="tab1" role="button">
                        <svg viewBox="0 0 24 24"><path d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z"/>
                        </svg><br>
                        <span>TOEFL-ITP</span></label>
                    </li>
                    <li title="Toefl-ibt"><label for="tab2" role="button">
                        <svg viewBox="0 0 24 24"><path d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z"/>
                        </svg><br>
                        <span>TOEFL-IBT</span></label>
                    </li>
                    <li title="Toeic"><label for="tab3" role="button">
                        <svg viewBox="0 0 24 24"><path d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z"/>
                        </svg><br><span>TOEIC</span></label>
                    </li>
                    @if($status != 'mahasiswa')
                    <li title="Ielts"><label for="tab4" role="button">
                        <svg viewBox="0 0 24 24"><path d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z"/>
                        </svg><br><span>IELTS</span></label>
                    </li>
                    <li title="Typeset"><label for="tab5" role="button">
                        <svg viewBox="0 0 24 24"><path d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z"/>
                        </svg><br><span>Typeset</span></label>
                    </li>
                    @endif
                </ul>

                <div class="slider"><div class="indicator"></div></div>
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
                                                <a  aria-controls="profile" role="tab" data-toggle="tab">Practice</a>
                                            </li>
                                            <li class="side" role="presentation">
                                                <a  aria-controls="messages" role="tab" data-toggle="tab">Test</a>
                                            </li>
                                            <li class="side" role="presentation">
                                                <a  aria-controls="typeset" role="tab" data-toggle="tab">Typeset</a>
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
                                                            <a href="{{ url('/toefl-itp')."/".$sesi.'/1' }}">
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
                                                                <li>Listening Comprehension (50 questions) (35 minutes)</li>
                                                                <li>Structure & Written Expression (40 questions) (25 minutes)</li>
                                                                <li>Reading Comprehension (50 questions) (55 minutes)</li>
                                                                <li>Total (140 questions) (155 minutes)</li>
                                                            </ol>
                                                        </div>


                                                            <div class="section full-height mdl">
                                                                <input class="modal-btn" type="checkbox" id="modal-btn" name="modal-btn"/>
                                                                <label id="practice_itp" for="modal-btn">Start Practice <i class="fas fa-expand-arrows-alt"></i></label>
                                                                <div class="modal">
                                                                    <div class="modal-wrap">
                                                                    <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg" alt="">
                                                                        <p>Are you sure to start practice?</p>
                                                                        <div class="d-flex justify-content-around">
                                                                            <a id="cancel_practice_itp" type="button" class="cancel btn btn-danger">Cancel</a>
                                                                            <a href="{{ url('/latihan/toefl-itp') }}" type="button" class="btn btn-info">Start</a>
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
                                                                <li>Listening Comprehension (50 questions) (35 minutes)</li>
                                                                <li>Structure & Written Expression (40 questions) (25 minutes)</li>
                                                                <li>Reading Comprehension (50 questions) (55 minutes)</li>
                                                                <li>Total (140 questions) (155 minutes)</li>
                                                            </ol>
                                                        </div>
                                                        <div class="section full-height mdl">
                                                            <input class="modal-btn" type="checkbox" id="2" name="modal-btn"/>
                                                            <label id="test_itp" for="2">Start Test <i class="fas fa-expand-arrows-alt"></i></label>
                                                            <div class="modal">
                                                                <div class="modal-wrap">
                                                                <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg" alt="">
                                                                    <p>Are you sure to start Test?</p>
                                                                    <div class="d-flex justify-content-around">
                                                                        <a id="cancel_test_itp" type="button" class="cancel btn btn-danger">Cancel</a>
                                                                        <a href="{{ url('/test/toefl-itp') }}" type="button" class="btn btn-info">Start</a>
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
                                                <a  aria-controls="profile" role="tab" data-toggle="tab">Practice</a>
                                            </li>
                                            <li class="side2" role="presentation">
                                                <a  aria-controls="messages" role="tab" data-toggle="tab">Test</a>
                                            </li>
                                            <li class="side2" role="presentation">
                                                <a  aria-controls="typeset" role="tab" data-toggle="tab">Typeset</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content tabs">
                                            <div role="tabpanel" class="t2 tab-pane fade active show" id="Section1">
                                                <div class="list_">
                                                    <div class="items">
                                                        <div class="items-head">
                                                            <p>Category</p>
                                                            <hr>
                                                        </div>
                                                        @foreach ($allSesi as $sesi)
                                                            <a href="{{ url('/toefl-ibt')."/".$sesi.'/1' }}">
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
                                                                <li>Listening Comprehension (50 questions) (35 minutes)</li>
                                                                <li>Structure & Written Expression (40 questions) (25 minutes)</li>
                                                                <li>Reading Comprehension (50 questions) (55 minutes)</li>
                                                                <li>Total (140 questions) (155 minutes)</li>
                                                            </ol>
                                                        </div>


                                                            <div class="section full-height mdl">
                                                                <input class="modal-btn" type="checkbox" id="3" name="modal-btn"/>
                                                                <label id="practice_ibt" for="3">Start Practice <i class="fas fa-expand-arrows-alt"></i></label>
                                                                <div class="modal">
                                                                    <div class="modal-wrap">
                                                                    <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg" alt="">
                                                                        <p>Are you sure?</p>
                                                                        <div class="d-flex justify-content-around">
                                                                            <a id="cancel_practice_ibt" type="button" class="btn btn-danger">Cancel</a>
                                                                            <a href="{{ url('/latihan/toefl-ibt') }}" type="button" class="btn btn-info">Start</a>
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
                                                                <li>Listening Comprehension (50 questions) (35 minutes)</li>
                                                                <li>Structure & Written Expression (40 questions) (25 minutes)</li>
                                                                <li>Reading Comprehension (50 questions) (55 minutes)</li>
                                                                <li>Total (140 questions) (155 minutes)</li>
                                                            </ol>
                                                        </div>
                                                        <div class="section full-height mdl">
                                                            <input class="modal-btn" type="checkbox" id="4" name="modal-btn"/>
                                                            <label id="test_ibt" for="4">Start Test <i class="fas fa-expand-arrows-alt"></i></label>
                                                            <div class="modal">
                                                                <div class="modal-wrap">
                                                                <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg" alt="">
                                                                    <p>Are you sure to start Test?</p>
                                                                    <div class="d-flex justify-content-around">
                                                                        <a id="cancel_test_ibt" type="button" class="cancel btn btn-danger">Cancel</a>
                                                                        <a href="{{ url('/test/toefl-ibt') }}" type="button" class="btn btn-info">Start</a>
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
                                                <a  aria-controls="profile" role="tab" data-toggle="tab">Practice</a>
                                            </li>
                                            <li class="side3" role="presentation">
                                                <a  aria-controls="messages" role="tab" data-toggle="tab">Test</a>
                                            </li>
                                            <li class="side3" role="presentation">
                                                <a  aria-controls="typeset" role="tab" data-toggle="tab">Typeset</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content tabs">
                                            <div role="tabpanel" class="t3 tab-pane fade active show" id="Section1">
                                                <div class="list_">
                                                    <div class="items">
                                                        <div class="items-head">
                                                            <p>Category</p>
                                                            <hr>
                                                        </div>
                                                        @foreach ($allSesi as $sesi)
                                                            <a href="{{ url('/toeic')."/".$sesi.'/1' }}">
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
                                                                <li>Listening Comprehension (50 questions) (35 minutes)</li>
                                                                <li>Structure & Written Expression (40 questions) (25 minutes)</li>
                                                                <li>Reading Comprehension (50 questions) (55 minutes)</li>
                                                                <li>Total (140 questions) (155 minutes)</li>
                                                            </ol>
                                                        </div>


                                                            <div class="section full-height mdl">
                                                                <input class="modal-btn" type="checkbox" id="5" name="modal-btn"/>
                                                                <label id="practice_toeic" for="5">Start Practice <i class="fas fa-expand-arrows-alt"></i></label>
                                                                <div class="modal">
                                                                    <div class="modal-wrap">
                                                                    <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg" alt="">
                                                                        <p>Are you sure?</p>
                                                                        <div class="d-flex justify-content-around">
                                                                            <a id="cancel_practice_toeic" type="button" class="btn btn-danger">Cancel</a>
                                                                            <a href="{{ url('/latihan/toeic') }}" type="button" class="btn btn-info">Start</a>
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
                                                                <li>Listening Comprehension (50 questions) (35 minutes)</li>
                                                                <li>Structure & Written Expression (40 questions) (25 minutes)</li>
                                                                <li>Reading Comprehension (50 questions) (55 minutes)</li>
                                                                <li>Total (140 questions) (155 minutes)</li>
                                                            </ol>
                                                        </div>
                                                        <div class="section full-height mdl">
                                                            <input class="modal-btn" type="checkbox" id="6" name="modal-btn"/>
                                                            <label id="test_toeic" for="6">Start Test <i class="fas fa-expand-arrows-alt"></i></label>
                                                            <div class="modal">
                                                                <div class="modal-wrap">
                                                                <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg" alt="">
                                                                    <p>Are you sure to start Test?</p>
                                                                    <div class="d-flex justify-content-around">
                                                                        <a id="cancel_test_toeic" type="button" class="cancel btn btn-danger">Cancel</a>
                                                                        <a href="{{ url('/test/toeic') }}" type="button" class="btn btn-info">Start</a>
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
                    @if($status != 'mahasiswa')
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
                                                <a  aria-controls="profile" role="tab" data-toggle="tab">Practice</a>
                                            </li>
                                            <li class="side4" role="presentation">
                                                <a  aria-controls="messages" role="tab" data-toggle="tab">Test</a>
                                            </li>
                                            <li class="side4" role="presentation">
                                                <a  aria-controls="typeset" role="tab" data-toggle="tab">Typeset</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content tabs">
                                            <div role="tabpanel" class="t4 tab-pane fade active show" id="Section1">
                                                <div class="list_">
                                                    <div class="items">
                                                        <div class="items-head">
                                                            <p>Category</p>
                                                            <hr>
                                                        </div>
                                                        @foreach ($allSesi as $sesi)
                                                            <a href="{{ url('/ielts')."/".$sesi.'/1' }}">
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
                                                                <li>Listening Comprehension (50 questions) (35 minutes)</li>
                                                                <li>Structure & Written Expression (40 questions) (25 minutes)</li>
                                                                <li>Reading Comprehension (50 questions) (55 minutes)</li>
                                                                <li>Total (140 questions) (155 minutes)</li>
                                                            </ol>
                                                        </div>


                                                            <div class="section full-height mdl">
                                                                <input class="modal-btn" type="checkbox" id="7" name="modal-btn"/>
                                                                <label id="practice_ielts" for="7">Start Practice <i class="fas fa-expand-arrows-alt"></i></label>
                                                                <div class="modal">
                                                                    <div class="modal-wrap">
                                                                    <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg" alt="">
                                                                        <p>Are you sure to start practice?</p>
                                                                        <div class="d-flex justify-content-around">
                                                                            <a id="cancel_practice_ielts" type="button" class="btn btn-danger">Cancel</a>
                                                                            <a href="{{ url('/latihan/ielts') }}" type="button" class="btn btn-info">Start</a>
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
                                                                <li>Listening Comprehension (50 questions) (35 minutes)</li>
                                                                <li>Structure & Written Expression (40 questions) (25 minutes)</li>
                                                                <li>Reading Comprehension (50 questions) (55 minutes)</li>
                                                                <li>Total (140 questions) (155 minutes)</li>
                                                            </ol>
                                                        </div>
                                                        <div class="d-flex justify-content-around">
                                                            <a style="
                                                                background-color: rgb(76, 76, 109);
                                                                width: 240px;
                                                                height: 50px;
                                                                line-height: 50px;
                                                                padding:0;
                                                                border:none;
                                                                margin-bottom: 10px;
                                                                color: rgb(255, 225, 148);
                                                                " type="button" class="btn btn-info">Start Test</a>
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
                                                            <p>Gunakan akun gmail berikut untuk login ke typeset</p>
                                                            <p>email: pelatihanbahasa005@gmail.com | paswd: bahasaekp005</p>
                                                            <p>email: pelatihanbahasa010@gmail.com | paswd: bahasaekp010</p>
                                                        </div>
                                                        <div class="section full-height mdl">
                                                            <input class="modal-btn" type="checkbox" id="8" name="modal-btn"/>
                                                            <label id="test_ielts" for="8">Start Test <i class="fas fa-expand-arrows-alt"></i></label>
                                                            <div class="modal">
                                                                <div class="modal-wrap">
                                                                <img src="https://image.freepik.com/free-vector/grades-concept-illustration_114360-5958.jpg" alt="">
                                                                    <p>Are you sure to start Test?</p>
                                                                    <div class="d-flex justify-content-around">
                                                                        <a id="cancel_test_ielts" type="button" class="cancel btn btn-danger">Cancel</a>
                                                                        <a href="{{ url('/test/ielts') }}" type="button" class="btn btn-info">Start</a>
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
                        <h2>Typeset</h2>
                        <div class="container ver">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="vertical-tab" role="tabpanel">

                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active side5">
                                                <a aria-controls="home" role="tab" data-toggle="tab">Typeset</a>
                                            </li>
                                        </ul>

                                        <div role="tabpanel" class="t5 tab-pane"    id="Section4">
                                            <div class="list_">
                                                <div class="items">
                                                    <div class="items-head">
                                                        <p>Typeset</p>
                                                        <hr>
                                                    </div>
                                                    <div class="items-body">
                                                        <p>Gunakan akun gmail berikut untuk login ke typeset</p>
                                                        <p>email: pelatihanbahasa005@gmail.com | paswd: bahasaekp005</p>
                                                        <p>email: pelatihanbahasa010@gmail.com | paswd: bahasaekp010</p>
                                                    </div>
                                                    <div class="d-flex justify-content-around">
                                                        <a href="https://typeset.io/"
                                                            style="
                                                            background-color: rgb(76, 76, 109);
                                                            width: 240px;
                                                            height: 50px;
                                                            line-height: 50px;
                                                            padding:0;
                                                            border:none;
                                                            margin: 20px;
                                                            color: rgb(255, 225, 148);
                                                            " type="button" class="btn btn-info">Open Typeset</a>
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
                </div>
            </div>

        </div>
      </div>
    </div>
</section>
@stop

@section('script')
<script>
    //according to loftblog tut
    let link_materi= $('#linkitp');
    const link = "{{ url('/') }}";
    $('#opsiitp').on('change',function(){
        link_materi.attr('href',link+"/toefl-itp/"+this.value.toLowerCase()+"/1");
    });

    let link_materi_ibt= $('#linkibt');
    $('#opsiibt').on('change',function(){
        link_materi_ibt.attr('href',link+"/toefl-ibt/"+this.value.toLowerCase()+"/1");
    });
    let link_materi_toeic= $('#linktoeic');
    $('#opsitoeic').on('change',function(){
        link_materi_toeic.attr('href',link+"/toeic/"+this.value.toLowerCase()+"/1");
    });

    let link_materi_ielts= $('#linkielts');
    $('#opsiielts').on('change',function(){
        link_materi_ielts.attr('href',link+"/ielts/"+this.value.toLowerCase()+"/1");
    });

    let sidenav = $('.side')
    let tab = $('.t1')
    sidenav.on('click',function(){
        sidenav.removeClass('active')
        tab.removeClass('active show')
        this.classList.toggle('active')
        for(let i = 0; i < sidenav.length; i++){
            if(sidenav[i] == this){
                tab[i].classList.add('active','show')
            }
        }
    })
    let sidenav2 = $('.side2')
    let tab2 = $('.t2')
    sidenav2.on('click',function(){
        sidenav2.removeClass('active')
        tab2.removeClass('active show')
        this.classList.toggle('active')
        for(let i = 0; i < sidenav2.length; i++){
            if(sidenav2[i] == this){
                tab2[i].classList.add('active','show')
            }
        }
    })
    let sidenav3 = $('.side3')
    let tab3 = $('.t3')
    sidenav3.on('click',function(){
        sidenav3.removeClass('active')
        tab3.removeClass('active show')
        this.classList.toggle('active')
        for(let i = 0; i < sidenav3.length; i++){
            if(sidenav3[i] == this){
                tab3[i].classList.add('active','show')
            }
        }
    })
    let sidenav4 = $('.side4')
    let tab4 = $('.t4')
    sidenav4.on('click',function(){
        sidenav4.removeClass('active')
        tab4.removeClass('active show')
        this.classList.toggle('active')
        for(let i = 0; i < sidenav4.length; i++){
            if(sidenav4[i] == this){
                tab4[i].classList.add('active','show')
            }
        }
    })
    $('#cancel_practice_itp').on('click',function(){
        $('#practice_itp').click()
    })
    $('#cancel_test_itp').on('click',function(){
        $('#test_itp').click()
    })
    $('#cancel_practice_ibt').on('click',function(){
        $('#practice_ibt').click()
    })
    $('#cancel_test_ibt').on('click',function(){
        $('#test_ibt').click()
    })
    $('#cancel_practice_toeic').on('click',function(){
        $('#practice_toeic').click()
    })
    $('#cancel_test_toeic').on('click',function(){
        $('#test_toeic').click()
    })
    $('#cancel_practice_ielts').on('click',function(){
        $('#practice_ielts').click()
    })
    $('#cancel_test_ielts').on('click',function(){
        $('#test_ielts').click()
    })
  </script>
@stop
