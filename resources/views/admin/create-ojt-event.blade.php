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
                        <h2>Penambahan Ojt Event</h2>
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
                                    <input placeholder="Nama Event" class="form-control file" type="text" name="nama_event">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <input placeholder="max konversi sks" class="form-control file" type="number"
                                        name="max_konversi_sks">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <label for="status">Prodi</label>
                                <select name="id_prodi" id="status" required>
                                    @foreach (config('app.prodi') as $ind => $item)
                                        <option value="{{ $ind }}" @if ($ind == 1)
                                            selected
                                    @endif >{{ $item }}</option>

                                    @endforeach
                                </select>
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
