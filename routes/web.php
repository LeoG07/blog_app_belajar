<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileUpload;

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

// Route::get('/', function () {
//     return view('blog/index');
// });

// BLOG
Route::get('/', [BlogController::class,'index'])->name('home');
Route::get('/test/{id}',  [BlogController::class, 'test']);
Route::get('/blog/{id}', [BlogController::class, 'show']) ;
// Route::post('/blog/{id}', [BlogController::class, 'comment'])
Route::get('/about', function () 
{return view('blog/about/about');});
Route::get('/post', function () 
	{return view('blog/post/post');});
Route::get('/contact', function () 
	{return view('blog/contact/contact');});

// Route::resource('/blog', BlogController::class);

// Route::get('/', function () {
//     return view('blog/index');
// });

// Route::get('/admin/dashboard', function () {
//     return view('admin/index');
// });

// ---------------------------------------------------
// Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');

// Route::get('/login', function () {
//     return view('admin/login');
// });

Route::get('/register', function () {
    return view('admin/register');
});

Route::get('/forgot_password', function () {
    return view('admin/forgot_password');
});

Route::resource('admin/setting', SettingController::class)->middleware('auth');


// Route::get('admin', PostController::class)->middleware('auth');

Route::get('/admin', [DashboardController::class,'index'])->middleware('auth');

Route::resource('admin/posts', PostController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'register_action'])->name('register.action');

Route::post('comment', [BlogController::class, 'comment'])->name('comment');

// Route::get('admin/comments', PostController::class, 'comments')->middleware('auth');

Route::get('/admin/comments', [CommentController::class, 'index']) ;

Route::post('/admin/comments/{id}', [CommentController::class, 'update']) ;

Route::get('/image', [FileUpload::class,'index'])->name('image.index');
Route::post('/image', [FileUpload::class,'fileUpload'])->name('image.store');