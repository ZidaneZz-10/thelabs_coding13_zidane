@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<form action="/update-presentation/{{$presentation->id}}" method="post">
    <div class="container">
        <div>
        <div class="text-center">
            <input type="text" name="titre" value="{{$presentation->titre}}">
        </div>
            <div class="row">
                <div class="col-6 text-center"><textarea name="texte1" id="" value="{{$presentation->texte1}}" cols="30" rows="10">{{$presentation->texte1}}</textarea></div>
                <div class="col-6 text-center"><textarea name="texte2" id="" value="{{$presentation->texte2}}" cols="30" rows="10">{{$presentation->texte2}}</textarea></div>
            </div>
            <div class="text-center">
            <input class="text-center" type="text" name="button" value="{{$presentation->button}}">
            </div>
        </div>
        @csrf
        <button class="btn btn-success mt-4">Update</button>
    </div>
</form>
@stop

