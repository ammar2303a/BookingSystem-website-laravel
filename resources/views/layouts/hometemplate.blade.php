<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from themebeyond.com/html/movflx/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Feb 2024 09:45:08 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Cinema World - Movies Booking System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{asset('homeassets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('homeassets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('homeassets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('homeassets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('homeassets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('homeassets/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('homeassets/css/odometer.css')}}">
        <link rel="stylesheet" href="{{asset('homeassets/css/aos.css')}}">
        <link rel="stylesheet" href="{{asset('homeassets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('homeassets/css/default.css')}}">
        <link rel="stylesheet" href="{{asset('homeassets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('homeassets/css/responsive.css')}}">
    </head>
    <style>
        .logbtn {
            border: none;
            background-color: transparent;
        }
    </style>
    <body>

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <img src="{{asset('homeassets/img/preloader.svg')}}" alt="">
                </div>
            </div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="htmlf">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header>
            <div id="sticky-header" class="menu-area transparent-header">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu-wrap">
                                <nav class="menu-nav show">
                                    <div class="logo">
                                        <a href="/">
                                            <img src="{{asset('homeassets/img/logo/logo.png')}}" alt="Logo">
                                        </a>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li class="active menu-item-has-children"><a href="/">Home</a>
                                               
                                            </li>
                                                
                                            <li class="menu-item-has-children"><a href="/showmovie">Movie</a>
                                              
                                            </li>
                                
                                            </li>
                                            <li><a href="/contact">contacts</a></li>
                                            
                                        </ul>
                                    </div>
                                    
                                    <div class="header-action d-none d-md-block">
                                        <ul>
                                            @if(Auth::check())
                                            @if(Auth::user()->role == "User")
                                            <li class= "header-btn mr-4"><a href="#" class="btn">{{ Auth::user()->name }}</a></li>
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                            <input type="submit" class=" btn header-btn" value="LOG OUT" style= "colour:white">
</form>
                                            @endif
                                            @else                                            
                                            <li class="header-btn"><a href="/register" class="btn">register</a></li>
                                            <li class="header-btn"><a href="/login" class="btn">Sign In</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </nav>
                            </div>

                                    <!-- <div class="header-action d-none d-md-block">
                                        <ul>
                                            
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div> -->

                            <!-- Mobile Menu  -->
                            <div class="mobile-menu">
                                <div class="close-btn"><i class="fas fa-times"></i></div>

                                <nav class="menu-box">
                                    <div class="nav-logo"><a href="index.html"><img src="{{asset('homeassets/img/logo/logo.png')}}" alt="" title=""></a>
                                    </div>
                                    <div class="menu-outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix">
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="menu-backdrop"></div>
                            <!-- End Mobile Menu -->

                        </div>
                    </div>
                </div>
            </div>
        </header>
      
  
        @yield('hometemplate')
        
        <!-- footer-area -->
        <footer>
            <div class="footer-top-wrap">
                <div class="container">
                    <div class="footer-menu-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <div class="footer-logo">
                                    <a href="index.html"><img src="{{asset('homeassets/img/logo/logo.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="footer-menu">
                                    <nav>
                                        <ul class="navigation">
                                            <li><a href="/">Home</a></li>
                                            <li><a href="/showmovie">Movie</a></li>
                                            <li><a href="/contact">Contact</a></li>
                                            <!-- <li><a href="index.html">tv show</a></li>
                                            <li><a href="index.html">pages</a></li>
                                            <li><a href="pricing.html">Pricing</a></li> -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-quick-link-wrap">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <div class="quick-link-list">
                                    <ul>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Help Center</a></li>
                                        <li><a href="#">Terms of Use</a></li>
                                        <li><a href="#">Privacy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="footer-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="copyright-text">
                                <p>Copyright &copy; 2021. All Rights Reserved By <a href="/">Cinema World</a></p>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-md-6">
                            <div class="payment-method-img text-center text-md-right">
                                <img src="{{asset('homeassets/img/images/card_img.png')}}" alt="img">
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area-end -->





		<!-- JS here -->
        <script src="{{asset('homeassets/js/vendor/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('homeassets/js/popper.min.js')}}"></script>
        <script src="{{asset('homeassets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('homeassets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('homeassets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('homeassets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('homeassets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('homeassets/js/jquery.odometer.min.js')}}"></script>
        <script src="{{asset('homeassets/js/jquery.appear.js')}}"></script>
        <script src="{{asset('homeassets/js/slick.min.js')}}"></script>
        <script src="{{asset('homeassets/js/ajax-form.js')}}"></script>
        <script src="{{asset('homeassets/js/wow.min.js')}}"></script>
        <script src="{{asset('homeassets/js/aos.js')}}"></script>
        <script src="{{asset('homeassets/js/plugins.js')}}"></script>
        <script src="{{asset('homeassets/js/main.js')}}"></script>
    </body>

<!-- Mirrored from themebeyond.com/html/movflx/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Feb 2024 09:45:26 GMT -->
</html>