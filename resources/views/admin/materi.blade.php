@extends('layouts.admin')

@section('css')
    <style>
        .menu {
            width: 30px;
        }

        .close {
            width: 20px;
            margin: 0 !important;
            padding: 0 !important;
        }

        .btn-close {
            border: none;
        }

        .btn-close:hover {
            background: none;
        }

        table tbody tr:hover {
            cursor: pointer;
            background-color: rgb(95, 95, 95) !important;
            color: white;
        }

        a.active {
            background-color: #535ba0 !important;
            color: white !important;
        }

        .search-box {
            width: fit-content;
            height: fit-content;
            position: relative;
            margin-right: 30px;
        }

        .search-box img {
            width: 20px !important;
            color: white
        }

        .input-search {
            height: 50px;
            width: 50px;
            border-style: none;
            padding: 10px;
            font-size: 18px;
            letter-spacing: 2px;
            outline: none;
            border-radius: 25px;
            transition: all .5s ease-in-out;
            background-color: #8bc3ff;
            padding-right: 40px;
            color: #000;
        }

        .input-search::placeholder {
            color: rgba(75, 75, 75, 0.5);
            font-size: 18px;
            letter-spacing: 2px;
            font-weight: 100;
        }

        .btn-search {
            width: 50px;
            height: 50px;
            border-style: none;
            font-size: 20px;
            font-weight: bold;
            outline: none;
            cursor: pointer;
            border-radius: 50%;
            position: absolute;
            right: 0px;
            color: #000;
            background-color: transparent;
            pointer-events: painted;
            padding: 0;
        }

        .btn-search:hover {
            background-color: #8bc3ff !important;
        }

        .btn-search:focus~.input-search {
            width: 300px;
            border-radius: 0px;
            background-color: transparent;
            border-bottom: 1px solid rgba(68, 68, 68, 0.5);
            transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
        }

        .input-search:focus {
            width: 300px;
            border-radius: 0px;
            background-color: transparent;
            border-bottom: 1px solid rgba(20, 20, 20, 0.5);
            transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
        }

        .box select {
            background-color: whitesmoke;
            color: black;
            padding: 12px;
            width: 200px;
            border: none;
            font-size: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
            -webkit-appearance: button;
            appearance: button;
            outline: none;
        }

        .box select option {
            padding: 30px;
        }

        #keyword {
            text-align: center;
            margin-top: 10px;
            margin-right: 20px;
            display: inline-block;
        }

        @media only screen and (max-width:634px) {
            .ri {
                margin-top: 30px;
            }
        }

    </style>
@stop

@section('slot')
    <div class="page-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Materi - Inkubasi Bahasa</h1>
                </div>
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Inkubasi Bahasa</li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/materi') }}">Materi</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading mb-5">
                        <h2>Daftar Materi</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box">
                                    <label for="filter" class="mr-3">Filter :</label>
                                    <select id="filter">
                                        <option value="title" @if ($filter == 'title')
                                            selected
                                            @endif>title</option>
                                        <option value="materi" @if ($filter == 'materi')
                                            selected
                                            @endif>materi</option>
                                        <option value="id_course" @if ($filter == 'id_course')
                                            selected
                                            @endif>nama_course</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 ri">
                                <div class="d-flex flex-row-reverse bd-highlight">

                                    <a class="btn btn-primary" href="{{ url('/admin/inkubasi/materi/create') }}"
                                        role="button">Tambah Materi</a>
                                    <div class="search-box">
                                        <button id="search" class="btn-search"><img
                                                src="{{ asset('assets/images/search.png') }}" /></button>
                                        <input id="key" type="text" type="text" class="input-search"
                                            placeholder="Type to Search..." @if ($key)
                                        value="{{ $key }}"
                                        @endif>
                                    </div>
                                    @if ($key)
                                        <p id="keyword">keyword : <span id="word">{{ $key }}</span></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="default-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Materi</th>
                                    <th>File</th>
                                    <th>Nama Course</th>
                                </tr>
                            </thead>
                            <tbody class="table-hover">
                                @foreach ($materi as $data)
                                    <tr id="{{ $data->id }}">
                                        <td>{{ $ind++ }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->materi }}</td>
                                        <td>{{ $data->file ?? '-' }}</td>
                                        <td>{{ $data->nama_course }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <ul class="table-pagination">
                            @if (!$key)
                                @if ($page > 1)
                                    <li><a href="{{ url("/admin/inkubasi/materi/$filter") . '/' . ($page - 1) }}">Previous</a>
                                    </li>
                                @else
                                    <li>Previous</li>
                                @endif
                                @for ($ind = 1; $ind <= $total; $ind++)
                                    @if ($page == $ind)
                                        <li><a href="#" class="active">{{ $ind }}</a></li>
                                    @else
                                        <li><a
                                                href="{{ url("/admin/inkubasi/materi/$filter/$ind") }}">{{ $ind }}</a>
                                        </li>
                                    @endif
                                @endfor
                                @if ($page < $total)
                                    <li><a href="{{ url("/admin/inkubasi/materi/$filter") . '/' . ($page + 1) }}">Next</a></li>
                                @else
                                    <li>Next</li>
                                @endif

                            @else
                                @if ($page > 1)
                                    <li><a href="{{ url("/admin/materi/search/$key") . '?page=' . ($page - 1) }}">Previous</a>
                                    </li>
                                @else
                                    <li>Previous</li>
                                @endif
                                @for ($ind = 1; $ind <= $total; $ind++)
                                    @if ($page == $ind)
                                        <li><a class="active">{{ $ind }}</a></li>
                                    @else
                                        <li><a
                                                href="{{ url("/admin/materi/search/$key?page=$ind") }}">{{ $ind }}</a>
                                        </li>
                                    @endif
                                @endfor
                                @if ($page < $total)
                                    <li><a href="{{ url("/admin/materi/search/$key") . '?page=' . ($page + 1) }}">Next</a></li>
                                @else
                                    <li>Next</li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script>
        $('tbody tr').on('click', function() {
            window.location = "{{ url('/admin/materi') }}" + "/" + this.id
        })
        const url = "{{ url('/admin/inkubasi/materi') }}"
        $('#filter').on('change', function() {
            window.location = (url + '/' + this.value + "/1")
        })
        const key = $('#key')[0]
        const keyword = "{{ $key }}"
        const span = $('#word')
        $('#search').on('click', function() {
            let url = '{{ url('admin/materi/search') }}' + "/" + key.value
            span.toggleClass('d-none')
            if (key.value.length > 0 && keyword !== key.value)
                window.location = url
        })
    </script>
@stop
