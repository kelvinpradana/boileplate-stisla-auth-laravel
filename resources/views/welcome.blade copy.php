<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fame - One Page Multipurpose Bootstrap Theme</title>
    <style>
.nav-bar {
  height: 90px;
  background: #262626;
}
 
.brand {
  position: absolute;
  padding-left: 20px;
  float: left;
  line-height: 70px;
  text-transform: uppercase;
  font-size: 1.4em;
  margin-top: 5px;
  margin-left: 100px;
}
.brand a img {
 max-height: 70px;
}
.brand a,
.brand a:visited {
  color: #ffffff;
  text-decoration: none;
}
 
/* .nav-container {
  margin: 0 auto;
} */
 
nav {
  float: right;
}
nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
nav ul li {
  float: left;
  position: relative;
}
nav ul li a,
nav ul li a:visited {
  display: block;
  padding: 0 20px;
  line-height: 70px;
  background: #262626;
  color: #ffffff;
  text-decoration: none;
}
nav ul li a:hover,
nav ul li a:visited:hover {
  background: #2ab1ce;
  color: #ffffff;
}
nav ul li a:not(:only-child):after,
nav ul li a:visited:not(:only-child):after {
  padding-left: 4px;
  content: ' ▾';
}
nav ul li ul li {
  min-width: 190px;
}
nav ul li ul li a {
  padding: 15px;
  line-height: 20px;
}
 
.nav-dropdown {
  position: absolute;
  display: none;
  z-index: 1;
  box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
}
.nav-mobile {
  display: none;
  position: absolute;
  top: 0;
  right: 0;
  background: #262626;
  height: 70px;
  width: 70px;
}
 
@media only screen and (max-width: 798px) {
  .nav-mobile {
    display: block;
  }
 
  nav {
    width: 100%;
    padding: 70px 0 15px;
  }
  nav ul {
    display: none;
  }
  nav ul li {
    float: none;
  }
  nav ul li a {
    padding: 15px;
    line-height: 20px;
 padding-left: 25%;
 
  }
  nav ul li ul li a {
    padding-left: 30%;
  }
 
  .nav-dropdown {
    position: static;
  }
 .brand a img {
 max-height: 60px;
 margin-top: 5px;
 }
}
@media screen and (min-width: 799px) {
  .nav-list {
    display: block !important;
  }
}
#nav-toggle {
  position: absolute;
  left: 18px;
  top: 22px;
  cursor: pointer;
  padding: 10px 35px 16px 0px;
}
#nav-toggle span,
#nav-toggle span:before,
#nav-toggle span:after {
  cursor: pointer;
  border-radius: 1px;
  height: 5px;
  width: 35px;
  background: #ffffff;
  position: absolute;
  display: block;
  content: '';
  transition: all 300ms ease-in-out;
}
#nav-toggle span:before {
  top: -10px;
}
#nav-toggle span:after {
  bottom: -10px;
}
#nav-toggle.active span {
  background-color: transparent;
}
#nav-toggle.active span:before, #nav-toggle.active span:after {
  top: 0;
}
#nav-toggle.active span:before {
  transform: rotate(45deg);
}
#nav-toggle.active span:after {
  transform: rotate(-45deg);
}
    </style>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('home/asset/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Font Awesome CSS -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet">
    
    
    <!-- Animate CSS -->
    <link href="{{ asset('home/css/animate.css') }}" rel="stylesheet" >
    
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.css') }}" >
    <link rel="stylesheet" href="{{ asset('home/css/owl.theme.css') }}" >
    <link rel="stylesheet" href="{{ asset('home/css/owl.transitions.css') }}" >

    <!-- Custom CSS -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet">
    
    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/color/green.css') }}">
    
    
    
    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/color/green.css') }}" title="green">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/color/light-red.css') }}" title="light-red">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/color/blue.css') }}" title="blue">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/color/light-blue.css') }}" title="light-blue">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/color/yellow.css') }}" title="yellow">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/color/light-green.css') }}" title="light-green">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    
    
    <!-- Modernizer js -->
    <script src="{{asset('home/js/modernizr.custom.js') }}"></script>

    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="index">
    
    
    <!-- Styleswitcher
