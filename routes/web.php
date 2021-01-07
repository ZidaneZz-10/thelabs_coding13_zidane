<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ReadyController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VideoController;
use App\Models\Carousel;
use App\Models\Navbar;
use App\Models\Ready;
use App\Models\Service;
use App\Models\Team;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome2');
});

Route::get('/blog-post', function () {
    return view('blog-post');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/services', function () {
    return view('services');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

// Affichage vers site principale
Route::get('/welcome', function () {
    $navbar = Navbar::find(1);
    $carouselImg=Carousel::all();
    $textCarousel=TextCarousel::all();
    $services=Service::inRandomOrder()->limit(3)->get();
    $video=Video::find(1);
    $ready=Ready::find(1);
    return view('welcome2', compact('navbar','carouselImg','textCarousel','services','video','ready'));
});

//Navbar
Route::get('/navbar',[NavbarController::class,'index']);
Route::get('/edit-navbar/{id}', [NavbarController::class, 'edit']);
Route::post('/update-navbar/{id}', [NavbarController::class, 'update']);

//Logo
Route::get('/logo',[LogoController::class,'index']);
Route::get('/edit-logo/{id}', [LogoController::class, 'edit']);
Route::post('/update-logo/{id}', [LogoController::class, 'update']);

//carousel
    //image
Route::get('/carouselimg',[CarouselController::class,'index']);
Route::get('/create-carouselimg',[CarouselController::class,'create']);
Route::post('/add-carouselimg',[CarouselController::class,'store']);
Route::get('/edit-carouselimg/{id}', [CarouselController::class, 'edit']);
Route::post('/update-carouselimg/{id}', [CarouselController::class, 'update']);
Route::post('/delete-carouselimg/{id}', [CarouselController::class, 'destroy']);
    //texte
Route::get('/carouselTxt',[CarouselController::class,'index2']);
Route::get('/edit-carouselTxt/{id}', [CarouselController::class, 'edit2']);
Route::post('/update-carouselTxt/{id}', [CarouselController::class, 'update2']);

//services 
Route::get('/service',[ServiceController::class,'index']);
Route::get('/create-service',[ServiceController::class,'create']);
Route::post('/add-service',[ServiceController::class,'store']);
Route::get('/edit-service/{id}', [ServiceController::class, 'edit']);
Route::post('/update-service/{id}', [ServiceController::class, 'update']);
Route::post('/delete-service/{id}', [ServiceController::class, 'destroy']);
 
//Presentation
Route::get('/presentation',[PresentationController::class,'index']);
Route::get('/edit-presentation/{id}', [PresentationController::class, 'edit']);
Route::post('/update-presentation/{id}', [PresentationController::class, 'update']);

// Video
Route::get('/video',[VideoController::class,'index']);
Route::get('/edit-video/{id}', [VideoController::class, 'edit']);
Route::post('/update-video/{id}', [VideoController::class, 'update']);

// Ready
Route::get('/ready',[ReadyController::class,'index']);
Route::get('/edit-ready/{id}', [ReadyController::class, 'edit']);
Route::post('/update-ready/{id}', [ReadyController::class, 'update']);

//Team
Route::get('/team',[TeamController::class,'index']);
Route::get('/edit-team/{id}', [TeamController::class, 'edit']);
Route::get('/create-team',[TeamController::class,'create']);
Route::post('/add-team',[TeamController::class,'store']);
Route::post('/update-team/{id}', [TeamController::class, 'update']);
Route::post('/delete-team/{id}', [TeamController::class, 'destroy']);
// Update Title Team
Route::post('/update-title/{id}', [TeamController::class, 'update2']);
