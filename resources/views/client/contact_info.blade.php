@extends('client.logged_page_layout')
@section('content')
<?php $sub_total = 0; ?>
@if(Session::has('shopping_cart'))
    @foreach(Session::get('shopping_cart') as $item)
    <?php $sub_total += ($item["price"]*$item["quantity"]); ?>
    @endforeach
@endif
<div class="container">
    @if ($errors->any())
            <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="font-size: 12px;">{{ $error }}</li>
                @endforeach
            </ul>
            </div><br />
    @endif
</div>
@include('client.billing_process')
<form action="{{url('products/payment/order-review')}}" method="POST"  class="mt-4" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="container mt-3">
    <div class="card color-white py-3">
        <div class="row">
            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h3>Enter Contact Address</h3>
                            <div class="form-group"><label for="first_name">Full Name</label><input type="text" value="{{old('full_name')}}" name="full_name" id="full_name" class="form-control"></div>
                            <div class="form-group"><label for="address_1">Address 1</label><input type="text" value="{{old('address_1')}}" name="address_1" id="address_1" class="form-control"></div>
                            <div class="form-group"><label for="address_2">Address 2</label><input type="text" value="{{old('address_2')}}" name="address_2" id="address_2" class="form-control"></div>
                            <div class="row">
                                <div class="form-group col-md-6"><label for="phone">Phone Number</label><input type="text" name="phone" value="{{old('phone')}}" id="phone" class="form-control"></div>
                                <div class="col-md-6">
                                    <label for="state">State</label>
                                    <select name="state" id="state" class="form-control">
                                        @foreach ($states as $item)
                                            <option value="{{$item->state_id}}">{{$item->name}}</option>                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>

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
                            <div class="col-md-8">
                                Subtotal
                            </div>
                            <div class="col-md-4">
                                    &#x20a6;{{number_format($sub_total)}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                
                            </div>
                            <div class="col-md-4">
                                ----
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                
                            </div>
                            <div class="col-md-4">
                                ----
                            </div>
                        </div>
                        <div class="card-header mt-3">
                            <div class="row">
                                <div class="col-md-8"><h6>Total</h6> </div>
                                <div class="col-md-4"> 
                                    <h6>
                                    &#x20a6;{{number_format($sub_total)}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mt-3">
                            <input type="submit" value="Continue"  class="btn btn-primary btn-block">                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

@endsection