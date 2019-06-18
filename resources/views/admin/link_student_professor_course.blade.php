@extends('admin.layouts.app')
@section('content')
@include('partials.header', $data = ['route' => route('admin.dashboard'), 'section' => $department->departmentname,
'description' => 'Assign a professor to a list of students'])
<br>
@if (Session::has('error'))
<div class="col-md-12">
    <div class="mr-2 ml-2 mt-3 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{Session::get('error')}} 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
@if (Session::has('success'))
<div class="col-md-12">
    <div class="mr-2 ml-2 mt-3 alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{Session::get('success')}} 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Professor</th>
                        <th>Course</th>
                        <th>Students</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <form action="{{route('admin.link_student_professor.submit')}}" method="post">
                        @csrf
                        <tr>
                            <td><select class="form-control" name="professor_id">@foreach ($course->professor as
                                    $professor)
                                    <option value="{{$professor->id}}">
                                        {{$professor->firstname.' '.$professor->lastname}}</option>
                                    @endforeach</select></td>
                            <td>{{$course->coursename}}</td>
                            <input type="hidden" name="course_id" value="{{$course->id}}">
                            <td>@foreach ($course->department->students as $student)
                                {{$student->id.'. '.$student->firstname.' '.$student->lastname}},<br>
                                <span style="display:none;">{{$stds[] = $student->id}}</span>
                                <input type="hidden" name="students_id" value="{{json_encode($stds)}}">
                                @endforeach</td>
                            <td><button class="btn-success form-control">Add</button></td>
                        </tr>
                    </form>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection