
@extends('admin.page_layout')
@section('content')
    @if (Session::has('msg'))
      <div class="alert alert-success">
          <span class=""> <i class="fas fa-check-circle"></i> {{ Session::get('msg') }}</span>
      </div>
    @endif
    <h4>New Category For Shops</h4>
      <form action="{{ url('admin/create-new-category') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="name">Name of Category</label>
          <input type="text"
            class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Enter Category">
            @if ($errors->has('name'))
               <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection 