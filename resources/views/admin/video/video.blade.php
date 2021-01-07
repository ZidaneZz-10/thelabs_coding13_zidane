@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
@foreach($videos as $video)
<div class="intro-video" style="position: relative;">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<img src="{{asset('img/'.$video->image)}}" alt="">
							<a href="{{$video->url}}" class="video-popup" style="position: absolute;width: 60px;height: 60px;left: 50%;top: 50%;margin-left: -30px;margin-top: -30px;color: #6a23b5;background: #2be6ab;border-radius: 50%;text-align: center;padding-top: 20px;padding-left: 5px;">
								<i class="fa fa-play"></i>
							</a>
						</div>
					</div>
				</div>
<a href="/edit-video/{{$video->id}}" class="btn btn-primary mt-4 mr-2">Edit</a>
@endforeach
@stop