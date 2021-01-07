@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
@foreach($presentations as $presentation)
<a href="/edit-presentation/{{$presentation->id}}" class="btn btn-primary mt-4 mr-2">Edit</a>
<h2 class="text-center">{{$presentation->titre}}</h2>
<div class="Container">
<div class="row">
<div class="col-6 text-left p-4"> <p>{{$presentation->texte1}}</p></div>
<div class="col-6 text-left p-4"> <p>{{$presentation->texte2}}</p></div>
</div>
<div class="text-center">
<a href="#" class="btn btn-success text-center">{{$presentation->button}}</a>
</div>
`</div>
@endforeach
@stop