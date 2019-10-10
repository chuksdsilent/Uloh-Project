@extends('admin.page_layout')
@section('content')
<div class="row">
  <div class="col-md-12">
      @if(Session::has('msg'))
        <div class="alert alert-success">{{Session::get('msg')}}</div>
      @endif
  </div>
</div>
<div class="row">
    <div class="col-md-6 col-6">
            <h4>Products Bought </h4>
    </div>
    <div class="col-md-6 col-6 right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Contact Information
      </button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Contact Information</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="table">
                <table class="table table-bordered">
                  <tbody>
                    <?php $i=1;  ?>
                    @foreach ($ShopByDepartmentContactInfo as $item)
                      <tr>
                        <th scope="col">Full Name</th>  
                        <td>{{$item->full_name}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Address 1</th>
                        <td>{{$item->address_1}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Address 2</th>
                        <td>{{$item->address_2}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Phone</th>
                        <td>{{$item->phone}}</td>
                      </tr>
                      <tr>
                        <th scope="col">Email</th>
                        <td>{{$item->email}}</td>
                      </tr>
                      <tr>
                        <th scope="col">State</th>
                        <td>{{$item->state}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="table">
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Transaction ID</th>
            <th scope="col">Product ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1;  ?>
          <?php $qty = 0; ?>
          <?php $price = 0; ?>
          @foreach ($shop_transactions as $item)
            <?php $qty += $item->quantity; $transaction_id = $item->transaction_id; $delivered = $item->delivered; ?>
            <?php $price += $item->price; ?>
            <tr>
              <th scope="row">{{ $i++ }}</th>
              <td>{{$item->transaction_id}}</td>
              <td>{{$item->product_id}}</td>
              <td>{{$item->product_name}}</td>
              <td>{{$item->quantity }}</td>
              <td> &#x20a6;{{number_format((float)$item->price, 2, '.', '')}}</td>
              <td>
                {{ Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
              </td>
            </tr>
          @endforeach
          
          <tr>
            <th colspan="3"></th>
            <th>Total</th>
            <td>{{$qty}}</td>
            <td>&#x20a6;{{number_format((float)$price, 2, '.', '')}}</td>
              <td>
              @if ($delivered == "Y")
                Delivered                  
              @else
                <a href="{{url('admin/product/delivered/'. $transaction_id)}}" class="btn btn-primary">Delivered</a>
              @endif 
          </tr>
        </tbody>
      </table>
@endsection