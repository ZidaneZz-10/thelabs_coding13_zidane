@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<h1 class="text-center">Articles</h1>
@foreach($articles as $article)
@if($article->statut=='authorized')
<div class="container border border-dark p-3" style="width: 800Px;">
  <div style="position: relative;">
    <img height="320px" width="600px" src="{{asset('img/'.$article->image)}}" alt="">
    <div class="p-1" style="position: absolute; bottom:0;height:80px;width:120px">
      <h3 class="text-light text-center" style="background-color:#CC99FF;"><span class="text-center">{{$article->created_at->format('d')}}</span> <br><span style="color: #CCFF33;">{{$article->created_at->format('M')}} {{$article->created_at->format('Y')}}</span></h3>
    </div>
  </div>
  <h1>{{$article->titre}}</h1>
  <ul class="d-flex" style="justify-content: space-between;font-size:small;">
    <li>{{$article->user->name}}</li>
    <li class="ml-3">
      @foreach($article->tags as $item)
      {{$item->name}},
      @endforeach
    </li>
    <li class="ml-3">
      @foreach($article->categories as $item)
      {{$item->titre}},
      @endforeach
    </li>
    <li class="ml-3">
      <div style="display: none;">{{$a=0}}</div>
      @foreach ($commentaires as $elem)
      @if ($elem->article_id == $article->id)
      <div style="display: none;">{{$a++}}</div>
      @else
      @endif

      @endforeach
      Comment ({{$a}})
    </li>
  </ul>
  <div style="height: 100px;width: 600px;">
    <p> {{Str::limit($article->texte, 200, '...') }}</p>
    @can('redacteur')
    <a href="/article/{{$article->id}}" class="text-success">Read More</a>
    @endcan
  </div>
  @can('articleGate',$article)
  <a href="/edit-article/{{$article->id}}" class="btn btn-primary mt-4 mr-2">Edit</a>
  @endcan
  @can('articleGate',$article)
  <form action="/delete-article/{{$article->id}}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger mt-2">Delete</button><br><br>
  </form>
  @endcan
</div>
<hr>
@endif

@endforeach
@stop