@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<form action="/update-video/{{$video->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <label for="">Changez la miniature de la video : <br><input type="file" name="image" id=""></label><br>
        <label for="">Changez le lien : <br><textarea name="url" value="{{$video->url}}" id="" cols="30" rows="10">{{$video->url}}</textarea></label><br>
        <button class="btn btn-success mt-4">Update</button>

    </div>
</form>
@stop