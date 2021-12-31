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


    <div class="page-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <h1>Jumlah Mahasiswa Mengambil Test</h1>
                    <hr>
                </div>
                <div class="col-md-12">

                    <label>Course : </label>
                    <select id="crs"
                        style="width: 200px;padding: 10px 20px;margin-left: 5px;border-radius: 10px;background-color: whitesmoke;">
                        @foreach (config('app.allCourse') as $ind => $course)
                            <option value="{{ $ind }}">{{ $course }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-md-12 mt-5">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script wire:ignore src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let labels = [
            @foreach ($labels as $i => $l)
                'bulan-{{ $i }}',
            @endforeach
        ];
        let data = {
            labels: labels,
            datasets: [{
                label: 'Jumlah Mahasiswa melakukan test inkubasi bahasa',
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
    <script wire:ignore>
        $('#crs').on('change', function (){
            window.livewire.emit('changeCourse', this.value)
        })
        document.addEventListener('DOMContentLoaded', () => {
            Livewire.hook('message.processed', (el, component)=>{
                var d = @this.labels
                labels = []
                data.datasets[0].data = []
                let ind = 0
                for(key in d){
                    labels[ind] = 'bulan-'+key
                    data.datasets[0].data[ind++] = d[key]
                }
                data.labels = labels
                console.log(labels)
            })
        })
    </script>
</div>
