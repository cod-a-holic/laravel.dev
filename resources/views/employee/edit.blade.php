@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">{{ $employee->first_name }} {{ $employee->last_name }}</h2>
            <hr>
            <div class="row">
                {{ Form::open(['action' => ['EmployeeController@update', $employee->id], 'files' => true ]) }}

                {{method_field('PATCH')}}

                <div class="col-md-3" style="overflow: hidden">
                    <img width="150px"  src="{{'/avatars/'.$employee->avatar}}" />
                    <div class="form-group">
                        {{ Form::file('avatar') }}
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        {{ Form::label('first_name', 'First name:') }}
                        {{ Form::text('first_name', $employee->first_name, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('last_name', 'Last name:') }}
                        {{ Form::text('last_name', $employee->last_name, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('position', 'Position:') }}
                        {{ Form::select('position', [
                            'senior developer' => 'senior developer',
                            'middle developer' => 'middle developer',
                            'junior developer' => 'junior developer',
                            'trainee developer' => 'trainee developer'
                            ], $employee->position, ['class' => 'form-control'] ) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('salary', 'Salary:') }}
                        {{ Form::number('salary', $employee->salary, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('director_id', 'Director:') }}
                        <select class="form-control" name="director_id">
                            @foreach($directors as $director)
                                <option  @if($employee->director_id == $director->id) selected @endif value="{{$director->id}}">{{$director->fullname}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {{ Form::submit('Save', ['class' => 'btn btn-primary pull-right']) }}
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop