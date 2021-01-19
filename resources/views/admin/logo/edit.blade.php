@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
@can('admin')
<form action="/update-logo/{{$logo->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div>
            <div class="row">
                <div class="col-8"><img src="{{asset('img/'.$logo->image)}}" alt=""><br></div>
                <div class="col-4"><input type="file" name="image"><br>
                <button class="btn btn-primary mt-4 ">Update</button>
                </div>
            </div>


        </div>
        
    </div>
</form>
@endcan
@stop