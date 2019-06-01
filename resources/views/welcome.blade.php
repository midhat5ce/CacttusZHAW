@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-sm">
            <a href="{{route('admin.dashboard')}}">Admin Section</a>
        </div>
        <div class="col-sm">
            <a href="{{route('professor.profile')}}">Professor Section</a>
        </div>
        <div class="col-sm">
            <a href="#">Student Section</a>
        </div>
    </div>
</div>
@endsection