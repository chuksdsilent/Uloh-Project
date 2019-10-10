
@extends('admin.page_layout')
@section('content')
    @if (Session::has('msg'))
        <div class="alert alert-success">
            <span class=""> <i class="fas fa-check-circle"></i> {{ Session::get('msg') }}</span>
        </div>
    @endif
    <h4>New Blog</h4>
    <form action="{{url('admin/create-new-blog')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <input type="file" name="blog_pics" id="blog_pics">
            @if ($errors->has('blog_pics'))
                <span class="text-danger">{{ $errors->first('blog_pics') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category" id="category">
                <option value="" selected = selected>---------------------------------------------------------Select-------------------------------------</option>
                @foreach ($categories_id as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>                
                @endforeach
            </select>
            @if ($errors->has('category'))
               <span class="text-danger">{{ $errors->first('category') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
            @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
        </div>
        <div class="form-group">
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            @if ($errors->has('content'))
                <span class="text-danger">{{ $errors->first('content') }}</span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection