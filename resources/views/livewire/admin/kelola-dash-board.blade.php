<div>
    <div class="card">
        <h5 class="card-header">Kelola Dashboard</h5>
        <div class="card-body">
            <h5 class="card-title">Video Banner</h5>
            @if (strlen($msg) > 10)
                <div class="alert alert-success" role="alert">
                    {{ $msg }}
                </div>
            @endif
            <p>Masukkan Id Video Youtube</p>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">https://www.youtube.com/watch?v=</span>
                </div>
                @error('videoId')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input wire:model.lazy="videoId" type="text" class="form-control"
                    aria-label="Amount (to the nearest dollar)">
                <div class="input-group-append">
                    <span class="input-group-text"></span>
                </div>
            </div>
            <hr>
            <h5 class="card-title">Background Image Fitur</h5>
            <p>Upload gambar dalam format (.png , .jpg , .jpeg)</p>
            <p>max file 1MB !</p>
            @error('background.inkubasi')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            @if ($backgroundPath['inkubasi'])
                bg inkubasi : <a href="{{ Storage::url($backgroundPath['inkubasi']) }}">lihat</a>
            @endif
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Inkubasi Bahasa</span>
                </div>
                <div class="custom-file">
                    <input wire:model="background.inkubasi" type="file" class="custom-file-input" id="inkubasi">
                    <label class="custom-file-label" for="inkubasi">Choose file</label>
                </div>
            </div>
            @error('background.jawara')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            @if ($backgroundPath['jawara'])
                bg jawara : <a href="{{ Storage::url($backgroundPath['jawara']) }}">lihat</a>
            @endif
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Jawara Center</span>
                </div>
                <div class="custom-file">
                    <input wire:model="background.jawara" type="file" class="custom-file-input" id="jawara">
                    <label class="custom-file-label" for="jawara">Choose file</label>
                </div>
            </div>
            @error('background.exchange')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            @if ($backgroundPath['exchange'])
                bg exchange : <a href="{{ Storage::url($backgroundPath['exchange']) }}">lihat</a>
            @endif
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Student Exchange</span>
                </div>
                <div class="custom-file">
                    <input wire:model="background.exchange" type="file" class="custom-file-input" id="exchange">
                    <label class="custom-file-label" for="exchange">Choose file</label>
                </div>
            </div>
            @error('background.training')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            @if ($backgroundPath['training'])
                bg magang : <a href="{{ Storage::url($backgroundPath['training']) }}">lihat</a>
            @endif
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">OJT</span>
                </div>
                <div class="custom-file">
                    <input wire:model="background.training" type="file" class="custom-file-input" id="training">
                    <label class="custom-file-label" for="training">Choose file</label>
                </div>
            </div>
            <hr>
            <h5 class="card-title">Tentang Aplikasi</h5>
            <p>Deskripsikan tentang aplikasi</p>
            @error('tentangAplikasi')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="input-group mb-5    ">
                <div class="input-group-prepend">
                    <span class="input-group-text">Deskripsi 1</span>
                </div>
                <textarea wire:model.lazy="tentangAplikasi.deskripsi1" class="form-control"
                    aria-label="With textarea"></textarea>
            </div>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Deskripsi 2</span>
                </div>
                <textarea wire:model.lazy="tentangAplikasi.deskripsi2" class="form-control"
                    aria-label="With textarea"></textarea>
            </div>
        </div>
    </div>
</div>
