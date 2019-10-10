@extends('admin.page_layout')
@section('content')
<style>
    .custom-modal{
        position: absolute;
        left: 10%;
        background: #f3f3f3;
         max-width: 50%;
        z-index: 20;
        margin: 0 auto;
        display: none;
        animation-name: openModal;
        animation-duration: 1s
    }

    .hide-modal{
        animation-name: hideModal;
        animation-duration: 1s;
        animation-fill-mode: forwards;
    }

    @keyframes openModal{
        from {margin-top: -500px}
        to { margin-top: 0px}
    }
    
    @keyframes hideModal{
        from {margin-top: 00px}
        to { margin-top: -500px}
    }
    .custom-modal-header{
        text-align: center;
        font-size: 25px;
        border-bottom: 1px solid  gold;
        padding: 10px 0px;
    }
    .custom-modal-content{
        padding: 30px;
    }
    .custom-model-footer{
        padding: 20px 0px;
        border-top: 1px solid gold;
        margin-right: 0px;
    }
    .custom-modal .btn, .modal a, .modal .btn{
        border-radius: 20px;
        color: white !important;
    }

</style>
<div class="custom-modal">
    <div class="custom-modal-header">title</div>
    <div class="custom-modal-content">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci quibusdam, rem incidunt porro non cupiditate obcaecati dolor natus sint ratione iusto quas nesciunt cumque voluptate, iure sapiente omnis velit id!
    </div>
    <div class="custom-model-footer">
        <button id="close-modal" class="btn btn-primary">
            No
        </button>
    </div>
</div>

@if(Session::has('msg'))
    <div class="alert alert-success"> <i class="fas fa-check-circle"></i> {{ Session::get('msg') }} </div> 
@endif
<h4>Products</h4>
<div class="input-group mb-3">
        <label for=""  style="margin-right: 10px;">Category</label>
        <select style="margin-right: 10px;" class="form-control" name="" id="cat" aria-label="Recipient's username" aria-describedby="button-addon2">
            @foreach ($categories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>    
            @endforeach
        </select>
        <label for="" style="margin-right: 10px;">Sub Category</label>
        <select class="form-control" style="margin-right: 10px;"  name="" id="" aria-label="Recipient's username" aria-describedby="button-addon2">
            @foreach ($subCategories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>    
            @endforeach
        </select>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2">
              <i class="fas fa-search"></i> Search
          </button>
        </div>
      </div>
<div class="form-group">
        <a href="#" id="trash" class="text-danger"><i class="fas fa-trash"></i></a>

</div>
<table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Color</th>
            <th scope="col">Size</th>
            <th scope="col">Model</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($products as $item)
                <tr>
                <th scope="row">{{$i++}}</th>
                <th>{{\App\Categories::where('id',  $item->cat_id)->value('name')}}</th>
                <td>{{$item->product_name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->color}}</td>
                <td>{{$item->size}}</td>
                <td>{{$item->model}}</td>
                <td>
                    <a href="{{url('admin/products/edit/'.$item->id)}}"  style="margin-right: 10px;"><i class="fas fa-edit"></i></a> 

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
                                <a class="btn btn-danger" href="{{ url('admin/products/delete/'.$item->id)}}">Yes</a>
                                </div>
                            </div>
                            </div>
                        </div>
                </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      
<script>
        const trash = document.getElementById("trash");
        console.log(trash);
        trash.addEventListener('click', function(){
            $('.custom-modal').css({'display':'block'});
            console.log('event fired');
        });

        const modal = document.querySelector('.custom-modal');
        const closeModal = document.getElementById("close-modal");
        console.log(closeModal);
        closeModal.addEventListener('click', function(){
            modal.classList.add("hide-modal");

            location.reload();
        })

    </script>
@endsection