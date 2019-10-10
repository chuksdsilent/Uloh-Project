
@foreach($userInfo as $item)
<div class="sign-up-form-content">
        <h4 style="margin-bottom: 30px;">Tell us Services you provide</h4>
            <form action="{{ url('business-detail') }}" method="get">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                <div class="row">
                        <div class="form-group col-md-6 ">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="service" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="customRadio1">Local professional</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="service" class="custom-control-input" value="2">
                                <label class="custom-control-label" for="customRadio2">Brand or Manufacturer</label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="service" class="custom-control-input" value="3">
                                <label class="custom-control-label" for="customRadio3">Local Retailer</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio4" name="service" class="custom-control-input" value="4">
                                <label class="custom-control-label" for="customRadio4">Online Retailer</label>
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
                </div>
            </form>
        </div>
    </div>
    @endforeach