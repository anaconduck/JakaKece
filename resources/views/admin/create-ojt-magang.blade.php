@extends('layouts.admin')

@section('css')
    <style>
        .file {
            padding: 0 !important;
        }

    </style>
@stop
@section('slot')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Penambahan Magang</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{ implode(', ', $errors->all()) }}
                            </div>
                        @elseif($er ?? 0)
                        <div class="alert alert-danger" role="alert">
                            {{ $er }}
                        </div>
                        @endif
                    </div>
                    <form id="contact" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <label for="status">Insansi Magang</label>
                                <select name="id_ojt_tujuan" id="tujuan" required>
                                    <option value="0" selected>Pilih Instansi Magang</option>
                                    @foreach ($instansi as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama_instansi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="status">Event OJT</label>
                                <select name="id_ojt_event" id="tujuan" required>
                                    <option value="0" selected>Pilih Event OJT</option>
                                    @foreach ($event as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama_event.' - '.config('app.prodi.'.$i->id_prodi) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>Mulai Pendaftaran</label>
                                <fieldset>
                                    <input placeholder="mulai pendaftaran" class="form-control file" type="date"
                                        name="mulai_daftar">
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <label>Akhir Pendaftaran</label>
                                <fieldset>
                                    <input placeholder="Akhir Pendaftaran" class="form-control file" type="date"
                                        name="akhir_daftar">
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <label>Mulai magang</label>
                                <fieldset>
                                    <input placeholder="mulai magang" class="form-control file" type="date"
                                        name="mulai_training">
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <label>Akhir Magang</label>
                                <fieldset>
                                    <input placeholder="Akhir magang" class="form-control file" type="date"
                                        name="akhir_training">
                                </fieldset>
                            </div>

                            <div class="col-md-12">
                                <label for="file">file pelaksanaan</label>
                                <fieldset>
                                    <input class="form-control file" type="file" name="file_pelaksanaan" id="formFileMultiple">
                                </fieldset>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" id="form-submit" class="button">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
