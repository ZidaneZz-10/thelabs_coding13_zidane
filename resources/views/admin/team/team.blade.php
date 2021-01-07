@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    @foreach($titles as $title)
    <h1>{{$title->titre}}</h1>
    <form action="/update-title/{{$title->id}}" method="post">
        @csrf
        <textarea name="titre" value="{{$title->titre}}" id="" cols="30" rows="10">{{$title->titre}}</textarea><br>
        <button class="btn btn-primary mt-4 ">Update</button>
    </form>

    <hr>
    @endforeach
    <div class="row">
        <div class="col-3 text-center" style="font-size: 100px;">
            <a href="/create-team"><i class="fas fa-plus"></i></a>
        </div>
        @foreach($teams as $team)
        <div class="col-3">
            <img height="220px" width="220px" src="{{asset('img/team/'.$team->image)}}" alt="">
            <br>
            <p>Nom : {{$team->nom}}</p>
            <p>Fonction : {{$team->fonction}}</p>
            <button class="btn btn-primary mt-4 mr-2"><a href="/edit-team/{{$team->id}}" class="text-light">Edit</a></button>
            <form action="/delete-team/{{$team->id}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger mt-2">Delete</button><br><br>
            </form>
        </div>
        @endforeach
    </div>
</div>

@stop