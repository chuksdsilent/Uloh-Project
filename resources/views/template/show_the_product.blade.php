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
#accordion .card-header{
    background: white;
    padding: 5px 0px;
}

#accordion a{
    font-size: 15px;
    font-weight: bolder;

}
.plus{
    text-align: right;
}
.show-the-product a{
    color:black !important ;
}

.show-the-product a.text-white{
    color:white !important ;
}
.show-the-product a:hover{
    text-decoration: none;
}
</style>
<div class="show-the-product">
    <div class="color-white">
    <div class="container pt-3">
        
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('products/'. $id)}}">Products</a></li>
        <li class="breadcrumb-item"><a href="{{url('products/'. $id)}}">{{\App\SubCategories::where('id', \App\Products::where('id', $id)->value('sub_cat_id'))->value('name')}}</a></li>

        </ol>
    </nav>
    <div class="add-product-modal" id="add-product-modal"></div>
    <div class="products">
        <div class="py-3">
            @foreach ($product as $item)
                <div class="row  px-3">
                    <div class="col-md-7">
                        <img class="img-fluid" src="{{asset($item->img_path)}}" alt="Card image cap">
                    </div> 
                    <div class="col-md-5">
                        <h5>{{$item->product_name}}</h5>
                        <h3>
                                &#x20a6;{{number_format($item->price)}}
                        </h3>
                        <div class="add-to-cart my-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="no_of_item" id="no_of_item" class="no-of-item form-control">
                                        <option value="">No of Item</option>
                                        @for($i=1; $i<=5; $i++)
                                            <option value="{{$i}}">{{$i}}</option>    
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-8">
                                        <input type="hidden" name="price" value="{{$item->price}}" id="price">
                                        <input type="hidden" name="product_name" value="{{$item->product_name}}" id="product_name">
                                        <input type="hidden" name="img_path" value="{{$item->img_path}}" id="img_path">
                                        <input type="hidden" name="product_id" value="{{$item->product_id}}" id="product_id">    
                                        <a href="#" id="add_to_cart" class="link-add-to-cart text-white btn btn-primary btn-block text-white">
                                            + Add to Cart
                                        </a>
                                </div>
                            </div>
                        </div>
                        <div class="description">
                                <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                            <h5 class="mb-0" style="padding: 0px;">
                                                <a class="btn btn-link" style="width: 100%" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                                Product Description
                                                        </div>
                                                        <div class="col-md-6 plus">
                                                            +
                                                        </div>
                                                    </div>
                                                </a>
                                            </h5>
                                            </div>
                                        
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                {{$item->description}}
                                            </div>
                                            </div>
                                        </div>
                                        {{-- <div class="card">
                                            <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <a class="btn btn-link" style="width: 100%" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                                Product Specification
                                                        </div>
                                                        <div class="col-md-6 plus">
                                                            +
                                                        </div>
                                                    </div>
                                                </a>
                                            </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                            </div>
                                            </div>
                                        </div> --}}
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                            <a class="btn btn-link" style="width: 100%" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseOne">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            Shipping And Return
                                                    </div>
                                                    <div class="col-md-6 plus">
                                                        +
                                                    </div>
                                                </div>
                                            </a>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="card-body">
                                                Sold by Uuloh- Free shipping! <br />
                                                Ready to ship in 1-4 days <br />
                                                Note: <br /> 
                                                Some exclusions apply.
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>           
            @endforeach
        </div>
    
    
    <?php
        
        $relatedProducts =  \App\Products::where('sub_cat_id', \App\Products::where('sub_cat_id', $id)->value('sub_cat_id'))->get();;
    ?>
    <div class="related-items">
        <div class="color-white">
            <div class="container py-5">
                <h4 class="mx-2">Other Related products</h4>
                <div class="row">
                    @foreach ($relatedProducts as $item)
                            <div class="col-md-2">
                                <a href="{{url('products/show-the-product/'. $item->product_id. '?sub_cat='. $item->sub_cat_id)}}">                                                          
                                    <img class="img-fluid" src="{{asset($item->img_path)}}" alt="">
                                    <span>{{$item->product_name}}</span>
                                    <h6>&#x20a6;{{number_format($item->price)}}</h6>
                                </a>
                            </div>
                    @endforeach
                </div>
            </div>
            
        </div>                            
    </div>
</div>
</div>
<script>
</script>
@endsection