@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <form action="/update-categorie/{{$article->id}}" method="post">
        @csrf
        <div class="container">
            <label for="">Titre : <br><textarea name="titre" value="{{$article->titre}}" id="" cols="30" rows="10">{{$article->titre}}</textarea></label><br>
            <label for="">Texte : <br><textarea name="texte" value="{{$article->texte}}" id="" cols="30" rows="10">{{$article->texte}}</textarea></label><br>
            
        </div>
        <button class="btn btn-success mt-4">Update</button>
    </form>
</div>
@stop