@extends('client.logged_page_layout')
@section('content')
@if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
@endif
<style>
    .theme-pic{
        background: #c4aa1e;
        padding-top: 80px;
    }
    .theme-pic button.btn{
        width: 300px;
        height: 50px;
        font-weight: bolder;
        font-size: 18px;
    }
    .theme-pic .contact{
        text-align: center;
        width: 100%;
        color: white;
        font-weight: bolder;
    }
    .card{
        border: 0px;
    }
    .theme-pic .col-md-3, .theme-pic .col-md-2{
        padding: 10px;
    }
    .theme-pic img{
        position: absolute;
        height: 170px;
        border: 4px solid #ffffff;
    }
    .links a{
        font-size: 20px;
        color: black;
    }
    .links{
        border-bottom: 2px solid #f3f3f3;
        padding: 10px 0px;

    }
    .links a:hover{
        text-decoration: none;
    }
    .links .col-md-2{
        width: 10px !important;
    }
    .about-company{
        font-size: 13px;
        padding-top: 50px;
    }
    .user-profile h6{
        font-weight: bolder;
    }
    .review p{
        font-size: 12px;
    }
    
   
    img {
        width: 100%;
        height: auto;
    }
    .user-profile .card{
        -webkit-box-shadow: 0px 2px 5px 0px rgba(145,139,145,1);
        -moz-box-shadow: 0px 2px 5px 0px rgba(145,139,145,1);
        box-shadow: 0px 2px 5px 0px rgba(145,139,145,1);
    }
    .user-profile a{
        color: black;
    }
    .user-profile a:hover{
        text-decoration: none;
    }
    .user-profile h6{
        font-size: 14px;
    }
    .modal-center input[type=text]{
        height: 30px;
    }
</style>
<div class="container user-profile">
    <div class="card">
        @foreach ($services as $item)        
            <div class="theme-pic" style="background-image:url({{url($item->cover_pics_link)}})" style="object-fit:cover; width: 100%; height: auto;">
                <div class="content px-3">
                    <div class="row">
                            <div class="col-md-2">
                                <div class="profile-pics">
                                    <img src="{{asset($item->profile_pics_link)}}" class="img-fluid" alt="My Profile Pics" style="object-fit:cover; width: 100%; height: auto;">
                                </div>
                            </div>
                            <div class="col-md-3 px-4 py-4">
                                <h4>{{$item->company_name}}</h4>
                                <h6>{{$item->city}}, {{\DB::table('states')->where('state_id', $item->state)->value('name')}}</h6>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-4 contact">
                                <button class="btn bg-secondary-color my-3" data-toggle="modal" data-target="#exampleModalLong">Contact Me</button> <br />
                            </div>
                            <div class="modal modal-center " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header jumbotron">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            Contact {{\App\BasicInfo::where('user_id', Auth::user()->user_id)->value('company_name')}}
                                        </h5>
                                        </div>
                                        <div id="alert"></div>

                                            <form action="{{ url('/contact_professional')}}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="receiver_user_id" value="{{$item->user_id}}">
                                                <div class="modal-body">
                                                    <label for="">From</label>
                                                    <input type="hidden" id="_token" value="{{csrf_token()}}">
                                                    <div class="form-group">
                                                            <input type="text" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control email">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="fullName" id="full-name" value="{{$item->first_name}} {{$item->last_name}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="phone" id="phone" value="{{$item->phone}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="zipCode" id="zip-code" placeholder="Enter Zip Code" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message">Message</label>
                                                        <textarea name="message" id="message" cols="30" rows="3" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1" style="margin-left: 10px;">
                                                            I confirm this is a personal project inquiry and not a promotional message or solicitation.
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <a href="#" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</a>
                                                {{-- <button type="button" class="btn bg-secondary-color btn-sm" id="send">
                                                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
                                                <span>Send</span> 
                                                </button> --}}
                                                {{-- <button class="btn bg-secondary-color btn-sm" id="load-spinner" type="button" disabled>
                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    Loading...
                                                </button> --}}
                                                <input type="submit" value="Send" class="btn bg-secondary-color btn-sm">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        
        @endforeach

        <div class="user-content">
            <div class="links" id="myNavbars">
                <div class="row mx-3">
                    <div class="col-md-3"></div>
                    <div class="col-md-2 col-4"><a href="#about-us" style="border-bottom: 2px solid gold">About Us</a></div>
                    <div class="col-md-2 col-4"><a href="#projects">Projects</a></div>
                    {{-- <div class="col-md-2 col-4"><a href="#reviews">Reviews</a></div> --}}

                </div>
            </div>
        </div>
        <div class="about-company mx-3">
            <div class="row">
                <div class="col-md-2">
                    {{-- <button class="btn btn-default btn-block ml-3">Save</button>
                    <button class="btn btn-default btn-block ml-3">Email</button> --}}
                </div>
                <div class="col-md-8">
                    @foreach ($services as $item)
                        <div id="about-us">
                            <h6>{{$item->company_name}}</h6>
                            <p>
                                {{$item->bus_description}}
                            </p>
                            <h6>Services Provided</h6>
                            <p>
                                @foreach ($service_provided as $item)
                                    {{$item->name}},                                    
                                @endforeach
                            </p>
                            {{-- <h6>Areas Served</h6>
                            <p>
                                Alexandria, Annandale, Arlington, Bethesda, Burke, Centreville, Chantilly, DC (Washington), Dunn Loring, Fairfax, Fairfax Station, Falls Church, Great Falls, Herndon, Newington, North Bethesda, North Chevy Chase, North Springfield, Potomac, Reston, Silver Spring, Tysons Corner, Vienna, Washington
                            </p> --}}
                        </div>
                    @endforeach
                    <div class="projects mx-3" id="projects">
                        <hr class="my-5" />
                        <h6 class="mb-3">{{count($projects)}} projects for {{\App\BasicInfo::where('user_id', Auth::user()->user_id)->value('first_name')}}  {{\App\BasicInfo::where('user_id', Auth::user()->user_id)->value('last_name')}}</h6>
                        <?php
                            $numberOfColumns = 3;
                            $bootstrapColWidth = 12 / $numberOfColumns ;
                            $arrayChunks = array_chunk($projects, $numberOfColumns);
                        ?>
                        @foreach ($arrayChunks as $item)
                                <div class="row second-comment">
                                    @foreach ($item as $item)
                                    <div class="col-md-{{$bootstrapColWidth}} mb-3">
                                        <a href="{{url('/pro/user-profile/projects-pictures/'. $item->pics_id. '?user=' . $item->user_id)}}">
                                            <div class="card">
                                                <img style="height: 150px;"  src="{{ asset(\App\ProjectPics::where('pics_id', $item->pics_id)->value('pics_link')) }}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 style="font-weight: bolder; font-size: 16px; margin:0px; padding:0px;" class="card-title">{{$item->project_name}}</h5>
                                                    {{count(\App\ProjectPics::where('pics_id', $item->pics_id)->get())}} Photos
                                                </div>
                                            </div>
                                        
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                        @endforeach
                    </div>                        
                    <hr class="my-5" />

                    <div id="reviews">
                        {{-- <div class="write-review m-100"  style="text-align: right">
                            <a href="" class="btn bg-secondary-color mb-3">
                                Write Review
                            </a>
                        </div> --}}
                        {{-- <h6 class="mb-3">39 Reviews for Boss Design Center</h6>
                        <div class="review">
                            <div class="row mb-3">
                                <div class="col-md-6 col-12">
                                    <div class="row">
                                        <div>
                                            <img src="{{asset('backgrounds/4844.png')}}" class="card-img-top" alt="..." style="height: 50px; width: 50px; border-radius: 50%;">
                                        </div>
                                        <div>
                                            <h6 class="ml-3 my-0">Stella Hoffmann</h6>
                                            <span  class="ml-3">Stella Hoffmann</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <h6 class="my-0">Project Price</h6>
                                    <p>September 2018</p> 
                                </div>
                                <div class="col-md-3 col-6">
                                    <h6  class="my-0">Project Price</h6>
                                    <p>September 2018</p> 
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection