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
				<li class="active"><a href="/">{{$navbar->elem1}}</a></li>
				<li><a href="/services">{{$navbar->elem2}}</a></li>
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


	<!-- Intro Section -->
	<div class="hero-section">
		<div class="hero-content">
			<div class="hero-center">
				<img src="{{asset('img/imgGrand.png')}}" alt="">
				@foreach($textCarousel as $text)
				<p>{{$text->texte}}</p>
				@endforeach
			</div>
		</div>
		<!-- slider -->
		<div id="hero-slider" class="owl-carousel">
			@foreach($carouselImg as $img)
			<div class="item  hero-item" data-bg="img/{{$img->image}}"></div>
			@endforeach
		</div>
	</div>
	<!-- Intro Section -->


	<!-- About section -->
	<div class="about-section">
		<div class="overlay"></div>
		<!-- card section -->
		<div class="card-section">
			<div class="container">
				<div class="row">
					@foreach($serviceCards as $service)
					<!-- single card -->
					<div class="col-md-4 col-sm-6">
						<div class="lab-card">
							<div class="icon">
								<i class="{{$service->icon->lien}}"></i>
							</div>
							<h2>{{$service->titre}}</h2>
							<p>{{$service->texte}}</p>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
		<!-- card section end-->


		<!-- About contant -->
		<div class="about-contant">
			<div class="container">
				<div class="section-title">
					<h2>{!! $str2 !!}</h2>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p>{{$presentation->texte1}}</p>
					</div>
					<div class="col-md-6">
						<p>{{$presentation->texte2}}</p>
					</div>
				</div>
				<div class="text-center mt60">
					<a href="#formContact" class="site-btn">{{$presentation->button}}</a>
				</div>
				<!-- popup video -->
				<div class="intro-video">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<img src="{{asset('img/'.$video->image)}}" alt="">
							<a href="{{$video->url}}" class="video-popup">
								<i class="fa fa-play"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About section end -->


	<!-- Testimonial section -->
	<div class="testimonial-section pb100">
		<div class="test-overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-4">
					<div class="section-title left">
						<h2>{{$testimonialTitle->titre}}</h2>
					</div>
					<div class="owl-carousel" id="testimonial-slide">
						@foreach($testimonials as $testimonial)
						<!-- single testimonial -->
						<div class="testimonial">
							<span>‘​‌‘​‌</span>
							<p>{{$testimonial->avis}}</p>
							<div class="client-info">
								<div class="avatar">
									<img src="{{asset('img/team/'.$testimonial->team->image)}}" alt="">
								</div>
								<div class="client-name">
									<h2>{{$testimonial->team->nom}}</h2>
									<p>{{$testimonial->team->fonction}}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- Testimonial section end-->


	<!-- Services section -->
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
			<div class="text-center ">{{$services->fragment('service')->links('vendor.pagination.bootstrap-4') }}
			</div>
			<div class="text-center">
				<a href="" class="site-btn ">Browse</a>
			</div>
		</div>
	</div>
	<!-- services section end -->


	<!-- Team Section -->
	<div class="team-section spad">
		<div class="overlay"></div>
		<div class="container">
			<div class="section-title">
				<h2>{!! $str4 !!}</h2>
			</div>
			<div class="row">

				@foreach ($teams as $item)

				@if ($item->fonction != 'CEO' && $ok != 2)

				<!-- single member -->
				<div class="col-sm-4">
					<div class="member">
						<img src="{{asset('img/team/'.$item->image)}}" alt="">
						<h2>{{$item->nom}}</h2>
						<h3>{{$item->fonction}}</h3>
					</div>
				</div>
				<div style="display: none;">{{$ok++}}</div>
				<div style="display: none;">{{$counter = $item->id}}</div>

				@endif
				@endforeach

				@foreach ($teams as $item)

				@if ($item->fonction == 'CEO')

				<div class="col-sm-4">
					<div class="member">
						<img src="{{asset('img/team/'.$item->image)}}" alt="">
						<h2>{{$item->nom}}</h2>
						<h3>{{$item->fonction}}</h3>
					</div>
				</div>


				@endif

				@endforeach

				<div style="display: none;">{{$ok=1}}</div>
				@foreach ($teams as $item)

				@if ($item->fonction != 'CEO' && $item->id != $counter && $ok != 2)

				<div class="col-sm-4">
					<div class="member">
						<img src="{{asset('img/team/'.$item->image)}}" alt="">
						<h2>{{$item->nom}}</h2>
						<h3>{{$item->fonction}}</h3>
					</div>
				</div>

				<div style="display: none;">{{$ok++}}</div>
				@endif


				@endforeach
			</div>
		</div>
	</div>
	</div>
	<!-- Team Section end-->


	<!-- Promotion section -->
	<div class="promotion-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h2>{{$ready->titre}}</h2>
					<p>{{$ready->texte}}</p>
				</div>
				<div class="col-md-3">
					<div class="promo-btn-area">
						<a href="" class="site-btn btn-2">{{$ready->button}}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Promotion section end-->


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
				<div class="col-md-6 col-pull" id="formContact">
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