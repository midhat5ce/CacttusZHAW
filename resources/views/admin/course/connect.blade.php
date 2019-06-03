@extends('admin.layouts.app')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Connect | Course/Professor</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">§ a course with a professor!</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@if (Session::has('error'))
<div class="col-md-12">
    <div class="mr-2 ml-2 mt-3 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{Session::get('error')}} <a href="{{route('admin.dashboard')}}" class="ml-2">go to
            dashboard!</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
@if (Session::has('sucess'))
<div class="col-md-12">
    <div class="mr-2 ml-2 mt-3 alert alert-info alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{Session::get('sucess')}} <a href="{{route('admin.dashboard')}}" class="ml-2">go to
            dashboard!</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
<div class="col-md-12 mt-3 pb-5">
    <div class="card">
        <form class="form-horizontal" {{ route('admin.course.link') }} method="POST">
            @csrf
            <div class="card-body">
                <h4 class="card-title">Link Course/Professor</h4>
                <div class="form-group row">
                    <label class="col-sm-3 text-right m-t-15">Select Course</label>
                    <div class="col-md-9">
                        <select class="select2 form-control custom-select {{$errors->has('course_id') ? 'is-invalid' : ''}}" style="width: 100%; height:36px;"
                            name="course_id">
                            <option disabled selected>Select</option>
                            <optgroup label="System Administrator">
                                @foreach ($sysadmins as $sysadmin)
                                <option value="{{$sysadmin->id}}">{{$sysadmin->coursename}} | <p class="blockquote-footer">
                                        {{$sysadmin->semester->semestername}}</p>
                                </option>
                                @endforeach
                            </optgroup>
                            <optgroup label="Web & App Development">
                                @foreach ($webdevs as $webdev)
                                <option value="{{$webdev->id}}">{{$webdev->coursename}} | <p
                                        class="blockquote-footer">{{$webdev->semester->semestername}}</p>
                                </option>
                                @endforeach
                            </optgroup>
                        </select>
                        @if ($errors->has('course_id'))
                        <p class="invalid-feedback">select a valid course</p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 text-right m-t-15">Select Professor</label>
                    <div class="col-md-9">
                        <select class="select2 form-control custom-select {{$errors->has('professor_id') ? 'is-invalid' : ''}}" style="width: 100%; height:36px;"
                            name="professor_id">
                            <option disabled selected>Select</option>
                            <optgroup label="List of registred professors">
                                @foreach ($professors as $professor)
                                <option value="{{$professor->id}}">{{$professor->firstname.' '.$professor->lastname}}
                                </option>
                                @endforeach
                            </optgroup>
                        </select>
                        @if ($errors->has('professor_id'))
                        <p class="invalid-feedback">select a valid professor</p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Start Date</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control date-inputmask {{$errors->has('startdate') ? 'is-invalid' : ''}}" id="date-mask" name="startdate"
                            placeholder="enter start date">
                        @if ($errors->has('startdate'))
                        <p class="invalid-feedback">{{$errors->first('startdate')}}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Finish Date</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control date-inputmask {{$errors->has('finishdate') ? 'is-invalid' : ''}}" name="finishdate" id="date-mask"
                            placeholder="enter end date">
                        @if ($errors->has('finishdate'))
                        <div class="invalid-feedback">{{$errors->first('finishdate')}}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection