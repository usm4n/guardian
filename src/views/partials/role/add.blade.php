@extends('guardian::layout.master')

@section('content')
    <h3 class="heading">Add New Role</h3>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{Session::get('success')}}</p>
        </div>
    @endif
    {{Form::open(['route'=>['role.create'],'class'=>'form form-horizontal','style'=>'margin-top:50px'])}}
    <div class="form-group">
        {{ Form::label('role_name','Role Name:',['class'=>'col-sm-3 control-label']) }}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('role_name')}}</span>
            {{ Form::text('role_name',Input::old('role_name'),['class'=>'form-control','placeholder'=>'only alpha chars allowed...']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('description','Role Description:',['class'=>'col-sm-3 control-label']) }}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('description')}}</span>
            {{ Form::text('description',Input::old('description'),['class'=>'form-control','placeholder'=>'only alpha chars allowed...']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('capabilities','Attach Capabilities:',['class'=>'col-sm-3 control-label']) }}
        <div class="col-sm-8">
            @if($capabilities->isEmpty())
                {{Form::text('fake',null,['class'=>'form-control','placeholder'=>'Create Some Capabilities First!','disabled'])}}
            @else
            {{ Form::select('capabilities',$capabilities->lists('capability','id'),Input::old('capabilities'),['name'=>'capabilities[]','multiple']) }}
            @endif
        </div>
    </div>
    <div class="text-center">
        {{Form::submit('Create Role',['class'=>'btn btn-default'])}}
    </div>
    {{Form::close()}}
@stop