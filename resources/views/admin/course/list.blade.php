@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Basic Datatable</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Course ID</th>
                        <th>Course</th>
                        <th>Department</th>
                        <th>Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{$course->id}}</td>
                        <td>{{$course->coursename}}</td>
                        <td>{{$course->department->departmentname}}</td>
                        <td>{{$course->semester->semestername}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Course ID</th>
                        <th>Course</th>
                        <th>Department</th>
                        <th>Semester</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>
@endsection