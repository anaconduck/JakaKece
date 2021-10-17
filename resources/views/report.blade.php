@extends('layouts.app')

@section('slot')
<section class="section video" data-section="section5">
    <div class="container anot">
        <h2 style="margin: 20px 0 40px;color:white;text-align:center;">Report - Latihan {{ $report->type }}</h2>
      <div class="row align-items-start">
          <div class="col-sm-3">
            <a href="{{ url('/user')}}">
                <div class="back">
                    <img src="{{ asset('assets/images/left-chevron.png') }}" alt="">
                    Kembali
                </div>
            </a>
          </div>
        <div class="col-sm-9">
            <article class="content">
                <h4>Practice Report</h4>
                <hr>
                <dl class="row">
                    <dt class="col-sm-4">Instansi</dt>
                    <dd class="col-sm-8">{{ $user->Instansi??'University' }}</dd>

                    <dt class="col-sm-4">Name</dt>
                    <dd class="col-sm-8">
                      {{ $user->name??'Name participant' }}
                    </dd>

                    <dt class="col-sm-4">DOB</dt>
                    <dd class="col-sm-8">11/02/2000</dd>

                    <dt class="col-sm-4">Sex</dt>
                    <dd class="col-sm-8">M</dd>

                    <dt class="col-sm-4">Degree</dt>
                    <dd class="col-sm-8">S1</dd>

                    <dt class="col-sm-4">Times taken TOEFL</dt>
                    <dd class="col-sm-8">1</dd>

                    <dt class="col-sm-4">Native Country</dt>
                    <dd class="col-sm-8">Indonesia</dd>

                    <dt class="col-sm-4">Native Language</dt>
                    <dd class="col-sm-8">Indonesia</dd>

                    <dt class="col-sm-4">Scaled Scores</dt>
                    <dd class="col-sm-8">
                      <dl class="row">
                        <dt class="col-sm-7">Listening Comprehension</dt>
                        <dd class="col-sm-5">{{ $report->score_listening * 10 }}</dd>
                      </dl>
                      <dl class="row">
                        <dt class="col-sm-7">Structure & Written Expression</dt>
                        <dd class="col-sm-5">{{ $report->score_writing * 10}}</dd>
                      </dl>
                      <dl class="row">
                        <dt class="col-sm-7">Reading Comprehension</dt>
                        <dd class="col-sm-5">{{ $report->score_reading * 10 }}</dd>
                      </dl>
                      <dl class="row">
                        <dt class="col-sm-7">Total Score</dt>
                        <dd class="col-sm-5"> {{ $total }}</dd>
                      </dl>
                    </dd>

                    <dt class="col-sm-4">Test Date</dt>
                    <dd class="col-sm-8">{{ $testDate }}</dd>

                    <dt class="col-sm-4">Note</dt>
                    <dd class="col-sm-8">{{ $report->note?? "###" }}</dd>

                  </dl>
            </article>
        </div>
      </div>
    </div>
  </section>
  <style>
      .content hr{
          border: 1px solid white;
      }
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
  </style>
@stop

@section('script')
<script>

</script>
@stop

