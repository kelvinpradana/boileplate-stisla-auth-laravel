<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="description" content="kompetensi" />

  <meta name="author" content="Themefisher.com" />

  <title>Kompetensi</title>

  <!-- Mobile Specific Meta
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo.png')}}" />

  <!-- CSS
  ================================================== -->
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{asset('template/plugins/themefisher-font/style.css')}}" />
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('template/plugins/bootstrap/css/bootstrap.min.css')}}" />
  <!-- Lightbox.min css -->
  <link rel="stylesheet" href="{{asset('template/plugins/lightbox2/dist/css/lightbox.min.css')}}" />
  <!-- animation css -->
  <link rel="stylesheet" href="{{asset('template/plugins/animate/animate.css')}}" />
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{asset('template/plugins/slick/slick.css')}}" />
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('template/css/style.css')}}" />
</head>

<body id="body">
  <!--
  Start Preloader
  ==================================== -->
  <div id="preloader">
    <div class="preloader">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <!--
  End Preloader
  ==================================== -->

  <!--
Fixed Navigation
==================================== -->
  <header class="navigation fixed-top">
    <div class="container">
      <!-- main nav -->
      <nav class="navbar navbar-expand-lg navbar-light">
        <!-- logo -->
        <a class="navbar-brand logo" href="index.html">
          <img class="logo-default" width="200px" src="{{ asset('assets/img/badiklat.png')}}" alt="logo" />
          <img class="logo-white" width="200px" src="{{ asset('assets/img/badiklat1.png')}}" alt="logo" />
        </a>
        <!-- /logo -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Program Pelatihan </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Modul & Kurikulum</a>
                <a class="dropdown-item" href="#">Kalender Pelatihan</a>
                <a class="dropdown-item" href="#">Analisa Laporan Pelatihan</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pelakasanaan Pelatihan </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('register')}}">Registrasi Peserta Pelatihan</a>
                <a class="dropdown-item" href="#">Sertifikasi Pelatihan</a>
                <a class="dropdown-item" href="#">Alumni</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Evaluasi Pelatihan </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Evaluasi Pelatihan</a>
                <a class="dropdown-item" href="#">Evaluasi Pasca Pelatihan</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://kompetensi.kemenkumham.go.id/">Jabatan & Kompetensi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://lcbadiklat-jateng.kemenkumham.go.id/">BLC</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- /main nav -->
    </div>
  </header>
  <!--
End Fixed Navigation
==================================== -->

  <div class="hero-slider">
    @foreach($carousels as $carousel)
    <div class="slider-item th-fullpage hero-area" style="background-image: url('{{ asset('/img/'.$carousel->image)}}');">

    </div>
    @endforeach
    <!-- <div class="slider-item th-fullpage hero-area" style="background-image: url('images/slider/slider-bg-2.jpg')">
        
      </div> -->
  </div>

  <!--
		Start Blog Section
		=========================================== -->

  <section class="blog" id="blog">
    <div class="container">
      <div class="row">
        <!-- section title -->
        <div class="col-12">
          <div class="title text-center">
            <h2>Berita <span class="color">Terkini</span></h2>

          </div>
        </div>
        <!-- /section title -->
        <!-- single blog post -->
        @foreach($beritas as $berita)
          <article class="col-md-4 col-sm-6 col-xs-12 clearfix">
            <div class="post-item">
              <div class="media-wrapper">
                <img src="{{ asset('berita/'.$berita->img)}}" alt="amazing caves coverimage" class="img-fluid" />
              </div>

              <div class="content">
                <h3><a href="single-post.html">{{$berita->judul}}</a></h3>
                <p>{!! substr($berita->isi,200) !!}</p>
                <a class="btn btn-main" href="{{route('getdetail',$berita->id)}}">Read more</a>
              </div>
            </div>
          </article>
          @endforeach
        <!-- end single blog post -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  <!-- end section -->

  <!--
Start Call To Action
==================================== -->
  <section class="call-to-action section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>Pengumuman</h2>
          <p>
          <h3> {{$setting->pengumuman}} </h3>
          </p>
        </div>
      </div>
      <!-- End row -->
    </div>
    <!-- End container -->
  </section>
  <!-- End section -->

  <!--
Start About Section
==================================== -->
  <section class="about-2 section" id="about">
    <div class="container">
    
      <!-- End row -->
    </div>
    <!-- End container -->
  </section>
  <!-- End section -->

  <footer id="footer" class="bg-one">
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-3 col-lg-3">
            <ul>
              <li>
                <h3>Tautan</h3>
              </li>
              <li><a href="#">Rumah Belajar</a></li>
              <li><a href="#">BLC</a></li>
              <li><a href="#">Jabatan & Kompetensi</a></li>
            </ul>
          </div>
          <!-- End of .col-sm-3 -->

          <div class="col-sm-3 col-md-3 col-lg-3">
            <ul>
              <li>
                <h3>Kontak Kami</h3>
              </li>
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Youtube</a></li>
              <li><a href="#">Pinterest</a></li>
            </ul>
          </div>
          <!-- End of .col-sm-3 -->

          <div class="col-sm-3 col-md-3 col-lg-3">
            <ul>
              <li>
                <h3>Jalan Raya Mr. Moch Ichsan, Kelurahan Wates, Kecamatan Ngaliyan, Semarang – Jawa Tengah</h3>
              </li>
              <li>
                <h3>08112896960</h3>
              </li>
              <li>
                <h3>badiklatkumham.jateng@gmail.com</h3>
              </li>
            </ul>
          </div>
          <!-- End of .col-sm-3 -->
        </div>
      </div>
      <!-- end container -->
    </div>
  </footer>
  <!-- end footer -->


  <footer id="footer" class="bg-one">

    <div class="footer-bottom">
      <h5>Copyright {{date('Y')}} All rights reserved.</h5>
      <h6>Design by <a href="">Themefisher</a></h6>
    </div>
  </footer>
  <!-- end footer -->

  <!-- end Footer Area
    ========================================== -->

  <!-- 
    Essential Scripts
    =====================================-->
  <!-- Main jQuery -->
  <script src="{{ asset('template/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
  <script src="{{ asset('template/plugins/google-map/gmap.js')}}"></script>

  <!-- Form Validation -->
  <script src="{{ asset('template/plugins/form-validation/jquery.form.js')}}"></script>
  <script src="{{ asset('template/plugins/form-validation/jquery.validate.min.js')}}"></script>

  <!-- Bootstrap4 -->
  <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- Parallax -->
  <script src="{{ asset('template/plugins/parallax/jquery.parallax-1.1.3.js')}}"></script>
  <!-- lightbox -->
  <script src="{{ asset('template/plugins/lightbox2/dist/js/lightbox.min.js')}}"></script>
  <!-- Owl Carousel -->
  <script src="{{ asset('template/plugins/slick/slick.min.js')}}"></script>
  <!-- filter -->
  <script src="{{ asset('template/plugins/filterizr/jquery.filterizr.min.js')}}"></script>
  <!-- Smooth Scroll js -->
  <script src="{{ asset('template/plugins/smooth-scroll/smooth-scroll.min.js')}}"></script>

  <!-- Custom js -->
  <script src="{{ asset('template/js/script.js')}}"></script>
</body>

</html>