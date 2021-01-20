@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
@foreach($footers as $footer)
<div class="Container">
    <div class="row">
        <div class="col-6 text-center p-4">
            <h2>{{$footer->texte}} {{$footer->company}}</h2>
<a href="/edit-footer/{{$footer->id}}" class="btn btn-primary mt-4 mr-2">Edit</a>
        </div>
</div>
@endforeach
@stop