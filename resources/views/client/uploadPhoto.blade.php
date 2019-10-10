@extends('client.logged_page_layout')
@section('content')
    @if(Session::has('msg'))
        <div class="alert alert-success">
            {{Session::get('msg')}}
        </div>
    @endif
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-body">
                <h4>
                    Upload Photo
                    <hr />
                </h4>
    <form action="{{url('upload/store-photo')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if ($errors->has('product_pics'))
           <span class="text-danger">{{ $errors->first('product_pics') }}</span>
        @endif
        {{-- <div class="form-group">
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
        </div> --}}
        <div class="form-group">
            <label for="sub_categories">Categories</label>
            @foreach ($sub_categories_id as $sub_cat)            
        @endforeach
            <select class="form-control" name="sub_categories" id="sub_categories">
            <option value="" selected = selected>-----------------------------------------------------------------------Select---------------------------------------------------------------------------------------------</option>
            @foreach ($sub_categories_id as $sub_cat)
                <option value="{{ $sub_cat->photo_sub_cat_id }}">{{$sub_cat->name}}</option>                
            @endforeach
            
            </select>
            @if ($errors->has('sub_category'))
               <span class="text-danger">{{ $errors->first('sub_category') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="product_name">Photo Name</label>
            <input type="text"
            class="form-control" name="photo_name" id="product_name" aria-describedby="helpId" placeholder="Enter Photo Name">
            @if ($errors->has('product_name'))
               <span class="text-danger">{{ $errors->first('product_name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="product_name">Company/Individaual Name</label>
            <input type="text"
            class="form-control" name="company_name" id="company_name" aria-describedby="helpId" placeholder="Enter Comappany/Individual Name">
            @if ($errors->has('product_name'))
               <span class="text-danger">{{ $errors->first('product_name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            @if ($errors->has('description'))
               <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>
    <div class="form-group">
            <div class="clone hide">
                <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="photo" class="form-control">
                    <div class="input-group-btn"> 
                    </div>
                </div>
            </div>

    </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
            </div>
        </div>
    </div>
@endsection