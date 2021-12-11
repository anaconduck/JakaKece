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
                        <h2>Update MK Magang</h2>
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
                                    <label>Nama Mata Kuliah</label>
                                    <input placeholder="Nama MK" class="form-control file" type="text" name="nama_mata_kuliah" value="{{ $mk->nama_mata_kuliah }}">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>SKS</label>
                                    <input placeholder="bobot sks" class="form-control file" type="number" name="sks" value="{{ $mk->sks }}">
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
