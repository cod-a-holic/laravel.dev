@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="text-center">Employees List</h1>
            <hr>
            <ul class="media-list">
                @foreach($employees as $employee)
                    <li class="media">
                        <div class="media-left">
                            <a href="#">
                                <img src="https://www.gravatar.com/avatar/{{ md5($employee->email) }}" />
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $employee->first_name }} {{ $employee->last_name }} </h4>
                            <span class="label label-info">{{ $employee->position }}</span>
                            <span class="label label-success">{{ $employee->salary }} $</span>
                            <a class="btn btn-primary pull-right" href="/employees/{{$employee->id}}/edit">Edit</a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="text-center">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
@stop
