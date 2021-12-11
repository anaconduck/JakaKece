@extends('layouts.admin')

@section('slot')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Penambahan Tujuan SE</h2>
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
                                    <input id="nama" value="{{ $tujuan->nama_universitas }}" placeholder="Nama Universitas"
                                        class="form-control file" type="text" name="nama_universitas">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="dalam_negeri">Lokasi</label>
                                <select name="dalam_negeri" id="dalam_negeri" required>
                                    <option value="1" @if ($tujuan->dalam_negeri) selected @endif>Dalam Negeri</option>
                                    <option value="0" @if ($tujuan->luar_negeri) selected @endif>Luar Negeri</option>
                                </select>
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
