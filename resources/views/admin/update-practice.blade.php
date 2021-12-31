@extends('layouts.admin')

@section('slot')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Perubahan Soal Practice</h2>
                        @if ($errors->any())
                            {{ implode(', ', $errors->all()) }}
                        @endif
                    </div>
                    <form id="contact" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label>Jenis Course</label>
                                <select name="id_course" id="type" required>
                                    <option value="-1" 
                                    @if (!$practice->id_course)
                                        selected
                                    @endif
                                    >Select Type</option>
                                    <option value="1"
                                    @if ($practice->id_course == 1)
                                        selected
                                    @endif>TOEFL ITP</option>
                                    <option value="2"
                                    @if ($practice->id_course == 2)
                                        selected
                                    @endif>TOEFL IBT</option>
                                    <option value="3"
                                    @if ($practice->id_course == 3)
                                        selected
                                    @endif>TOEIC</option>
                                    <option value="4"
                                    @if ($practice->id_course == 4)
                                        selected
                                    @endif>IELTS</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Sesi</label>
                                <select name="sesi" id="kategori" required>
                                    <option value="-1" selected>Select Category</option>
                                    @foreach (config('app.allSesi') as $i => $item)
                                        <option value="{{ $i }}"
                                        @if ($practice->sesi == $i)
                                          selected  
                                        @endif>{{ $item }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="teks">Teks</label>
                                <textarea name="teks" id="teks" placeholder="Enter your text" rows="6">{{$practice->teks ?? ''}}</textarea>
                            </div>
                            <div class="col-12 mt-5">
                                <label for="soal">Soal</label>
                                <textarea name="soal" id="soal" placeholder="Enter the question" rows="6"
                                    required>{{$practice->soal ?? ''}}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label>Tipe Soal</label>
                                <select name="tipe" id="tipe" required>
                                    <option value="m" @if ($practice->tipe == 'm')
                                        selected
                                    @endif>Multiple choice</option>
                                    <option value="f" @if ($practice->tipe == 'f')
                                        selected
                                    @endif>Fill the blank</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Audio</label><br>
                                @if ($practice->file)
                                    current file : <a href='{{Storage::url($practice->file??'')}}' target="_blank">{{$practice->file}}</a>
                                @endif
                                <p>File yang diterima : mp3</p>
                                <fieldset>
                                    <input class="form-control file" type="file" name="file" id="formFileMultiple">
                                </fieldset>
                            </div>
                            <div class="col-md-12 mt-4 mb-2">
                                <h4>Jawaban</h4>
                            </div>
                            <div class="col-md-3 col-sm-3 ct">
                                <div class="circle-item">
                                    <input class="check" name="jawaban" type="radio" id="opsi1" value="0" @if ($practice->jawaban == 0)
                                    checked   
                                    @endif>
                                    <label for="opsi1">
                                        <input name="opsi1" type="text" class="form-control jw" id="inopsi1"
                                            placeholder="jawaban..." required="" value="{{$practice->opsi1 ?? ''}}">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 ct">
                                <div class="circle-item">
                                    <input class="check" name="jawaban" type="radio" id="opsi2" value="1" @if ($practice->jawaban == 1)
                                    checked   
                                    @endif>
                                    <label for="opsi2">
                                        <input name="opsi2" type="text" class="form-control jw" id="inopsi2"
                                            placeholder="jawaban..." required="" value="{{$practice->opsi2 ?? ''}}">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 ct">
                                <div class="circle-item">
                                    <input class="check" name="jawaban" type="radio" id="opsi3" value="2" @if ($practice->jawaban == 2)
                                    checked   
                                    @endif>
                                    <label for="opsi3">
                                        <input name="opsi3" type="text" class="form-control jw" id="inopsi3"
                                            placeholder="jawaban..." required="" value="{{$practice->opsi3 ?? ''}}">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 ct">
                                <div class="circle-item">
                                    <input class="check" name="jawaban" type="radio" id="opsi4" value="3" @if ($practice->jawaban == 3)
                                     checked   
                                    @endif>
                                    <label for="opsi4">
                                        <input name="opsi4" type="text" class="form-control jw" id="inopsi4"
                                            placeholder="jawaban..." required="" value="{{$practice->opsi4?? ''}}">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                              <button name="submit" value="update" type="submit" id="form-submit" class="button">Update</button>
                            </div>
                            <div class="col-md-6 mt-4">
                              <button name="submit" value="delete" type="submit" name="delete" value="delete" id="form-delete" class="button btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: '#teks'
            });
        })
        let jawaban = $('.jw')
        let ct = $('.ct')
        $('#tipe').on('change', function (){
            if(this.value == 'm'){
                ct.removeClass('d-none')
                jawaban.attr('required', true)
            }else if(this.value == 'f'){
                ct[1].classList.add('d-none')
                ct[2].classList.add('d-none')
                ct[3].classList.add('d-none')

                jawaban[1].required = false
                jawaban[2].required = false
                jawaban[3].required = false

                ct[0].click()
            }
        })
    </script>
@stop