================================================== -->
        <div class="colors-switcher">
            <a id="show-panel" class="hide-panel"><i class="fa fa-tint"></i></a>        
                <ul class="colors-list">
                    <li><a title="Light Red" onClick="setActiveStyleSheet('light-red'); return false;" class="light-red"></a></li>
                    <li><a title="Blue" class="blue" onClick="setActiveStyleSheet('blue'); return false;"></a></li>
                    <li class="no-margin"><a title="Light Blue" onClick="setActiveStyleSheet('light-blue'); return false;" class="light-blue"></a></li>
                    <li><a title="Green" class="green" onClick="setActiveStyleSheet('green'); return false;"></a></li>
                    
                    <li class="no-margin"><a title="light-green" class="light-green" onClick="setActiveStyleSheet('light-green'); return false;"></a></li>
                    <li><a title="Yellow" class="yellow" onClick="setActiveStyleSheet('yellow'); return false;"></a></li>
                    
                </ul>

        </div>  
<!-- Styleswitcher End
================================================== -->

    <!-- Navigation -->
    <section class="nav-bar">
  <div class="nav-container">
    <div class="brand">
      <a href="https://webdevtrick.com/"><img src="https://webdevtrick.com/wp-content/uploads/logo-fb-1.png"></a>
    </div>
    <nav>
      <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
      <ul class="nav-list">
        <li>
          <a href="#">Home</a>
        </li>
        <!-- <li>
          <a href="#">Web Design</a>
        </li> -->
        <li>
            <a href="#">Pelatihan</a>
            <ul class="nav-dropdown">
                    <li><a href="#">Modul & Kurikulum</a></li>
                    <li><a href="#">Kalender & Pelatihan</a></li>
                    <li><a href="#">Analisa Laporan Pelatihan</a></li>
             </ul>
        </li>
        <li>
            <a href="#">Pelaksanaan</a>
            <ul class="nav-dropdown">
                    <li><a href="{{route('login')}}">Registrasi Peserta</a></li>
                    <li><a href="#">Sertivikasi Pelatihan</a></li>
                    <li><a href="#">Alumni</a></li>
             </ul>
        </li>
        <li>
            <a href="#">Evaluasi</a>
            <ul class="nav-dropdown">
                    <li><a href="#">Evaluasi Pelatihan</a></li>
                    <li><a href="#">Evaluasi Pasca Pelatihan</a></li>
            </ul>
        </li>
        <li>
            <a href="#pricing">BLC</a>
        </li>
        <li>
            <a href="#">Jabatan & Kompetensi</a>
        </li>
        
        <li>
            <a href="#pricing">Silaba</a>
        </li>
        <li>
            <a href="{{route('login')}}">Login</a>
        </li>
        <li><a href="#">Pelaksanaan Pelatihan</a>
            <ul class="nav-dropdown">
            <li><a href="#">Modul & Kurikulum</a></li>
            <li><a href="#">Kalender Pelatihan</a></li>
            <li><a href="{{route('login')}}">Analisa Laporan Pelatihan</a></li>
            </ul>
        </li>

      </ul>
    </nav>
  </div>
