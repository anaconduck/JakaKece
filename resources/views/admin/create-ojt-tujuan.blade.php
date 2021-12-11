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
                        <h2>Penambahan Instansi Magang</h2>
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
                                    <label>Nama Instansi magang</label>
                                    <input placeholder="Nama Instansi" class="form-control file" type="text" name="nama_instansi">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="status">Posisi</label>
                                <select name="dalam_negeri" id="status" required>
                                    <option value="1" selected>Dalam Negeri</option>
                                    <option value="0">Luar Negeri</option>
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
