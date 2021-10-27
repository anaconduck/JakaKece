<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <title>JAKA KECE | {{ $title ?? ''}}</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/templatemo-grad-school.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
</head>

<body style="position: relative">
 <!-- ***** Main Banner Area Start ***** -->
  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em>JAKA</em> KECE</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="{{ url('/home') }}" class="{{ $home ?? 'external' }}">Home</a></li>
        <li class="{{ $inkubasi ?? 'external' }}"><a href="{{ url('/inkubasi') }}">Inkubasi Digital Bahasa</a></li>
        <li class="{{ $jawara ?? 'external' }}"><a href="{{ ('/jawara') }}" >Jawara Center</a></li>
        <li class="{{ $exchange ?? 'external' }}"><a href="{{ url('/exchange') }}" >Student Exchange</a></li>
        <li class="{{ $training ?? 'eksternal' }}"><a href="{{ url('/training') }}" class="{{ $training ?? 'eksternal' }}">On The Job Training</a></li>
        <li class="{{ $user_s ?? 'eksternal' }}"><a href="{{ url('/user') }}" ><img src="{{ asset('assets/images/businessman.png') }}" width="20px"></a></li>
      </ul>
    </nav>
  </header>

  @yield('slot')

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><i class="fa fa-copyright"></i> Copyright 2021 by Wahyu & Ziyad

            | Design: <a href="https://https://mziyadam.github.io/JAKA/" rel="sponsored" target="_parent">JAKA</a></p>
        </div>
      </div>
    </div>
  </footer>
<style>
    section{
        min-height: 100vh;
    }
  .blk{
    color: black;
  }
  .inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;

}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 320px;
  overflow-y: auto;
}
</style>
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/js/isotope.min.js')}}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js')}}"></script>
  <script src="{{ asset('assets/js/lightbox.js')}}"></script>
  <script src="{{ asset('assets/js/tabs.js')}}"></script>
  <script src="{{ asset('assets/js/video.js')}}"></script>
  <script src="{{ asset('assets/js/slick-slider.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>
  <script>
    //according to loftblog tut
    let link_materi= $('#materi');
      const link = "{{ url('/') }}";
      $('#opsi-materi').on('change',function(){
          link_materi.attr('href',link+"/toefl/"+this.value.toLowerCase()+"/1");
      });

      let link_materi_ielts= $('#materiielts');
      $('#opsiielts').on('change',function(){
          link_materi_ielts.attr('href',link+"/ielts/"+this.value.toLowerCase()+"/1");
      });

    $('.nav li:first').addClass('active');

  </script>


  <style>
    :root {
      --backgroundColor: rgba(246, 241, 209);
      --colorShadeA: rgb(106, 163, 137);
      --colorShadeB: rgb(121, 186, 156);
      --colorShadeC: rgb(150, 232, 195);
      --colorShadeD: rgb(187, 232, 211);
      --colorShadeE: rgb(205, 255, 232);
    }

    @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");

    * {
      box-sizing: border-box;
    }

    *::before,
    *::after {
      box-sizing: border-box;
    }

    button {
      position: relative;
      display: inline-block;
      cursor: pointer;
      outline: none;
      border: 0;
      vertical-align: middle;

      text-decoration: none;
      font-size: 1.5rem;
      color: var(--colorShadeA);
      font-weight: 700;
      text-transform: uppercase;
      font-family: inherit;
    }

    button.big-button {
      padding: 1em 2em;
      border: 2px solid var(--colorShadeA);
      border-radius: 1em;
      background: var(--colorShadeE);
      transform-style: preserve-3d;
      transition: all 175ms cubic-bezier(0, 0, 1, 1);
    }

    button.big-button::before {
      position: absolute;
      content: '';
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: var(--colorShadeC);
      border-radius: inherit;
      box-shadow: 0 0 0 2px var(--colorShadeB), 0 0.75em 0 0 var(--colorShadeA);
      transform: translate3d(0, 0.75em, -1em);
      transition: all 175ms cubic-bezier(0, 0, 1, 1);
    }


    button.big-button:hover {
      background: var(--colorShadeD);
      transform: translate(0, 0.375em);
    }

    button.big-button:hover::before {
      transform: translate3d(0, 0.75em, -1em);
    }

    button.big-button:active {
      transform: translate(0em, 0.75em);
    }

    button.big-button:active::before {
      transform: translate3d(0, 0, -1em);

      box-shadow: 0 0 0 2px var(--colorShadeB), 0 0.25em 0 0 var(--colorShadeB);

    }
  </style>
  <script src="http://code.jquery.com/jquery.js"></script>

  <!-- If no online access, fallback to our hardcoded version of jQuery -->
  <script>
      window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')
  </script>

  <!-- Bootstrap JS -->
  <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

  @yield('script')
</body>

</html>
