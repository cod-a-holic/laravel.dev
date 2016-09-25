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
                            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{'/avatars/'.$employee->avatar}}" class="img-rounded img-responsive"> </div>
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Position:</td>
                                        <td>{{ $employee->position }}</td>
                                    </tr>
                                    <tr>
                                        <td>Salary:</td>
                                        <td>{{ $employee->salary }} $</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>{{ $employee->created_at }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a href="/employees" type="button" class="btn btn-sm btn-primary"><i class="fa fa-mail-reply"></i></a>
                        <span class="pull-right">
                            <a href="{{url('/employees/'.$employee->id.'/edit')}}" type="button" class="btn btn-sm btn-warning"><i class="fa fa-sun-o"></i> Edit</a>
                            <a type="button" class="btn btn-sm btn-danger" data-id="{{ $employee->id }}" data-token="{{ csrf_token() }}" id="deleteEmployee"><i class="fa fa-trash-o"></i> Delete</a>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop