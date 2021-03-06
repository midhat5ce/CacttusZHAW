@extends('admin.layouts.app')
@section('content')
@include('partials.header', $data = ['route' => route('admin.dashboard'), 'section' => 'Add Student', 'description' => 'register a student'])
{{-- <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Add a Student</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">add a student</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> --}}
@if (Session::has('sucess'))
<div class="col-md-12">
    <div class="mr-2 ml-2 mt-3 alert alert-info alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{Session::get('sucess')}} <a href="{{route('admin.student.list')}}" class="ml-2">go
            to
            list of students!</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
<div class="container-fluid">
    <div class="card">
        <div class="card-body wizard-content">
            <h4 class="card-title">Student Form</h4>
            <h6 class="card-subtitle"></h6>
            <form action="{{route('admin.addStudent.submit')}}" class="m-t-40" method="POST">
                @csrf
                <div>
                    <h3>Account</h3>
                    <section>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input id="email" name="email" type="text"
                                class="required email form-control {{$errors->has('email') ? 'is-invalid' : ''}}"
                                value="{{old('email')}}">
                            @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{$errors->first('email')}}
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password *</label>
                                    <input type="password" id="password" name="password" type="text"
                                        class="required form-control {{$errors->has('password') ? 'is-invalid' : ''}}">
                                    @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('password')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirm">Confirm Password *</label>
                                    <input type="password" id="confirm" name="password_confirmation" type="text"
                                        class="required form-control {{$errors->has('password') ? 'is-invalid' : ''}}">
                                </div>
                            </div>
                        </div>
                        <p>(*) Mandatory</p>
                        <hr>
                    </section>
                    <h3>Profile</h3>
                    <section>
                        <div class="form-group">
                            <label for="name">First name *</label>
                            <input id="name" name="firstname" type="text"
                                class="required form-control {{$errors->has('firstname') ? 'is-invalid' : ''}}"
                                value="{{old('firstname')}}">
                            @if ($errors->has('firstname'))
                            <div class="invalid-feedback">
                                First name is required. Please fill it!
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="surname">Last name *</label>
                            <input id="surname" name="lastname" type="text"
                                class="required form-control {{$errors->has('lastname') ? 'is-invalid' : ''}}"
                                value="{{old('lastname')}}">
                            @if ($errors->has('lastname'))
                            <div class="invalid-feedback">
                                First name is required. Please fill it!
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="text-right control-label col-form-label">Department*</label>
                            <div class="col-sm-9">
                                @foreach ($departments as $dep)
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="customControlValidation{{$dep->id}}"
                                        name="department_id" value="{{$dep->id}}">
                                    <label class="custom-control-label" for="customControlValidation{{$dep->id}}">{{$dep->departmentname}}</label>
                                </div>
                                @endforeach
                                @if ($errors->has('department_id'))
                                <p class="text-danger">please select above one of department options</p>
                                @endif
                            </div>
                        </div>
                        <p>(*) Mandatory</p>
                    </section>
                    <hr>
                    <div class="col-md-12">
                        <button class="btn btn-success btn-lg">Submit</button>
                        <a href="{{route('admin.dashboard')}}"
                            class="btn btn-link text-danger btn-lg float-right">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection