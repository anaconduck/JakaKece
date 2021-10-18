@extends('layouts.app')

@section('slot')
<section class="section why-us" data-section="section2" style="margin-top: 65px;padding-top:25px;">
    <div class="container">
        <div class="row">

            <div class="col-md-12 anot">
            <div class="section-heading">
                <h3 style="color: white">Latihan {{ $type??'TOEFL' }} - {{ $kategori }}</h3>
            </div>
            </div>
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 table-responsive">
                            <div class="counter" id="counter">

                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card quest">
                                <div class="card-header" style="font-weight: bold">
                                    <img src="{{ asset("assets/images/play-button.png") }}" alt="play" width="40px" class="mr-4 play" onclick="play(this)">Play Pre-Test Audio
                                </div>
                                <div class="card-body">
                                  <h5 class="card-title"></h5>
                                  <p class="card-text" style="text-align: center; font-weight:bold;">SECTION 1
                                    LISTENING COMPREHENSION </p>
                                    <p style="text-align:center;">
                                        Time-approximately 35 minutes<br>
(including the reading of the directions for each part)
                                    </p>
                                    <div class="ans" style="text-align: justify">
                                        <p>
                                            In this section of the test, you will have an opportunity to demonstrate your ability to understand conversations and talks in English. There are three parts to this section. Answer all the questions on . the basis of what is stated or implied by the speakers you hear. Do not take notes or write in your test book at any time. Do not turn the pages until you are told to do so.
                                        </p>
                                        <p style="text-align: center; font-weight:bold;"> Part A</p>
                                        <p>Directions: In Part A you will hear short conversations between two people. After each conversation, you will hear a question about the conversation. The conversations and questions will not be repeated. After you hear a question, read the four possible answers in your test book and choose the best answer. Then, on your answer sheet, find the number of the question and fill in the space that corresponds to the letter of the answer you have chosen.</p>
                                        <p>Listen to an example.</p>
                                        <p>On the recording, you hear:<p>
                                        <p>(man) That exam was just awful.</p>
                                        <p>(woman) Oh, it could have been worse.</p>
                                        <p>(narrator) What does the woman mean?</p>
                                        <p>In your test book, you read:</p>
                                        <p>(A)  The exam was really awful.</p>
                                        <p>(B)  It was the worst exam she had ever seen.</p>
                                        <p>(C)  It couldn't have been more difficult.</p>
                                        <p>(D)  It wasn't that hard.</p>
                                        <p>You learn from the conversation that the man thought the exam was very difficult and that the
                                            woman disagreed with the man. The best answer to the question, "What does the woman mean?" is</p>
                                        <p>(D), "It wasn't that hard." Therefore, the correct choice is (D)</p>
                                        <div id="play"></div>
                                        <audio controls>
                                            <source src="{{ asset("storage/listening/PRE_TEST_TOEFL_1.mp3") }}" type="audio/mpeg">
                                        </audio>
                                        <audio controls >
                                            <source src="{{ asset("storage/listening/PRE_TEST_TOEFL_2.mp3") }}" type="audio/mpeg">
                                        </audio>
                                    </div>
                                </div>
                            </div>
                            <!-- Button trigger modal -->
                            <div class="center" style="text-align: center">
                                <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#next">
                                    Start Listening Section
                                </button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="next" tabindex="-1" aria-labelledby="next" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Melanjutkan Sesi Listening</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    Apakah anda yakin ingin melanjutkan sesi Listening?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="{{ url('/latihan/toefl/listening/1') }}">
                                    <button type="button" class="btn btn-primary">Start</button>
                                    </a>
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
  <style>
      .play{
          cursor: pointer;
          opacity: 0.8
      }
      .play:hover{
          opacity: 1;
      }
      audio{
          display: none;
      }
      .counter{
          background: rgb(235, 235, 235);
          width: 100%;
          height: 50px;
          margin-bottom: 10px;
          border-radius: 5px;
          text-align: center;
          padding-top: 10px;
          font-weight: bold;
          font-size: 11pt;
      }
  </style>
@stop
@section('script')
    <script>
        const audio = document.getElementsByTagName('audio');
        audio[0].notplay = audio[1].notplay = true;
        audio[0].onended = function (){
            audio[0].finish = true;
            audio[1].notplay = false;
            audio[1].play()
        }
        audio[1].onended = function (){
            audio[1].finish = true;
        }
        const src = [
            "{{ asset('assets/images/play-button.png') }}",
            "{{ asset('assets/images/pause.png') }}"
        ]
        function play(el){
            switch(el.src){
                case src[0]:{
                    el.src= src[1]
                    break
                }
                case src[1]:{
                    el.src = src[0]
                    break
                }
            }
            if(! audio[0].finish){
                if(audio[0].notplay){
                    audio[0].play()
                    audio[0].notplay = false
                }else{
                    audio[0].pause()
                    audio[0].notplay = true;
                }
            }else if(! audio[1].finish){
                if(audio[1].notplay){
                    audio[1].play()
                    audio[1].notplay = false
                }else{
                    audio[1].pause()
                    audio[1].notplay = true;
                }
            }

        }
        let time = {{ $testTime }};
        let counter = $('#counter');
        var countdown = setInterval(function(){
        time-=1
        var minutes = Math.floor(time/60);
        var seconds = time%60;
        counter[0].innerHTML = minutes + " minutes : "+seconds + " seconds";
        if(time <= 0){
            clearInterval(countdown);
            counter[0].innerHTML = "TIME'S UP!"
            location.reload()
        }
    },1000);
    </script>
@stop

