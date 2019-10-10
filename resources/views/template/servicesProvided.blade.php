@extends('template/pagelayout')
@section('content')
<div class="content-area sign-up">
        <div class="sign-up-area  registration-area">
            <div class="signup-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h2>
                            Services Provided
                        </h2>
                    </div>
                </div>
            </div>
            <div class="sign-up-form-content">
                <h4 style="margin-bottom: 30px;">Tell us Services you provide</h4>
                <form action="{{ url('business-detail') }}" method="get">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="row mb-">
                            <div class="form-group col-md-6 ">
                                <?php $i=1; ?>
                                @foreach ($services_provided as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" name="services[]" type="checkbox" value="{{$item->prof_service_id}}" id="defaultCheck{{$i++}}">
                                        <label class="form-check-label" for="defaultCheck{{$i++}}">
                                            {{$item->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group col-md-6">
                                <?php $i=1; ?>
                                @foreach ($bedroom as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" name="services[]" type="checkbox" value="{{$item->prof_service_id}}" id="defaultCheck{{$i++}}">
                                        <label class="form-check-label" for="defaultCheck{{$i++}}">
                                            {{$item->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div> 
                        </div>        
                        <div class="row">
                            <div class="form-group col-md-6 ">
                                <?php $i=1; ?>
                                @foreach ($sitting_room as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" name="services[]" type="checkbox" value="{{$item->prof_service_id}}" id="defaultCheck{{$i++}}">
                                        <label class="form-check-label" for="defaultCheck{{$i++}}">
                                            {{$item->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group col-md-6">
                                <?php $i=1; ?>
                                @foreach ($bath_room as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" name="services[]" type="checkbox" value="{{$item->prof_service_id}}" id="defaultCheck{{$i++}}">
                                        <label class="form-check-label" for="defaultCheck{{$i++}}">
                                            {{$item->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div> 
                        </div>        
                    <div class="container form-group">                  
                        @if (Session::has('err'))
                            <span class="text-danger">{{ Session::get('err') }}</span>
                        @endif
                    </div>  
                <button class="btn btn-block bg-secondary-color">
                    Continue <i class="fas fa-arrow-circle-right" aria-hidden="true"></i>
                </button>
                </form>
            </div>
        </div>
    </div>
    {{-- End Sign up area --}}

@endsection