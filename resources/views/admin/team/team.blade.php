@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <div>
        <div class="row">
            <div class="col-3 text-center pt-5 " style="font-size: 100px;">
                <a href="/create-team"><i class="fas fa-plus"></i></a>
            </div>
            @foreach($teams as $team)
            <div class="col-3 mr-5 pr-5">
                <img height="220px" width="220px" src="{{asset('img/team/'.$team->image)}}" alt="">
                <br>
                <p>Nom : {{$team->nom}}</p>
                <p>Fonction : {{$team->fonction}}</p>
                <button class="btn btn-primary mt-4 mr-2"><a href="/edit-team/{{$team->id}}" class="text-light" >Edit</a></button>
                <form action="/delete-team/{{$team->id}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-2">Delete</button><br><br>
                </form>
            </div>
            @endforeach
        </div>
    </div>

</div>

@stop