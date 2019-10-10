@extends('client.logged_page_layout')
@section('content')
    <style>
        footer{
            display: none;
        }
        .my-photo img{
            width: 100%;
            height: 100%;
        }
        .row{
            margin: 0px;
            padding: 0px;
        }
        .other-photos .col-md-3{
            padding:2px;
        }
    </style>
    @if(Session::has('msg'))
        <div class="alert alert-success" style="margin: 0px;">{{Session::get('msg')}}</div>
    @endif
    <div class="my-photo">
        @foreach ($photos_content as $item)
            <div class="container-fluid" style="margin: 0px; padding:0px;">
                    <div class="row"  style="margin: 0px; padding:0px;">
                        <div class="col-md-8"  style="margin: 0px; padding:0px;">
                                <img style="width: 100%; height: 100%;" src="{{asset(\App\ProjectPics::where('pics_id', $item->pics_id)->value('pics_link'))}}" class="card-img-top" alt="...">                            
                        </div>
                        <div class="col-md-4"  style="margin: 0px; padding:0px; background: white;">
                            <div class="row  py-2 px-4">
                                <div class="col-md-2 col-2" style="margin: 0px padding:0px;">
                                <img src="{{asset('backgrounds/4844.png')}}" class="card-img-top" alt="..." style="height: 50px; width: 50px; border-radius: 50%;">
                                </div>
                                <div class="col-md-9 col-9"  style="padding-top: 10px;" class="mt-5">
                                    <h6 style="font-weight: bolder;">{{\App\BasicInfo::where('user_id', $item->user_id)->value('first_name')}} {{\App\BasicInfo::where('user_id', $item->user_id)->value('last_name')}}</h6>
                                </div>
                            </div>
                            <hr style="my-3">
                            <div class="photo-title-keywords px-3">
                                <h6 style="margin:0px; font-weight: 600" class="mb-3">{{\App\BasicInfo::where('user_id', $item->user_id)->value('company_name')}}</h6>
                                {{-- <h6 style="font-size: 13px;" class=" mb-5">Transitional Kitchen, DC Metro</h6> --}}
                                <hr />
                            </div>
                            <div class="other-photos px-3">
                                <h6 style="font-weight: 600">Other photos in the project</h6>
                                <div class="row">
                                        
                                    <?php
                                        $other_projects = \App\ProjectPics::where('pics_id', $item->pics_id)->get();
                                        foreach ($other_projects as $key => $value) {
                                            echo "
                                            <div class='col-md-3 col-3'>
                                                <img src='".$value['pics_link']."' class='img-flud'>
                                            </div>
                                            ";
                                        }

                                    ?>
                                </div>                                   
                                <hr />
                            </div>
                            <div class="other-photos px-3">
                                <h6 style="font-weight: 600">Similar Ideas</h6>
                                <div class="row">   
                                    <?php
                                        $other_projects = \App\Projects::where('prof_service_id', $item->prof_service_id)->get();
                                        foreach ($other_projects as $key => $value) {
                                            
                                            echo "
                                            <div class='col-md-3 col-3'>
                                                <a href='".$value['project_id']."'><img src='". \App\ProjectPics::where('pics_id', $value['pics_id'])->value('pics_link')."' class='img-flud'></a>                                                
                                            </div>
                                            ";
                                        }

                                    ?>
                                </div>
                                <hr />
                            </div>
                            <form action="{{url('project/save-to-ideaboook/'. $item->project_id)}}" method="GET">
                                <input type="hidden" name="pics_id" value="{{$item->pics_id}}">
                                <input type="button" class="btn btn-primary ml-3" value="Save" data-toggle="modal" data-target="#exampleModal"  style="width: 100%;">
                                  <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="button" value="Email" class="btn btn-default mx-3 my-3"  style="width: 100%;">
                            </form>
                        </div>
                    </div>

            </div>
        @endforeach

    </div>
@endsection