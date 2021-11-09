@extends('layouts.admin')

@section('slot')
<section class="forms">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Penambahan Soal Practice</h2>
          </div>
          <form id="contact" action="" method="post">
              @csrf
            <div class="row">
              <div class="col-md-6">
                <select name="type" id="type" required>
                  <option value="-1" selected>Select Type</option>
                  <option value="0">TOEFL ITP</option>
                  <option value="1">TOEFL IBT</option>
                  <option value="2">TOEIC</option>
                  <option value="3">IELTS</option>
                </select>
              </div>
              <div class="col-md-6">
                <select name="kategori" id="kategori" required>
                  <option value="-1" selected>Select Category</option>
                  <option value="READING">Reading</option>
                  <option value="LISTENING">Listening</option>
                  <option value="WRITTEN">Written</option>
                </select>
              </div>
              <div class="col-12">
                <textarea name="teks" id="teks" placeholder="Enter your text" rows="6"></textarea>
              </div>
              <div class="col-md-12 mt-4 mb-2">
                  <h4>Jawaban</h4>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="circle-item">
                  <input class="check" name="jawaban" type="radio" id="opsi1" value="0" checked>
                  <label for="opsi1">
                      <input name="opsi1" type="text" class="form-control" id="inopsi1" placeholder="jawaban..." required="">
                  </label>
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="circle-item">
                  <input class="check" name="jawaban" type="radio" id="opsi2" value="1" checked>
                  <label for="opsi2">
                    <input name="opsi2" type="text" class="form-control" id="inopsi2" placeholder="jawaban..." required="">
                  </label>
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="circle-item">
                  <input class="check" name="jawaban" type="radio" id="opsi3" value="2">
                  <label for="opsi3">
                    <input name="opsi3" type="text" class="form-control" id="inopsi3" placeholder="jawaban..." required="">
                  </label>
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="circle-item">
                  <input class="check" name="jawaban" type="radio" id="opsi4" value="4">
                  <label for="opsi4">
                    <input name="opsi4" type="text" class="form-control" id="inopsi4" placeholder="jawaban..." required="">
                  </label>
                </div>
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

@section('js')
<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
<script>
    $(document).ready(function(){
        tinymce.init({
            selector: '#teks'
        });
    })
</script>
@stop
