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
                <div class="col-md-4">
                    <div class="service-item fivth-item">
                        <div class="icon"></div>
                        <h4>{{ $totalEventJawara ?? 0 }}</h4>
                        <p>Event Jawara</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item second-item">
                        <div class="icon"></div>
                        <h4>{{ $totalSE ?? 0 }}</h4>
                        <p>Institusi Student Exchange</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item third-item">
                        <div class="icon"></div>
                        <h4>{{ $totalTraining ?? 0 }}</h4>
                        <p>Institusi Training</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item sixth-item">
                        <div class="icon"></div>
                        <h4>{{ $totalTaker ?? 0 }}</h4>
                        <p>Mahasiswa Telah Mengambil Practice</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
