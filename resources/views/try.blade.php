@extends("layouts.app")

@section('slot')
<section class="section why-us" data-section="section2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">

          </div>
        </div>
        <div class="col-md-12 m-2 p2 anot">
          <div class="row">
            <div class="col-md-1 m-2 p-3 anot">
              <a href="{{ url('jawara') }}" class="external">Kembali</a>
            </div>
            <div class="col-md-10 scrol m-3 p-5 anot" style="background-color: whitesmoke;">
              <h1>
                <?php echo $nama;
                ?>
              </h1>
              <br>
              <h6>
                <div id="container">
                  <form action="" method="get" id="form">
                    <div id="inpcontainer">

                    Name: <input class="m-2 p-1" type="text" name="Name"><br>
                    NIM: <input class="m-2 p-1" type="text" name="Nim"><br>

                    </div>

                    <button id="tambah" type="button">+</button>

                    <div class="p-3">
                        <button class="btn btn-info" type="submit" value="Submit">Daftar</button>
                    </div>

                  </form>

                </div>
              </h6>
            </div>
          </div>
        </div>



      </div>
    </div>
    <br><br>
  </section>
@stop

@section('script')
  <script>
      let container = $('#inpcontainer'); //container dari semua inputan
    let tambah = $('#tambah'); //tombol tambah inputan
    let index = 2; //increment name input
    function tambahInput(type, name) {
      return name + "<input class='m-2 p-1' type='" + type + "' name='" + name + index + "'/><br>";
    } //fungsi untuk nambah input, tinggal modifikasi sesuai style sama kebutuhan

    tambah.click(function() {
      container.append(tambahInput('text', 'Name'))
      container.append(tambahInput('text', 'Nim'))
      index++;
    }) //nambahin listener ke tombol tambah
  </script>
@stop
