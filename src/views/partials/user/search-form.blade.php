<h3 class="heading">Search Options</h3>
{{Form::open(['method'=>'GET','route'=>['user.list'],'class'=>'form form-horizontal','style'=>'margin-top:10px;'])}}
<div class="form-group">
    {{ Form::label('role','Select a Role:',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::select('role',$roles->lists('role_name','role_name'),Input::get('role')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('username','Username:',['class'=>'col-sm-3 control-label']) }}
    <div class="col-sm-6">
        {{ Form::text('username',Input::get('username'),['class'=>'form-control','placeholder'=>'Username Keyword...']) }}
    </div>
    {{Form::submit('Search',['class'=>'btn btn-default'])}}
    {{HTML::link(URL::route('user.list'), 'Cancel',['class'=>'btn btn-warning'])}}
</div>


