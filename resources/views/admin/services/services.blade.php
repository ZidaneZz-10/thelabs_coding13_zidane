@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 text-center pt-5" style="font-size: 100px;">
            <a href="/create-service"><i class="fas fa-plus"></i></a>
        </div>
        @foreach($services as $service)
        <div class="col-3 border border-dark">
            <div class="row">
                <div class="col icon" style="font-size: 100px;">
                    <i class="{{$service->icon->lien}}"></i>
                </div>
                <div class="col">
                    <p>{{$service->titre}}</p>
                    <p>{{$service->texte}}</p>
                </div>
            </div>
            <a href="/edit-service/{{$service->id}}" class="btn btn-primary mt-4 mr-2">Edit</a>
            <form action="/delete-service/{{$service->id}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger mt-2">Delete</button><br><br>
            </form>
        </div>
        @endforeach
    </div>
</div>
@stop