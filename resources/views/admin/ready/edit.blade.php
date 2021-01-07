@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<form action="/update-ready/{{$ready->id}}" method="post">
    @csrf
    <div class="container">
        <label for="">Titre : <br><input type="text" name="titre" value="{{$ready->titre}}"></label><br>
        <label for="">Texte : <br><textarea name="texte" id="" value="{{$ready->texte}}" cols="30" rows="10">{{$ready->texte}}</textarea></label><br>
        <input class="text-center" type="text" name="button" value="{{$ready->button}}">
    </div>
    </div>
    <button class="btn btn-success mt-4">Update</button>
    </div>
</form>
@stop