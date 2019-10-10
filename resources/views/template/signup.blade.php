@extends('template.pagelayout')
@section('content')
    <style>
        body{
            background-image:url({{url('backgrounds/6607.png')}}) !important;
        }
    </style>
    <div data-aos="flip-lef">

        <div class="content-area sign-up">
            <div class="sign-up-area sign-up-form-content">
            
                <form action="{{ url('basic-information') }}" method="get">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email')}}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        @if(Session::has('err'))
                            <span class="text-danger">{{ Session::get('err') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Email">Password</label>
                        <input type="password" name="password" class="form-control">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block bg-secondary-color">
                            Signup
                        </button>
                    </div>
                    <div class="form-group">
                        <span class="registered">Are you already registered</span> 
                        <a href="{{url('login')}}">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Sign up area --}}
@endsection
