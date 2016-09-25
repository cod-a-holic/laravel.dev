@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            {{ Form::open(['action' => ['EmployeeController@update', $employee->id], 'files' => true ]) }}
                            {{method_field('PATCH')}}

                            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{'/avatars/'.$employee->avatar}}" class="img-rounded img-responsive">
                                {{ Form::file('avatar',  ['class' => 'hidden']) }}
                                <br>
                                <a type="button" id="uploadAvatar" class="btn btn-sm btn-primary">Load avatar</a>
                            </div>
                            <div class=" col-md-9 col-lg-9 ">
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

                                @if($employee->director_id !== null)
                                <div class="form-group">
                                    {{ Form::label('director_id', 'Director:') }}
                                    <select class="form-control" name="director_id">
                                        @foreach($directors as $director)
                                            <option  @if($employee->director_id == $director->id) selected @endif value="{{$director->id}}">{{$director->first_name}} {{$director->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 @endif

                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <a href="{{url('/employees', ['employee' => $employee->id])}}" type="button" class="btn btn-sm btn-primary"><i class="fa fa-mail-reply"></i></a>
                        {{ Form::submit('Save', ['class' => 'btn btn-sm btn-primary pull-right']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop