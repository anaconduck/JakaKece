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

    </style>


    <div wire:ignore class="page-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Jawara Center - Pendaftar</h1>
                </div>
                <div class="col-md-12 mt-5">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading mb-5">
                        <h2>Daftar Pendaftar Jawara Event</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box">
                                    <label for="filter_" class="mr-3">Order :</label>
                                    <select id="filter_" wire:model="filter">
                                        <option value="users.name" @if ($filter == 'users.name')
                                            selected
                                            @endif>Nama Pendaftar</option>
                                        <option value="jawara_events.nama" @if ($filter == 'jawara_events.nama')
                                            selected
                                            @endif>Nama Event</option>
                                        <option value="jawara_pendaftars.created_at" @if ($filter == 'created_at')
                                            selected
                                            @endif>Waktu Pendaftaran</option>
                                    </select>
                                    @if($filter){{$filter}}@endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-row-reverse bd-highlight">

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
                                    <th>Nim Pendaftar</th>
                                    <th>Nama Event</th>
                                    <th>Nama Dosen</th>
                                    <th>Status Pendaftaran</th>
                                    <th>Waktu Pendaftaran</th>
                                    <th>Pengajuan</th>
                                    <th>Pendanaan</th>
                                </tr>
                            </thead>
                            <tbody class="table-hover">
                                @foreach ($pendaftar as $data)

                                    <tr wire:click="show({{$data->id}})" id="{{ $data->id }}">
                                        <td>{{ $ind++ }}</td>
                                        <td><ol style="list-style-type: lower-roman">
                                            @php
                                            $data->id_mahasiswa = json_decode($data->id_mahasiswa)
                                            @endphp
                                            @foreach ($data->id_mahasiswa as $nim)
                                                <li>{{$nim}}</li>
                                            @endforeach
                                        </ol></td>
                                        <td>
                                            {{ $data->nama ?? 1}}
                                        </td>
                                        <td>
                                            {{$data->nama_dosen}}
                                        </td>
                                        <td>
                                            @if($data->status == 0)
                                                Belum Terdaftar
                                            @elseif($data->status == 1)
                                                Terdaftar
                                            @elseif($data->status == 2)
                                                Tersetujui
                                            @endif
                                        </td>
                                        <td>{{date("d/M/y", strtotime($data->created_at))}}</td>
                                        <td>
                                            @if($data->file)
                                            <a href="{{url($data->file)}}">File</a>
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td>Rp. {{ number_format($data->pendanaan, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $pendaftar->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mt-5">
                    <div class="filled-rounded-button">
                        <a href="{{ url('/admin/jawara/pendaftar/export') }}">Export Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script wire:ignore src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = [
            @foreach ($labels as $i => $l)
                '{{ $i }}',
            @endforeach
        ];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Jumlah Penerima Pendanaan',
                backgroundColor: 'rgb(83,91,160)',
                borderColor: 'rgb(83,91,160)',
                data: [
                    @foreach ($labels as $l)
                        {{ $l }},
                    @endforeach
                ],
            }]
        };
        const config = {
            type: 'line',
            data,
            options: {}
        };
        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</div>
