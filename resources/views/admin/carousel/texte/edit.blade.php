@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
@can('webmaster')
<form action="/update-carouselTxt/{{$text->id}}" method="post">
    <div class="container">
        <div>
        <textarea name="texte" id="" cols="30" value="{{$text->texte}}" rows="10">{{$text->texte}}</textarea>
        </div>
        @csrf
        <button class="btn btn-success mt-4">Update</button>
    </div>
</form>
@endcan
@stop