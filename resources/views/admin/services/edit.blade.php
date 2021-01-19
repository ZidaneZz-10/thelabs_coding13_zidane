@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
@can('webmaster')
<form action="/update-service/{{$service->id}}" method="post">
    @csrf
    <div class="container">
    
        <div class="row">
            <div class="col-3">
                <div class="col icon" style="font-size: 100px;">
                    <i class="{{$service->icon->lien}}"></i>
                </div>
                <select name="icon_id"><br>
                    @foreach($icons as $icon)
                    <option value="{{$icon->id}}" {{$service->icon_id == $icon->id  ? 'selected' : ''}}>{{$icon->lien}}</option>
                    @endforeach
                </select><br>
                <button class="btn btn-success mt-4">Update</button>

            </div>
            <div class="col-9">
                <label for="titre">Titre : <br><input type="text" id="titre" name="titre" value="{{$service->titre}}"></label><br>
                <label for="texte">texte : <br><textarea id="texte" name="texte" value="{{$service->texte}}" cols="30" rows="10">{{$service->texte}}</textarea><br>
                </label>
            </div>
        </div>
    </div>
</form>
@endcan
@stop