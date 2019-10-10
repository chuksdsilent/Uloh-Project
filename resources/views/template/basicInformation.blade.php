@extends('template.pagelayout')
@section('content')

<div class="content-area sign-up">
        <div class="sign-up-area  registration-area">
            <div class="signup-header-area">
                <div class="row">
                    <div class="col-md-12">
                        <h2>
                            Basic Information
                        </h2>
                    </div>
                </div>
            </div>
            <div class="sign-up-form-content">
                    <form action="{{ url('services-provided') }}" method="get">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="company_name">Professional/Company Name</label>
                            <input type="text" name="company_name" class="form-control" value="{{ old('company_name')}}">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name')}}">
                            @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name')}}">
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="companyType">Company Type</label>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 ">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="company_type" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="customRadio1">Local professional</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="company_type" class="custom-control-input" value="2">
                                    <label class="custom-control-label" for="customRadio2">Brand or Manufacturer</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio3" name="company_type" class="custom-control-input" value="3">
                                    <label class="custom-control-label" for="customRadio3">Local Retailer</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio4" name="company_type" class="custom-control-input" value="4">
                                    <label class="custom-control-label" for="customRadio4">Online Retailer</label>
                                </div>   
                            </div>         
                            <div class="container form-group">                  
                                @if (Session::has('err'))
                                    <span class="text-danger">{{ Session::get('err') }}</span>
                                @endif
                            </div>  
                        </div>
                        <div class="form-group">
                            <label for="Email">Address 1</label>
                            <input type="text" name="address_1" class="form-control" value="{{ old('address_1')}}">
                            @if ($errors->has('address_1'))
                                <span class="text-danger">{{ $errors->first('address_1') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Email">Address 2</label>
                            <input type="text" name="address_2" class="form-control" value="{{ old('address_2')}}">
                            @if ($errors->has('address_2'))
                                <span class="text-danger">{{ $errors->first('address_2') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="" class="form-control" value="{{ old('city')}}">
                                    @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="state">State</label>
                                    <select name="state" id="state" class="form-control" value="{{ old('state')}}">
                                        @foreach ($states as $item)
                                            <option value="{{$item->state_id}}">{{$item->name}}</option>                                                
                                        @endforeach
                                    </select>
                                    @if ($errors->has('state'))
                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select name="country" id="country" class="form-control" value="{{ old('country')}}">
                                <option value="1">Nigeria</option>
                            </select>
                            @if ($errors->has('country'))
                                <span class="text-danger">{{ $errors->first('country') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone">Mobile Phone </label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone')}}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block bg-secondary-color">
                                Continue <i class="fas fa-arrow-circle-right" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
    {{-- End Sign up area --}}
@endsection
