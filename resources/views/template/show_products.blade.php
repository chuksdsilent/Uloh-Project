@extends('client.logged_page_layout')
@section('content')
<style>
.breadcrumb{
    background: white;
}
.products h4{
    font-size: 24px;
    text-align: center;
    color: black;
}
.products a:hover{
    color: gold !important;
    text-decoration: none;
}
</style>
    <div class="container mt-3">
        <div class="card">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('products/'. $id)}}">Products</a></li>
                <li class="breadcrumb-item"><a href="{{url('products/'. $id)}}">{{\App\SubCategories::where('id', $id)->value('name')}}</a></li>

                </ol>
            </nav>
            <div class="products px-3">
                <h3>{{\App\SubCategories::where('id', $id)->value('name')}}</h3>
                <div class="row py-3">
                    @foreach ($products as $item)
                        <div class="col-md-3">
                            <a target="_blank" href="{{url('products/show-the-product/'. $item->product_id. '?sub_cat='. $item->sub_cat_id)}}">
                                <img class="img-fluid" src="{{asset($item->img_path)}}" alt="Card image cap">
                                <h4>
                                    {{$item->product_name}}
                                </h4>
                            </a>
                        </div>                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection