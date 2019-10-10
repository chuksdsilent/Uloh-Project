<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uuloh</title>
    <link rel="stylesheet" href="{{ asset('/libraries/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/sweetalert/dist/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/fontawesome/css/all.css ') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/fontawesome/css/fontawesome.css ') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/owl/assets/owl.carousel.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('/libraries/owl/assets/owl.theme.default.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('/libraries/aos/aos.css ') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/template.css') }}">              
    <link rel="stylesheet"  href="{{asset('/libraries/navbar/css/style.css')}}">   
    <link rel="stylesheet"  href="{{asset('/libraries/navbar/css/reset.css')}}">   
	<link rel="stylesheet" type="text/css" media="all" href="{{ asset('libraries/navbar/css/stellarnav.css')}}">
    <script src="{{url('/libraries/navbar/js/modernizr.js')}}"></script>
    
</head>
<body>
<style>

</style>

<div class="client-container">
    <div class="mobile">
        <div class="stellarnav">
            <ul>
                @include('template.mobile_shop_by_dept')
                @include('template.mobile_find_professionals')
                @include('template.mobile_get_photo_idea')
                <li><a href="{{url('sign-up')}}">Sign Up</a></li>
                <li><a href="{{url('login')}}">Login</a></li>
            </ul>
        </div><!-- .stellarnav -->
    </div>
    <div class="desktop">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img src="{{url('backgrounds/logo.jpeg')}}" style="width: 150px; height: 50px;" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mr-3 ml-5">
                        <li class="nav-item active">
                           @include('template.desktop_shop_by_dept')                                   
                        </li>
                        <li class="nav-item active  mr-3 ">
                            @include('template.desktop_find_professionals')
                        </li>
                        <li class="nav-item active  mr-3">
                                @include('template.desktop_get_photo_idea')
                        </li>
                        {{-- <li class="nav-item active mr-5">
                            <a class="nav-link" href="#"> <i class="fas fa-clone"></i>   BLOG</a>
                        </li> --}}
                    </ul>
                    <ul class="navbar-nav" style="margin-left: 200px;">
                        <li class="nav-item active">
                            <a href="{{url('sign-up')}}" class="nav-link">
                            <i class="fas fa-user"></i>
                            Sign Up</a>
                        </li>
                        <li class="nav-item active">
                            <a href="{{url('login')}}" class="nav-link">
                            <i class="fas fa-lock"></i>
                            Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
<div>
@yield('content')
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 section">
                <h4>About</h4>
                <a href="{{url('/about-uuloh')}}">Uuloh</a>
                <a href="{{url('copyright-and-trademark-policy')}}">Copyright and Trademark Policy</a>
                <a href="{{url('cancellation-and-missing-item')}}">Cancellations and Missing Items</a>
                <a href="{{url('damaged-and-defective-items')}}">Damaged and Defective Items</a>
                <a href="{{url('return-and-refund')}}">Return Policy</a>
                <a href="{{url('terms-and-conditions')}}">Terms And Condition</a>
            </div>
            <div class="col-md-3 section">
                <h4>Get Help</h4>
                <a href="">Your Orders</a>
                <a href="">Shipping and Delivery</a>
                <a href="">7 Days Return Policy</a>
                <a href="">Review Professionals</a>
                <a href="">UULOH Support</a>
                <a href="">Contact Us</a>
            </div>
            <div class="col-md-3 section">
                <h4>Business Services</h4>
                <a href="">Advertisment</a>
                <a href="">Sell on uuloh</a>
                <a href="">Professional Services</a>
                <a href="">Premium Subscription</a>
            </div>
            <div class="col-md-3 section">
                <h4>Connect with Us</h4>
                <a href="" style="display: inline !important;">
                    <i class="fab fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="" style="display: inline !important;">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="" style="display: inline !important;">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</footer>

<script src={{ asset('libraries/jquery-3.4.1.min.js')}}></script>
<script src={{ asset('libraries/bootstrap/bootstrap.min.js')}}></script>
<script src="{{ asset('/libraries/aos/aos.js') }}"></script>
<script src="{{ asset('/libraries/owl/owl.carousel.min.js') }}"></script>
</body>
<script>
        $(function () {
          $('#myTab li:last-child a').tab('show')
        })
      </script>
<script>
    
    AOS.init({
        duration: 1500,
        once: true
    });
    $('.owl-carousel').owlCarousel({
        items: 4,
        loop:true,
        margin:10,
        autoplay: true,
        dots:false,
        slideTransition: 'linear',
        autoplayHoverPause: true,
        animateIn: true,
        slideBy: 1,
        rewind: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
</script>

<!-- required -->
<script type="text/javascript" src="{{url('libraries/navbar/js/stellarnav.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        jQuery('.stellarnav').stellarNav({
            theme: 'light',
            breakpoint: 1200,
            position: 'right',
            phoneBtn: '18009997788',
            locationBtn: 'https://www.google.com/maps'
        });
    });
</script>
@include('client.footer_javascript')
<!-- required -->

{{-- <script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script> --}}
</body>
</html>
