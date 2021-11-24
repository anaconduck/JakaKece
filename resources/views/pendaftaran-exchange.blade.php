@extends('layouts.app')

@section('css')
    <style>
        html {
            font-family: "Roboto", sans-serif;
        }

        body {
            background: radial-gradient(#ffaf696b, #ffad6548);
            min-height: 90vh;
            font-family: "Roboto", sans-serif;
        }

        footer {
            position: absolute;
            bottom: 0;
        }

        .title {
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 30px;
            color: #FF8F00;
            font-weight: 300;
            font-size: 24px;
            letter-spacing: 1px;
        }

        .description {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }

        input[type=text],
        input[type=email] {
            padding: 10px 20px;
            border: 1px solid #999;
            border-radius: 3px;
            display: block;
            width: 100%;
            margin-bottom: 20px;
            box-sizing: border-box;
            outline: none;
        }

        input[type=text]:focus,
        input[type=email]:focus {
            border-color: #FF6F00;
        }

        input[type=radio] {
            margin-right: 10px;
        }

        label {
            margin-bottom: 20px;
            display: block;
            font-size: 18px;
            color: #666;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            padding: 20px 0;
            cursor: pointer;
        }

        label:first-child {
            margin-bottom: 0;
            border-bottom: none;
        }

        .button,
        .rerun-button {
            padding: 10px 20px;
            border-radius: 3px;
            background: #FF6F00;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
            cursor: pointer;
        }

        .button:hover,
        .rerun-button:hover {
            background: #e66400;
        }

        .button.rerun-button,
        .rerun-button.rerun-button {
            border: 1px solid rgba(255, 255, 255, 0.6);
            margin-bottom: 50px;
            box-shadow: 0px 10px 15px -6px rgba(0, 0, 0, 0.2);
            display: none;
        }

        .text-center {
            text-align: center;
        }

        .modal-wrap {
            max-width: 600px;
            margin: 50px auto;
            transition: transform 300ms ease-in-out;
        }

        .modal-header {
            height: 45px;
            background: white;
            border-bottom: 1px solid #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-header span {
            display: block;
            height: 12px;
            width: 12px;
            margin: 5px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.2);
        }

        .modal-header span.is-active {
            background: rgba(0, 0, 0, 0.4);
            background: #FF8F00;
        }

        .modal-bodies {
            position: relative;
            perspective: 1000px;
        }

        .modal-body {
            background: white;
            padding: 40px 100px;
            box-shadow: 0px 50px 30px -30px rgba(0, 0, 0, 0.3);
            margin-bottom: 50px;
            position: absolute;
            top: 0;
            display: none;
            box-sizing: border-box;
            width: 100%;
            transform-origin: top left;
        }

        .modal-body.is-showing {
            display: block;
        }

        .animate-out {
            -webkit-animation: out 600ms ease-in-out forwards;
            animation: out 600ms ease-in-out forwards;
        }

        .animate-in {
            -webkit-animation: in 500ms ease-in-out forwards;
            animation: in 500ms ease-in-out forwards;
            display: block;
        }

        .animate-up {
            transform: translateY(-500px) rotate(30deg);
        }

        @-webkit-keyframes out {
            0% {
                transform: translateY(0px) rotate(0deg);
            }

            60% {
                transform: rotate(60deg);
            }

            100% {
                transform: translateY(800px) rotate(10deg);
            }
        }

        @keyframes out {
            0% {
                transform: translateY(0px) rotate(0deg);
            }

            60% {
                transform: rotate(60deg);
            }

            100% {
                transform: translateY(800px) rotate(10deg);
            }
        }

        @-webkit-keyframes in {
            0% {
                opacity: 0;
                transform: rotateX(-90deg);
            }

            100% {
                opacity: 1;
                transform: rotateX(0deg);
            }
        }

        @keyframes in {
            0% {
                opacity: 0;
                transform: rotateX(-90deg);
            }

            100% {
                opacity: 1;
                transform: rotateX(0deg);
            }
        }

        .poster {
            transition: all cubic-bezier(0.39, 0.575, 0.565, 1) 1s;
        }

        .poster.view {
            transform: scale(4);
        }

        select {
            padding: 20px;
            margin: 20px auto;
            border-radius: 5px;
            width: 100%;
        }

    </style>
@stop

