@extends('admin.layouts.app')
@section('content')
@include('partials.header', $data = ['route' => route('admin.dashboard'), 'description' => 'add a course', 'section' => 'Section | Course Registration'])
{{-- <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Form | Course</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">add a subject</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> --}}
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
        <form class="form-horizontal" {{ route('admin.course.store') }} method="POST">
            @csrf
            <div class="card-body">
                <h4 class="card-title">Course Info</h4>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Course Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control {{$errors->has('coursename') ? 'is-invalid' : ''}}"
                            name="coursename" id="fname" placeholder="Course Name Here">
                        @if ($errors->has('coursename'))
                        <div class="invalid-feedback">
                            {{$errors->first('coursename')}}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label">Department Name</label>
                    <div class="col-sm-9">
                        @foreach ($department as $depname)
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input"
                                id="customControlValidation.{{$depname->id}}" name="department_id"
                                value="{{$depname->id}}">
                            <label class="custom-control-label"
                                for="customControlValidation.{{$depname->id}}">{{$depname->departmentname}}</label>
                        </div>
                        @endforeach
                        @if ($errors->has('department_id'))
                        <p class="text-danger">please select above one of department options</p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label">Semester</label>
                    <div class="col-sm-9">
                        @foreach ($semester as $item)
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="customControlValidation.{{$item->semestername}}"
                                name="semester_id" value="{{$item->id}}">
                            <label class="custom-control-label"
                                for="customControlValidation.{{$item->semestername}}">{{$item->semestername}}</label>
                        </div>
                        @endforeach
                        @if ($errors->has('semester_id'))
                        <p class="text-danger">please select above one of semester options</p>
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