@extends('admin.layouts.app')
@section('content')
@include('partials.header', $data = ['route' => route('admin.dashboard'), 'section' => 'List of students', 'description' => 'professors registered datatable'])
<br>
<div class="card">
    <div class="card-body">
        {{-- <h5 class="card-title">Students Datatable</h5> --}}
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Courses</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{$student->firstname}}</td>
                        <td>{{$student->lastname}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->department->departmentname}}</td>
                        <td>{!! $student->department->courses->pluck('coursename')->implode(",</br>") !!}</td>
                    </tr>
                    @endforeach
                </tbody>
                {{-- <tfoot>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Courses</th>
                    </tr>
                </tfoot> --}}
            </table>
        </div>

    </div>
</div>
@endsection