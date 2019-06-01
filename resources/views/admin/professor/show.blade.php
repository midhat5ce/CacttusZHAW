@extends('admin.layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h5 class="card-title">Profile | {{$professor->firstname.' '.$professor->lastname}}</h5>
            <div class="card">
                <div class="">
                    <div class="row">
                        <div class="col-lg-4 border-right p-r-0">
                            <div class="card-body border-bottom">
                                <h4 class="card-title m-t-10">Professor Basics</h4>
                                <p>profile & account information</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="calendar-events" class="">
                                            <div class="calendar-events m-b-20 mb-2" data-class="bg-info"><i
                                                    class="fa fa-user text-info m-r-10"></i>
                                                Professor name:
                                                <strong>{{$professor->firstname.' '.$professor->lastname}}
                                                </strong>
                                            </div>
                                        </div>
                                        <div id="calendar-events" class="">
                                            <div class="calendar-events m-b-20 mb-2" data-class="bg-info"><i
                                                    class="fa fa-envelope text-info m-r-10"></i>
                                                Professor email: <strong>{{$professor->email}}
                                                </strong>
                                            </div>
                                        </div>
                                        <div id="calendar-events" class="">
                                            <div class="calendar-events m-b-20 mb-2" data-class="bg-info"><i
                                                    class="fa fa-id-card text-info m-r-10"></i>
                                                Professor ID: <strong>{{$professor->id}}
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title m-b-0">Tasks | <small class="text-info">Editable part:
                                            dates</small></h5>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Description</th>
                                            <th scope="col">Semester</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">Finish Date</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($professor->courses as $item)
                                        <tr>
                                            <td>{{$item->coursename}}</td>
                                            <td>{{$item->semester->semestername}}</td>
                                            <td>{{$item->department->departmentname}}</td>
                                            <td class="text-warning">{{$item->pivot->startdate}}</td>
                                            <td class="text-warning">{{$item->pivot->finishdate}}</td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#add-new-event" class="">
                                                    <i class="mdi mdi-check"></i>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    </i><i class="mdi mdi-close"></i>
                                                </a>    
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- BEGIN MODAL -->
<div class="modal none-border" id="my-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Add Event</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                    event</button>
                <button type="button" class="btn btn-danger delete-event waves-effect waves-light"
                    data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Category -->
<div class="modal fade none-border" id="add-new-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Update</strong> Starting time</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Start date</label>
                            <input type="text" class="form-control date-inputmask" id="date-mask" name="startdate"
                                placeholder="enter start date">
                            {{-- @if ($errors->has('startdate'))
                                        <p class="invalid-feedback">{{$errors->first('startdate')}}</p>
                            @endif --}}
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Start date</label>
                            <input type="text" class="form-control date-inputmask" id="date-mask" name="finishdate"
                                placeholder="enter start date">
                            {{-- @if ($errors->has('startdate'))
                                            <p class="invalid-feedback">{{$errors->first('startdate')}}</p>
                            @endif --}}
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect waves-light save-category"
                    data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>

@endsection