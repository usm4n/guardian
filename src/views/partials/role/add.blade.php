@extends('guardian::layout.master')

@section('content')
    <h3 class="heading">Add New Role</h3>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{Session::get('success')}}</p>
        </div>
    @endif
    {!!app('form')->open(['route'=>['role.create'],'class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
    <div class="form-group">
        {!! app('form')->label('role_name','Role Name:',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('role_name')}}</span>
            {!! app('form')->text('role_name',Input::old('role_name'),['class'=>'form-control','placeholder'=>'only alpha chars allowed...']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! app('form')->label('description','Role Description:',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('description')}}</span>
            {!! app('form')->text('description',Input::old('description'),['class'=>'form-control','placeholder'=>'only alpha chars allowed...']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! app('form')->label('capabilities','Attach Capabilities:',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-8">
            @if($capabilities->isEmpty())
                {!!app('form')->text('fake',null,['class'=>'form-control','placeholder'=>'Create Some Capabilities First!','disabled'])!!}
            @else
            {!! app('form')->select('capabilities',$capabilities->lists('capability','id'),Input::old('capabilities'),['name'=>'capabilities[]','multiple']) !!}
            @endif
        </div>
    </div>
    <div class="text-center">
        {!!app('form')->submit('Create Role',['class'=>'btn btn-default'])!!}
    </div>
    {!!app('form')->close()!!}
@stop