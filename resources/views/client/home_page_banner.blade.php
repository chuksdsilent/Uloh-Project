<div class="carousel" style="width: 100%; height: 500px; background-image: url({{url('backgrounds/carousel_bg.png') }})">
    <div class="container">
        <h2> Think house, Think uuloh.</h2>
        <h4>Get Inspired. Shop Products. Find pros</h4>
        <form action="{{url('/products/search/search-products')}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="input-group input-group-lg mb-3">
                    <input type="text" name="search_value" placeholder="Search Products, Professionals & More..." class="form-control">
                    <div class="input-group-append">
                    <button class="btn btn-outline-secondary bg-secondary-color"> <i class="fas fa-search"></i> Search</button>
            </div>
            </div>
        </form>                
    </div>
</div>
<div class="dashboard-content">
    <div class="container">
        <div class="mobile">
            <div class="three-content-items mt-5">
                <header class="mb-3">What we offer to our clients</header>
                <div class="row">
                    <div class="col-md-4 col-4">
                        <i class="fas fa-ankh"></i>								
                        <h3>Concept Design</h3> 
                    </div>
                    <div class="col-md-4 col-4">
                        <img src="{{asset('img/desk.png')}}" alt="" class="img-fluid">   

                        <h3>Interior Design</h3>

                    </div>
                    <div class="col-md-4 col-4">
                            <img src="{{asset('img/suitcase.png')}}" alt="" class="img-fluid">   
                        <h3>Professional Works</h3>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="desktop">
            <div class="three-content-items mt-5">
                <header class="mb-5 mt-5">What we offer to our clients</header>
                <div class="row">
                    <div class="col-md-4 col-4">
                        <i class="fas fa-ankh"></i>								
                        <h3>Concept Design</h3> 
                    </div>
                    <div class="col-md-4 col-4">
                        {{-- <i class="fas fa-swatchbook"></i>   --}}
                        <img src="{{asset('img/desk.png')}}" alt="" class="img-fluid" style="width: 60px; height: 60px; margin: 20px 0px;">   

                        <h3>Interior Design</h3>

                    </div>
                    <div class="col-md-4 col-4">
                            <img src="{{asset('img/suitcase.png')}}" alt="" class="img-fluid" style="width: 60px; height: 60px; margin: 20px 0px;">   
                        <h3>Professional Works</h3>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" style="justify-content: center;">
                <a href="" class="btn btn-outline-secondary bg-secondary-color mt-5 mb-5" style="width: 250px;">Get Started</a>
            </div>
        </div>