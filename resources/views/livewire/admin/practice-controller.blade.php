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

        table tbody tr:hover p {
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

        ol {
            list-style-type: upper-alpha;
        }

        tbody {
            text-align: justify;
        }

        p.teks {
            font-family: 'Roboto Slab', sans-serif !important;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            max-width: 600px;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 100px;
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


    <div wire:ignore class="page-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Practice - Inkubasi Bahasa</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading mb-5">
                        <h2>Daftar Soal</h2>
                        <div class="row">
                            <div wire:ignore class="col-md-6">
                                <div class="box">
                                    <label for="filter_" class="mr-3">Order by :</label>
                                    <select id="filter_" wire:model="filter">
                                        <option value="tipe" @if ($filter == 'tipe')
                                            selected
                                            @endif>Tipe</option>
                                        <option value="id_course" @if ($filter == 'id_course')
                                            selected
                                            @endif>Course</option>
                                        <option value="sesi" @if ($filter == 'sesi')
                                            selected
                                            @endif>sesi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-row-reverse bd-highlight">

                                    <a class="btn btn-primary" href="{{ url('/admin/inkubasi/practice/create') }}"
                                        role="button">Tambah Soal</a>
                                    <div class="search-box">
                                        <button class="btn-search"><img
                                                src="{{ asset('assets/images/search.png') }}" /></button>
                                        <input wire:model="keyword" type="text" class="input-search"
                                            placeholder="Type to Search...">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="default-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Teks</th>
                                    <th>Soal</th>
                                    <th>Tipe</th>
                                    <th>Course</th>
                                    <th>Sesi</th>
                                </tr>
                            </thead>
                            <tbody class="table-hover">
                                @foreach ($quest as $data)
                                    <tr wire:click="show({{$data->id}})" id="{{ $data->id }}">
                                        <td>{{ $ind++ }}</td>
                                        <td>
                                            <p class="teks">{{ $data->teks }}</p>
                                        </td>
                                        <td>
                                            <p class="teks">{{ $data->soal }}</p>
                                        </td>
                                        <td>{{ $data->tipe == 'm' ? 'Multiple choice' : 'Fill the Blank' }}</td>
                                        <td>{{ config("app.allCourse.$data->id_course") }}</td>
                                        <td>{{ config('app.allSesi')[$data->sesi] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $quest->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
