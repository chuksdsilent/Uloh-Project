@extends('client.logged_page_layout')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

<style>
.my-menu{
    background: white !important;
    color: black !important;
    padding: 10px;
    border: 0px;
}
.dropdown-btn{
    color: black !important;
    font-size: 14px;
    font-weight: bolder;
    display: block;
}
.my-menu ul li a{
    color: black !important;
    font-size: 14px;

}
.my-menu ul li{
    list-style-type: none;
}
/* select {
    width: 268px;
    padding: 5px;
    font-size: 16px;
    line-height: 1;
    border: 0;
    border-radius: 5px;
    background: url(http://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/br_down.png) no-repeat right #ddd;
    -webkit-appearance: none;
    background-position-x: 97%;

} */
.form-search input, .form-search button, select option{
    height: 45px;
    border-radius: 0px !important;
}
select{
    border-radius: 0px !important;
    height: 40px;
}
input{
  -webkit-box-shadow: none !important;
  -moz-box-shadow: none !important;
  box-shadow: none !important;

}
</style>
    <div class="container">
        @if (Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
    </div>

    <div class="container">
        <div class="uuloh-blog mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        
                    <div class="sidenav">
                            <div class="my-menu">
                                <div class="menu">
                                    <ul class="no-padding no-margin">
                                        <li>
                                            <button class="dropdown-btn  mt-2">  Bath
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                            <div class="dropdown-container mt-2">
                                                @foreach ($service_bath as $item)
                                                        <a href="{{ url('professionals/bath/'. $item->prof_service_id)}}">{{$item->name}}</a>                                            
                                                @endforeach
                                            </div>
                                        </li>
                                        <li>
                                            <button class="dropdown-btn  mt-2"> Bedroom
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                            <div class="dropdown-container  mt-2">
                                                @foreach ($service_bedroom as $item)
                                                    <a href="{{url('professionals/bedroom/'. $item->prof_service_id)}}">{{$item->name}}</a>                                              
                                                @endforeach
                                            </div>
                                        </li>
                                        <li>
                                            <button class="dropdown-btn  mt-2"> Living Room
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                            <div class="dropdown-container  mt-2">
                                                @foreach ($service_living_room as $item)
                                                    <a href="{{url('professionals/living-room/'. $item->prof_service_id)}}">{{$item->name}}</a>                                              
                                                @endforeach
                                            </div>
                                        </li>
                                        <li>
                                            <button class="dropdown-btn mt-2">  Ligtening
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                            <div class="dropdown-container  mt-2">
                                                @foreach ($service_lightening as $item)
                                                    <a href="{{url('professionals/lightening/'. $item->prof_service_id)}}">{{$item->name}}</a>                                         
                                                @endforeach                                                
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card px-5 py-4" >
                        @foreach ($service_name as $item)
                            <?php $service_names = $item->name; ?>
                            <h2>{{$item->name}}</h2>
                        @endforeach
                        <hr />
                        <h6>Not sure where to start? Let Uuloh match you with local professionals for these projects:</h6>
                    </div>
                    <div class="card px-3 py-4 mt-3">
                        <div class="form-search">
                            <form class="form-inline" action="{{url('professionals/search')}}" action="get">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="col" style="padding: 0px; margin:0px;">
                                    <select name="service" id="services" class="form-control" style="width: 100%;  height: 45px;">
                                        @foreach ($d_services as $item)    
                                        <option value="{{$item->prof_service_id}}" <?php if($item->name == $service_names) echo 'selected'; ?>>{{$item->name}}</option>                              
                                        @endforeach
                                    </select>                                
                                </div>
                                <div class="col"  style="padding: 0px; margin:0px;">
                                    <select name="state" id="state" style="width: 100%; height: 45px;"  class="form-control">
                                        @foreach ($states as $item)
                                            <option value="{{$item->state_id}}">{{$item->name}}</option>                                            
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn bg-secondary-color"> <i class="fa fa-search"> Search</i> </button>
                            </form> 
                        </div>
                        <style>
                            .professionals .show-each-professional .content{
                                padding: 10px;
                            }
                            .professionals  .content .get-a-quote a{
                               background: white !important;
                               border: 2px solid #FF9800;;
                               color: #FF9800;
                               font-size: 20px;
                            }
                            .professionals .content .get-a-quote a:hover{
                               background:  #FF9800 !important;
                               border: 4px solid #FF9800 !important;
                               color: white;
                            }
                            .professionals .content .get-a-quote .modal-center  .modal-dialog .modal-header{
                                margin: 0px;
                                
                            }
                            .modal-center input[type=text]{
                                height: 30px;
                            }
                            .professionals h3{
                                font-size: 18px;
                                font-weight: 600;
                            }
                            .professionals .the-text{
                                font-size: 16px;
                            }
                        </style>                       

                        @if (Session::has('servicesReturned') && count(Session::get('servicesReturned')))
                        <div class="mt-3 professionals">
                                <div class="">
                                    @foreach (Session::get('servicesReturned') as $item)
                                        <?php Session::forget('servicesReturned') ?>
                                        <div class="row">
                                                    <div class="img col-md-4">
                                                            <a href="{{url('pro/user-profile/'. $item->user_id )}}"> <img class="card-img-top" src="{{asset(\App\ProjectPics::where('user_id', $item->user_id)->where('prof_service_id', $prof_service_id)->inRandomOrder(1)->value('pics_link'))}}" alt="No Photo"></a>      
                                                            
                                                    </div>                                        
                                                    <div class="content col-md-8">
                                                        <div class="row">
                                                            <div class="main-content col-md-8">
                                                                <h3> <img class="img-fluid" style="width: 45px; height: 45px; margin-right: 10px; border-radius: 50%;" src="{{ asset($item->profile_pics_link)}}" alt="Card image cap">{{$item->first_name}} {{$item->last_name}}</h3>
                                                                <div class="review">
                                                                </div>
                                                                <div class="the-text">
                                                                    {{ substr($item->bus_description, 0, 150) }}
                                                                </div>
                                                                <a href="{{url('pro/user-profile/'. $item->user_id )}}">Read More ></a>
                                                                <div class="service-content-footer" style="margin-top: 30px;">
                                                                    <div class="row">
                                                                        <div class="col-md-6" style="font-size: 14x;">
                                                                            <i class="fa fa-phone-alt"></i> &nbsp;   {{$item->phone}}
                                                                        </div>
                                                                        <div class="col-md-6"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="get-a-quote pt-5 px-4 col-md-4">
                                                                <div class="w-100">
                                                                    <a href="" class="btn btn-block" data-toggle="modal" data-target="#exampleModalLong-{{$item->id}}">Get a Quote</a>
                                                                    <div class="modal" id="exampleModalLong-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header jumbotron">
                                                                            <h6 class="modal-title" id="exampleModalLongTitle">
                                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae voluptates at ea labore
                                                                            </h6>
                                                                            </div>
                                                                            <div id="alert"></div>
                                                                                <form action="{{ url('/send-my-quote')}}" method="POST">
                                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                                    <div class="modal-body">
                                                                                        <label for="">From</label>
                                                                                        <input type="hidden" id="_token" value="{{csrf_token()}}">
                                                                                        <div class="form-group">
                                                                                                <input type="text" name="email" id="email" value="{{ \App\User::where('id', $item->id)->value('email') }}" class="form-control email">
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
                                                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
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
                                                </div>
                                            </div>
                                    <hr style="padding: 10px 0px;" />
                                    @endforeach
                                </div>

                                </div>
                        @elseif(count($services) > 0)
                            <div class="mt-3 professionals">
                                <div class="">
                                    @foreach ($services as $item)
                                        <div class="row">
                                                {{-- {{$item->user_id}} --}}
                                                    <div class="img col-md-4">
                                                            <a href="{{url('pro/user-profile/'. $item->user_id )}}"> <img class="card-img-top" src="{{asset(\App\ProjectPics::where('user_id', $item->user_id)->where('prof_service_id', $prof_service_id)->inRandomOrder(1)->value('pics_link'))}}" alt="No Photo"></a>      
                                                    </div>                                        
                                                    <div class="content col-md-8">
                                                        <div class="row">
                                                            <div class="main-content col-md-8">
                                                                    <h3> <img class="img-fluid" style="width: 45px; height: 45px; margin-right: 10px; border-radius: 50%;" src="{{ asset($item->profile_pics_link)}}" alt="Card image cap">{{$item->first_name}} {{$item->last_name}}</h3>
                                                                    <div class="review">
                                                                    </div>
                                                                    <div class="the-text">
                                                                        {{ substr($item->bus_description, 0, 150) }}
                                                                    </div>
                                                                    <a href="{{url('pro/user-profile/'. $item->user_id )}}">Read More ></a>
                                                                    <div class="service-content-footer" style="margin-top: 30px;">
                                                                        <div class="row">
                                                                            <div class="col-md-6" style="font-size: 14x;">
                                                                                <i class="fa fa-phone-alt"></i> &nbsp;   {{$item->phone}}
                                                                            </div>
                                                                            <div class="col-md-6"></div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="get-a-quote pt-5 px-4 col-md-4">
                                                                <div class="w-100">
                                                                    <a href="" class="btn btn-block" data-toggle="modal" data-target="#exampleModalLong-{{$item->id}}">Get a Quote</a>
                                                                    <div class="modal modal-center " id="exampleModalLong-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header jumbotron">
                                                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae voluptates at ea labore
                                                                            </h5>
                                                                            </div>
                                                                            <div id="alert"></div>
                
                                                                                <form action="{{ url('/send-my-quote')}}" method="POST">
                                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                                    <div class="modal-body">
                                                                                        <label for="">From</label>
                                                                                        <input type="hidden" id="_token" value="{{csrf_token()}}">
                                                                                        <div class="form-group">
                                                                                                <input type="text" name="email" id="email" value="{{ \App\User::where('user_id', $item->user_id)->value('email') }}" class="form-control email">
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
                                                                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
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
                                                </div>
                                            </div>
                                    <hr style="padding: 10px 0px;" />
                                    @endforeach
                                </div>

                                </div>
                        @else
                            <style>
                                .no-result-found{
                                    font-size: 40px;
                                    text-align: center;
                                    padding: 20px 0px 
                                }
                            </style>
                            <div class="no-result-found">
                                !No Result Found.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    .fadeOut{
        transition: all 1s ease-in-out background: none;
    }
    </style>
    <script src={{ asset('libraries/jquery-3.4.1.min.js')}}></script>
    <script src={{ asset('libraries/bootstrap/bootstrap.min.js')}}></script>
    <script src='{{ asset('libraries/sweetalert/dist/sweetalert.min.js')}}'></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>

        // $("#load-spinner").hide();

        // $("#send").on('click', function(){

        //     $("#load-spinner").show();
        //     $("#send").hide();

        //     let email = $(".email").val();
        //     let _token = $("#_token").val();

        //     let fullName = $("#full-name").val();
        //     let phone = $("#phone").val();
        //     let zipCode = $("#zip-code").val();
        //     let message = $("#message").val(); 

        //     let data = {email, fullName, phone, zipCode, message, _token};

        //     $.post("http://localhost:8000", data ,
        //         function(data, status){
                    
        //                 $('#alert').addClass("alert alert-success");
        //                 $('#alert').html("Request Completed.");
        //             // alert("Data: " + data + "\nStatus: " + status);
        //             $("#load-spinner").hide();
        //             $("#send").show();
                   
        //         }
        //     );
        // })

setTimeout(() =>{ $('.alert').remove() }, 2000);
function testAnim(x) {
    console.log(x);
    $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + x + '  animated');
}
$('#exampleModalLong').on('show.bs.modal', function (e) {
let anim = "slideInUp";
    testAnim(anim);    
})
$('#exampleModalLong').on('hide.bs.modal', function (e) {
    let anim = 'slideInDown';
    testAnim(anim);

});
</script>
@endsection