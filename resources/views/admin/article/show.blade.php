@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container p-3">
    <a href="/articles" class="btn btn-primary mt-4 mr-2 mb-5">Return</a>

    <div style="position: relative;">
        <img height="320px" width="520px" src="{{asset('images/'.$article->image)}}" alt="">
        <div class="p-1" style="position: absolute; bottom:0;height:80px;width:120px">
            <h3 class="text-light text-center" style="background-color:#CC99FF;"><span class="text-center">{{$article->created_at->format('d')}}</span> <br><span style="color: #CCFF33;">{{$article->created_at->format('M')}} {{$article->created_at->format('Y')}}</span></h3>
        </div>
    </div>
    <h1>{{$article->titre}}</h1>
    <ul class="d-flex" style="justify-content: space-between;font-size:small;">
        <li>{{$article->user->name}}</li>
        <li>
            @foreach($article->tags as $item)
            {{$item->name}},
            @endforeach
        </li>
        <li>
            @foreach($article->categories as $item)
            {{$item->titre}},
            @endforeach
        </li>
    </ul>
    <div style="height: 100px;width: 600px;">
        <p> {{$article->texte}}</p>
    </div>
    <h3 class="text-success">Comments({{$article->commentaires->count()}})</h3>
        @foreach($article->commentaires as $comment)
    <div class="container border border-dark mb-3">
        <h4>{{$comment->users->name}}</h4>
        <p>{{$comment->texte}}</p>
        <form action="/delete-comment/{{$comment->id}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger mt-2">Delete</button><br><br>
        </form>
    </div>
    @endforeach


</div>
@stop