<h3 class="heading">Add New User</h3>
@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{Session::get('success')}}</p>
    </div>
@endif
{{Form::open(['route'=>['user.create'],'class'=>'form form-horizontal','style'=>'margin-top:50px'])}}
<div class="form-group">
    {{ Form::label('username','User Name:',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-8">
        <span class="label label-danger">{{$errors->first('username')}}</span>
        {{ Form::text('username',Input::old('username'),['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('email','User Email:',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-8">
        <span class="label label-danger">{{$errors->first('email')}}</span>
        {{ Form::text('email',Input::old('email'),['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('password','User Password:',['class'=>'col-sm-3 control-label']) }}
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
    {{ Form::label('active','Set as active:',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-3">
        {{ Form::select('active',['No','Yes'],Input::old('active',0),['class'=>'form-control'])}}
    </div>
</div>
<div class="form-group">
    {{Form::label('roles','Attach Roles:',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-8">
        @if($roles->isEmpty())
            {{Form::text('fake',null,['class'=>'form-control','placeholder'=>'Create Some Roles First!','disabled'])}}
        @else
            {{Form::select('roles',$roles->lists('role_name','id'),Input::old('roles'),['name'=>'roles[]','multiple'])}}
        @endif
    </div>
</div>
<div class="text-center">
    {{Form::submit('Create User',['class'=>'btn btn-default'])}}
</div>
{{Form::close()}}
