@extends('layouts.app')

@section('slot')
<section class="section video" data-section="section5">
    <div class="container anot">
        <h2 style="margin: 20px 0 40px;color:white;text-align:center;">{{ $data['title'] ?? '' }}</h2>

        @if($data->file)
            <div class="col-md-12">
                <div class="section-heading">
                    <a href="{{ asset($data->file) }}">
                    <h2>Download Materi</h2>
                    </a>
                </div>
            </div>
        @endif

      <div class="row align-items-start">
        <div class="col-lg-4">
            <div class="left-content">
                <div class="col-md-12">
                    <div class="container">
                        <a href="{{ url('/inkubasi') }}">
                        <div class="back">
                            <img src="{{ asset('assets/images/left-chevron.png') }}" alt="">
                            Kembali
                        </div>
                        </a>
                        <div class="list-group" id="list-tab" role="tablist">
                            @for ($ind = 0; $ind < sizeof($ltitle); $ind++)
                                @if ($target-1 === $ind)
                                    <a class="list-group-item list-group-item-action active materi" data-toggle="list" id="{{ $ind }}"
                                    href="{{ url("/$type/$materi/".($ind+1)) }}" role="tab" aria-controls="home">{{ $ltitle[$ind]['title'] }}</a>
                                @else
                                    <a class="list-group-item list-group-item-action materi"  data-toggle="list" id="{{ $ind }}"
                                    href="{{ url("/$type/$materi/".($ind+1)) }}" role="tab" aria-controls="home">{{ $ltitle[$ind]['title'] }}</a>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
          <article class="content">
            @php
                echo($data->teks ?? "")
            @endphp
          </article>
        </div>
      </div>
    </div>
  </section>
  <style>
    .back{
        margin-bottom: 20px;
        margin-left: 10px;
        background-color: rgba(240, 240, 240, 0.205);
        border-radius: 30px;
        padding-left: 10px;
        cursor: pointer;
        transition: all 0.5s;
    }
    .back img{
        transition: all 0.5s;
        margin-right: 10px;
        width: 35px;
    }
    .back:hover{
        font-size: 13pt;
    }
    .back:hover img{
        transform: translateX(-10px);
    }
    .content{
        font-size: 11pt;
    }
    .content p{
        font-size: 11pt;
        display: inline-block;
        margin: 10px 0;
    }
    .content ul li{
        list-style-type:square;
        margin: 0 20px;
    }
    .content h4{
        margin-top: 80px;
    }
    .content h4:first-child{
        margin-top: 0;
    }
    hr{
        color: white;
        border: 1px solid white;
    }
    .content h5{
        margin-top: 40px;
    }
    .content ol{
        list-style-type:upper-alpha;
    }
    .content img{
        margin:30px 0;
    }
  </style>
@stop
@section('script')
<script>
    $('.materi').on('click',function(){
        window.location = (this.attributes[3].value);
    })
</script>
@stop
