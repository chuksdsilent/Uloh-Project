
@extends('admin.page_layout')
@section('content')
  @if (Session::has('msg'))
    <div class="alert alert-success">
        <span class=""> <i class="fas fa-check-circle"></i> {{ Session::get('msg') }}</span>
    </div>
  @endif
  <h4>New Sub Category for Shops</h4>
    <form action="{{ url('admin/store-sub-category-for-services')}}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" name="category" id="category">
          <option value="" selected = selected>------------------------------------------------------Select---------------------------------------------------------------------</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
        @if ($errors->has('category'))
            <span class="text-danger">{{ $errors->first('category') }}</span>
        @endif
      </div>
      <div class="form-group">
        <label for="name">Name of Sub Category</label>
        <input type="text"
          class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Enter Sub Category">
          @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection