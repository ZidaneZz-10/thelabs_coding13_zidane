@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
@can('webmaster')
    <form action="/add-team" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image" class="mt-3">Inserer une image : <br><input type="file" name="image" id="image" class="w-50"></label><br>
        <label for="nom" class="mt-3">Nom/Prenom : <br><input type="text" name="nom" id="nom" class="w-50"></label><br>
        <label for="fonction" class="mt-3">fonction : <br><input type="text" name="fonction" id="fonction" class="w-50"></label><br>
        <button type="submit">Add</button>
    </form>
    @endcan
</div>
@stop