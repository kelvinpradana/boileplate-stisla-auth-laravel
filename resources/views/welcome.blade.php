<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Kompetensi badiklat</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="images/favicon.png">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('constra/plugins/bootstrap/bootstrap.min.css ') }}">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="{{ asset('constra/plugins/fontawesome/css/all.min.css ') }}">
  <!-- Animation -->
  <link rel="stylesheet" href="{{ asset('constra/plugins/animate-css/animate.css') }}">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="{{ asset('constra/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('constra/plugins/slick/slick-theme.css') }}">
  <!-- Colorbox -->
  <link rel="stylesheet" href="{{ asset('constra/plugins/colorbox/colorbox.css') }}">
  <!-- Template styles-->
  <link rel="stylesheet" href="{{ asset('constra/css/style.css ') }}">

</head>
<body>
  <div class="body-inner">

   
    <!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-one">
  

  <div class="site-navigation">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
                      

                      <li class="nav-item"><a class="nav-link" href="{{url('/login')}}">Login</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{url('/register')}}">Register</a></li>
                      <li class="nav-item"><a class="nav-link" href="#">Prolat {{$prolat->tahun}}</a></li>
                      <li class="nav-item"><a class="nav-link" href="https://kompetensi.kemenkumham.go.id/">Jabatan & Kompetensi</a></li>
                      <li class="nav-item"><a class="nav-link" href="https://lcbadiklat-jateng.kemenkumham.go.id/">BLC</a></li>
                    </ul>
                </div>
              </nav>
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->

        <div class="search-block" style="display: none;">
          <label for="search-field" class="w-100 mb-0">
            <input type="text" class="form-control" id="search-field" placeholder="Type what you want and enter">
          </label>
          <span class="search-close">&times;</span>
        </div><!-- Site search end -->
    </div>
    <!--/ Container end -->

  </div>
  <!--/ Navigation end -->
</header>
<!--/ Header end -->

<div class="banner-carousel banner-carousel-1 mb-0">
@foreach($carousels as $carousel)
  <div class="banner-carousel-item" style="background-image:url('{{ asset('/img/'.$carousel->image) }}')">
    <div class="slider-content">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12 text-center">
                <!-- <h2 class="slide-title" data-animation-in="slideInLeft">17 Years of excellence in</h2>
                <h3 class="slide-sub-title" data-animation-in="slideInRight">Construction Industry</h3> -->
                
              </div>
          </div>
        </div>
    </div>
  </div>
@endforeach
</div>

<section class="call-to-action-box no-padding">
  <div class="container">
    <div class="action-style-box">
        <div class="row align-items-center">
          <div class="col-md-12 text-center text-md-left">
              <div class="call-to-action-text">
                <h3 class="action-title">{{$setting->pengumuman}}</h3>
              </div>
          </div><!-- Col end -->
          
          <!-- col end -->
        </div><!-- row end -->
    </div><!-- Action style box -->
  </div><!-- Container end -->
</section><!-- Action end -->

  <footer id="footer" class="footer bg-overlay">

    <div class="copyright">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="copyright-info text-center text-md-left">
              <span>Copyright &copy; <script>
                  document.write(new Date().getFullYear())
                </script>, Designed &amp; Developed by <a href="https://themefisher.com">Themefisher</a></span>
            </div>
          </div>

          <!-- <div class="col-md-6">
            <div class="footer-menu text-center text-md-right">
              <ul class="list-unstyled">
                <li><a href="about.html">About</a></li>
                <li><a href="team.html">Our people</a></li>
                <li><a href="faq.html">Faq</a></li>
                <li><a href="news-left-sidebar.html">Blog</a></li>
                <li><a href="pricing.html">Pricing</a></li>
              </ul>
            </div>
          </div> -->
        </div><!-- Row end -->

        <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
          <button class="btn btn-primary" title="Back to Top">
            <i class="fa fa-angle-double-up"></i>
          </button>
        </div>

      </div><!-- Container end -->
    </div><!-- Copyright end -->
  </footer><!-- Footer end -->


  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src="{{ asset('constra/plugins/jQuery/jquery.min.js ') }}"></script>
  <!-- Bootstrap jQuery -->
  <script src="{{ asset('constra/plugins/bootstrap/bootstrap.min.js ') }}" defer></script>
  <!-- Slick Carousel -->
  <script src="{{ asset('constra/plugins/slick/slick.min.js ') }}"></script>
  <script src="{{ asset('constra/plugins/slick/slick-animation.min.js ') }}"></script>
  <!-- Color box -->
  <script src="{{ asset('constra/plugins/colorbox/jquery.colorbox.js ') }}"></script>
  <!-- shuffle -->
  <script src="{{ asset('constra/plugins/shuffle/shuffle.min.js ') }}" defer></script>


  <!-- Template custom -->
  <script src="{{ asset('constra/js/script.js ') }}"></script>

  </div><!-- Body inner end -->
  </body>

  </html>