@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
@foreach($ContactIntros as $ContactIntro)
        <h2>{{$ContactIntro->titre}}</h2>
        <p>{{$ContactIntro->texte}}</p>
        @endforeach
    <a href="/edit-contactIntro/{{$ContactIntro->id}}" class="btn btn-primary mt-4 mr-2">Edit</a><br><hr>
        @foreach($contacts as $contact)
        <h2>{{$contact->titre}}</h2>
        <p>{{$contact->lieu}}</p>
        <p>{{$contact->tel}}</p>
        <p>{{$contact->mail}}</p>
        @endforeach
    <a href="/edit-contact/{{$contact->id}}" class="btn btn-primary mt-4 mr-2">Edit</a>
</div>
@stop