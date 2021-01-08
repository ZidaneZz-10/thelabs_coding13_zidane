@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <form action="/add-testimonial" method="POST">
        @csrf
        <label for="avis" class="mt-3">Avis : <br><textarea name="avis" id="avis" cols="30" rows="10"></textarea></label><br>
        
            <label for="">Choisissez une personne de la team : <br>
                <select name="team_id">
                    @foreach($teams as $team)
                    <option value="{{$team->id}}">{{$team->nom}}</option>
                    @endforeach
                </select><br></label><br>

            <button type="submit">Add</button>
    </form>
</div>
@stop