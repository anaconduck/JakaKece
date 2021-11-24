<div>
    <style>
        
    </style>
    <section class="section why-us" data-section="section2">
        <div class="container">
          <div class="row">

            <div class="col-md-12">
              <div class="section-heading">

              </div>
            </div>
            @if($currentMateri->file)
            <div class="col-md-12">
                <div class="section-heading">
                    <a href="{{ asset($currentMateri->file) }}">
                    <h2>Download Materi</h2>
                    </a>
                </div>
            </div>
        @endif
            <div class="col-md-12 anot">
                <h1>Materi {{ strtoupper(config('app.allCourse')[$idCourse]) }}</h1>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <section class="stage">
                            @foreach ($allJudul as $judul)
                                <div wire:click="updateInd('{{ $i++ }}')" id="{{ $judul['judul'] }}" class="div"><p class="p">{{ $judul['judul'] }}</p></div>
                            @endforeach
                        </section>
                    </div>
                    <div class="col-md-8" style="border-left: 5px solid rgba(0, 0, 0, 0.075)">
                        <div class="row title">
                            <h3>{{ $currentMateri['judul'] }}</h3>
                        </div>
                        <div class="content">
                            @php
                                echo($currentMateri->teks);
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </section>


@section('css')
<style>
    body{
        background-image: url('https://assets.codepen.io/1462889/back-page.svg')
    }
    section.why-us{
        min-height: 95vh;
    }
    body{
        background-color: #f5a5250c
    }
    .title{
        margin-top: 30px;
    }
    .content{
        margin: 40px 20px 0;
        padding: 30px;
        background-color: rgba(255, 255, 255, 0.548);
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.315);
    }
    h3{
        color: #865b14;
        width: 100%;
        text-align: center;
        border-bottom: white
    }
.stage{
  width: 90%;
  margin-left: auto;
  margin-right: auto;
}
.stage .p{
  font-size: 20px;
  font-weight: 600;
  text-align: center;
  display: inline-block;
  height: 100%;
  cursor: pointer;
  width: 100%;
  background: #f5a525a4;
  border-radius: 10px;
  font-family: Century Gothic;
  letter-spacing: 2px;
  margin:  0;
  color: #333;
}
.stage .div{
  margin-left: auto;
  margin-right: auto;
  border-radius: 10px;
  width: 200px;
  height: 40px;
  margin-top: 4%;
 transition-duration: 0.5s;

}
.stage .p:hover{
  background: #f5a5251f;
  color: black;
}
.stage .div:nth-child(odd){
  transform: perspective(300px) rotateY(45deg);
  box-shadow: -2px 2px 7px gray;
}
.stage .div:nth-child(even){
  transform: perspective(300px) rotateY(-45deg);
    box-shadow: 2px 2px 7px gray;
}
.stage .div:hover{
  transform: rotateY(0);
  background: white;
  color: black;
  box-shadow: 0px 0px 0px;
  border: 1px solid #f5a525
}
</style>
@stop
</div>
