@extends('client.logged_page_layout')
@section('content')
<?php $sub_total = 0; ?>
@if(Session::has('shopping_cart'))
    @foreach(Session::get('shopping_cart') as $item)
    <?php $sub_total += ($item["price"]*$item["quantity"]); ?>
    @endforeach
@endif
<div class="container mt-3">
    <div class="card color-white py-3">
        <div class="row">
            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h3>Make Payment</h3>
                                <script src="https://js.paystack.co/v1/inline.js"></script>
                                <button type="button" onclick="payWithPaystack()" class="btn btn-primary btn-block form-control"> Pay </button> 
                                       
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src={{ asset('libraries/jquery-3.4.1.min.js')}}></script>
<script src="https://js.paystack.co/v1/paystack.js"></script>
<script>
   function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_7e4a8316c7e998d16f615634a86a83a29afd2c7f',
      email: 'customer@email.com',
      amount: 10000,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){ 
        $.ajax({
            type:'GET',
            url:'/products/cart/remove-product',
            data:data,
            success:function(data){         
            }
        });
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>
@endsection