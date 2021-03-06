<?php

use Illuminate\Support\Facades\Route;
use App\Menu;

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

Route::get('/404', function (){
    return view('404');
});

Route::get('/500', function (){
    return view('500');
});

Route::get('/', function () {
    return view('index');
});
Route::post('/posts', 'PostsController@store');
Route::get('/posts/create', 'PostsController@create')->middleware('auth');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::put('/posts/{post}', 'PostsController@update');

Route::put('/hide/{post}', 'PostsController@hide');

Route::post('/user/', 'UserController@update');
Route::post('profile', 'UserController@update_avatar');

//Route::get('/posts/', function () {
//    return view('posts.posts');
//});

Route::get('/impressum', function (){
    return view('impressum');
});

Route::get('/profile', function (){
   return view('dashboard.profile');
})->middleware('auth');

Route::get('/blank', function (){
    return view('dashboard.blank');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', function (){
    Auth::logout();
    return redirect('');
});

Route::get('/contact', 'ContactController@show');
Route::post('/contact', 'ContactController@store');

Route::get('/{post}', function ($post) {
    abort(404);
});

Auth::routes();
