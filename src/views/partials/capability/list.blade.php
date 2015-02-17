@extends('guardian::layout.master')

@section('content')
    <h3 class="heading">Capability List</h3>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{Session::get('success')}}</p>
        </div>
    @endif
    @if($capabilities->isEmpty())
        <p class="alert alert-warning">No Records Found.</p>
    @else
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Capability Name</th>
            <th>Description</th>
            <th>Attached Roles</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        @foreach($capabilities as $capability)
        <tr>
            <td>{{$capability->id}}</td>
            <td>{{$capability->capability}}</td>
            <td>{{$capability->description}}</td>
            <td>{{$capability->roles->implode('role_name',', ') ? : 'N/A'}}</td>
            <td class="text-center">
                <div class="btn-group text-left">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>{!!app('html')->linkRoute('capability.edit','Edit Capability',['id'=>$capability->id,'ref'=>http_build_query(Request::query()) ? : 'page=1'])!!}</li>
                        <li>{!!app('html')->linkRoute('capability.delete','Delete Capability',$capability->id)!!}</li>
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{$capabilities->render()}}
    </div>
    @endif
@stop