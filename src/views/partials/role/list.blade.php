@extends('guardian::layout.master')

@section('content')
    <h3 class="heading">Role List</h3>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{Session::get('success')}}</p>
        </div>
    @endif
    @if($roles->isEmpty())
        <p class="alert alert-warning">No Records Found.</p>    
    @else
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Role Name</th>
            <th>Description</th>
            <th>Capabilities</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->role_name}}</td>
            <td>{{$role->description}}</td>
            <td>{{$role->capabilities->implode('capability',', ') ? : 'N/A'}}</td>
            <td class="text-center">
                <div class="btn-group text-left">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>{!!app('html')->linkRoute('role.edit','Edit Role',['id'=>$role->id,'ref'=>http_build_query(Request::query()) ? : 'page=1'])!!}</li>
                        <li>{!!app('html')->linkRoute('role.delete','Delete Role',$role->id)!!}</li>
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {!!$roles->render()!!}
    </div>
    @endif
@stop