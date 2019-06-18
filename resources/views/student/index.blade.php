@extends('student.layouts.app')
@section('content')
<ul>
    @foreach ($student->department->courses as $course)
    {{$course->coursename. '-' .$course->grade}}
    @endforeach
</ul>
@endsection