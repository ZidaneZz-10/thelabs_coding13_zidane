@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
<form action="/update-categorie/{{$categorie->id}}" method="post">
    @csrf
    <div class="container">
        <label for="">Titre : <br><input type="text" name="titre" value="{{$categorie->titre}}"></label><br>
    </div>
<button class="btn btn-success mt-4">Update</button>
</form>
</div>
@stop