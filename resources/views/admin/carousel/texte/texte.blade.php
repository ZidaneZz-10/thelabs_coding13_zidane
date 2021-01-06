@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
        @foreach($texts as $text)
        <p style="font-size: 50px;">{{$text->texte}}</p>
        @endforeach
    <a href="/edit-carouselTxt/{{$text->id}}" class="btn btn-primary mt-4 mr-2">Edit Text</a>
</div>
@stop