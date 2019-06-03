@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-sm">
            <a class="btn btn-info" href="{{route('admin.dashboard')}}">Admin Section</a>
        </div>
        <div class="col-sm">
            <a class="btn btn-info" href="{{route('professor.profile')}}">Professor Section</a>
        </div>
        <div class="col-sm">
            <a class="btn btn-info" href="#">Student Section</a>
        </div>
    </div>
</div>
@endsection