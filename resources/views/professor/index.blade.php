@extends('professor.layouts.app')
@section('content')
@if (Session::has('sucess'))
        <div class="col-md-12"> 
            <div class="mr-2 ml-2 mt-3 alert alert-info alert-dismissible fade show" role="alert">
                <p> {{Session::get('sucess')}} </p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
<div class="card">
    <div class="card-body">
       
        <h5 class="card-title m-b-0">Course criteria</h5>
        <p>set criteria to the subjects you've been assigned to!</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Course</th>
                    <th scope="col">Criteria</th>
                    <th scope="col">Students</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($professor->courses as $course) <tr>

                    <td>{{$course->coursename}}</td>
                    <td><a href="{{route('professor.add.criteria', $course->id)}}">Set
                            criteria</a> </td>
                    <td><a href="{{route('profesor.list.students', $course->id)}}"> List students</a></td>
                </tr>@endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
