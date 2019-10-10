@extends('client.logged_page_layout')
@section('content')
    @if (Session::has('success'))
        <div class="container">
            <div class="alert alert-success">{{Session::get('success')}}</div>
        </div>
    @endif
    <div class="content-area">
        <div class="project-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="new-project">
                            <div class="project-header-area">
                                <header>
                                    <h5>New Project</h5>
                                </header>
                            </div>
                            <div class="project-form">
                                <form action="{{url('new-project')}}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label for="projectName">Project Name</label>
                                        <input type="text" name="projectName" value="{{old('projectName')}}" id="projectName" class="form-control">
                                        @if ($errors->has('projectName'))
                                            <span class="text-danger">{{ $errors->first('projectName') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_category">Category</label>
                                        <select name="sub_category" id="sub_category" class="form-control">
                                            @foreach ($subCategory as $item)
                                                <option value="{{$item->prof_service_id}}">{{$item->name}}</option>                                                
                                            @endforeach
                                            @if ($errors->has('sub_category'))
                                                <span class="text-danger">{{ $errors->first('sub_category') }}</span>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="projectAddress">Project Address</label>
                                        <input type="text"  value="{{old('projectAddress')}}" name="projectAddress" id="projectAddress" class="form-control">
                                        @if ($errors->has('projectAddress'))
                                            <span class="text-danger">{{ $errors->first('projectAddress') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="projectYear">Project Year</label>
                                        <select name="projectYear" class="form-control" id="">
                                            <option value="">Select Year</option>
                                            @for($i=1980; $i<2030; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @if ($errors->has('projectYear'))
                                            <span class="text-danger">{{ $errors->first('projectYear') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="projectCost">Project Cost Range</label>
                                        <input type="text" name="projectCost"   value="{{old('projectCost')}}" id="projectCost" class="form-control">
                                        @if ($errors->has('projectCost'))
                                            <span class="text-danger">{{ $errors->first('projectCost') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="linkToWebsite">Link to Website</label>
                                        <input type="text" value="{{old('linkToWebsite')}}"  name="linkToWebsite" id="linkToWebsite" class="form-control">
                                        @if ($errors->has('linkToWebsite'))
                                            <span class="text-danger">{{ $errors->first('linkToWebsite') }}</span>
                                        @endif
                                    </div>
                                    <div class="input-group">
                                        <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add Project Picture</button>
                                    </div>
                                    <div class="input-group control-group increment" >
                                        <style>
                                            .hide{
                                                display: none;
                                            }
                                        </style>
                                        <div class="clone hide">
                                            <div class="control-group input-group" style="margin-top:10px">
                                                <input type="file" name="filename[]" class="form-control">
                                                <div class="input-group-btn"> 
                                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mt-5">
                                        <button class="btn bg-secondary-color btn-block">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection