@extends('layouts.admin')

@section('slot')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Penambahan MK SE</h2>
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
                                <input placeholder="Nama Mata Kuliah" class="form-control file" type="text" name="nama_mata_kuliah">
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input placeholder="Bobot sks" class="form-control file" type="number" name="sks">
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
