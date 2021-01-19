@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container border border-dark p-3" style="width: 800Px;">
    <a href="/articles" class="btn btn-primary mt-4 mr-2 mb-5">Return</a>

    <div style="position: relative;">
        <img height="320px" width="520px" src="{{asset('img/'.$article->image)}}" alt="">
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
    <div style="display: none;">{{$a=0}}</div>
    @foreach ($commentaires as $elem)
    @if ($elem->article_id == $article->id)
    <div style="display: none;">{{$a++}}</div>
    @else
    @endif

    @endforeach
    Comment ({{$a}})
    @foreach($commentaires as $comment)
    @if($comment->article_id==$article->id)
    <li>
        <div class="avatar">
            <img src="img/avatar/01.jpg" alt="">
        </div>
        <div class="commetn-text">
            <h3>{{$comment->user->name}} | {{$comment->created_at->format('d')}} {{$comment->created_at->format('M')}}, {{$comment->created_at->format('Y')}} </h3>
            <p>{{$comment->texte}}</p>
            @can('webmaster')
            <form action="/delete-comment/{{$comment->id}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger mt-2">Delete</button><br><br>
            </form>
            @endcan
        </div>
    </li>
    @endif
    @endforeach


</div>
@stop