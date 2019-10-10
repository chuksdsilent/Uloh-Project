@extends('admin.page_layout')
@section('content')
<style>
    .new-product .product-deco{
        max-width: 95% !important;
    }
</style>


<div class="input-group mb-3">
        <label for=""></label>
        <select class="form-control" name="" id="" aria-label="Recipient's username" aria-describedby="button-addon2">
          <option></option>
          <option></option>
          <option></option>
        </select>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2">
              <i class="fas fa-search"></i> Search
          </button>
        </div>
      </div>
<div class="form-group">
</div>
<table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($sub_categories as $item)
                <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$item->name}}</td>
                <td>
                    <a href="{{url('edit-sub-category')}}"  style="margin-right: 10px;"><i class="fas fa-edit"></i></a> 
                    <a href="#" class="text-danger"><i class="fas fa-trash"></i></a> 

                </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection