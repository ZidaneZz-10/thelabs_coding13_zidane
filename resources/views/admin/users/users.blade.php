@extends('adminlte::page')

@section('user', 'AdminLTE')

@section('content')
<div class="container">
<div class="row">
    @foreach($users as $user)
    <div class="col-3 border border-dark">
        <h3>{{$user->name}}</h3><br>
        @can('admin')
        <form action="/update-user/{{$user->id}}" method="post">
            @csrf
            <select name="role_id"><br>
                @foreach($roles as $role)
                <option value="{{$role->id}}" {{$user->role_id == $role->id  ? 'selected' : ''}}>{{$role->role}}</option>
                @endforeach
            </select><br>
            <button class="btn btn-primary mt-4 ">Update</button>
        </form>
        <br>
        @endcan
    </div>
    @endforeach
</div>


</div>
@stop