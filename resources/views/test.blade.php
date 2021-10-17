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

                                                    <td><b><a href="{{ url("/test/toefl/$index") }}">{{ $index }}
                                                    </a>
                                                    </b></td>
                                            @endif

                                            @endfor
                                        </tr>
                                    @endfor

                                </tbody>
                              </table>
                        </div>
                        <div class="col-md-9">
                            <div class="card quest">
                                <div class="card-header" style="font-weight: bold">
                                  {{ $quest->kategori??''}}
                                </div>
                                <div class="card-body">
                                  <h5 class="card-title">{{ $quest->title??'' }}</h5>
                                  <p class="card-text" style="text-align: justify">{{ $quest->teks??"" }}</p>
                                    <div class="ans">
                                        @foreach ($quest->opsi as $opsi)
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                              <input class="form-check-input mt-0" type="radio" value="" id="{{ $opsi }}" aria-label="Checkbox for answer" name="answer">
                                            </div>
                                            <label for="{{ $opsi }}">
                                                {{ $opsi }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                  <div class="row text-center">
                                      <div class="col-6">
                                        <a href="{{ $id>1?url("/test/toefl/".($id-1)):url("/test/toefl/$id") }}" class="btn">Sebelumnya</a>
                                      </div>
                                      <div class="col-6">
                                        <a href="{{ $id<$num?url("/test/toefl/".($id+1)):url("/test/toefl/listening/1") }}" class="btn">{{ $id<$num?'Selanjutnya':'Next Section' }}</a>
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
@stop
