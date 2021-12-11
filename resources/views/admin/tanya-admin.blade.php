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
                        <h2>Jawab pertanyaan {{ $id }}</h2>
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
                                    <label>Identity</label>
                                    <input placeholder="Nama Instansi" class="form-control file" type="text" value="{{ $pertanyaan->identity }}" disabled>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="status">Email</label>
                                <input placeholder="Nama Instansi" class="form-control file" type="email" value="{{ $pertanyaan->email }}" disabled>
                            </div>
                            <div class="col-12">
                                <label>Pertanyaan : </label>
                                <textarea id="pertanyaan" placeholder="Masukkan Catatan Pembimbing"
                                    rows="6" disabled>{{ $pertanyaan->pertanyaan }}</textarea>
                            </div>
                            <div class="col-12">
                                <label>Jawaban : </label>
                                <textarea name="jawaban" id="jawaban" placeholder="Masukkan Jawaban"
                                    rows="6" required>{{ $pertanyaan->jawaban }}</textarea>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" id="form-submit" class="button">Jawab</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
