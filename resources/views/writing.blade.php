@extends('layouts.app')

@section('slot')
<section class="section why-us" data-section="section2" style="margin-top: 65px;padding-top:25px;">
    <div class="container">
        <div class="row">

            <div class="col-md-12 anot">
            <div class="section-heading">
                <h3 style="color: white">Test {{ $type??'TOEFL' }}</h3>
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
                                   Writing
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                    </h5>
                                    <p class="card-text" style="text-align: justify">

                                    </p>
                                    <div class="ans">

                                    </div>
                                  <div class="row text-center">
                                      <div class="col-6">
                                        <form method="POST" action='{{ url("/submit/$history_id") }}'>
                                            @csrf
                                            <input id="send" type="submit" class="btn d-none"/>

                                            <a id="submit" class="btn" >{{ "Submit" }}</a>
                                        </form>
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

    $('#submit').click(function(el){
        $('#send')[0].click()
    })
</script>
@stop
