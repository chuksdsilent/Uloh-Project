@extends('admin.page_layout')
@section('content')
<style>
    .new-product .product-deco{
        max-width: 95% !important;
    }
</style>


@if(Session::has('msg'))
    <div class="alert alert-success"> <i class="fas fa-check-circle"></i> {{ Session::get('msg') }} </div> 
@endif
<h4>Categories</h4>

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
            @foreach ($categories as $item)
                <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$item->name}}</td>
                <td>
                    <a href="{{ url('admin/category/edit/'.$item->id)}}"  style="margin-right: 10px;"><i class="fas fa-edit"></i></a> 
                    <a href="#" id="trash"  class="btn btn-danger" data-toggle="modal" data-target="#{{$item->id}}"><i class="fas fa-trash"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                Are you sure you want to delete?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <a class="btn btn-danger" href="{{ url('admin/category/delete/'.$item->id)}}">Yes</a>
                                </div>
                            </div>
                            </div>
                        </div>

                </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection