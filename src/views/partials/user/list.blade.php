@extends('guardian::layout.master')

@section('content')
    @include('guardian::partials.user.search-form')
    <h3 class="heading">User List</h3>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{Session::get('success')}}</p>
        </div>
    @endif
    @if($users->isEmpty())
        <p class="alert alert-warning">No Records Found.</p>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Active</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->roles->implode('role_name',', ') ? : 'N/A'}}</td>
                    <td>{{$user->active ? 'Yes' : 'No' }}</td>
                    <td class="text-center">
                        <div class="btn-group text-left">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!!app('html')->linkRoute('user.edit','Edit User',['id'=>$user->id,'ref'=>http_build_query(Request::query()) ? : 'page=1'])!!}</li>
                                <li>{!!app('html')->linkRoute('user.delete','Delete User',$user->id)!!}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {!!$users->render()!!}
    </div>
    @endif
@stop