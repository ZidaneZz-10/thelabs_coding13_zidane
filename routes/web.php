<?php

use App\Http\Controllers\NavbarController;
use App\Models\Navbar;
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

// Affichage site principale
Route::get('/welcome', function () {
    $navbar = Navbar::find(1);
    return view('welcome2', compact('navbar'));
});

//Navbar
Route::get('/navbar',[NavbarController::class,'index']);
Route::get('/edit-navbar/{id}', [NavbarController::class, 'edit']);
Route::post('/update-navbar/{id}', [NavbarController::class, 'update']);