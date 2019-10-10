@extends('template.pagelayout')
@section('content')
<style>
    .far{
        font-size: 200px;
        color: #d49114;
        margin-bottom: 20px;
    }
    h2{
        font-weight: bold;
    }
</style>
<div class="content-area sign-up">
    <div class="sign-up-area  registration-area">
        <div class="text-center">
            <div class="sign-up-form-content">
                <i class="far fa-check-circle"></i>
                <h2>Registration Completed</h2>
                <h6>The admin will confirm you and reach you through email</h6>
                <span>Click <a href="{{url('/')}} ">here</a> to Continue </span>
            </div>
        </div>
    </div>
</div>
@endsection