
@extends('admin.page_layout')
@section('content')
    <h4>Edit Sub Category</h4>
    <form action="" method="post">
        <div class="form-group">
          <label for="name">Name of Sub Category</label>
          <input type="text"
            class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Enter Sub Category">
          <small id="helpId" class="form-text text-muted text-danger">Help text</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection