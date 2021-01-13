@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <form action="/update-article/{{$article->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="col-8"><img height="300px" width="300px" src="{{asset('img/'.$article->image)}}" alt=""><br></div>
            <div class="col-4"><input type="file" name="image"><br>
                <label for="">Titre : <br><textarea name="titre" value="{{$article->titre}}" id="" cols="30" rows="10">{{$article->titre}}</textarea></label><br>
                <label for="">Texte : <br><textarea name="texte" value="{{$article->texte}}" id="" cols="30" rows="10">{{$article->texte}}</textarea></label><br>
                <select multiple="" class="form-control" name="tags[]">
                    @foreach($tags as $item)
                    @if(in_array($item->id, $tableauTags))
                    <option value="{{ $item->id }}" selected="true">{{ $item->name }}</option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                    @endforeach
                </select>
                <select multiple="" class="form-control" name="cats[]">
                    @foreach($categories as $item)
                    @if(in_array($item->id, $tableauCats))
                    <option value="{{ $item->id }}" selected="true">{{ $item->titre }}</option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->titre }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success mt-4">Update</button>
    </form>
</div>
@stop