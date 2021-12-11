<div>
    <section class="forms" @if ($tambah) style="opacity: 0.3" @endif>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div wire:ignore class="section-heading">
                        <h2>Update Tujuan SE</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{ implode(', ', $errors->all()) }}
                            </div>
                        @endif
                    </div>
                    <form id="contact" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="nama">Nama Universitas</label>
                                    <input wire:model.lazy="namaUniversitas" id="nama" value="{{ $namaUniversitas }}"
                                        placeholder="Nama Universitas" class="form-control file" type="text"
                                        name="nama_universitas">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="dalam_negeri">Lokasi</label>
                                <select wire:model.lazy="lokasi" name="dalam_negeri" id="dalam_negeri" required>
                                    <option value="1" @if ($lokasi) selected @endif>Dalam Negeri</option>
                                    <option value="0" @if (!$lokasi) selected @endif>Luar Negeri</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label>File Pelaksanaan :</label>
                                @if ($filePath)
                                    <a href="{{ Storage::url($filePath) }}">{{ $filePath }}</a> | <a
                                        wire:click="removeFile" class="btn btn-danger">Delete</a>
                                @endif
                                <fieldset>
                                    <input wire:model="file" class="form-control file" type="file" name="file_penjelas"
                                        id="formFileMultiple">
                                </fieldset>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Mata Kuliah</th>
                                            <th scope="col">SKS</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mk as $m)
                                            <tr>
                                                <th scope="row">{{ $row++ }}</th>
                                                <td>{{ $m['nama_mata_kuliah'] ?? '' }}</td>
                                                <td>{{ $m['sks'] ?? 0 }}</td>
                                                <td>
                                                    <button type="button"
                                                        wire:click="updateMK({{ $m['id'] }})"
                                                        class="btn btn-danger">Hapus</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">
                                                <button wire:click="tambahMK" id="tambahmk" type="button"
                                                    class="btn btn-primary" da
                                                    ta-toggle="modal"
                                                    data-target="#exampleModalLong">
                                                    Tambah Mata Kuliah
                                                </button>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 mt-4">
                                <button name="submit" value="delete" type="submit" name="delete" value="delete"
                                    id="forn-delete" class="button btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @if ($tambah)
        <div class="modal fade show" id="exampleModalLong" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Pilih MK</h5>
                        <button wire:click="closeTambah" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @foreach ($listMK as $m)
                            <label class="toggle" for="{{ $m['id'] }}">
                                <input wire:click="updateMK({{ $m['id'] }})" name="mk_{{ $m['id'] }}" type="checkbox" class="toggle__input"
                                    id="{{ $m['id'] }}" value="{{ $m['id'] }}" @if (in_array($m['id'],$idMK))
                                    checked
                                    @endif>
                                <span class="toggle-track">
                                    <span class="toggle-indicator">
                                        <!-- 	This check mark is optional	 -->
                                        <span class="checkMark">
                                            <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation"
                                                aria-hidden="true">
                                                <path
                                                    d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z">
                                                </path>
                                            </svg>
                                        </span>
                                    </span>
                                </span>
                                {{ $m['sks'] . ' sks - ' . $m['nama_mata_kuliah'] }}
                            </label>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button wire:click="closeTambah" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button wire:click="closeTambah" type="button" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <style>
        .toggle {
            align-items: center;
            border-radius: 100px;
            display: flex;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .toggle:last-of-type {
            margin: 0;
        }

        .toggle__input {
            clip: rect(0 0 0 0);
            clip-path: inset(50%);
            height: 1px;
            overflow: hidden;
            position: absolute;
            white-space: nowrap;
            width: 1px;
        }

        .toggle__input:not([disabled]):active+.toggle-track,
        .toggle__input:not([disabled]):focus+.toggle-track {
            border: 1px solid transparent;
            box-shadow: 0px 0px 0px 2px #121943;
        }

        .toggle__input:disabled+.toggle-track {
            cursor: not-allowed;
            opacity: 0.7;
        }

        .toggle-track {
            background: #e5efe9;
            border: 1px solid #5a72b5;
            border-radius: 100px;
            cursor: pointer;
            display: flex;
            height: 30px;
            margin-right: 12px;
            position: relative;
            width: 60px;
        }

        .toggle-indicator {
            align-items: center;
            background: #121943;
            border-radius: 24px;
            bottom: 2px;
            display: flex;
            height: 24px;
            justify-content: center;
            left: 2px;
            outline: solid 2px transparent;
            position: absolute;
            transition: 0.25s;
            width: 24px;
        }

        .checkMark {
            fill: #fff;
            height: 20px;
            width: 20px;
            opacity: 0;
            transition: opacity 0.25s ease-in-out;
        }

        .toggle__input:checked+.toggle-track .toggle-indicator {
            background: #121943;
            transform: translateX(30px);
        }

        .toggle__input:checked+.toggle-track .toggle-indicator .checkMark {
            opacity: 1;
            transition: opacity 0.25s ease-in-out;
        }

        @media screen and (-ms-high-contrast: active) {
            .toggle-track {
                border-radius: 0;
            }
        }

    </style>
</div>
