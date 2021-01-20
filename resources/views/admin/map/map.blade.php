@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
        @foreach($maps as $map)
        <h4>Localisation : {{$map->localisation}}</h4>
        <iframe width="100%" height="600vh" src="https://maps.google.com/maps?q={{$map->localisation}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"></iframe>

        @endforeach
    <a href="/edit-map/{{$map->id}}" class="btn btn-primary mt-4 mr-2">Edit location</a>
</div>
@stop