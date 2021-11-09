@extends('layouts.app')

@section('slot')
<section class="section video" data-section="section5">
    <div class="container anot">
        <h2 style="margin: 20px 0 40px;color:white;text-align:center;">{{ $title }}</h2>
      <div class="row align-items-start">
          <div class="col-sm-3">
            <a href="{{ $back ?? url()->previous()}}">
                <div class="back">
                    <img src="{{ asset('assets/images/left-chevron.png') }}" alt="">
                    Kembali
                </div>
            </a>
          </div>
        <div class="col-sm-9">

            <div class="alert alert-{{ $type??'danger' }}" role="alert">
                <h4 class="alert-heading">{{ $title }}</h4>
                <p>{{ $message[0] ?? '' }}</p>
                <hr>
                <p class="mb-0">{{ $message[1] ?? ''}}</p>
              </div>

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
  </style>

@stop
