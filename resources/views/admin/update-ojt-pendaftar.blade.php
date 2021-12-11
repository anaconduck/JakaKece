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
                        <h2>Informasi Pendaftar</h2>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{ implode(', ', $errors->all()) }}
                        </div>
                    @endif

                    <form id="contact" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Nama Pendaftar : </label>
                                    <input value="{{ $mhs->name }}" type="text" class="form-control" id="title"
                                        disabled>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Jenis Kegiatan : </label>
                                    <input value="{{ $magang->nama_event . ' - ' . config('app.prodi.' . $magang->id_prodi) }}"
                                        type="text" class="form-control" id="title" disabled>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Status Pendaftaran</label>
                                    <select name="status_pendaftaran" id="status" required>
                                        <option value="0" @if ($pendaftar->status_pendaftaran == 0) selected @endif>Belum Terdaftar</option>
                                        <option value="1" @if ($pendaftar->status_pendaftaran == 1) selected @endif>Terdaftar</option>
                                        <option value="2" @if ($pendaftar->status_pendaftaran == 2) selected @endif>Diterima</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Status Kelulusan</label>
                                    <select name="status_kelulusan" id="status" required>
                                        <option value="0" @if ($pendaftar->status_kelulusan == 0) selected @endif>Belum Lulus</option>
                                        <option value="1" @if ($pendaftar->status_kelulusan == 1) selected @endif>Lulus</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label>Dokumentasi Kegiatan : </label>
                                <ol>
                                    @if ($pendaftar->file)
                                        @foreach ($pendaftar->file as $ind => $item)
                                            <li>
                                                <a href="{{ asset($item) }}">unduh file{{ $ind }}</a><a
                                                    href="{{ url('/admin/ojt/yzyzla/' . $pendaftar->id . '/' . $ind) }}"
                                                    class="btn btn-danger ml-3">hapus</a>
                                            </li>
                                        @endforeach

                                    @endif
                                </ol>
                            </div>
                            <div class="col-12">
                                <label>Catatan : </label>
                                <textarea name="catatan" id="catatan_pembimbing" placeholder="Masukkan Catatan"
                                    rows="6"> {{ $pendaftar->catatan }}</textarea>
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
