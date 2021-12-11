<div>
    <div wire:ignore class="row">
        <div class="col-md-12">
            <div class="banner-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner-caption">
                            <h4>Hello, <em>Admin</em></h4>
                            <span>Selamat Datang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="services">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3>Statistik Umum</h3>
                </div>
                <div class="col-md-4">
                    <div class="service-item fourth-item">
                        <div class="icon"></div>
                        <h4>{{ $totalMahasiswa ?? 0 }}</h4>
                        <p>Mahasiswa</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item first-item">
                        <div class="icon"></div>
                        <h4>{{ $totalMateri ?? 0 }}</h4>
                        <p>Total materi</p>
                    </div>
                </div>


                <div class="col-md-12">
                    <h3>Inkubasi Bahasa</h3>
                </div>

                <div class="col-md-4">
                    <div class="service-item fivth-item">
                        <div class="icon"></div>
                        <h4>{{ $totalMateriITP ?? 0 }}</h4>
                        <p>Materi TOEFL ITP</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-item second-item">
                        <div class="icon"></div>
                        <h4>{{ $totalMateriIBT ?? 0 }}</h4>
                        <p>Materi TOEFL IBT</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-item third-item">
                        <div class="icon"></div>
                        <h4>{{ $totalMateriTOEIC ?? 0 }}</h4>
                        <p>Materi TOEIC</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-item first-item">
                        <div class="icon"></div>
                        <h4>{{ $totalMateriIELTS ?? 0 }}</h4>
                        <p>Materi IELTS</p>
                    </div>
                </div>

                <div class="col-md-12">
                    <h3>Jawara Center</h3>
                </div>
                <div class="col-md-4">
                    <div class="service-item second-item">
                        <div class="icon"></div>
                        <h4>{{ $totalLomba ?? 0 }}</h4>
                        <p>Total Lomba</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item third-item">
                        <div class="icon"></div>
                        <h4>{{ $totalPendaftar ?? 0 }}</h4>
                        <p>Total Pendaftar</p>
                    </div>
                </div>

                <div class="col-md-12">
                    <h3>Student Exchange</h3>
                </div>
                <div class="col-md-4">
                    <div class="service-item fourth-item">
                        <div class="icon"></div>
                        <h4>{{ $totalTujuanSE ?? 0 }}</h4>
                        <p>Institusi SE</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item fivth-item">
                        <div class="icon"></div>
                        <h4>{{ $totalPendaftarSE ?? 0 }}</h4>
                        <p>Pendaftar SE</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item sixth-item">
                        <div class="icon"></div>
                        <h4>{{ $totalMatkulSE ?? 0 }}</h4>
                        <p>Mata kuliah tersedia</p>
                    </div>
                </div>

                <div class="col-md-12">
                    <h3>Magang</h3>
                </div>
                <div class="col-md-4">
                    <div class="service-item first-item">
                        <div class="icon"></div>
                        <h4>{{ $totalTujuanOJT ?? 0 }}</h4>
                        <p>Institusi Magang</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item second-item">
                        <div class="icon"></div>
                        <h4>{{ $totalPendaftarOJT ?? 0 }}</h4>
                        <p>Pendaftar Magang</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style wire:ignore>
        h3{
            margin-top: 20px;
        }
    </style>
</div>
