@extends('layouts.admin')

@section('slot')
      <div class="row">
        <div class="col-md-12">
          <div class="banner-content">
            <div class="row">
              <div class="col-md-12">
                <div class="banner-caption">
                  <h4>Hello, <em>Admin</em></h4>
                  <span>Selamat Datang</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <section class="services">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <div class="service-item first-item">
                <div class="icon"></div>
                <h4>{{ $num_materi ?? 0 }}</h4>
                <p>Total materi<br>TOEFL-ITP, TOEFL-IBT, IELTS, TOEIC</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="service-item second-item">
                <div class="icon"></div>
                <h4>{{ $num_event_jawara ?? 0}}</h4>
                <p>Event Jawara</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="service-item third-item">
                <div class="icon"></div>
                <h4>{{ $num_se_event ?? 0}}</h4>
                <p>Event Student Exchange</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="service-item fourth-item">
                <div class="icon"></div>
                <h4>{{ $num_ojt_event ?? 0}}</h4>
                <p>Event On the Job Training</p>
              </div>
            </div>
          </div>
        </div>
      </section>
@stop
