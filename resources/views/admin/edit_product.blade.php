
@extends('admin.page_layout')
@section('content')

    @if(Session::has('msg'))
        <div class="alert alert-success"> <i class="fas fa-check-circle"></i> {{ Session::get('msg') }} </div> 
    @endif
    <h4>Edit Product</h4>
        <form action="{{url('admin/products/edit/'. $product->id)}}" method="post"  enctype="multipart/form-data">  
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="file" name="product_pics" id="product_pics">
            @if ($errors->has('product_pics'))
               <span class="text-danger">{{ $errors->first('product_pics') }}</span>
            @endif
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">
                <option value="{{$product->cat_id}}">{{ \App\Categories::where('id', $product->cat_id)->value('name')}}</option>
                <option>water</option>
                <option>milk</option>
                <option>toner</option>
                </select>
            </div>
            {{-- <div class="form-group">
                <label for="sub_categories">Sub Categories</label>
                <select class="form-control" name="sub_categories" id="sub_categories">
                <option>milk</option>
                <option>tones</option>
                <option>water</option>
                </select>
            </div> --}}
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" name="product_name" id="product_name" value="{{ $product->product_name}}" aria-describedby="helpId" placeholder="Enter Product Name">
                <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number"
                    value="{{ $product->price}}"
                    class="form-control" 
                    name="price" id="price" 
                    -describedby="helpId" 
                    placeholder="Enter Price"
                >
                <small id="helpId" class="form-text text-muted">Price is required</small>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{$product->description}}</textarea>
            </div>  
            <h4>Product Specifiction</h4>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text"
                value="{{ $product->color}}"
                class="form-control"  name="color" id="color" aria-describedby="helpId" placeholder="Enter Color">
                <small id="helpId" class="form-text text-muted">Color is required</small>
            </div>
            <div class="form-group">
                <label for="size">Size/Weight</label>
                <input type="text"
                value="{{ $product->size}}"
                class="form-control" name="size" id="size" aria-describedby="helpId" placeholder="Enter Size">
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text"
                value="{{ $product->model}}"
                class="form-control" name="model" id="model" aria-describedby="helpId" placeholder="Enter Model">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
@endsection