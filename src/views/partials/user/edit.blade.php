@extends('guardian::layout.master')

@section('content')
    <h3 class="heading">Edit User</h3>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{Session::get('success')}}</p>
        </div>
    @endif
    {{Form::open(['route'=>['user.update',$user->id,'ref'=>Request::get('ref')],'class'=>'form form-horizontal','style'=>'margin-top:50px'])}}
    <div class="form-group">
        {{ Form::label('username','User Name:',['class'=>'col-sm-3 control-label']) }}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('username')}}</span>
            {{ Form::text('username',Input::old('username',$user->username),['class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('email','User Email:',['class'=>'col-sm-3 control-label']) }}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('email')}}</span>
            {{ Form::text('email',Input::old('email',$user->email),['class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('password','New Password:',['class'=>'col-sm-3 control-label']) }}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('password')}}</span>
            {{ Form::password('password',['class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('password_confirmation','Confirm Password:',['class'=>'col-sm-3 control-label']) }}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('password_confirmation')}}</span>
            {{ Form::password('password_confirmation',['class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('active','Set as active',['class'=>'col-sm-3 control-label']) }}
        <div class="col-sm-3">
            {{ Form::select('active',['No','Yes'],Input::old('active',$user->active),['class'=>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{Form::label('roles','Attach Roles:',['class'=>'col-sm-3 control-label'])}}
        <div class="col-sm-8">
            @if($roles->isEmpty())
                {{Form::text('fake',null,['class'=>'form-control','placeholder'=>'Create Some Roles First!','disabled'])}}
            @else
                {{Form::select('roles',$roles->lists('role_name','id'),Input::old('roles',$user->roles->lists('id')),['name'=>'roles[]','multiple'])}}
            @endif
        </div>
    </div>
    <div class="text-center">
        {{HTML::link(URL::route('user.list',Input::get('ref')), 'Back',['class'=>'btn btn-warning'])}}
        {{Form::submit('Update User',['class'=>'btn btn-default'])}}
    </div>
    {{Form::close()}}
@stop