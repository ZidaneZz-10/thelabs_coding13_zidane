@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <h2>Create a tag : </h2>
    <form action="/add-tag" method="POST">
        @csrf
        <label for="name" class="mt-3">Titre : <br><input type="text" name="name" id="name"></label><br>
        <button type="submit">Add</button>
    </form>
    <br>
    <hr>
    <h2>Tags : </h2>
    <div class="row">
    @foreach($tags as $tag)
    <div class="col-3">
    <h4>{{$tag->name}}</h4>
    <a href="/edit-tag/{{$tag->id}}" class="btn btn-primary mt-4 mr-2">Edit</a>
    <form action="/delete-tag/{{$tag->id}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger mt-2">Delete</button><br><br>
            </form>
    </div>
    @endforeach
    </div>
</div>
@stop