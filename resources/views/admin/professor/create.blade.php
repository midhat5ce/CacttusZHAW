@extends('admin.layouts.app')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Form | Professor</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">add a professor</li>
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
            of professors!</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
<div class="container-fluid">
    <div class="card">
        <div class="card-body wizard-content">
            <h4 class="card-title">Register Professor</h4>
            <h6 class="card-subtitle"></h6>
            <form action="{{route('admin.addProfessor.submit')}}" class="m-t-40" method="POST">
                @csrf
                <div>
                    <h3>Account</h3>
                    <section>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input id="email" name="email" type="text"
                                class="required email form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{old('email')}}">
                            @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{$errors->first('email')}}
                            </div>
                            @endif
                        </div>
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
                        <div class="form-group">
                            <label for="confirm">Confirm Password *</label>
                            <input type="password" id="confirm" name="password_confirmation" type="text"
                                class="required form-control {{$errors->has('password') ? 'is-invalid' : ''}}">
                        </div>
                        <p>(*) Mandatory</p>
                        <hr>
                    </section>
                    <h3>Profile</h3>
                    <section>
                        <div class="form-group">
                            <label for="name">First name *</label>
                            <input id="name" name="firstname" type="text"
                                class="required form-control {{$errors->has('firstname') ? 'is-invalid' : ''}}" value="{{old('firstname')}}">
                            @if ($errors->has('firstname'))
                            <div class="invalid-feedback">
                                First name is required. Please fill it!
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="surname">Last name *</label>
                            <input id="surname" name="lastname" type="text"
                                class="required form-control {{$errors->has('lastname') ? 'is-invalid' : ''}}" value="{{old('lastname')}}">
                            @if ($errors->has('lastname'))
                            <div class="invalid-feedback">
                                First name is required. Please fill it!
                            </div>
                            @endif
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