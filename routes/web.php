<?php
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

// Route::get('/{name}', function ($name) {
//     return $name.'입니다. ㅋㅋ';
// });

use Illuminate\Http\Request;

Route::get('/',function(){
  return view('auth.login');
});

//Route::get('/users','UserController@index');
//Route::get('/users/{user}','UserController@show')->name('profile');
Route::resource('users','UserController',['names'=>['show'=>'profile']]);


//Route::get('/posts/create','PostController@create')->name('posts.create')->middleware('auth');
//Route::post('/posts','PostController@store')->name('posts.store')->middleware('hasFile:img');
Route::resource('posts','PostController');

Route::resource('comments','CommentController');

Auth::routes();
Route::get('/home','HomeController@index');
