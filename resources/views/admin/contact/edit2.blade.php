@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<form action="/update-contactIntro/{{$contactIntro->id}}" method="post">
    @csrf
    <div class="container">
        <label for="">Titre : <br><input type="text" name="titre" value="{{$contactIntro->titre}}"></label><br>
        <label for="">Texte : <br> <textarea name="texte" value="{{$contactIntro->texte}}" cols="30" rows="10">{{$contactIntro->texte}}</textarea></label><br>
    </div>
    <button class="btn btn-success mt-4">Update</button>
</form>
@stop