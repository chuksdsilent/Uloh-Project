@extends('client.logged_page_layout')
@section('content')
<?php $sub_total = 0; ?>
@if(Session::has('shopping_cart'))
    @foreach(Session::get('shopping_cart') as $item)
    <?php $sub_total += ($item["price"]*$item["quantity"]); ?>
    @endforeach
@endif
@include('client.billing_process')
<input type="hidden" value="{{ Auth::user()->email }}" id="email">
<input type="hidden" value="{{ $transaction_id }}" id="transaction_id">

<input type="hidden" value="{{ \App\BasicInfo::where('user_id', Auth::user()->id)->value('phone') }}" id="phone">
<div class="container mt-3">
    <div id="payment-alert"></div>
    <div class="card color-white py-3">
        <div class="row">
            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h3>Order Review</h3>
                                @foreach ($contact_info as $item)
                                <div class="row" style="margin-bottom:40px;">
                                    <div class="col-md-6 mt-1">
                                        <label for="first_name">Transaction ID</label>
                                        <h6>{{$transaction_id}}</h6>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="first_name">Phone Number</label>
                                        <h6>{{$item['phone']}}</h6>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:40px;">
                                    <div class="col-md-6 mt-1">
                                        <label for="first_name">Full Name</label>
                                        <h6>{{$item['full_name']}}</h6>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="first_name">Address 1</label>
                                        <h6>{{$item['address_1']}}</h6>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:40px;">
                                    <div class="col-md-6 mt-1">
                                            <label for="first_name">Address 2</label>
                                            <h6>{{$item['address_2'] }}</h6>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                            <label for="first_name">State</label>
                                        <h6><h6>{{\App\States::where('state_id', $item['state'])->value('name')}}</h6></h6>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:40px;">
                                </div>
                                    
                                @endforeach
                            </form>
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
                                        <input type="hidden" name="" id="total" value="{{ $sub_total }}">
                                        &#x20a6;{{number_format($sub_total)}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mt-3">
                                
                                    <button type="button" onclick="payWithPaystack()" class="btn btn-primary btn-block"> Pay </button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src={{ asset('libraries/jquery-3.4.1.min.js')}}></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
   
   function generateRandomString(length) {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        for (var i = 0; i < length; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));
        return text;
    }
   function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_7e4a8316c7e998d16f615634a86a83a29afd2c7f',
      email: $("#email").val(),
      amount: parseFloat($("#total").val()),
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: $("#phone").val()
            }
         ]
      },
      callback: function(response){ 
            var transaction_id = $("#transaction_id").val();
          var data = {paystack_ref:response.reference, transaction_id: transaction_id};
        $.ajax({
                type:'GET',
                url:'/products/cart/register-product',
                data:data,
                success:function(data){  
                    no_of_items.innerHTML = '';
                    $("#no_of_items").css({'display': 'none'});
                    $("#payment-alert").addClass('alert alert-success mb-3');
                    $("#payment-alert").html("Thanks for using our platform. Click <a href='{{ url('/')}}'>here</a> to continue.");
                }
            });
         
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>

@endsection