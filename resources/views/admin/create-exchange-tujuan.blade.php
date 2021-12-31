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
                                    <input id="nama" placeholder="Nama Universitas" class="form-control file" type="text"
                                        name="nama_universitas">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <label for="dalam_negeri">Lokasi</label>
                                <select name="dalam_negeri" id="dalam_negeri" required>
                                    <option value="1" selected>Dalam Negeri</option>
                                    <option value="0">Luar Negeri</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label>File </label>
                                <p>File yang diterima : jpeg, jpg, png, gif, pdf, docx</p>
                                <fieldset>
                                    <input class="form-control file" type="file" name="file_penjelas" id="formFileMultiple">
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
