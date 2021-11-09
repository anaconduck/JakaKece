@extends('layouts.admin')

@section('css')
<style>
    .menu{
        width: 30px;
    }
    .close{
        width: 20px;
        margin: 0 !important;
        padding: 0 !important;
    }
    .btn-close{
        border: none;
    }
    .btn-close:hover{
        background: none;
    }
    table tbody tr:hover{
        cursor: pointer;
        background-color: rgb(95, 95, 95) !important;
        color: white;
    }
    table tbody tr:hover p{
        color: white;
    }
    a.active{
        background-color: #535ba0 !important;
        color: white !important;
    }
    .search-box{
        width: fit-content;
        height: fit-content;
        position: relative;
        margin-right: 30px;
    }
    .search-box img{
        width: 20px!important;
        color: white
    }
    .input-search{
        height: 50px;
        width: 50px;
        border-style: none;
        padding: 10px;
        font-size: 18px;
        letter-spacing: 2px;
        outline: none;
        border-radius: 25px;
        transition: all .5s ease-in-out;
        background-color: #8bc3ff;
        padding-right: 40px;
        color:#000;
    }
    .input-search::placeholder{
        color:rgba(75, 75, 75, 0.5);
        font-size: 18px;
        letter-spacing: 2px;
        font-weight: 100;
    }
    .btn-search{
        width: 50px;
        height: 50px;
        border-style: none;
        font-size: 20px;
        font-weight: bold;
        outline: none;
        cursor: pointer;
        border-radius: 50%;
        position: absolute;
        right: 0px;
        color:#000 ;
        background-color:transparent;
        pointer-events: painted;
        padding: 0;
    }
    .btn-search:hover{
        background-color: #8bc3ff !important;
    }
    .btn-search:focus ~ .input-search{
        width: 300px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom:1px solid rgba(68, 68, 68, 0.5);
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }
    .input-search:focus{
        width: 300px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom:1px solid rgba(20, 20, 20, 0.5);
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }
    ol{
        list-style-type: upper-alpha;
    }
    tbody{
        text-align: justify;
    }
    p.teks{
        font-family: 'Roboto Slab', sans-serif !important;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        max-width: 600px;
        overflow: hidden;
        text-overflow: ellipsis;
        height:100px;
    }
</style>
@stop

@section('slot')
<div class="page-heading">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h1>Practice - Inkubasi Bahasa</h1>
        </div>
      </div>
    </div>
</div>
<section class="tables">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading mb-5">
            <h2>Daftar Soal</h2>
            <div class="d-flex flex-row-reverse bd-highlight">

                <a class="btn btn-primary" href="{{ url('/admin/inkubasi/practice/create') }}" role="button">Tambah Soal</a>
                <div class="search-box">
                    <button class="btn-search"><img src="{{ asset('assets/images/search.png') }}"/></button>
                    <input type="text" class="input-search" placeholder="Type to Search...">
                </div>
            </div>
          </div>
          <div class="default-table table-responsive">
            <table>
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Type</th>
                  <th>Question</th>
                  <th>Option</th>
                  <th>Answer</th>
                  <th>Category</th>
                </tr>
              </thead>
              <tbody class="table-hover">
                @foreach ($quest as $data)
                    <tr id="{{ $data->id }}">
                        <td>{{ $ind++ }}</td>
                        <td>{{ $data->type }}</td>
                        <td><p class="teks">{{ $data->teks }}</p></td>
                        <td>
                            @php
                                $data->opsi = explode('|',$data->opsi)
                            @endphp
                            <ol>
                                @foreach ($data->opsi as $opsi)
                                    <li>{{ $opsi }}</li>
                                @endforeach
                            </ol>
                        </td>
                        <td>{{ $data->jawaban }}</td>
                        <td>{{ $data->kategori }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
            <ul class="table-pagination">
                @if ($page > 1)
                    <li><a href="{{ url("/admin/inkubasi/practice")."/".($page-1) }}">Previous</a></li>
                @else
                    <li>Previous</li>
                @endif
              @for ($ind = 1; $ind <= $total;$ind++)
                @if ($page == $ind)
                    <li><a href="#" class="active">{{ $ind }}</a></li>
                @else
                    <li><a href="{{ url("/admin/inkubasi/practice/$ind") }}">{{ $ind }}</a></li>
                @endif
              @endfor
              @if ($page < $total)
                    <li><a href="{{ url("/admin/inkubasi/practice")."/".($page+1) }}">Next</a></li>
                @else
                    <li>Next</li>
                @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop

@section('js')
<script>
    $('tbody tr').on('click',function(){
        window.location = "{{ url('/admin/practice') }}"+"/"+this.id
    })
</script>
@stop

