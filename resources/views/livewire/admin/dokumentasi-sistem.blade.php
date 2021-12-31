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
        <h5 class="card-header">Kelola Dokumentasi Sistem</h5>
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
            <h5 class="card-title mt-4">
                @switch($fitur)
                    @case(1)
                        Inkubasi Bahasa @break
                    @case(2)
                        Jawara Center @break
                    @case(3)
                        Student Exchang @break
                    @case(4)
                        On The Job Training @break
                    @default
                @endswitch        
            </h5>
            <hr>
            @foreach ($deskripsi as $ind => $s)
                <h6>Dokumentasi {{ $ind + 1 }}</h6>
                <p>Deskripsi Dokumentasi</p>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Deskripsi Sistem</span>
                    </div>
                    <textarea wire:model.lazy="deskripsi.{{ $ind }}.deskripsi" class="form-control"
                        aria-label="With textarea">{{ $s['deskripsi'] }}</textarea>
                </div>

                <p>Dokumentasi</p>
                @if ($s['file'] and strpos($s['file'], 'dokumentasi') !== false)
                    background deskripsi-{{ $ind + 1 }} <a target="_blank"
                        href="{{ Storage::url($s['file']) }}">lihat</a>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <input wire:click="updateJenisDokumentasi({{ $ind }},0)" type="checkbox"
                            id="jenisDokumentasi{{ $counter }}" name="jenisDokumentasi{{ $ind }}"
                            @if ($jenisDokumentasi[$ind] === 0) checked="true" @endif />
                        <label for="jenisDokumentasi{{ $counter++ }}">Video Youtube</label>
                    </div>
                    <div class="col-md-6">
                        <input wire:click="updateJenisDokumentasi({{ $ind }},1)" type="checkbox"
                            id="jenisDokumentasi{{ $counter }}" name="jenisDokumentasi{{ $ind }}"
                            @if ($jenisDokumentasi[$ind] === 1) checked="true" @endif />
                        <label for="jenisDokumentasi{{ $counter++ }}">Foto (.jpeg , .jpg, .png)</label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    @if ($jenisDokumentasi[$ind] == 0)
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                https://www.youtube.com/watch?v=
                            </span>
                        </div>
                        <textarea wire:model.lazy="deskripsi.{{ $ind }}.file" class="form-control"
                            aria-label="With textarea">{{ $s['deskripsi'] }}</textarea>
                    @elseif($jenisDokumentasi[$ind] == 1)
                        <div class="input-group-prepend">
                            <span class="input-group-text">Background</span>
                        </div>
                        <div class="custom-file">
                            <input wire:model.lazy="deskripsi.{{ $ind }}.file" type="file"
                                class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    @endif
                </div>
                <hr>
            @endforeach

        </div>
    </div>
</div>