@section('slot')

    <div class="modal-wrap mb-5">
        <div class="modal-header"><span class="is-active"></span><span></span><span></span></div>
        <div class="modal-bodies">
            <div class="modal-body modal-body-step-1 is-showing">
                <div class="title">Step 1</div>
                <div class="description">Informasi Pendaftar</div>
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <label> Nama Pendaftar
                        <input type="text" name="nama" required readonly value="{{ auth()->user()->name }}" />
                    </label>
                    <label> Nim Pendaftar
                        <input type="text" name="nim" required readonly value="{{ auth()->user()->identity }}" />
                    </label>
                    <label> Email Pendaftar
                        <input type="text" name="email" required readonly value="{{ auth()->user()->email }}" />
                    </label>
                    <label> Prodi Pendaftar
                        <input type="text" name="prodi" required readonly value="{{ $mahasiswa->program_studi }}" />
                    </label>
                    <div class="text-center mt-5">
                        <div class="button">Daftar</div>

                    </div>
            </div>
            <div class="modal-body modal-body-step-2">
                <div class="title">Step 2</div>
                <div class="description">Apakah anda yakin mendaftar dalam <br>Student Exchange {{ $tujuan->nama_universitas ?? '' }}  <br>Paket {{ $paket }}</div>

                <div class="text-center fade-in">
                    <a href="{{ url('/exchange') }}"><div class="button" style="background-color: rgb(248, 58, 58)">Tidak</div></a>
                    <div class="button">Yakin</div>
                </div>
            </div>
            <div class="modal-body modal-body-step-3">
                <div class="title">Step 3</div>
                <div class="description">Kelengkapan Berkas</div>
                <label> Curriculum Vitae
                    <input type="file" name="cv"
                    required
                    />
                </label>
                <label> Motivation Letter
                    <input type="file" name="ml"
                    required
                    />
                </label>
                <label> Transkrip akademik semua semester
                    <input type="file" name="ac"
                    required
                    />
                </label>
                <label> Sertifikat kemampuan Bahasa Inggris (TOEFL/IELTS)
                    <input type="file" name="sf"
                    required
                    />
                </label>
                <label> Kartu Tanda Mahasiswa
                    <input type="file" name="ktm"
                    required
                    />
                </label>
                <label> Bukti cetak sebagai mahasiswa aktif di Pangkalan Data Pendidikan Tinggi (PDDIKTI)
                    <input type="file" name="bc"
                    required
                    />
                </label>
                <label> Learning Agreement (sesuai format)
                    <input type="file" name="la"
                    required
                    />
                </label>
                <label> MoU/MoA (bisa didownload dari sikarsa.um.ac.id)
                    <input type="file" name="mo"
                    required
                    />
                </label>
                <div class="text-center">
                    <div id="submit" class="button">Daftar</div>
                </div>
                <input id="send" class="d-none" type="submit">
                </form>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $('.button').click(function() {
            var $btn = $(this),
                $step = $btn.parents('.modal-body'),
                stepIndex = $step.index(),
                $pag = $('.modal-header span').eq(stepIndex);
                console.log($pag)
            if (stepIndex === 0 || stepIndex === 1) {
                step1($step, $pag);
            } else {
            }

        });


        function step1($step, $pag) {
            console.log('step1');
            // animate the step out
            $step.addClass('animate-out');

            // animate the step in
            setTimeout(function() {
                $step.removeClass('animate-out is-showing')
                    .next().addClass('animate-in');
                $pag.removeClass('is-active')
                    .next().addClass('is-active');
            }, 600);

            // after the animation, adjust the classes
            setTimeout(function() {
                $step.next().removeClass('animate-in')
                    .addClass('is-showing');

            }, 1200);
        }


        function step3($step, $pag) {
            console.log('3');

            // animate the step out
            $step.parents('.modal-wrap').addClass('animate-up');

            setTimeout(function() {
                $('.rerun-button').css('display', 'inline-block');
            }, 300);
        }

        $('.rerun-button').click(function() {
            $('.modal-wrap').removeClass('animate-up')
                .find('.modal-body')
                .first().addClass('is-showing')
                .siblings().removeClass('is-showing');

            $('.modal-header span').first().addClass('is-active')
                .siblings().removeClass('is-active');
            $(this).hide();
        });

        $('#poster').on('click', function() {
            this.classList.toggle('view')
        })
        $('#submit').on('click', function() {
            $('#send')[0].click()
        })
    </script>
@stop
