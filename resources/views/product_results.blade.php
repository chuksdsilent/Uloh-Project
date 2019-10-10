@extends('client.logged_page_layout')
@section('content')
    <div class="product-result">
        <div class="container mt-5 mb-5">
            <div class="card mr-4">
                <h4 class="mt-4 ml-4">Products</h4>
                <hr />
                <div class="container-fluid">
                <form action="{{url('/products/search/search-products')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="input-group input-group-lg mb-3">
                            <input type="text" name="search_value" placeholder="Search Products, Professionals & More..." class="form-control">
                            <div class="input-group-append">
                            <button class="btn btn-outline-secondary bg-secondary-color"> <i class="fas fa-search"></i> Search</button>
                    </div>
                    </div>
                </form>                                    
                <div class="row">
                    @foreach ($shopProducts as $item)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <a  target="_blank" href="{{url('products/show-the-product/'. $item->product_id. '?sub_cat='. $item->sub_cat_id)}}">
                                    <img class="card-img-top" src="{{ asset($item->img_path)}}" alt="Card image cap">
                                    <div class="img-box-shadow">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <h6 class="card-title">{{$item->product_name}}</h6>
                                    <p class="card-text">
                                            &#x20a6; {{number_format($item->price)}}
                                    </p>
                                    
                                </div>
                            </div>
                        </div>                                    
                    @endforeach
                    </div>
                </div>            
            </div>
        </div>

    </div>
@endsection