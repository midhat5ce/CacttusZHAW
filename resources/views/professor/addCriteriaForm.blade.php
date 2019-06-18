@extends('professor.layouts.app')
@section('content')
<form class="form-horizontal" action="{{route('professor.store.criteria', $course)}}" method="post">
    @csrf
    <div class="card-body">
        <h4 class="card-title">{{$course->coursename}}</h4>
        <p>Setting up criteria for: <u> {{$course->coursename}} </u></p>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Attendance</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="attendance" placeholder="0/100"
                    name="attendance">
            </div>
        </div>
        <div class="form-group row">
            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Project</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="lname" placeholder="0/100" name="project">
            </div>
        </div>
        <div class="form-group row">
            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Exam</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="lname" placeholder="0/100"
                    name="examination">
            </div>
        </div>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection