@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <div class="row">
        @foreach($titles as $title)
        <div class="col-6">
            <h2>Titre : </h2>
            <h3>{{$title->titre}}</h3>
        </div>
        <div class="col-6">
            <h2>Modifie ici : </h2>
            @can('webmaster')
            <form action="/update-titleService/{{$title->id}}" method="post">
                @csrf
                <textarea name="titre" value="{{$title->titre}}" id="" cols="30" rows="10">{{$title->titre}}</textarea><br>
                <button class="btn btn-primary mt-4 ">Update</button>
            </form>
            @endcan
        </div>
        @endforeach

    </div>
    <hr>
    <div class="row">
        <div class="col-3 text-center pt-5" style="font-size: 100px;">
            <a href="/create-service"><i class="fas fa-plus"></i></a>
        </div>
        @foreach($services as $service)
        <div class="col-3 border border-dark">
            <div class="row">
                <div class="col icon" style="font-size: 100px;">
                    <i class="{{$service->icon->lien}}"></i>
                </div>
                <div class="col">
                    <p>{{$service->titre}}</p>
                    <p>{{$service->texte}}</p>
                </div>
            </div>
            <a href="/edit-service/{{$service->id}}" class="btn btn-primary mt-4 mr-2">Edit</a>
            @can('webmaster')
            <form action="/delete-service/{{$service->id}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger mt-2">Delete</button><br><br>
            </form>
            @endcan
        </div>
        @endforeach
    </div>
</div>
@stop