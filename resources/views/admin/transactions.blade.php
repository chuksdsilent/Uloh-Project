@extends('admin.page_layout')
@section('content')
<h4>Transactions </h4>

<div class="table">
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Transaction ID</th>
            <th scope="col">Product ID</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1;  ?>
          <?php $qty = 1; ?>
          <?php $price = 1; ?>
          @foreach ($shop_transactions as $item)
            <tr>
              <th scope="row">{{ $i++ }}</th>
              <td> <a href="{{url('admin/transactions/'. $item->transaction_id)}}"> {{$item->transaction_id}}</a></td>
              <td>{{$item->product_id}}</td>
              <td>
                {{ Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

@endsection