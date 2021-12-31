@extends('layouts.app')

@section('css')
    <style>
        body {
            position: relative;
        }

        body::after {
            content: "";
            background: url("https://image.freepik.com/free-vector/wavy-background-with-copy-space_52683-65230.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.2;
            top: -150px;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
            z-index: -1;
        }

    </style>
@stop

@section('slot')
    <div class="container ex">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ $user->name }}</h4>
                                    <p class="text-secondary mb-1">{{ $user->email }}</p>
                                    <p class="text-muted font-size-sm">{{ $user->identity }}</p>
                                    <p class="text-muted font-size-sm">{{ $mahasiswa->program_studi ?? $dosen->nama_lengkap }}</p>
                                    <p class="text-muted font-size-sm">{{ $mahasiswa->tempat_lahir ?? $dosen->tempat_lahir }}</p>
                                    <p class="text-muted font-size-sm">{{ $mahasiswa->alamat ?? $dosen->alamat}}</p>
                                    <p class="text-muted font-size-sm">
                                        {{ date('d / M / Y', strtotime($mahasiswa->tanggal_lahir??$dosen->tanggal_lahir)) }}</p>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-center text-center">
                                <form method="post" action="{{ url('/logout') }}">
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="Logout" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">

                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <a href="{{ url('/user/riwayat-latihan') }}">
                                        <h6 class="d-flex align-items-center mb-3"><i
                                                class="material-icons text-info mr-2">Riwayat Practice</i></h6>
                                    </a>
                                    @foreach ($data as $r)
                                        <div class="link">
                                            <a href="{{ url("/user/riwayat-latihan/$r->id") }}">
                                                <small>{{ config('app.allCourse.' . $r->id_course) }}</small>
                                                <div class="progress mb-3" style="height: 5px">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <a href="{{ url('/user/riwayat-test') }}">
                                        <h6 class="d-flex align-items-center mb-3"><i
                                                class="material-icons text-info mr-2">Riwayat Test</i></h6>
                                    </a>
                                    @foreach ($reportTest as $r)
                                        <div class="link">
                                            <a href="{{ url("/user/riwayat-test/$r->id") }}">
                                                <small>{{ config('app.allCourse.' . $r->id_course) }}</small>
                                                <div class="progress mb-3" style="height: 5px">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        @if($mahasiswa)
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <a href="{{ url('/user/riwayat-jawara') }}">
                                        <h6 class="d-flex align-items-center mb-3"><i
                                                class="material-icons text-info mr-2">Riwayat Pendaftaran Jawara</i></h6>
                                    </a>
                                    @foreach ($jawara as $r)
                                        <div class="link">
                                            <a href="{{ url("/user/riwayat-jawara/".$r->id_jawara_event.implode('',json_decode($r->id_mahasiswa,true))) }}"
                                                <small>{{ $r->nama }}</small>
                                                <div class="progress mb-3" style="height: 5px">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <a href="{{ url('/user/riwayat-se') }}">
                                        <h6 class="d-flex align-items-center mb-3"><i
                                                class="material-icons text-info mr-2">Riwayat Pendaftaran Student
                                                Exchange</i></h6>
                                    </a>
                                    @foreach ($exchange as $r)
                                        <div class="link">
                                            <a href="{{ url("/user/riwayat-se/$r->id") }}"
                                                <small>{{ $r->nama_universitas }}</small>
                                                <div class="progress mb-3" style="height: 5px">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <a href="{{ url('/user/riwayat-magang') }}">
                                        <h6 class="d-flex align-items-center mb-3"><i
                                                class="material-icons text-info mr-2">Riwayat Pendaftaran Magang</i></h6>
                                    </a>
                                    @foreach ($ojt as $r)
                                        <div class="link">
                                            <a href="{{ url("/user/riwayat-magang/$r->id") }}"
                                                <small>{{ $r->nama_instansi }}</small>
                                                <div class="progress mb-3" style="height: 5px">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        @endif
                    </div>



                </div>
            </div>

        </div>
    </div>

    <style>
        tr {
            border-top: 1px solid white;
            border-bottom: 1px solid white;

        }

        tr>td {
            padding: 0.49em
        }

        hr {
            border-top: 1px solid white;
        }

        body {
            background-image: url('https://assets.codepen.io/1462889/back-page.svg') overflow-x:hidden;
        }

        .section.why-us {
            min-height: 75vh;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

    </style>
@stop

@section('script')
    <script>
        $('#logout').on('click', function() {
            $('#_lo').click()
        })
        let sidenav = $('.side')
        let tab = $('.t1')
        sidenav.on('click', function() {
            sidenav.removeClass('active')
            tab.removeClass('active show')
            this.classList.toggle('active')
            for (let i = 0; i < sidenav.length; i++) {
                if (sidenav[i] == this) {
                    tab[i].classList.add('active', 'show')
                }
            }
        })
    </script>
@stop
