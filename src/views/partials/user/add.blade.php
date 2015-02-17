@extends('guardian::layout.master')

@section('content')
    <h3 class="heading">Add New User</h3>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{Session::get('success')}}</p>
        </div>
    @endif
    {!!app('form')->open(['route'=>['user.create'],'class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
    <div class="form-group">
        {!! app('form')->label('username','User Name:',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('username')}}</span>
            {!! app('form')->text('username',Input::old('username'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! app('form')->label('email','User Email:',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('email')}}</span>
            {!! app('form')->text('email',Input::old('email'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! app('form')->label('password','User Password:',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('password')}}</span>
            {!! app('form')->password('password',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! app('form')->label('password_confirmation','Confirm Password:',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('password_confirmation')}}</span>
            {!! app('form')->password('password_confirmation',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! app('form')->label('active','Set as active:',['class'=>'col-sm-3 control-label'])!!}
        <div class="col-sm-3">
            {!! app('form')->select('active',['No','Yes'],Input::old('active',0),['class'=>'form-control'])!!}
        </div>
    </div>
    <div class="form-group">
        {!!app('form')->label('roles','Attach Roles:',['class'=>'col-sm-3 control-label'])!!}
        <div class="col-sm-8">
            @if($roles->isEmpty())
                {!!app('form')->text('fake',null,['class'=>'form-control','placeholder'=>'Create Some Roles First!','disabled'])!!}
            @else
                {!!app('form')->select('roles',$roles->lists('role_name','id'),Input::old('roles'),['name'=>'roles[]','multiple'])!!}
            @endif
        </div>
    </div>
    <div class="text-center">
        {!!app('form')->submit('Create User',['class'=>'btn btn-default'])!!}
    </div>
    {!!app('form')->close()!!}
@stop