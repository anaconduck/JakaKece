<div>
    <style>

    </style>
    <section class="section why-us" data-section="section2">
        @if ($currentMateri)
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="section-heading">
                            <h1 style="color: #f5a425;">Materi {{ strtoupper(config('app.allCourse')[$idCourse]) }}
                            </h1>
                        </div>
                    </div>
                    <div class="col-md-12 anot">
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <section class="stage">
                                    @foreach ($allJudul as $judul)
                                        <div wire:click="updateInd('{{ $i++ }}')" id="{{ $judul['judul'] }}"
                                            class="div">
                                            <p class="p">{{ $judul['judul'] }}</p>
                                        </div>
                                    @endforeach
                                </section>
                            </div>
                            <div class="col-md-8" style="border-left: 5px solid rgba(0, 0, 0, 0.075)">
                                <div class="row title">
                                    <h3>{{ $currentMateri['judul'] }}</h3>
                                </div>
                                <div class="content">
                                    @php
                                        echo $currentMateri['teks'];
                                    @endphp
                                </div>
                            </div>

                            @if ($currentMateri['file'])
                                <div class="col-md-12 dwl">
                                    <span><a href="{{ Storage::url($currentMateri['file']) }}"></a></span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="section-heading">

                        </div>
                    </div>
                    <div class="col-md-12 anot">
                        <h1>Materi {{ strtoupper(config('app.allCourse')[$idCourse]) }}</h1>
                        <hr>
                        <div class="row">
                            <div class="col-md-12" style="border-left: 5px solid rgba(0, 0, 0, 0.075)">
                                <h3 style="text-align: center">Belum ada materi untuk kategori {{ config('app.allSesi.'.($sesi-1)) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>


    @section('css')
        <style>
            body {
                background-image: url('https://assets.codepen.io/1462889/back-page.svg')
            }

            section.why-us {
                min-height: 95vh;
            }

            body {
                background-color: #f5a5250c
            }

            .title {
                margin-top: 30px;
            }

            .content {
                margin: 40px 20px 0;
                padding: 30px;
                background-color: rgba(255, 255, 255, 0.548);
                box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.315);
            }

            h3 {
                color: #865b14;
                width: 100%;
                text-align: center;
                border-bottom: white
            }

            .stage {
                width: 90%;
                margin-left: auto;
                margin-right: auto;
            }

            .stage .p {
                font-size: 20px;
                font-weight: 600;
                text-align: center;
                display: inline-block;
                min-height: 60px;
                height: 100%;
                cursor: pointer;
                width: 100%;
                background: #f5a525a4;
                border-radius: 10px;
                font-family: Century Gothic;
                letter-spacing: 2px;
                margin: 0;
                color: #333;
            }

            .stage .div {
                margin-left: auto;
                margin-right: auto;
                border-radius: 10px;
                width: 200px;
                min-height: 60px;
                height: 100%;
                margin-top: 4%;
                transition-duration: 0.5s;

            }

            .stage .p:hover {
                background: #f5a5251f;
                color: black;
            }

            .stage .div:nth-child(odd) {
                transform: perspective(300px) rotateY(45deg);
                box-shadow: -2px 2px 7px gray;
            }

            .stage .div:nth-child(even) {
                transform: perspective(300px) rotateY(-45deg);
                box-shadow: 2px 2px 7px gray;
            }

            .stage .div:hover {
                transform: rotateY(0);
                background: white;
                color: black;
                box-shadow: 0px 0px 0px;
                border: 1px solid #f5a525
            }

            .dwl {
                margin: 30px 0 0 0;
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .dwl span {
                position: relative;
                display: inline-flex;
                width: 180px;
                height: 55px;
                margin: 0 15px;
                perspective: 1000px;
            }

            .dwl span a {
                font-size: 19px;
                letter-spacing: 1px;
                transform-style: preserve-3d;
                transform: translateZ(-25px);
                transition: transform .25s;
                font-family: 'Montserrat', sans-serif;

            }

            .dwl span a:before,
            .dwl span a:after {
                position: absolute;
                content: "Download";
                height: 55px;
                width: 180px;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 5px solid #f5a525;
                box-sizing: border-box;
                border-radius: 5px;
            }

            .dwl span a:before {
                color: #fff;
                background: #f5a525;
                transform: rotateY(0deg) translateZ(25px);
            }

            .dwl span a:after {
                color: #f5a525;
                transform: rotateX(90deg) translateZ(25px);
            }

            .dwl span a:hover {
                transform: translateZ(-25px) rotateX(-90deg);
            }

        </style>
    @stop
</div>
