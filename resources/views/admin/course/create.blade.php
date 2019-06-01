@extends('admin.layouts.app')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Form | Course</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">add a subject</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
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
                        <input type="text" class="form-control {{$errors->has('coursename') ? 'is-invalid' : ''}}" name="coursename" id="fname"
                            placeholder="Course Name Here">
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
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="customControlValidation1"
                                name="department_id" value="1">
                            <label class="custom-control-label" for="customControlValidation1">Web & App Development</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="customControlValidation2"
                                name="department_id" value="2">
                            <label class="custom-control-label" for="customControlValidation2">System
                                Administrator</label>
                        </div>
                        @if ($errors->has('department_id'))
                            <p class="text-danger">please select above one of department options</p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 text-right control-label col-form-label">Semester</label>
                    <div class="col-sm-9">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="customControlValidation3"
                                name="semester_id" value="1">
                            <label class="custom-control-label" for="customControlValidation3">Fall</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="customControlValidation4"
                                name="semester_id" value="2">
                            <label class="custom-control-label" for="customControlValidation4">Spring</label>
                        </div>
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