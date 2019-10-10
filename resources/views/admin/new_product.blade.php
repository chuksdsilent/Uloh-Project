
@extends('admin.page_layout')
@section('content')
    @if (Session::has('msg'))
        <div class="alert alert-success">
            <span class=""> <i class="fas fa-check-circle"></i> {{ Session::get('msg') }}</span>
        </div>
    @endif
    <h4>New Product</h4>
    <form action="{{url('admin/store-products')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="file" name="product_pics" id="product_pics">
        @if ($errors->has('product_pics'))
           <span class="text-danger">{{ $errors->first('product_pics') }}</span>
        @endif
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category" id="category">
                <option value="" selected = selected>------------------------------------------------------Select---------------------------------------------------------------------</option>
                @foreach ($categories_id as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>                
                @endforeach
            </select>
            @if ($errors->has('category'))
               <span class="text-danger">{{ $errors->first('category') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="sub_categories">Sub Categories</label>
            @foreach ($sub_categories_id as $sub_cat)            
        @endforeach
            <select class="form-control" name="sub_categories" id="sub_categories">
            <option value="" selected = selected>------------------------------------------------------Select---------------------------------------------------------------------</option>
            @foreach ($sub_categories_id as $sub_cat)
                <option value="{{ $sub_cat->sub_cat_id }}">{{$sub_cat->name}}</option>                
            @endforeach
            
            </select>
            @if ($errors->has('sub_category'))
               <span class="text-danger">{{ $errors->first('sub_category') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text"
            class="form-control" name="product_name" id="product_name" aria-describedby="helpId" placeholder="Enter Product Name">
            @if ($errors->has('product_name'))
               <span class="text-danger">{{ $errors->first('product_name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number"
            class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="Enter Price">
            @if ($errors->has('price'))
               <span class="text-danger">{{ $errors->first('price') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            @if ($errors->has('description'))
               <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>  
        <h4>Product Specifiction</h4>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text"
            class="form-control" name="color" id="color" aria-describedby="helpId" placeholder="Enter Color">            
        </div>
        <div class="form-group">
            <label for="size">Size/Weight</label>
            <input type="text"
            class="form-control" name="size" id="size" aria-describedby="helpId" placeholder="Enter Size">
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text"
            class="form-control" name="model" id="model" aria-describedby="helpId" placeholder="Enter Model">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection