<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ReadyController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Models\Article;
use App\Models\Carousel;
use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Contact;
use App\Models\ContactIntro;
use App\Models\Footer;
use App\Models\Map;
use App\Models\Navbar;
use App\Models\Presentation;
use App\Models\Ready;
use App\Models\Service;
use App\Models\ServiceTitle;
use App\Models\Tag;
use Illuminate\Support\Str;
use App\Models\Team;
use App\Models\TeamTitle;
use App\Models\Testimonial;
use App\Models\TestimonialTitle;
use App\Models\TextCarousel;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/blog', function () {
    $articles = Article::where('statut','authorized')->paginate(3);
    $commentaires = Commentaire::all();
    $navbar = Navbar::find(1);
    $tags = Tag::all();
    $categories = Categorie::all();
    $footer = Footer::find(1);

    return view('blog', compact('articles', 'tags', 'footer', 'categories', 'navbar', 'commentaires'));
});
Route::get('/search', [ArticleController::class, 'search']);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/contactMap', function () {
    $navbar = Navbar::find(1);
    $footer = Footer::find(1);
    $contact = Contact::find(1);
    $map=Map::find(1);

    $contactIntro = ContactIntro::find(1);

    return view('contact', compact('navbar', 'map','footer', 'contact', 'contactIntro'));
});
Route::get('/blog-post/{id}', function ($id) {
    $navbar = Navbar::find(1);
    $commentaires = Commentaire::all();
    $article = Article::find($id);
    $footer = Footer::find(1);

    return view('blog-post', compact('article', 'footer', 'navbar', 'commentaires'));
});

Route::get('/services', function () {
    $services = Service::limit(9)->get();
    $navbar = Navbar::find(1);

    $serviceTitle = ServiceTitle::find(1);
    $titre1 = Str::of($serviceTitle->titre)->replace('(', '<span>');
    $str3 = Str::of($titre1)->replace(')', '</span>');

    $servicePrime = Service::orderByDesc('id')->limit(6)->get();
    $limite = 1;

    $teams = Team::inRandomOrder()->get();
    $counter = 0;
    $ok = 1;

    $contact = Contact::find(1);

    $contactIntro = ContactIntro::find(1);

    $footer = Footer::find(1);

    $articles = Article::orderByDesc('id')->limit(3)->get();


    return view('services', compact('services', 'articles', 'footer', 'str3', 'servicePrime', 'limite', 'navbar', 'contact', 'contactIntro'));
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('redacteur');


// Affichage vers site principale
Route::get('/', function () {
    $navbar = Navbar::find(1);
    $carouselImg = Carousel::all();
    $textCarousel = TextCarousel::all();
    // 3 cartes random
    $serviceCards = Service::inRandomOrder()->limit(3)->get();

    //pagination des services par 9 (reverse)
    $services = Service::orderByDesc('id')->Paginate(9);

    $serviceTitle = ServiceTitle::find(1);
    $titre1 = Str::of($serviceTitle->titre)->replace('(', '<span>');
    $str3 = Str::of($titre1)->replace(')', '</span>');

    $teamTitle = TeamTitle::find(1);
    $titre2 = Str::of($teamTitle->titre)->replace('(', '<span>');
    $str4 = Str::of($titre2)->replace(')', '</span>');

    $presentation = Presentation::find(1);
    $str = Str::of($presentation->titre)->replace('(', '<span>');
    $str2 = Str::of($str)->replace(')', '</span>');

    $video = Video::find(1);

    $testimonialTitle = TestimonialTitle::find(1);
    $testimonials = Testimonial::orderbydesc('id')->limit(6)->paginate(6);

    $ready = Ready::find(1);

    $contact = Contact::find(1);

    $contactIntro = ContactIntro::find(1);

    $teams = Team::inRandomOrder()->get();
    $counter = 0;
    $ok = 1;

    $footer = Footer::find(1);

    return view('welcome2', compact('navbar', "footer", 'testimonials', 'carouselImg', 'textCarousel', 'serviceCards', 'services', 'presentation', 'video', 'ready', 'contact', 'contactIntro', 'str2', 'str3', 'serviceTitle', 'str4', 'teamTitle', 'testimonialTitle', 'teams', 'counter', 'ok'));
});

//Navbar
Route::get('/navbar', [NavbarController::class, 'index'])->middleware('admin');
Route::get('/edit-navbar/{id}', [NavbarController::class, 'edit'])->middleware('admin');
Route::post('/update-navbar/{id}', [NavbarController::class, 'update']);

//Logo
Route::get('/logo', [LogoController::class, 'index'])->middleware('admin');
Route::get('/edit-logo/{id}', [LogoController::class, 'edit'])->middleware('admin');
Route::post('/update-logo/{id}', [LogoController::class, 'update']);

//carousel
//image
Route::get('/carouselimg', [CarouselController::class, 'index'])->middleware('webmaster');
Route::get('/create-carouselimg', [CarouselController::class, 'create'])->middleware('webmaster');
Route::post('/add-carouselimg', [CarouselController::class, 'store']);
Route::get('/edit-carouselimg/{id}', [CarouselController::class, 'edit'])->middleware('webmaster');
Route::post('/update-carouselimg/{id}', [CarouselController::class, 'update']);
Route::post('/delete-carouselimg/{id}', [CarouselController::class, 'destroy']);
//texte
Route::get('/carouselTxt', [CarouselController::class, 'index2'])->middleware('webmaster');
Route::get('/edit-carouselTxt/{id}', [CarouselController::class, 'edit2'])->middleware('webmaster');
Route::post('/update-carouselTxt/{id}', [CarouselController::class, 'update2']);

//services 
Route::get('/service', [ServiceController::class, 'index'])->middleware('webmaster');
Route::get('/create-service', [ServiceController::class, 'create'])->middleware('webmaster');
Route::post('/add-service', [ServiceController::class, 'store']);
Route::get('/edit-service/{id}', [ServiceController::class, 'edit'])->middleware('webmaster');
Route::post('/update-service/{id}', [ServiceController::class, 'update']);
Route::post('/delete-service/{id}', [ServiceController::class, 'destroy']);
// Update Title Service
Route::post('/update-titleService/{id}', [ServiceController::class, 'update2']);

//Presentation
Route::get('/presentation', [PresentationController::class, 'index'])->middleware('webmaster');
Route::get('/edit-presentation/{id}', [PresentationController::class, 'edit'])->middleware('webmaster');
Route::post('/update-presentation/{id}', [PresentationController::class, 'update']);

// Video
Route::get('/video', [VideoController::class, 'index'])->middleware('webmaster');
Route::get('/edit-video/{id}', [VideoController::class, 'edit'])->middleware('webmaster');
Route::post('/update-video/{id}', [VideoController::class, 'update']);

// Ready
Route::get('/ready', [ReadyController::class, 'index'])->middleware('webmaster');
Route::get('/edit-ready/{id}', [ReadyController::class, 'edit'])->middleware('webmaster');
Route::post('/update-ready/{id}', [ReadyController::class, 'update']);

//Team
Route::get('/team', [TeamController::class, 'index'])->middleware('webmaster');
Route::get('/edit-team/{id}', [TeamController::class, 'edit'])->middleware('webmaster');
Route::get('/create-team', [TeamController::class, 'create'])->middleware('webmaster');
Route::post('/add-team', [TeamController::class, 'store']);
Route::post('/update-team/{id}', [TeamController::class, 'update']);
Route::post('/delete-team/{id}', [TeamController::class, 'destroy']);
// Update Title Team
Route::post('/update-title/{id}', [TeamController::class, 'update2']);

//testimonials
Route::get('/testimonials', [TestimonialController::class, 'index'])->middleware('webmaster');
Route::get('/edit-testimonial/{id}', [TestimonialController::class, 'edit'])->middleware('webmaster');
Route::get('/create-testimonial', [TestimonialController::class, 'create'])->middleware('webmaster');
Route::post('/add-testimonial', [TestimonialController::class, 'store']);
Route::post('/update-testimonial/{id}', [TestimonialController::class, 'update']);
Route::post('/delete-testimonial/{id}', [TestimonialController::class, 'destroy']);
// Update Title Service
Route::post('/update-titleAvis/{id}', [TestimonialController::class, 'update2']);


//contact
Route::get('/contact', [ContactController::class, 'index'])->middleware('webmaster');
Route::get('/edit-contact/{id}', [ContactController::class, 'edit'])->middleware('webmaster');
Route::get('/edit-contactIntro/{id}', [ContactController::class, 'edit2'])->middleware('webmaster');
Route::post('/update-contact/{id}', [ContactController::class, 'update']);
Route::post('/update-contactIntro/{id}', [ContactController::class, 'update2']);

//Articles
Route::get('/articles', [ArticleController::class, 'index'])->middleware('redacteur');
Route::get('/articlesAttente', [ArticleController::class, 'index2'])->middleware('webmaster');
Route::get('/create-article', [ArticleController::class, 'create'])->middleware('redacteur');
Route::post('/add-article', [ArticleController::class, 'store']);
Route::get('/edit-article/{id}', [ArticleController::class, 'edit'])->middleware('redacteur');
Route::post('/update-article/{id}', [ArticleController::class, 'update']);
Route::post('/accepte-article/{id}', [ArticleController::class, 'update2']);

Route::post('/delete-article/{id}', [ArticleController::class, 'destroy']);
Route::get('/article/{id}', [ArticleController::class, 'show'])->middleware('webmaster');


//Categories
Route::get('/categories', [CategorieController::class, 'index']);
Route::post('/add-categorie', [CategorieController::class, 'store']);
Route::get('/edit-categorie/{id}', [CategorieController::class, 'edit']);
Route::post('/update-categorie/{id}', [CategorieController::class, 'update']);
Route::post('/delete-categorie/{id}', [CategorieController::class, 'destroy']);

//Tags
Route::get('/tags', [TagController::class, 'index']);
Route::post('/add-tag', [TagController::class, 'store']);
Route::get('/edit-tag/{id}', [TagController::class, 'edit']);
Route::post('/update-tag/{id}', [TagController::class, 'update']);
Route::post('/delete-tag/{id}', [TagController::class, 'destroy']);

//comments
Route::post('/delete-comment/{id}', [CommentaireController::class, 'destroy']);
Route::post('/add-comment', [CommentaireController::class, 'store']);

//mail
Route::post('/forms/contact.php', [EmailController::class, 'store']);

//newsletter
Route::get('/newsletters', [NewsletterController::class, 'index'])->middleware('webmaster');
Route::post('/add-email', [NewsletterController::class, 'store']);
Route::post('/delete-newsletter/{id}', [NewsletterController::class, 'destroy']);


// liste d'emails de contact
Route::get('/emails', [EmailController::class, 'index'])->middleware('admin');
Route::post('/delete-email/{id}', [EmailController::class, 'destroy']);

//footer
Route::get('/footer', [FooterController::class, 'index'])->middleware('webmaster');
Route::get('/edit-footer/{id}', [FooterController::class, 'edit'])->middleware(('webmaster'));
Route::post('/update-footer/{id}', [FooterController::class, 'update']);

//map 
Route::get('/map', [MapController::class, 'index'])->middleware('webmaster');
Route::get('/edit-map/{id}', [MapController::class, 'edit'])->middleware(('webmaster'));
Route::post('/update-map/{id}', [MapController::class, 'update']);

//users
Route::get('/users', [UserController::class, 'index'])->middleware('admin');
Route::post('/update-user/{id}', [UserController::class, 'update']);

