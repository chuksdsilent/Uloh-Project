@extends(Auth::check() ? 'client.logged_page_layout' : 'client.page_layout')
@section('content')
        <style>
            .second-comment .card-body{
                padding: 10px;
            }
            .second-comment .card-body .card-title, .first-content h5{
                font-size: 14px;
                font-weight: 500;
                margin: 0px;
            }
            .second-comment .card-body .card-text, .first-content p{
                font-size: 13px;
            }
            
            .second-comment .card{
                box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            }
            .second-comment .card .img-box-shadow{
                position: absolute;
                
                z-index: 800;
            }
           
        </style>
            @if(Auth::check())
                @include('client.product_thumbs')
            @else
                @include('client.home_page_banner')
            @endif
            <div class="container">
                    <div class="uuloh-blog mt-5">
                        <div class="second-comment space-top">
                            <div class="car pt-4 pr-4 pl-4">
                                    <h3>Products <hr /> </h3>
                                    <div class="row">
                                        @foreach ($shopProducts as $item)
                                            <div class="col-md-4 mb-4">
                                                <div class="card">
                                                    <a href="{{url('products/show-the-product/'. $item->product_id. '?sub_cat='. $item->sub_cat_id)}}">
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
                        <div class="uuloh-blog mt-5">
                            <div class="row first-content">
                                {{-- <div class="col-md-12"> --}}
                                    @foreach ($featured_shop as $item)
                                        <div class="featured-img"></div>
                                        <img class="card-img-top" src="{{ asset($item->img_path)}}" alt="Card image cap" style="height: 500px;" />
                                        <div class="content color-white  px-4 py-4">
                                            <h5>{{$item->product_name}}</h5>
                                            <p>
                                                &#x20a6; {{number_format($item->price)}}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    <div class="uuloh-blog mt-5">
                        <div class="second-comment space-top">
                            <div class="car pt-4 pr-4 pl-4">
                                    <h3>Photos <hr /> </h3>
                                    <div class="row">
                                        @foreach ($photo as $item)
                                            <div class="col-md-4 mb-4">
                                                <div class="card">
                                                    <a  target="_blank" href="{{url('photo/'. $item->project_id)}}">
                                                        <img class="card-img-top" src="{{ asset(\App\ProjectPics::where('pics_id', $item->pics_id)->value('pics_link')) }}" alt="Card image cap">
                                                        <div class="img-box-shadow">
                                                        </div>
                                                    </a>
                                                    <div class="card-body">
                                                        <h6 class="card-title">{{$item->project_name}}</h6>
                                                        <hr />
                                                        <p class="card-text">
                                                               {{\Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans()}}
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
                </div>
            </div>
@endsection