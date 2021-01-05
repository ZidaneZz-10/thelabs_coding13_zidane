@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <div class="bg-dark">
        @foreach($navbars as $navbar)
        <ul style="list-style-type: none;justify-content:end;" class="d-flex justify-content-around">
        <li>{{$navbar->elem1}}</li>
        <li>{{$navbar->elem2}}</li>
        <li>{{$navbar->elem3}}</li>
        <li>{{$navbar->elem4}}</li>
        </ul>
        @endforeach
    </div>
    <a href="/edit-navbar/{{$navbar->id}}" class="btn btn-primary mt-4 mr-2">Edit Navbar</a>
</div>
@stop