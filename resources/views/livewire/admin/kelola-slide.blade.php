<div>
    <style wire:ignore>
        .select {
            position: relative;
            min-width: 200px;
        }

        .select svg {
            position: absolute;
            right: 12px;
            top: calc(50% - 3px);
            width: 10px;
            height: 6px;
            stroke-width: 2px;
            stroke: #9098a9;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            pointer-events: none;
        }

        .select select {
            -webkit-appearance: none;
            padding: 7px 40px 7px 12px;
            width: 100%;
            border: 1px solid #e8eaed;
            border-radius: 5px;
            background: #fff;
            box-shadow: 0 1px 3px -2px #9098a9;
            cursor: pointer;
            font-family: inherit;
            font-size: 16px;
            transition: all 150ms ease;
        }

        .select select:required:invalid {
            color: #5a667f;
        }

        .select select option {
            color: #223254;
        }

        .select select option[value=""][disabled] {
            display: none;
        }

        .select select:focus {
            outline: none;
            border-color: #07f;
            box-shadow: 0 0 0 2px rgba(0, 119, 255, 0.2);
        }

        .select select:hover+svg {
            stroke: #07f;
        }

        .sprites {
            position: absolute;
            width: 0;
            height: 0;
            pointer-events: none;
            user-select: none;
        }

        #tambah {
            color: #535ba0;
            transition: all 0.4s;
        }

        #tambah:hover {
            color: white;
        }

        h6 {
            display: inline-block;
        }

    </style>
    <div class="card">
        <h5 class="card-header">Kelola Deskripsi Slideshow</h5>
        <div class="card-body">

            <label class="select" for="slct">
                <select wire:model="fitur" id="slct" required="required">
                    <option value="1" selected>Inkubasi Bahasa</option>
                    <option value="2">Jawara Center</option>
                    <option value="3">Student Exchange</option>
                    <option value="4">On The Job Training</option>
                </select>
                <svg>
                    <use xlink:href="#select-arrow-down"></use>
                </svg>
            </label>

            <svg class="sprites">
                <symbol id="select-arrow-down" viewbox="0 0 10 6">
                    <polyline points="1 1 5 5 9 1"></polyline>
                </symbol>
            </svg>
            @if ($msg)
                <div class="alert alert-{{ $status }}" role="alert">
                    {{ $msg }}
                </div>
            @endif
            @switch($fitur)
                @case(1)

                    <h5 class="card-title mt-4">Inkubasi Bahasa</h5>
                    <hr>
                    @foreach ($slide as $ind => $s)
                        <h6>Slide {{ $ind + 1 }}</h6>
                        <a wire:click="confirmDelete({{ $ind }})" class="btn btn-danger mb-4 mt-4">hapus
                            slide-{{ $ind + 1 }}</a>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Deskripsi Sistem</span>
                            </div>
                            <textarea wire:model.lazy="slide.{{ $ind }}.deskripsi" class="form-control"
                                aria-label="With textarea">{{ $s['deskripsi'] }}</textarea>
                        </div>

                        @if ($s['file'])
                            background slide-{{ $ind + 1 }} <a target="_blank" href="{{ Storage::url($s['file']) }}">lihat</a>
                        @endif
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Background</span>
                            </div>
                            <div class="custom-file">
                                <input wire:model="slide.{{ $ind }}.file" type="file" class="custom-file-input"
                                    id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    @if (sizeof($slide) == 0 or $slide[sizeof($slide) - 1]['id'])
                        <div class="col-md-3" style="cursor: pointer">
                            <div class="border-rectangle-button">
                                <a wire:click="tambahSlide" id="tambah">Tambah Slide</a>
                            </div>
                        </div>
                    @endif
                @break
                @case(2)
                    <h5 class="card-title mt-4">Jawara Center</h5>
                    <hr>
                    @foreach ($slide as $ind => $s)
                        <h6>Slide {{ $ind + 1 }}</h6>
                        <a wire:click="confirmDelete({{ $ind }})" class="btn btn-danger mb-4 mt-4">hapus
                            slide-{{ $ind + 1 }}</a>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Deskripsi Sistem</span>
                            </div>
                            <textarea wire:model.lazy="slide.{{ $ind }}.deskripsi" class="form-control"
                                aria-label="With textarea">{{ $s['deskripsi'] }}</textarea>
                        </div>

                        @if ($s['file'])
                            background slide-{{ $ind + 1 }} <a target="_blank" href="{{ Storage::url($s['file']) }}">lihat</a>
                        @endif
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Background</span>
                            </div>
                            <div class="custom-file">
                                <input wire:model="slide.{{ $ind }}.file" type="file" class="custom-file-input"
                                    id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    @if (sizeof($slide) == 0 or $slide[sizeof($slide) - 1]['id'])
                        <div class="col-md-3" style="cursor: pointer">
                            <div class="border-rectangle-button">
                                <a wire:click="tambahSlide" id="tambah">Tambah Slide</a>
                            </div>
                        </div>
                    @endif
                @break
                @case(3)
                    <h5 class="card-title mt-4">Student Exchange</h5>
                    <hr>
                    @foreach ($slide as $ind => $s)
                        <h6>Slide {{ $ind + 1 }}</h6>
                        <a wire:click="confirmDelete({{ $ind }})" class="btn btn-danger mb-4 mt-4">hapus
                            slide-{{ $ind + 1 }}</a>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Deskripsi Sistem</span>
                            </div>
                            <textarea wire:model.lazy="slide.{{ $ind }}.deskripsi" class="form-control"
                                aria-label="With textarea">{{ $s['deskripsi'] }}</textarea>
                        </div>

                        @if ($s['file'])
                            background slide-{{ $ind + 1 }} <a target="_blank" href="{{ Storage::url($s['file']) }}">lihat</a>
                        @endif
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Background</span>
                            </div>
                            <div class="custom-file">
                                <input wire:model="slide.{{ $ind }}.file" type="file" class="custom-file-input"
                                    id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    @if (sizeof($slide) == 0 or $slide[sizeof($slide) - 1]['id'])
                        <div class="col-md-3" style="cursor: pointer">
                            <div class="border-rectangle-button">
                                <a wire:click="tambahSlide" id="tambah">Tambah Slide</a>
                            </div>
                        </div>
                    @endif
                @break
                @case(4)
                    <h5 class="card-title mt-4">On the Job Training</h5>
                    <hr>
                    @foreach ($slide as $ind => $s)
                        <h6>Slide {{ $ind + 1 }}</h6>
                        <a wire:click="confirmDelete({{ $ind }})" class="btn btn-danger mb-4 mt-4">hapus
                            slide-{{ $ind + 1 }}</a>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Deskripsi Sistem</span>
                            </div>
                            <textarea wire:model.lazy="slide.{{ $ind }}.deskripsi" class="form-control"
                                aria-label="With textarea">{{ $s['deskripsi'] }}</textarea>
                        </div>

                        @if ($s['file'])
                            background slide-{{ $ind + 1 }} <a target="_blank" href="{{ Storage::url($s['file']) }}">lihat</a>
                        @endif
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Background</span>
                            </div>
                            <div class="custom-file">
                                <input wire:model="slide.{{ $ind }}.file" type="file" class="custom-file-input"
                                    id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    @if (sizeof($slide) == 0 or $slide[sizeof($slide) - 1]['id'])
                        <div class="col-md-3" style="cursor: pointer">
                            <div class="border-rectangle-button">
                                <a wire:click="tambahSlide" id="tambah">Tambah Slide</a>
                            </div>
                        </div>
                    @endif
                @break

                @default

            @endswitch

        </div>
    </div>
    @if ($delete > -1)
        <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            style="display: block; background-color: rgba(0, 0, 0, 0.302);">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
                        <button wire:click="batal" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Hapus Slide-{{ $delete }}?
                    </div>
                    <div class="modal-footer">
                        <button wire:click="batal" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Batal</button>
                        <button wire:click="deleteSlide({{ $delete }})" type="button"
                            class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