</section>
    <!-- Start Home Page Slider -->
    <section id="page-top">
        <!-- Carousel -->
        <div id="main-slide" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <!--/ Indicators end-->

            <!-- Carousel inner -->
            <div class="carousel-inner">
                <!-- <div class="item active">
                    <img class="img-responsive" src="{{ asset('home/images/header-bg-1.jpg ')}}" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated3">
                                <span><strong>Fame</strong> for the highest</span>
                            </h1>
                            <p class="animated2">At vero eos et accusamus et iusto odio dignissimos<br> ducimus qui blanditiis praesentium voluptatum</p>	
                            <a href="#feature" class="page-scroll btn btn-primary animated1">Read More</a>
                        </div>
                    </div>
                </div> -->
                <!--/ Carousel item end -->
                <?php $i = 0;$active = '' ?>
                @foreach($carousels as $carousel)
                <?php if($i == 0) {
                  $active='active';
                }else {
                  $active = '';
                }
                $i++;
                ?>
                <div class="item {{$active}}">
                    <img class="img-responsive" src="{{  asset('/img/'.$carousel->image) }}" alt="slider">
                    <p>$carousel->image</p>
                    <!-- <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated1">
                    		  <span>Welcome to <strong>Fame</strong></span>
                    	    </h1>
                            <p class="animated2">Generate a flood of new business with the<br> power of a digital media platform</p>
                            <a href="#feature" class="page-scroll btn btn-primary animated3">Read More</a>
                        </div>
                    </div> -->
                </div>
                @endforeach
            </div>
            <!-- Carousel inner end-->

            <!-- Controls -->
            <a class="left carousel-control" href="#main-slide" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
            </a>
            <a class="right carousel-control" href="#main-slide" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
            </a>
        </div>
        <!-- /carousel -->
    </section>
    <!-- End Home Page Slider -->    
    
    <!-- Start Latest News Section -->
    <section id="latest-news" class="latest-news-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Berita Terbaru</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="latest-news">
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="{{ asset('home/images/about-01.jpg') }}" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>31</strong> <br>Dec , 2014</span>
                                
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="{{ asset('home/images/about-02.jpg') }}" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>17</strong> <br>Feb , 2014</span>
                                
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="{{ asset('home/images/about-03.jpg') }}" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>08</strong> <br>Aug , 2014</span>
                                
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="{{ asset('home/images/about-01.jpg') }}" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>08</strong> <br>Aug , 2014</span>
                                
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="{{ asset('home/images/about-02.jpg') }}" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>08</strong> <br>Aug , 2014</span>
                                
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="{{ asset('home/images/about-03.jpg') }}" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>08</strong> <br>Aug , 2014</span>
                                
                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Latest News Section -->
    <!-- Start Testimonial Section -->
    <div id="testimonial" class="testimonial-section">
        <div class="container">
            <!-- Start Testimonials Carousel -->
            <div id="testimonial-carousel" class="testimonials-carousel">
                <!-- Testimonial content -->
                @foreach($setting as $s)
                <div class="testimonials item">
                    <div class="testimonial-content">
                        <p>{{$s->pengumuman}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- End Testimonials Carousel -->
        </div>
    </div>
    <!-- End Testimonial Section -->
    
    

    <!-- Clients Aside -->
    <section id="partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Our Honorable Partner</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="clients">
                    
                    <div class="col-md-12">
                        <img src="{{ asset('home/images/logos/themeforest.jpg') }}" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="{{ asset('home/images/logos/creative-market.jpg') }}" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="{{ asset('home/images/logos/designmodo.jpg') }}" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="{{ asset('home/images/logos/creative-market.jpg') }}" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="{{ asset('home/images/logos/microlancer.jpg') }}" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="{{ asset('home/images/logos/themeforest.jpg') }}" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="{{ asset('home/images/logos/microlancer.jpg') }}" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="{{ asset('home/images/logos/designmodo.jpg') }}" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="{{ asset('home/images/logos/creative-market.jpg') }}" class="img-responsive" alt="...">
                    </div>
                    
                    <div class="col-md-12">
                        <img src="{{ asset('home/images/logos/designmodo.jpg') }}" class="img-responsive" alt="...">
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    

    <div id="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>

    

    <!-- jQuery Version 2.1.1 -->
    <script src="{{asset('home/js/jquery-2.1.1.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('home/asset/js/bootstrap.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('home/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{asset('home/js/classie.js') }}"></script>
    <script src="{{asset('home/js/count-to.js') }}"></script>
    <script src="{{asset('home/js/jquery.appear.js') }}"></script>
    <script src="{{asset('home/js/cbpAnimatedHeader.js') }}"></script>
    <script src="{{asset('home/js/owl.carousel.min.js') }}"></script>
	<script src="{{asset('home/js/jquery.fitvids.js') }}"></script>
	<script src="{{asset('home/js/styleswitcher.js') }}"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{asset('home/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{asset('home/js/contact_me.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('home/js/script.js') }}"></script>
    <script>
    
    (function($) { 
        $(function() { 
			$('nav ul li a:not(:only-child)').click(function(e) {
				$('.nav-dropdown').hide();
				$(this).siblings('.nav-dropdown').toggle();
				$('.dropdown').not($(this).siblings()).hide();
				e.stopPropagation();
				
			});
			$('html').click(function() {
				$('.nav-dropdown').hide();
			});
			$('#nav-toggle').click(function() {
				$('nav ul').slideToggle();
			});
			$('#nav-toggle').on('click', function() {
				this.classList.toggle('active');
			});
        }); 
    })(jQuery);
    </script>

</body>

</html>
