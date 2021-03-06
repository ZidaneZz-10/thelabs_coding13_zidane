@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
  @can('redacteur')
  <form action="/add-article" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="image" class="mt-3">Inserer une image : <br><input type="file" name="image" value="{{old('image')}}" id="image" class="w-50"></label><br>
    <label for="titre" class="mt-3">Titre : <br><input type="text" name="titre" value="{{old('titre')}}" id="titre"></label><br>
    <label for="texte" class="mt-3">Texte : <br><textarea name="texte" id="texte" cols="30" rows="10">{{old('texte')}}</textarea><br>
      <input type="text" name="statut" value="waiting" style="display: none;">

      <label>Tags</label>
      <select multiple="" class="form-control" name="tags[]">
        @foreach ($tags as $item)
        <option value="{{$item->id}}" {{ in_array($item->id, old('tags') ?: []) ? 'selected' : '' }}>{{$item->name}}</option>
        @endforeach
      </select>

      <label>Categories</label>
      <select multiple="" class="form-control" name="cats[]">
        @foreach ($categories as $item)
        <option value="{{$item->id}}" {{ in_array($item->id, old('cats') ?: []) ? 'selected' : '' }}>{{$item->titre}}</option>
        @endforeach
      </select>

      <button type="submit">Add</button>
  </form>
  @endcan

</div>

@stop