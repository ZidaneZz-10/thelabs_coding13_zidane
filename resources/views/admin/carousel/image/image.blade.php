@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')

<div class="container">
    <div>
        <div class="row">
            <div class="col-1">
               <a href="/create-carouselimg"><i class="fas fa-plus"></i></a> 
            </div>
            @foreach($imgCarousel as $img)
            <div class="col-3 mr-5 pr-5">
                <img height="220px" width="220px" src="{{asset('img/'.$img->image)}}" alt="">
                <br>
                    <form action="/delete-carouselimg/{{$img->id}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger mt-2">Delete</button><br><br>
                    </form>
            </div>
            @endforeach
        </div>
    </div>

</div>

@stop