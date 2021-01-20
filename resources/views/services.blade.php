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
				<li><a href="/">{{$navbar->elem1}}</a></li>
				<li class="active"><a href="/services">{{$navbar->elem2}}</a></li>
				<li><a href="/blog">{{$navbar->elem3}}</a></li>
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
				<h2>Services</h2>
				<div class="page-links">
					<a href="#">Home</a>
					<span>Services</span>
				</div>
			</div>
		</div>
	</div>
	<!-- Page header end-->


	<!-- services section -->
	<div class="services-section spad">
		<div class="container">
			<div class="section-title dark">
				<h2>{!! $str3 !!}</h2>
			</div>
			<div class="row">
				@foreach($services as $service)
				<!-- single service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="{{$service->icon->lien}}"></i>
						</div>
						<div class="service-text">
							<h2>{{$service->titre}}</h2>
							<p>{{$service->texte}}</p>
						</div>
					</div>
				</div>
				@endforeach

			</div>
			<div class="text-center">
				<a href="#serviceP" class="site-btn">Browse</a>
			</div>
		</div>
	</div>
	<!-- services section end -->


	<!-- features section -->
	<div class="team-section spad">
		<div class="overlay"></div>
		<div class="container">
			<div class="section-title">
				<h2>Get in <span>the Lab</span> and discover the world</h2>
			</div>
					<!-- features section -->
			<div class="row" id="serviceP">
				<!-- feature item -->
				<div class="col-md-4 col-sm-4 features">
					@foreach ($servicePrime->take(3) as $item)
						
							<div class="icon-box light left">
								<div class="service-text">
									<h2>{{$item->titre}}</h2>
									<p>{{$item->texte}}</p>
								</div>
								<div class="icon">
									<i class="{{$item->icon->lien}}"></i>
								</div>
							</div>
						<div style="display: none;">
							{{$limite=$item->id}}
						</div>
						
					@endforeach
					

				</div>
				<!-- Devices -->
				<div class="col-md-4 col-sm-4 devices">
					<div class="texte-center">
						<img src="img/device.png" alt="">
					</div>
				</div>
				<!-- feature item -->
				<div class="col-md-4 col-sm-4 features">
					@foreach ($servicePrime->take(6) as $item)
						
						@if ($item->id < $limite )
							<div class="icon-box light left">
								<div class="service-text">
									<h2>{{$item->titre}}</h2>
									<p>{{$item->texte}}</p>
								</div>
								<div class="icon">
									<i class="{{$item->icon->lien}}"></i>
								</div>
							</div>
						
							
						
						@endif
					@endforeach
				</div>
			</div>
			<div class="text-center mt100">
				<a href="#" class="site-btn">Browse</a>
			</div>
		</div>
	</div>
	<!-- features section end-->



	<!-- services card section-->
	<div class="services-card-section spad" >
		<div class="container">
			<div class="row">
			@foreach($articles as $article)
				<!-- Single Card -->
				<div class="col-md-4 col-sm-6">
					<div class="sv-card">
						<div class="card-img">
							<img src="{{asset('img/'.$article->image)}}" alt="">
						</div>
						<div class="card-text">
							<h2>{{$article->titre}}</h2>
							<p>{{$article->texte}}</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- services card section end-->


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


	<!-- Contact section -->
	<div class="contact-section spad fix">
		<div class="container">
			<div class="row">
				<!-- contact info -->
				<div class="col-md-5 col-md-offset-1 contact-info col-push">
				<div class="section-title left">
						<h2>{{$contactIntro->titre}}</h2>
					</div>
					<p>{{$contactIntro->texte}}</p>
					<h3 class="mt60">{{$contact->titre}}</h3>
					<p class="con-item">{{$contact->lieu}}</p>
					<p class="con-item">{{$contact->tel}}</p>
					<p class="con-item">{{$contact->mail}}</p>
				</div>
				<!-- contact form -->
				<div class="col-md-6 col-pull">
				<form class="form-class" action="forms/contact.php" method="post" id="con_form">
						@csrf
						<div class="row">
							<div class="col-sm-6">
								<input type="text" name="name" placeholder="Your name">
							</div>
							<div class="col-sm-6">
								<input type="text" name="email" placeholder="Your email">
							</div>
							<div class="col-sm-12">
								<input type="text" name="subject" placeholder="Subject">
								<textarea name="message" placeholder="Message"></textarea>
								<button class="site-btn" type="submit">send</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact section end-->


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