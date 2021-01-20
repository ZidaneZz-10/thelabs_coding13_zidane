@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
@can('webmaster')
<form action="/update-team/{{$team->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div>
            <div class="row">
                <div class="col-4">
                <h3>{{$team->user->name}}</h3>
                <label for=""><input type="text" name="fonction" value="{{$team->fonction}}" id=""></label>
                    <br>
                    <button class="btn btn-primary mt-4 ">Update</button>
                </div>
            </div>


        </div>

    </div>
</form>
@endcan
@stop