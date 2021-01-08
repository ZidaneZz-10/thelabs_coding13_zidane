@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<form action="/update-testimonial/{{$testimonial->id}}" method="post">
    @csrf
    <div class="container">
    
        <div class="row">
            <div class="col-3">
                <textarea name="avis" id="" cols="30" value="{{$testimonial->avis}}" rows="10">{{$testimonial->avis}}</textarea>
                <select name="team_id"><br>
                    @foreach($teams as $team)
                    <option value="{{$team->id}}" {{$testimonial->team_id == $team->id  ? 'selected' : ''}}>{{$team->nom}}</option>
                    @endforeach
                </select><br>
                <button class="btn btn-success mt-4">Update</button>

            </div>
        </div>
    </div>
</form>
@stop