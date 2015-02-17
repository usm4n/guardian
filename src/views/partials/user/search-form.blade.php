<h3 class="heading">Search Options</h3>
{!!app('form')->open(['method'=>'GET','route'=>['user.list'],'class'=>'form form-horizontal','style'=>'margin-top:10px;'])!!}
<div class="form-group">
    {!! app('form')->label('role','Select a Role:',['class'=>'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! app('form')->select('role',$roles->lists('role_name','role_name'),Input::get('role')) !!}
    </div>
</div>
<div class="form-group">
    {!! app('form')->label('username','Username:',['class'=>'col-sm-3 control-label']) !!}
    <div class="col-sm-6">
        {!! app('form')->text('username',Input::get('username'),['class'=>'form-control','placeholder'=>'Username Keyword...']) !!}
    </div>
    {!!app('form')->submit('Search',['class'=>'btn btn-default'])!!}
    {!!app('html')->link(URL::route('user.list'), 'Cancel',['class'=>'btn btn-warning'])!!}
</div>
{!!app('form')->close()!!}

