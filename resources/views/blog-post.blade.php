<!DOCTYPE html>
<html lang="en">

<head>
	<title>Labs - Design Studio</title>
	<meta charset="UTF-8">
	<meta name="description" content="Labs - Design Studio">
	<meta name="keywords" content="lab, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,600" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
	<link rel="stylesheet" href="{{asset('css/flaticon.css')}}" />
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" />
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" />
	<link rel="stylesheet" href="{{asset('css/style.css')}}" />


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader">
			<img src="img/logo.png" alt="">
			<h2>Loading.....</h2>
		</div>
	</div>


	<!-- Header section -->
	<header class="header-section">
		<div class="logo">
			<img src="{{asset('img/imgPetit.png')}}" alt=""><!-- Logo -->
		</div>
		<!-- Navigation -->
		<div class="responsive"><i class="fa fa-bars"></i></div>
		<nav>
			<ul class="menu-list">
				<li><a href="/">{{$navbar->elem1}}</a></li>
				<li><a href="/services">{{$navbar->elem2}}</a></li>
				<li class="active"><a href="/blog">{{$navbar->elem3}}</a></li>
				<li><a href="/contactMap">{{$navbar->elem4}}</a></li>
				@auth
				@if(Auth::user()->roles->role!="membre")
				<li><a href="/home">Admin</a></li>
				@endif
				@endauth
				@if (Route::has('login'))
				@auth
				@else
				<li><a href="{{ route('login') }}">Login</a></li>
				@if (Route::has('register'))
				<li><a href="{{ route('register') }}">Register</a></li>
				@endif
				@endauth
				@endif
				@auth
				<li style="list-style: none; margin:25px;margin-left:10px">
					<form id="logout-form" action="{{route('logout') }}" method="POST" class="d-none">
						@csrf
						<button class="btn btn-danger p-5" type="submit">Deconnexion</button>
					</form>
				</li>
				@endauth
			</ul>
		</nav>
	</header>
	<!-- Header section end -->


	<!-- Page header -->
	<div class="page-top-section">
		<div class="overlay"></div>
		<div class="container text-right">
			<div class="page-info">
				<h2>Blog</h2>
				<div class="page-links">
					<a href="#">Home</a>
					<span>Blog</span>
				</div>
			</div>
		</div>
	</div>
	<!-- Page header end-->


	<!-- page section -->
	<div class="page-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-7 blog-posts">
					<!-- Single Post -->
					<div class="single-post">
						<div class="post-thumbnail">
							<img src="{{asset('img/'.$article->image)}}" alt="">
							<div class="post-date">
								<h2>{{$article->created_at->format('d')}}</h2>
								<h3>{{$article->created_at->format('M')}} {{$article->created_at->format('Y')}}</h3>
							</div>
						</div>
						<div class="post-content">
							<h2 class="post-title">{{$article->titre}}</h2>
							<div class="post-meta">
								<a href="">{{$article->user->name}}</a>
								<a href="">
									@foreach($article->tags as $item)
									{{$item->name}},
									@endforeach</a>
								<div style="display: none;">{{$a=0}}</div>

								@foreach ($commentaires as $elem)
								@if ($elem->article_id == $article->id)
								<div style="display: none;">{{$a++}}</div>
								@else
								@endif

								@endforeach

								<a href="">Comment ({{$a}})</a>
							</div>
							<p>{{$article->texte}}</p>
						</div>
						<!-- Post Author -->
						<div class="author">
							<div class="avatar">
								<img src="{{asset('img/team/'.$article->user->image)}}" alt="">
							</div>
							<div class="author-info">
								<h2>{{$article->user->name}}, <span>Author</span></h2>
								<p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. </p>
							</div>
						</div>
						<!-- Post Comments -->
						<div class="comments">
							<div style="display: none;">{{$a=0}}</div>

							@foreach ($commentaires as $elem)
							@if ($elem->article_id == $article->id)
							<div style="display: none;">{{$a++}}</div>
							@else
							@endif

							@endforeach

							<a href="">Comment ({{$a}})</a>
							<ul class="comment-list">
							@foreach($commentaires as $comment)
								@if($comment->article_id==$article->id)
								<li>
									<div class="avatar">
										<img src="{{asset('img/team/'.$comment->user->image)}}" alt="">
									</div>
									<div class="commetn-text">
										<h3>{{$comment->user->name}} | {{$comment->created_at->format('d')}} {{$comment->created_at->format('M')}}, {{$comment->created_at->format('Y')}} </h3>
										<p>{{$comment->texte}}</p>
									</div>
								</li>
								@endif
								@endforeach
							</ul>
						</div>
						<!-- Commert Form -->
						@if (Auth::check())
						<div class="row">
							<div class="col-md-9 comment-from">
								<h2>Leave a comment</h2>
								<form class="form-class" method="POST" action="/add-comment">
									@csrf
									<div class="row">
										<div class="col-sm-6">
											<input type="text" name="user_id" disabled value="{{Auth::user()->name}}" placeholder="Your name">
										</div>
										<div class="col-sm-6" style="display: none;">
											<input type="text" name="article_id"  value="{{$article->id}}" placeholder="Your name">
										</div>
										<div class="col-sm-6">
											<input type="text" value="{{Auth::user()->email}}" disabled placeholder="Your email">
										</div>
										<div class="col-sm-12">

											<textarea name="texte" placeholder="Message"></textarea>

											<button class="site-btn" type="submit">Send</button>
										</div>
									</div>
								</form>
							</div>
						</div>

						@else

						<div class="row">
							<button style="font-size: 30px" class="mr-5 btn btn-primary">
								<a class="px-3 text-white " href="{{ route('login') }}">Login</a>
							</button>
							@if (Route::has('register'))
							<button style="font-size: 30px" class="btn btn-danger">
								<a class="px-3 text-white " href="{{ route('register') }}">Register</a>
							</button>
							@endif
						</div>

						@endif
					</div>
				</div>
				<!-- Sidebar area -->
				<div class="col-md-4 col-sm-5 sidebar">
                        <!-- Single widget -->
                        <div class="widget-item">
                        <form action="/search" method="get" class="search-form">

                            <input type="text" name="query" placeholder="Search">
                            <button type="submit" class="search-btn"><i class="flaticon-026-search"></i></button>
                        </form>
                    </div>
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Categories</h2>
						<ul>
						@foreach($article->categories as $cat)
							<li><a href="#">{{$cat->titre}}</a></li>
						@endforeach
							
						</ul>
					</div>

					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Tags</h2>
						<ul class="tag">
						@foreach($article->tags as $tag)
							<li><a href="#">{{$tag->name}}</a></li>
						@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- page section end-->


	<!-- newsletter section -->
	<div class="newsletter-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h2>Newsletter</h2>
				</div>
				<div class="col-md-9">
					<!-- newsletter form -->
					<form class="nl-form" action="/add-email" method="POST">
						@csrf
						<input type="text" name="email" placeholder="Your e-mail here">
						<button type="submit" class="site-btn btn-2">Newsletter</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- newsletter section end-->


	<!-- Footer section -->
	<footer class="footer-section">
		<h2>2017 All rights reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></h2>
	</footer>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
</body>

</html>