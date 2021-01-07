@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
@foreach($readys as $ready)
<a href="/edit-ready/{{$ready->id}}" class="btn btn-primary mt-4 mr-2">Edit</a>
<div class="Container">
    <div class="row">
        <div class="col-6 text-center p-4">
            <h2>{{$ready->titre}}</h2>
        </div>
    <div class="col-6 text-center p-4">
        <h5>{{$ready->texte}}</h5>
    </div>
    </div>
</div>
<div class="text-center">
    <a href="#" class="btn btn-success text-center">{{$ready->button}}</a>
</div>
`</div>
@endforeach
@stop