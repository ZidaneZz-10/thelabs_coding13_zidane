@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<form action="/update-contact/{{$contact->id}}" method="post">
    @csrf
    <div class="container">
        <label for="">Titre : <br><input type="text" name="titre" value="{{$contact->titre}}"></label><br>
        <label for="">Adresse : <br> <input class="text-center" type="text" name="lieu" value="{{$contact->lieu}}">
        </label><br>
        <label for="">Telephone : <br> <input class="text-center" type="text" name="tel" value="{{$contact->tel}}">
        </label><br>
        <label for="">Mail : <br><input class="text-center" type="text" name="mail" value="{{$contact->mail}}">
        </label><br>
    </div>
    <button class="btn btn-success mt-4">Update</button>
</form>
@stop