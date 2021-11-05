@extends('layouts.admin')

@section('slot')
<div class="page-heading">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h1>Materi - Inkubasi Bahasa</h1>
        </div>
      </div>
    </div>
</div>
<section class="tables">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Tables</h2>
          </div>
          <div class="default-table">
            <table>
              <thead>
                <tr>
                  <th>Product no.</th>
                  <th>Description</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#1011</td>
                  <td>Lorem ipsum dolor sit amet</td>
                  <td>$20.50</td>
                </tr>
                <tr>
                  <td>#1012</td>
                  <td>Lorem ipsum dolor sit amet</td>
                  <td>$20.50</td>
                </tr>
                <tr>
                  <td>#1013</td>
                  <td>Lorem ipsum dolor sit amet</td>
                  <td>$20.50</td>
                </tr>
                <tr>
                  <td>#1014</td>
                  <td>Lorem ipsum dolor sit amet</td>
                  <td>$20.50</td>
                </tr>
                <tr>
                  <td>#1015</td>
                  <td>Lorem ipsum dolor sit amet</td>
                  <td>$20.50</td>
                </tr>
              </tbody>
            </table>
            <ul class="table-pagination">
              <li><a href="#">Previous</a></li>
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">...</a></li>
              <li><a href="#">8</a></li>
              <li><a href="#">9</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
