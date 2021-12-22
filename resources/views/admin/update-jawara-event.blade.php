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
                                    <input value="{{ $event->nama ?? '' }}" placeholder="Nama Event"
                                        class="form-control file" type="text" name="nama">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Max Anggota</label>
                                    <input value="{{ $event->max_anggota ?? 1 }}" placeholder="max anggota"
                                        class="form-control file" type="number" name="max_anggota">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Tanggal Mulai Pendaftaran</label>
                                    <input value="{{ $event->mulai_daftar }}" placeholder="mulai pendaftaran"
                                        class="form-control file" type="date" name="mulai_daftar">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Tanggal Akhir Pendaftaran</label>
                                    <input value="{{ $event->akhir_daftar }}" placeholder="akhir pendaftaran"
                                        class="form-control file" type="date" name="akhir_daftar">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Tanggal Pelaksanaan Event</label>
                                    <input placeholder="tanggal mulai event" class="form-control file" type="date"
                                        name="mulai" value="{{ substr($event->mulai, 0, 10) }}">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Waktu Pelaksanaan Event</label>
                                    <input placeholder="waktu mulai event" class="form-control file" type="time"
                                        name="mulai_time" value="{{ substr($event->mulai, 11,5) }}">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="status">Status</label>
                                <select name="finish" id="status" required>
                                    <option value="0" @if ($event->finish == 0)selected @endif>Belum Selesai</option>
                                    <option value="1" @if ($event->finish == 1) selected @endif>Selesai</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                @if ($event->file)
                                    current file : <a href="{{ url($event->file) }}">Poster</a>
                                @endif
                                <label for="file">Poster</label>
                                <fieldset>
                                    <input class="form-control file" type="file" name="file" id="formFileMultiple">
                                </fieldset>
                            </div>
                            <div class="col-md-6 mt-4">
                                <button name="submit" value="update" type="submit" id="form-submit"
                                    class="button">Update</button>
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
@stop
