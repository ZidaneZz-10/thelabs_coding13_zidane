@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <h2>Create a Categorie : </h2>
    <form action="/add-categorie" method="POST">
        @csrf
        <label for="titre" class="mt-3">Titre : <br><input type="text" name="titre" id="titre"></label><br>
        <button type="submit">Add</button>
    </form>
    <br>
    <hr>
    <h2>Categories : </h2>
    <div class="row">
        @foreach($categories as $categorie)
        <div class="col-3">
            <h4>{{$categorie->titre}}</h4>
            <a href="/edit-categorie/{{$categorie->id}}" class="btn btn-primary mt-4 mr-2">Edit</a>
            <form action="/delete-categorie/{{$categorie->id}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger mt-2">Delete</button><br><br>
            </form>
        </div>
        @endforeach
    </div>
</div>
@stop