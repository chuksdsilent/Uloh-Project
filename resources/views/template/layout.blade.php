<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Interior</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu+Mono&display=swap" rel="stylesheet">		<!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="{{ asset('/libraries/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('/libraries/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/libraries/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('/libraries/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('/libraries/nice-select.css') }}">							
        <link rel="stylesheet" href="{{ asset('/libraries/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/libraries/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('libraries/main.css') }}">
        <link rel="stylesheet" href="{{ asset('/libraries/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('/libraries/fontawesome/css/all.css') }}" />
        <link rel="stylesheet" href="{{ asset('/libraries/fontawesome/css/fontawesome.css') }}" />
        

    </head>
    <body>	
        @yield('content')

			<!-- start footer Area -->		
        <footer class="footer-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>About Us</h6>
                            <p>
                                If you own an Iphone, you’ve probably already worked out how much fun it is to use it to watch movies-it has that.
                            </p>								
                        </div>
                    </div>
                    <div class="col-lg-5  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Newsletter</h6>
                            <p>Stay update with our latest</p>
                            <div class="" id="mc_embed_signup">
                                <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                                    <input class="form-control" name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" required="" type="email">
                                        <button class="click-btn btn bg-secondary-color"><i class="lnr lnr-arrow-right" aria-hidden="true"></i></button>
                                        <div style="position: absolute; left: -5000px;">
                                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                        </div>
                                    <div class="info"></div>
                                </form>
                            </div>
                        </div>
                    </div>						
                    <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                        <div class="single-footer-widget">
                            <h6>Follow Us</h6>
                            <p>Let us be social</p>
                            <div class="footer-social d-flex align-items-center">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                        </div>
                    </div>							
                </div>
            </div>
        </footer>	
        <!-- End footer Area -->	

        <script src="{{ asset('/libraries/js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="{{ asset('/libraries/js/vendor/bootstrap.min.js') }}"></script>			
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
        <script src="{{ asset('/libraries/js/easing.min.js') }}"></script>			
        <script src="{{ asset('/libraries/js/hoverIntent.js') }}"></script>
        <script src="{{ asset('/libraries/js/superfish.min.js') }}"></script>	
        <script src="{{ asset('/libraries/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('/libraries/js/jquery.magnific-popup.min.js') }}"></script>	
        <script src="{{ asset('/libraries/js/owl.carousel.min.js') }}"></script>						
        <script src="{{ asset('/libraries/js/jquery.nice-select.min.js') }}"></script>							
        <script src="{{ asset('/libraries/js/mail-script.js') }}"></script>	
        <script src="{{ asset('/libraries/js/main.js') }}"></script>	
    </body>
</html>