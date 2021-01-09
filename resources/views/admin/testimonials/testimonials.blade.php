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
            <form action="/update-titleAvis/{{$title->id}}" method="post">
                @csrf
                <textarea name="titre" value="{{$title->titre}}" id="" cols="30" rows="10">{{$title->titre}}</textarea><br>
                <button class="btn btn-primary mt-4 ">Update</button>
            </form>
        </div>
        @endforeach

    </div>
    <hr>
    <div class="row">
        <div class="col-3 text-center" style="font-size: 100px;">
            <a href="/create-testimonial"><i class="fas fa-plus"></i></a>
        </div>
        @foreach($testimonials as $testimonial) 
        <div class="col-3">
        <p>{{$testimonial->avis}}</p>
            <img height="220px" width="220px" src="{{asset('img/team/'.$testimonial->team->image)}}" alt="">
            <br>
            <p>Nom : {{$testimonial->team->nom}}</p>
            <p>Fonction : {{$testimonial->team->fonction}}</p>
            <button class="btn btn-primary mt-4 mr-2"><a href="/edit-testimonial/{{$testimonial->id}}" class="text-light">Edit</a></button>
            <form action="/delete-testimonial/{{$testimonial->id}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger mt-2">Delete</button><br><br>
            </form>
        </div>
        @endforeach
    </div>
</div>
@stop