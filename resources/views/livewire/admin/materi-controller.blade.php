<div>
    <style wire:ignore>
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
    <div class="page-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Materi - Inkubasi Bahasa</h1>
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
                                    <select id="filter" wire:model="filter">
                                        <option value="judul" @if ($filter == 'title')
                                            selected
                                            @endif>Judul</option>
                                        <option value="id_course" @if ($filter == 'materi')
                                            selected
                                            @endif>Course</option>
                                        <option value="sesi" @if ($filter == 'id_course')
                                            selected
                                            @endif>Sesi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 ri">
                                <div class="d-flex flex-row-reverse bd-highlight">

                                    <a href="{{ url('/admin/inkubasi/materi/create') }}">
                                        <button id="tambah" type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Tambah Materi
                                        </button>
                                    </a>

                                    <div class="search-box">
                                        <button id="search" class="btn-search"><img
                                                src="{{ asset('assets/images/search.png') }}" /></button>
                                        <input wire:model.debounce.1000ms="keyword" id="key" type="text" type="text"
                                            class="input-search" placeholder="Type to Search..." @if ($keyword)
                                        value="{{ $keyword }}"
                                        @endif>
                                    </div>
                                    @if ($keyword)
                                        <p id="keyword">keyword : <span id="word">{{ $keyword }}</span></p>
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
                                    <th>Judul</th>
                                    <th>File</th>
                                    <th>Nama Course</th>
                                    <th>Nama Sesi</th>
                                </tr>
                            </thead>
                            <tbody class="table-hover">
                                @foreach ($materi as $data)
                                    <tr wire:click="show({{ $data->id }})" id="{{ $data->id }}">
                                        <td>{{ $ind++ }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>
                                            @if ($data->file)
                                                <a href="{{ url($data->file) }}">
                                                    {{ $data->file }}
                                                </a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ config('app.allCourse.' . $data->id_course) }}</td>
                                        <td>{{ config('app.allSesi')[$data->sesi - 1] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination d-flex justify-content-center">
                            {{ $materi->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        let butttonTambah = $('#tambah')
        let modal = $('#exampleModal')
        let title = $('#exampleModalLabel')[0]
        $('.cls').on('click', function() {
            modal.modal('toggle')
        })
        butttonTambah.on('click', function() {
            modal.modal('toggle')
            title.innerText = "Tambah Materi"
        })
    </script>
</div>
