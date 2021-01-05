@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<form action="/update-navbar/{{$navbar->id}}" method="post">
    <div class="container">
        <div>
            <input type="text" name="elem1" value="{{$navbar->elem1}}">
            <input type="text" name="elem2" value="{{$navbar->elem2}}">
            <input type="text" name="elem3" value="{{$navbar->elem3}}">
            <input type="text" name="elem4" value="{{$navbar->elem4}}">
        </div>
        @csrf
        <button class="btn btn-success mt-4">Update</button>
    </div>
</form>
@stop