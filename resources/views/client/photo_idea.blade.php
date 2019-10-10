@extends('client.logged_page_layout')
@section('content')
<style>
    .photo-header{
        background: white; padding: 20px 0px 20px 100px;
    }
    .photo-header h6, .photo-header h2{
        font-weight: bolder;
    }
    .photos{
        margin-top: 20px;
        padding: 20px;
    }
    .photos h6{
        font-weight: bolder;
    }
</style>
    <div class="photo-header" style="">
        @foreach ($photo_sub as $item)
            <h6>
                {{$item->name}}
            </h6>
            <h2>
                {{$item->name}} Ideas
            </h2>
        @endforeach
    </div>
    <div class="container">
        @if(Session::has('msg'))
            <div class="alert alert-success" style="margin: 0px;">{{Session::get('msg')}}</div>
        @endif
        <div class="photos card second-comment">
            <div class="row">
                @foreach ($photo as $item)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card">
                            <a href="{{url('photo/'. $item->project_id)}}">
                                <img src="{{ asset(\App\ProjectPics::where('pics_id', $item->pics_id)->value('pics_link')) }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h6>{{$item->project_name}}</h6>
                                <button class="btn btn-default"> Email</button>
                            <button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal-{{$item->project_id}}">Save</button>
                                <form action="{{url('project/save-to-ideaboook/'. $item->project_id)}}" method="GET">
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{$item->project_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                                <div class="modal-body">
                                                Do you wish to save to your ideabook                                            
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <input type="submit" value="Save" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
                    
                @endforeach
            </div>
        </div>
    </div>
@endsection