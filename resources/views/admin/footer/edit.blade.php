@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
@can('webmaster')
<form action="/update-footer/{{$footer->id}}" method="post">
    <div class="container">
        <div><label for=""> Texte : <br><textarea name="texte" id="" value="{{$footer->texte}}" cols="30" rows="10">{{$footer->texte}}</textarea><br>
            </label><br>
            <label for="">Company : <br><input type="text" name="company" value="{{$footer->company}}">
            </label>
        </div>
        @csrf
        <button class="btn btn-success mt-4">Update</button>
    </div>
</form>
@endcan
@stop