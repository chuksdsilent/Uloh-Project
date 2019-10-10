<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/libraries/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/sweetalert/dist/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/fontawesome/css/all.css ') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/fontawesome/css/fontawesome.css ') }}">
    <link rel="stylesheet" href="{{ asset('/libraries/aos/aos.css ') }}">

</head> 
<body>
    <div class="wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-2 no-padding no-margin">
                    <div class="sidenav">
                        <div class="my-menu">
                            <div class="menu">
                                <ul class="no-padding no-margin">
                                    <li>
                                        <button class="dropdown-btn"> <i class="fas fa-fire"></i> Shop Category 
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        <div class="dropdown-container">
                                            <a href="{{url('admin/create-new-category')}}"> Create Category</a>
                                            <a href="{{url('admin/categories')}}"> View Categories</a>
                                        </div>
                                    </li>
                                    <li>
                                        <button class="dropdown-btn"> <i class="fas fa-map-signs"></i> Shop Sub Category
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        <div class="dropdown-container">
                                            <a href="#"><a href="{{url('admin/create-new-sub-category')}}"> Create Sub Category</a>
                                            <a href="{{url('admin/sub-categories')}}">Sub Categories</a>
                                        </div>
                                    </li>
                                    <li>
                                        <button class="dropdown-btn"> <i class="fas fa-map-signs"></i> Prof. Sub Category
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        <div class="dropdown-container">
                                            <a href="#"><a href="{{url('admin/create-new-sub-category-for-professionals')}}"> Create Sub Category</a>
                                            <a href="{{url('admin/sub-categories')}}">Sub Categories</a>
                                        </div>
                                    </li>
                                    <li>
                                        <button class="dropdown-btn"> <i class="fas fa-rainbow"></i> Product
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        <div class="dropdown-container">
                                            <a href="#"><a href="{{url('admin/create-new-product')}}"> Create New Product</a>
                                            <a href="{{url('admin/products')}}"> Products</a>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{url('admin/transactions')}}">Transactions</a>
                                    </li>
                                    <li>
                                        <a href="{{url('admin/logout')}}">logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 no-padding no-margin">
            <div class="header-area">

                <header class="uloh">
                    uuloh
                </header>
            </div>
            <div class="container-fluid">
                <div class="new-product">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-deco">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
    
<script src="{{ asset('/libraries/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('/libraries/sweetalert/sweetalert2.min.js') }}"></script>
<script src="{{ asset('/libraries/aos/aos.js') }}"></script>
<script src="{{ asset('/libraries/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
<script>
        AOS.init({
            duration: 1500,
            once: true
        });
        </script>
    </body>
    </html>