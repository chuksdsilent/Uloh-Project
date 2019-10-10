@extends('client.logged_page_layout')
@section('content')
    <div class="container mt-5 second-comment">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-4">Idea Book </h4>
                <div class="row">
                    @foreach ($ideabook as $item)
                        <div class="col-md-3 col-3">
                            <div class="card" style="width: 18rem;">
                                <a href="{{url('photo/'. $item->project_id)}}">
                                    <img src="{{asset(\App\ProjectPics::where('pics_id', $item->pics_id)->value('pics_link')) }}" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"  style="font-size: 16px;">
                                        {{\App\Projects::where('project_id', $item->project_id)->value('project_name')}}
                                    </h5>
                                    <hr />
                                    <p style="font-size: 12px;">
                                        {{\Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans()}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection