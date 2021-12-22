<div>
    @section('css')
        <link wire:ignore rel="stylesheet" href="{{ asset('assets/css/counter.css') }}" />
        <link wire:ignore rel="stylesheet" href="{{ asset('assets/css/answer.css') }}" />
        <link wire:ignore rel="stylesheet" href="{{ asset('assets/css/practce-test.css') }}" />
    @stop
    <section class="section why-us" data-section="section2">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="section-heading">
                        <h3 style="color: #a06c19">Test {{ config("app.allCourse.$idCourse") }}</h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div wire:ignore class="row">
                                    <div class="col-md-12">
                                        <div class="counter" id="counter">
                                            <div id="app"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-light table-bordered border-dark num"
                                            style="text-align: center">
                                            <thead>
                                                <tr>
                                                    <th scope="col" colspan="4">Number</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for ($indexRow = 0; $indexRow < ceil($allsesi[$sesi]['num'] / 5); $indexRow++)
                                                    <tr>
                                                        @for ($index = $indexRow * 4 + 1; $index <= min($indexRow * 4 + 4, $allsesi[$sesi]['num']); $index++)
                                                            @if ($index == $posisiSoal + 1)
                                                                <td wire:click="show({{ $index - 1 }})"
                                                                    class="now"><b>{{ $index }}
                                                                    @else
                                                                        @if (array_key_exists($index - 1, $daftarJawaban))
                                                                <td wire:click="show({{ $index - 1 }})"
                                                                    class="num_d answered"><b><a
                                                                            class="num_s">{{ $index }}
                                                                        </a>
                                                                    @else
                                                                <td wire:click="show({{ $index - 1 }})"
                                                                    class="num_d "><b><a
                                                                            class="num_s">{{ $index }}
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
                                <div wire:loading class="loader">Loading...</div>
                                <div class="card quest">
                                    <div class="card-header" style="font-weight: bold; color:#ffdfac;">
                                        {{ $posisiSoal + 1 . ' / ' . $allsesi[$sesi]['num'] }}
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $allsesi[$sesi]['sesi'] }}</h5>
                                        @if ($soal->file && Session::get('hasListenTest.' . $posisiSoal, 0) == 0)
                                            <div class='fl' wire:click="hasListenTest({{ $posisiSoal }})">
                                                <a href='#' class='playBut'>

                                                    <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                                        x="0px" y="0px" width="100px" height="100px"
                                                        viewBox="0 0 213.7 213.7"
                                                        enable-background="new 0 0 213.7 213.7" xml:space="preserve">

                                                        <polygon class='triangle' id="XMLID_18_" fill="none"
                                                            stroke-width="7" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-miterlimit="10" points="
                                                73.5,62.5 148.5,105.8 73.5,149.1 " />

                                                        <circle class='circle' id="XMLID_17_" fill="none"
                                                            stroke-width="7" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-miterlimit="10" cx="106.8"
                                                            cy="106.8" r="103.3" />
                                                    </svg>



                                                </a>
                                            </div>
                                        @endif
                                        <p class="card-text" style="text-align: justify">{{ $soal->teks ?? '' }}
                                        </p>
                                        <p class="card-text" style="text-align: justify">{{ $soal->soal ?? '' }}
                                        </p>
                                        <div class="ans">
                                            @if ($soal->tipe == 'm')
                                                <div>
                                                    @if ($soal->opsi1)
                                                        <label class="rad-label">
                                                            <input wire:click="jawab(0)" type="radio"
                                                                class="rad-input" name="rad"
                                                                @if ($isAnswered and $daftarJawaban[$posisiSoal] == 0) checked @endif>
                                                            <div class="rad-design"></div>
                                                            <div class="rad-text">{{ $soal->opsi1 }}</div>
                                                        </label>
                                                    @endif

                                                    @if ($soal->opsi2)
                                                        <label class="rad-label">
                                                            <input wire:click="jawab(1)" type="radio"
                                                                class="rad-input" name="rad" @if ($isAnswered and $daftarJawaban[$posisiSoal] == 1)
                                                            checked
                                                    @endif
                                                    >
                                                    <div class="rad-design"></div>
                                                    <div class="rad-text">{{ $soal->opsi2 }}</div>
                                                    </label>
                                            @endif

                                            @if ($soal->opsi3)
                                                <label class="rad-label">
                                                    <input wire:click="jawab(2)" type="radio" class="rad-input"
                                                        name="rad" @if ($isAnswered and $daftarJawaban[$posisiSoal] == 2)
                                                    checked
                                            @endif
                                            >
                                            <div class="rad-design"></div>
                                            <div class="rad-text">{{ $soal->opsi3 }}</div>
                                            </label>
                                            @endif

                                            @if ($soal->opsi4)
                                                <label class="rad-label">
                                                    <input wire:click="jawab(3)" type="radio" class="rad-input"
                                                        name="rad" @if ($isAnswered and $daftarJawaban[$posisiSoal] == 3)
                                                    checked
                                            @endif
                                            >
                                            <div class="rad-design"></div>
                                            <div class="rad-text">{{ $soal->opsi4 }}</div>
                                            </label>
                                            @endif

                                        </div>
                                    @elseif($soal->tipe == 'f')
                                        <label for="inp" class="inp">
                                            <input wire:model.lazy='ans' type="text" id="inp" placeholder="&nbsp;">
                                            <span class="label">Ans..</span>
                                            <span class="focus-bg"></span>
                                        </label>
                                        @endif
                                    </div>
                                </div>
                                <div class="bn d-flex justify-content-around">
                                    <button wire:click="show({{ abs($posisiSoal - 1) }})" class="btn-shine">
                                        <span>Prev</span>
                                    </button>
                                    <button wire:click="show({{ $posisiSoal + 1 }})" class="btn-shine">
                                        <span>Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (!Session::get(" hasListenTest.$posisiSoal", false))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Livewire.hook('message.processed', (el, component) => {
                    var q = @this.soal
                    if (q.file !== null) {
                        let e = new Audio(q.file);

                        $('.fl').on('click', function() {
                            e.play()
                        })
                        $('.btn-shine').on('click', function() {
                            e.pause()
                        })
                        $('.nm').on('click', function() {
                            e.pause();
                        })
                    }
                })
            })
        </script>
    @endif

    <script wire:ignore>
        // Credit: Mateusz Rybczonec

        const FULL_DASH_ARRAY = 283;
        const WARNING_THRESHOLD = 1000;
        const ALERT_THRESHOLD = 120;

        const COLOR_CODES = {
            info: {
                color: "green"
            },
            warning: {
                color: "orange",
                threshold: WARNING_THRESHOLD
            },
            alert: {
                color: "red",
                threshold: ALERT_THRESHOLD
            }
        };

        const TIME_LIMIT = {{ $allsesi[$sesi]['time'] * 60 }};
        let timePassed = {{ $waktuSesi }};
        let timeLeft = TIME_LIMIT - timePassed;
        let timerInterval = null;
        let remainingPathColor = COLOR_CODES.info.color;

        document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

        startTimer();

        function onTimesUp() {
            clearInterval(timerInterval);
        }

        function startTimer() {
            timerInterval = setInterval(() => {
                timePassed = timePassed += 1;
                timeLeft = TIME_LIMIT - timePassed;
                document.getElementById("base-timer-label").innerHTML = formatTime(
                    timeLeft
                );
                setCircleDasharray();
                setRemainingPathColor(timeLeft);

                if (timeLeft === 0) {
                    onTimesUp();
                    window.location = "{{ url('/report/test' . '/' . $idHistoryTest) }}"
                }
            }, 1000);
        }

        function formatTime(time) {
            const minutes = Math.floor(time / 60);
            let seconds = time % 60;

            if (seconds < 10) {
                seconds = `0${seconds}`;
            }

            return `${minutes}:${seconds}`;
        }

        function setRemainingPathColor(timeLeft) {
            const {
                alert,
                warning,
                info
            } = COLOR_CODES;
            if (timeLeft <= alert.threshold) {
                document
                    .getElementById("base-timer-path-remaining")
                    .classList.remove(warning.color);
                document
                    .getElementById("base-timer-path-remaining")
                    .classList.add(alert.color);
            } else if (timeLeft <= warning.threshold) {
                document
                    .getElementById("base-timer-path-remaining")
                    .classList.remove(info.color);
                document
                    .getElementById("base-timer-path-remaining")
                    .classList.add(warning.color);
            }
        }

        function calculateTimeFraction() {
            const rawTimeFraction = timeLeft / TIME_LIMIT;
            return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
        }

        function setCircleDasharray() {
            const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
            document
                .getElementById("base-timer-path-remaining")
                .setAttribute("stroke-dasharray", circleDasharray);
        }
    </script>
</div>
