@extends('layouts.app')

@section('slot')
    <section class="section why-us" data-section="section2" style="margin-top: 65px;padding-top:25px;">
    <div class="container">
        <div class="row">

            <div class="col-md-12 anot">
            <div class="section-heading">
                <h3 style="color: white">Test {{ $type??'TOEFL' }} - {{ $kategori }}</h3>
            </div>
            </div>
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 table-responsive">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="counter" id="counter">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-light table-bordered border-dark num" style="text-align: center">
                                        <thead>
                                          <tr>
                                            <th scope="col" colspan="4">Number</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @for ($indexRow=0; $indexRow <ceil($num/4);$indexRow++)
                                                <tr>
                                                    @for ($index = $indexRow*4+1; $index <= min($indexRow*4+4,$num);$index++)
                                                    @if ($index == $id)
                                                        <td class="now"><b>{{ $index }}
                                                    @else
                                                            @if($request->session()->has("jawaban.$type/$kategori/$index"))
                                                            <td class="num_d answered"><b><a href="{{ url("/latihan/$type/$kategori/$index") }}" class="num_s">{{ $index }}
                                                            </a>
                                                            @else
                                                            <td class="num_d "><b><a href="{{ url("/latihan/$type/$kategori/$index") }}" class="num_s">{{ $index }}
                                                            @endif
                                                    @endif
                                                    </b></td>
                                                    @endfor
                                                </tr>
                                            @endfor

                                        </tbody>
                                      </table>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card quest">
                                <div class="card-header" style="font-weight: bold">
                                    Listening-{{ $id }}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                    </h5>
                                    <p class="card-text" style="text-align: justify">
                                        <audio controls style="width: 100%">
                                            <source src="{{ asset("storage/listening/$quest->teks.mp3") }}" type="audio/mpeg">
                                        </audio>
                                    </p>
                                    <div class="ans">
                                        @foreach ($quest->opsi as $pilihan)
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                                @if(session("jawaban.$type/$kategori/$id")== $pilihan)
                                                <input class="form-check-input mt-0" type="radio" value="{{ $pilihan }}" id="{{ $pilihan }}" aria-label="Checkbox for answer" name="answer" checked>
                                                @else
                                                <input class="form-check-input mt-0" type="radio" value="{{ $pilihan }}" id="{{ $pilihan }}" aria-label="Checkbox for answer" name="answer">
                                                @endif
                                            </div>
                                            <label for="{{ $pilihan }}">
                                                {{ $pilihan }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                  <div class="row text-center">
                                      <div class="col-6">
                                        <a href="{{ $id>1?url("/latihan/toefl/listening/".($id-1)):url("/latihan/toefl/listening/$id") }}" class="btn">Prev</a>
                                      </div>
                                      <div class="col-6">
                                        <a href="{{ $id<$num?url("/latihan/toefl/listening/".($id+1)):url("/latihan/toefl/writing/test  ") }}" class="btn">{{ $id<$num?'Next':'Next Section' }}</a>
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
    <button type="button" class="btn btn-primary d-none" id="liveToastBtn">Show live toast</button>

<div class="t-con" >
    <div class="toast align-items-center" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body" id="msgtoast">
          Jawaban berhasil disimpan.
         </div>
          <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
</div>
  </section>
  <style>
    .num_s{
        display: inline-block;
        width: 100%;
        height: 100%;
    }
    section{
        transform: none;
    }
    .t-con{
        position: fixed;
          left: 20px;
          top: 50%;
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
    var toastTrigger = document.getElementById('liveToastBtn')
    var toastLiveExample = document.getElementById('liveToast')
        toastTrigger.addEventListener('click', function () {
        var toast = new bootstrap.Toast(toastLiveExample)
        toast._config.delay = 1500;
        toast.show()
        })

    const msg = $('#msgtoast');
    $('input').click(function(el){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
            }
        })

        $.ajax({
            url:"{{ url('/latihan') }}/{{ $type }}/{{ $kategori }}/{{ $id }}",
            method:'POST',
            data:{
                jawaban: this.value
            },
            success:function(result){
                toastTrigger.click()
            }
        })
    })

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
