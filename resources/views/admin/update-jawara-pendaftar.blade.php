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

                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{implode(', ',$erorrs->all())}}
                        </div>
                    @endif

                    <form id="contact" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Nama Pendaftar : </label>
                                    @foreach($mahasiswa as $mhs)
                                        <input value="{{$mhs->name}}" type="text" class="form-control" id="title"
                                        disabled>
                                    @endforeach                                    
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Nama Event : </label>
                                    <input value="{{$event->nama}}" type="text" class="form-control" id="title"
                                        disabled>   
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label>Status Pendaftaran</label>
                                    <select name="status" id="status" required>
                                        <option value="0" @if($pendaftar->status == 0) selected @endif>Belum Terdaftar</option>
                                        <option value="1" @if($pendaftar->status == 1) selected @endif>Terdaftar</option>
                                        <option value="2" @if($pendaftar->status == 2) selected @endif>Tersetujui</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <label>Dosen Pembimbing</label>
                                <select name="dosen" id="nama_dosen" required>
                                    @if(!$pendaftar->id_dosen)
                                        <option value="0" selected>Pilih Dosen Pembimbing</option>
                                    @endif
                                    @foreach ($dosen as $ds)
                                        <option value="{{$ds->identity}}" @if($ds->identity == $pendaftar->id_dosen) selected @endif>{{$ds->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label>File Pendanaan : </label>
                                @if($pendaftar->file)
                                <a href="{{url($pendaftar->file)}}">File</a>
                                @else
                                -
                                @endif
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
