@extends('client.logged_page_layout')
@section('content')
<div class="container mt-3">
    <div class="card color-white py-3">
        <div class="row">
            <div class="col-md-8">
                <div class="container-fluid">
                    <h3 class="mx-5 my-3">Your Shopping cart</h3>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8 col-4">Items</div>
                                <div class="col-md-2 col-4">Price</div>
                                <div class="col-md-2 col-4">Quantity</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php $total_price = 0; ?>
                            @if(Session::has('shopping_cart'))
                                @foreach(Session::get('shopping_cart') as $item)
                                    <div class="row mt-3 pb-3" id="rem-id" style="border-bottom: 1px solid #ddd;" data-product="{{$item['code']}}">
                                        <div class="col-md-8 col-4">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <img src="{{asset($item['image'])}}" class="img-fluid" />
                                                </div>
                                                <div class="col-md-8 col-12">
                                                    <h6>{{$item['name']}}</h6> 
                                                    <p>Ready to send item within 4 days</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-4">
                                            <h5> &#x20a6;{{ number_format($item['price']) }}</h5>
                                        </div>
                                        <div class="col-md-2 col-4"> 
                                            <select name="qty" id="qty" class="form-control qty"  data-product-id="{{$item['code']}}">
                                                @for($i=1; $i<=5; $i++)
                                                 <option <?php if($item["quantity"]== $i) echo "selected";?> value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                            <span><a href="#"  id="remove" data-product-id="{{$item['code']}}">Remove</a></span>
                                        </div>
                                    </div>
                                    
                                    <?php $total_price += ($item["price"]*$item["quantity"]); ?>
                                @endforeach
                            @else
                                <h3 style="text-align: center">
                                    Your Cart is Empty
                                </h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pt-5">
                <div class="card mr-5">
                    <div class="card-header">
                        Order Details
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7 col-7">
                                Subtotal
                            </div>
                            <div class="col-md-5" id="sub_total">
                                    &#x20a6;{{number_format($total_price)}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 col-7">
                                
                            </div>
                            <div class="col-md-5 col-5">
                                --------
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 col-7">
                                
                            </div>
                            <div class="col-md-5 col-7">
                                --------
                            </div>
                        </div>
                        <div class="card-header mt-3">
                            <div class="row">
                                <div class="col-md-7 col-7"><h6>Total</h6> </div>
                                <div class="col-md-5 col-5"> 
                                    <h6 id="total">
                                        &#x20a6;{{number_format($total_price)}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mt-3">
                            <a href="{{url('products/payment/shipping-information')}}" class="btn btn-primary btn-block">Continue</a>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection