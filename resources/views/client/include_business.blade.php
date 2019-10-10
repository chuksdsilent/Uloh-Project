@foreach ($userInfo as $item)
            <div class="sign-up-form-content">
                    <form action="{{ url('/edit-process-businessDetail/'. $item->user_id) }}" method="get">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <h5>Tell us about your business</h5>
                        </div>
                        <div class="form-group">
                            <label for="website">Your Website</label>
                            <input type="text" name="website" value="{{ $item->website}}" id="website"  class="form-control" value="http://">
                        </div>
                        <div class="form-group">
                            <label for="businessDescription">Business Description</label>
                            <textarea name="business_description" id="" cols="30" rows="4" class="form-control" placeholder="Tell us about your services here...">{{ $item->bus_description }}</textarea>                
                            skdjf
                            @if (Session::has('business_description'))
                                <span class="text-danger">{{ Session::get('business_description') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="certificateAndAward">Certificate And Award</label>
                            <textarea name="cert_and_award" id="certificateAndAwarad" cols="30" rows="5" class="form-control" placeholder="Tell us award and certificate you have gotten">{{ $item->cert_and_award}}</textarea>
                        </div>
                        <div class="form-group">
                                <div style="margin-bottom: 10px;">Job Cost range</div>
                            <div class="container">
                                <div class="row">
                                        <label for="from" style="margin-right: 10px;">From</label>
                                        <input type="number"  style="margin-right: 10px;" value="{{ $item->cost_from }}" name="cost_from" id="costFrom" class="form-control col-md-2">
                                        <label for="from"  style="margin-right: 10px;">to</label>
                                        <input type="number" name="cost_to" id="cost_to" value="{{ $item->cost_to }}" class="form-control col-md-2">
                                </div>
                            </div>                 
                            @if (Session::has('err'))
                                <span class="text-danger">{{ Session::get('err') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button id="submit" class="btn btn-block bg-secondary-color">
                                Continue <i class="fas fa-arrow-circle-right" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>

            </div>
            @endforeach