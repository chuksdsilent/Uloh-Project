@extends('template.pagelayout')
@section('content')
    <style>
        body{
            background-image:url({{url('backgrounds/407338.png')}}) !important;
        }
    </style>
    <div data-aos="flip-lef">
    <div class="content-area sign-up">
        <div class="sign-up-area sign-up-form-content">
            @if(Session::has('err'))
                <div class="form-group">
                    <span class="text-danger" >{{ Session::get('err') }}</span>                
                </div>
            @endif
            <form action="{{ url('/admin/check-credentials') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email')}}">
                </div>
                <div class="form-group">
                    <label for="Email">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-block bg-secondary-color">
                        Login
                    </button>
                </div>
                <div class="form-group">
                    <span class="registered">Not registered yet</span> 
                    <a href="{{url('sign-up')}}">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
    </div>
    {{-- End Sign up area --}}
@endsection
