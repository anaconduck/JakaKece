@extends('layouts.admin')

@section('slot')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Penambahan Event Jawara</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{ implode(', ', $errors->all()) }}
                            </div>
                        @endif
                    </div>
                    <form id="contact" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <fieldset>
                                <input placeholder="Nama Event" class="form-control file" type="text" name="nama">
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input placeholder="max anggota" class="form-control file" type="number" name="max_anggota">
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input placeholder="mulai pendaftaran" class="form-control file" type="date" name="mulai_daftar">
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input placeholder="akhir pendaftaran" class="form-control file" type="date" name="akhir_daftar">
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input placeholder="tanggal mulai event" class="form-control file" type="date" name="mulai">
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input placeholder="waktu mulai event" class="form-control file" type="time" name="mulai_time">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <label for="status">Status</label>
                            <select name="finish" id="status" required>
                                <option value="0" selected>Belum Selesai</option>
                                <option value="1">Fill the Selesai</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="file">Poster</label>
                            <fieldset>
                                <input class="form-control file" type="file" name="file" id="formFileMultiple">
                            </fieldset>
                        </div>
                        <div class="col-md-12 mt-4">
                            <button type="submit" id="form-submit" class="button">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
