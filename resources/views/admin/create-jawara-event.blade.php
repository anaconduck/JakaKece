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
                        <h2>Penambahan Event Jawara</h2>
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
                                    <label>Nama Event</label>
                                    <input placeholder="Nama Event" class="form-control file" type="text" name="nama">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Max Anggota</label>
                                    <input placeholder="max anggota" class="form-control file" type="number"
                                        name="max_anggota">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Tanggal Mulai Pendaftaran</label>
                                    <input placeholder="mulai pendaftaran" class="form-control file" type="date"
                                        name="mulai_daftar">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Tanggal Akhir Pendaftaran</label>
                                    <input placeholder="akhir pendaftaran" class="form-control file" type="date"
                                        name="akhir_daftar">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Tanggal Pelaksanaan Event</label>
                                    <input placeholder="tanggal mulai event" class="form-control file" type="date"
                                        name="mulai">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Waktu Pelaksanaan Event</label>
                                    <input placeholder="waktu mulai event" class="form-control file" type="time"
                                        name="mulai_time">
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
