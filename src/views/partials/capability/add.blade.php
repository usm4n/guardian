@extends('guardian::layout.master')

@section('content')
    <h3 class="heading">Add New Capability</h3>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{Session::get('success')}}</p>
        </div>
    @endif
    {!!app('form')->open(['route'=>['capability.create'],'class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
    <div class="form-group">
        {!! app('form')->label('capability','Capability Name:',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('capability')}}</span>
            {!! app('form')->text('capability',Input::old('capability'),['class'=>'form-control','placeholder'=>'format: resource_action|manage_resource etc']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! app('form')->label('description','Description:',['class'=>'col-sm-3 control-label']) !!}
        <div class="col-sm-8">
            <span class="label label-danger">{{$errors->first('description')}}</span>
            {!! app('form')->text('description',Input::old('description'),['class'=>'form-control','placeholder'=>'only alpha chars allowed...']) !!}
        </div>
    </div>
    <div class="form-group">
        {!!app('form')->label('roles','Attach to Roles:',['class'=>'col-sm-3 control-label'])!!}
        <div class="col-sm-8">
            @if($roles->isEmpty())
                {!!app('form')->text('fake',null,['class'=>'form-control','placeholder'=>'Create Some Roles First!','disabled'])!!}
            @else
                {!!app('form')->select('roles',$roles->lists('role_name','id'),Input::old('roles'),['name'=>'roles[]','multiple'])!!}
            @endif
        </div>
    </div>
    <div class="text-center">
        {!!app('form')->submit('Create Capability',['class'=>'btn btn-default'])!!}
    </div>
    {!!app('form')->close()!!}
@stop