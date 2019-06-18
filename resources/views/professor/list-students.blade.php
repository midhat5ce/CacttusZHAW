@extends('professor.layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">{{$course->coursename}} </h5> semester: {{$course->semester->semestername}}
        <br>
        Criteria: <br>
        Project: {{$professor->criteria()->where(['course_id' => $course->id])->first()->project.'%'}}
        Exams: {{$professor->criteria()->where(['course_id' => $course->id])->first()->examination.'%'}}
        Attendance: {{$professor->criteria()->where(['course_id' => $course->id])->first()->attendance.'%'}}
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
                <th scope="col">
                    Projects<br>{{$professor->criteria()->where(['course_id' => $course->id])->first()->project.'%'}}
                </th>
                <th scope="col">
                    Exams<br>{{$professor->criteria()->where(['course_id' => $course->id])->first()->examination.'%'}}
                </th>
                <th scope="col">
                    Attendance<br>{{$professor->criteria()->where(['course_id' => $course->id])->first()->attendance.'%'}}
                </th>
                <th scope="col"></th>
                <th scope="col">Grade</th>
            </tr>
        </thead>
        <tbody>
            @if ($existsRow)
            @foreach ($course->students as $student) <tr>
                <td>{{$student->firstname}}</td>
                <td>{{$student->lastname}}</td>
                <td>{{$student->email}}</td>
                <form action="{{route('professor.add-grade', [$course->id, $student->id])}}" method="post">
                    @csrf
                    @method('PATCH')
                    <td>
                        <input class="form-control" type="number" name="project" id="project" placeholder="{{$student->grades()
                            ->where(['course_id' => $course->id, 'professor_id' => $professor->id])
                            ->first()->project.'/'.$professor
                            ->criteria()
                            ->where(['course_id' => $course->id])->first()->project.'%'}}">
                    </td>
                    <td>
                        <input class="form-control" type="number" name="examination" id="examination" placeholder="{{$student->grades()
                            ->where(['course_id' => $course->id, 'professor_id' => $professor->id])
                            ->first()->examination.'/'.$professor
                            ->criteria()
                            ->where(['course_id' => $course->id])->first()->examination.'%'}}">
                    </td>
                    <td>
                        <input class="form-control" type="number" name="attendance" id="attendance" placeholder="{{$student->grades()
                            ->where(['course_id' => $course->id, 'professor_id' => $professor->id])
                            ->first()->attendance.'/'.$professor
                            ->criteria()
                            ->where(['course_id' => $course->id])->first()->attendance.'%'}}">
                    </td>
                    <td><button class="btn btn-block">Add Grade</button></td>
                </form>
                <td>{{number_format(($student->grades()
                    ->where(['course_id' => $course->id, 'professor_id' => $professor->id])
                    ->first()->project / $professor
                    ->criteria()
                    ->where(['course_id' => $course->id])->first()->project * 100), 2, '.', ',')}}</td>
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
</div>
@endsection