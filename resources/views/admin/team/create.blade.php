@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    @can('webmaster')
    <form action="/add-team" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="inputCity">User :</label>
        <select class="form-control" name="user_id">
            @foreach ($users as $user)
            <div class="d-none">{{$sors=0}}</div>
            @foreach ($teams as $team)
            @if ($team->user_id != $user->id && $sors==0)
            <option value="{{$user->id}}">{{$user->name}}</option>
            <div class="d-none">{{$sors++}}</div>
            @endif
            @endforeach
            @endforeach
        </select>
        <div class="form-row">
            <label for="">Fonction : <br><input type="text" name="fonction" id=""></label><br>
        </div>
        <button type="submit">Add</button>
    </form>
    @endcan
</div>
@stop