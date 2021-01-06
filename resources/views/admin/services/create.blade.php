@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <form action="/add-service" method="POST">
        @csrf
        <label for="titre" class="mt-3">Titre : <br><input type="text" name="titre" id="titre"></label><br>
        <label for="texte" class="mt-3">Texte : <br><textarea name="texte" id="texte" cols="30" rows="10"></textarea><br>
            <label for="">Choisissez une icone : <br>
                <select name="icon_id" value="{{old('icon_id')}}"><br>
                    @foreach($icons as $icon)
                    <option value="{{$icon->id}}">{{$icon->lien}}</option>
                    @endforeach
                </select><br></label><br>

            <button type="submit">Add</button>
    </form>
</div>
@stop