@extends("layouts.app")

@section('slot')
<section class="section video" data-section="section5">
    <div class="container">
        <h2 style="margin: 20px 0 40px;color:white;text-align:center;">{{ $data['title'] ?? '' }}</h2>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
          <article class="content">
              <h4>The TOEIC Listening and Reading Test</h4>
              <hr>
              <h5>What’s in the video?</h5>
              <ul>
                  <li>Content and format of TOEIC Listening and Reading test</li>
                  <li>How to understand the TOEIC score</li>
                  <li>General tips for the test</li>
              </ul>

              <h5>Content and format</h5>
              <p><b>How long does the TOEIC last?</b></p>
              <ul>
                  <li>Listening = 45 mins</li>
                  <li>Reading = 1 hour and 15 mins</li>
              </ul>

              <img src="/assets/images/toeic_1.png" width="100%"/>

              <h5>Understanding TOEIC Score</h5>
              <hr>
              <img src="/assets/images/toeic_score.png" width="100%"/>
              <img src="/assets/images/toeic_score_1.png" width="100%"/>
              <p>If you get :</p>
              <br>
              <p>Listening = 70/100 -> 380 (converted score)</p>
              <br>
              <p>Reading = 75/100 -> 365 (converted score)</p>
              <br>
              <p>TOEIC score = 745</p>

              <h5>Procedure on the Test Day</h5>
              <img src="/assets/images/toeic_procedure.png" width="100%"/>
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
      let container = $('#inpcontainer'); //container dari semua inputan
    let tambah = $('#tambah'); //tombol tambah inputan
    let index = 2; //increment name input
    function tambahInput(type, name) {
      return name + "<input class='m-2 p-1' type='" + type + "' name='" + name + index + "'/><br>";
    } //fungsi untuk nambah input, tinggal modifikasi sesuai style sama kebutuhan

    tambah.click(function() {
      container.append(tambahInput('text', 'Name'))
      container.append(tambahInput('text', 'Nim'))
      index++;
    }) //nambahin listener ke tombol tambah
  </script>
@stop
