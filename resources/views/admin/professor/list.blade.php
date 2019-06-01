@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Professors Datatable</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Courses</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($professors as $professor)
                    <tr>
                        <td>{{$professor->firstname}}</td>
                        <td>{{$professor->lastname}}</td>
                        <td>{{$professor->email}}</td>
                        <td>{!! $professor->courses->pluck('coursename')->implode(",</br>") !!} {!! $professor->courses->pluck('coursename')->isEmpty() ? '<p class="text-danger">No course given yet!</p>' : '' !!}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Courses</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>
@endsection