@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
@can('admin')
@can('webmaster')
<form action="/update-map/{{$map->id}}" method="post">
    @csrf
    <div class="container">
        <div>
            <input type="text" name="localisation" value="{{$map->localisation}}">
        </div>
        <button class="btn btn-success mt-4">Update</button>
    </div>
</form>
@endcan
@endcan
@stop