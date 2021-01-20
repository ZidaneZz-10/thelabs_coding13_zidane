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
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700|Roboto:300,400,700" rel="stylesheet">

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
				<li><a href="/welcome">{{$navbar->elem1}}</a></li>
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
					@foreach($articles as $article)
					<!-- Post item -->
					<div class="post-item">
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
							<p>{{Str::limit($article->texte, 200, '...') }}</p>
							<a href="/blog-post/{{$article->id}}" class="read-more">Read More</a>


						</div>
					</div>
					@endforeach
					<div class="text-center ">{{$articles->fragment('article')->links('vendor.pagination.bootstrap-4') }}
					</div>				</div>
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
							@foreach($categories as $categorie)
							<li><a href="#">{{$categorie->titre}}</a></li>
							@endforeach
						</ul>
					</div>
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Tags</h2>
						<ul class="tag">
							@foreach($tags as $tag)
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
		<h2>{{$footer->texte}} <a href="https://colorlib.com" target="_blank">{{$footer->company}}</a></h2>
	</footer>
	<!-- Footer section end -->




	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/circle-progress.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
</body>

</html>