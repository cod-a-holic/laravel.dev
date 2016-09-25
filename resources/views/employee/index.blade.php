@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="text-center">Employees List</h1>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." id="search-input">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" id="search-button"><i class="fa fa-search"></i></button>
                </span>
            </div>
            <hr>
            <div class="list-group list-group-root well">
                @foreach($employees as $employee)
                    <span data-id="{{$employee->id}}" class="list-group-item subord">
                        <div class="row">
                            <div class="col-md-2">
                                <img class="img-responsive img-rounded" src="{{'/avatars/'.$employee->avatar}}">
                            </div>
                            <div class="col-md-9">
                                {{ $employee->first_name }} {{ $employee->last_name }}
                                <br>
                                <span class="label label-success">{{ $employee->position }}</span>
                            </div>
                            <div class="col-md-1">
                                <a class="btn btn-sm btn-primary pull-right" href="/employees/{{$employee->id}}">View</a>
                            </div>
                        </div>
                    </span>
                    <div class="list-group" id="{{$employee->id}}">
                        @foreach($employee->subordinates as $employee)
                            @include('employee.partial.subordinate')
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@stop


