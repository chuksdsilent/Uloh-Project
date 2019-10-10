<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uuloh</title>
    <link rel="stylesheet" href="{{ asset('/libraries/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/sweetalert/dist/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/fontawesome/css/all.css ') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/fontawesome/css/fontawesome.css ') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/owl/assets/owl.carousel.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('/libraries/owl/assets/owl.theme.default.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('/libraries/aos/aos.css ') }}">       
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('libraries/navbar/css/stellarnav.css')}}">   
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
      
</head>
<body  data-spy="scroll" data-target="#navbar-example"  data-offset="50">
<?php $no_of_item = 0; ?>
@if(Session::has('shopping_cart'))
    @foreach(Session::get('shopping_cart') as $item)
        <?php $no_of_item += $item['quantity']; ?>
    @endforeach
@endif
<div class="client-container">
    
        <div class="mobile">
                <div class="stellarnav">
                    <ul>
                        @include('template.mobile_shop_by_dept')
                        @include('template.mobile_find_professionals')
                        @include('template.mobile_get_photo_idea')
                        <li>
                            <a href="#"> <i class="fas fa-user"></i> Oshaba Samson</span></a>                            
                            <ul>
                                <li>
                                    @if(Auth::check())
                                        <a href="{{url('profile/edit/'. Auth::user()->id )}}">
                                            Edit Profile
                                        </a>
                                    @endif
                                </li>
                                <li>
                                    <a href="">
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('logout')}}">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- .stellarnav -->
            </div>
            <div class="desktop">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{url('/')}}"> <img src="{{url('backgrounds/logo.jpeg')}}" style="width: 150px; height: 50px;" alt=""> </a>
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
                            {{-- <li class="nav-item active  mr-5">
                                <a class="nav-link" href="#"> <i class="fas fa-clone"></i>   BLOG/DESIGN TIPS</a>
                            </li> --}}
                        </ul>
                        <ul  class="navbar-nav"  style="margin-left: 200px;">
                           <li class="nav-item active mr-2">
                                <a class="nav-link" href="{{url('products/cart/show-cart')}}"> 
                                   <span id="no_of_items" class="badge badge-light" style=" position: absolute; top: -1px; right: 1px; background: red; color: white">
                                       @if(Session::has('shopping_cart')) 
                                               <?php echo $no_of_item; ?> 
                                       @endif
                                   </span> 
                                   <i class="fas fa-cart-plus"></i>
                               </a>
                           </li>
                       </ul>
                        @if(Auth::check())
                        <ul class="navbar-nav">
                            <li class="nav-item active mr-2">
                                {{-- <a class="nav-link" href="#"> <i class="far fa-bell"></i> </span></a>
                                
                                <ul class="notification-sub-menu" data-aos="fade-up" data-aos-duration="3000">
                                    <ul>
                                        <li class="sub-menu-link">
                                            <ul>
                                                <li>
                                                    <a href="">
                                                        <h6>New Notification</h6>
                                                        <p>
                                                            You have a new notification. click on it.
                                                        </p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <h6>New Notification</h6>
                                                        <p>
                                                            You have a new notification. click on it.
                                                        </p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <h6>New Notification</h6>
                                                        <p>
                                                            You have a new notification. click on it.
                                                        </p>    
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <h6>New Notification</h6>
                                                        <p>
                                                            You have a new notification. click on it.
                                                        </p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </ul>          --}}
                                </li>
                                <li class="nav-item active">
                                <a class="nav-link name" href="#"> <i class="fas fa-user"></i> {{\App\BasicInfo::where('user_id', Auth::user()->user_id)->value('first_name')}} {{\App\BasicInfo::where('user_id', Auth::user()->user_id)->value('last_name')}}</span></a>
                                
                                
                                <ul class="notification-sub-menu user-sub-menu" data-aos="fade-up" data-aos-duration="3000">
                                        <ul>
                                            <li class="sub-menu-link">
                                                <ul>
                                                    <li>
                                                        <a href="{{url('profile/edit/'. Auth::user()->user_id )}}">
                                                            Edit Profile
                                                        </a>
                                                    </li>
                                                    {{-- <li>
                                                        <a href="{{url('upload-photo')}}">
                                                           Upload Photo
                                                        </a>
                                                    </li> --}}
                                                    <li>
                                                        <a href="{{url('new-project')}}">
                                                            <i class="fa fa-edit"></i>  New Project
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('ideabook')}}">
                                                            <i class="fa fa-edit"></i>  Ideabook
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{url('logout')}}">
                                                           <i class="fa fa-logout"></i> Logout
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </ul>         
                            </li>
                        </ul>
                        @else
                          <ul class="navbar-nav">
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
                        @endif
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
    @include('client.footer_javascript')
    </body>
    </html>
    