<?php

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

Route::group(['middleware' => ['web', 'auth']], function () {
  //Profile
  Route::get('/profile', 'ProfileController@index')->name('profile.index');

  // create Posts
  Route::get('/post/create', 'PostController@create')->name('post.create');
  Route::post('/post/create', 'PostController@createSubmit')->name('post.createSubmit');

  //edit posts
  Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit');
  Route::post('/post/update', 'PostController@update')->name('post.update');

  //delete posts
  Route::get('/post/{id}/delete', 'PostController@delete')->name('post.delete');
  // comment
  Route::post('/post/{id}/comments', 'CommentController@store')->name('post.comments');
  Route::get('/comments', 'CommentController@index');
});

//homepage
Route::get('/', 'PageController@index')->name('index');
//about us
Route::get('/about', 'PageController@about')->name('about');
//faq
Route::get('/faq', 'PageController@faq')->name('faq');
// explore
Route::get('/explore', 'PageController@explore')->name('explore');
// post
Route::get('/post/{id}', 'PostController@view')->name('post.view');

Auth::routes();

Route::get('logout', function() {
  Auth::logout();
  return redirect('/');
})->name('logoutquick');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
