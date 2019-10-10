
@extends('admin.page_layout')
@section('content')

@if(Session::has('msg'))
<div class="alert alert-success"> <i class="fas fa-check-circle"></i> {{ Session::get('msg') }} </div> 
@endif
    <h4>Edit Sub Category</h4>
    <form action="{{url('admin/category/edit/'. $categories->id)}}" method="post">
      <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <div class="form-group">
          <label for="name">Name of Sub Category</label>
          <input type="text"
        class="form-control" value="{{$categories->name}}" name="name" id="name" aria-describedby="helpId" placeholder="Enter Sub Category">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection