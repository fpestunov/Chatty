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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/signup', 'AuthController@getSignup')->name('signup');
Route::post('/signup', 'AuthController@postSignup');

Route::get('/signin', 'AuthController@getSignin')->name('signin');
Route::post('/signin', 'AuthController@postSignin');

Route::get('/signout', 'AuthController@getSignout')->name('signout');

Route::get('/search', 'SearchController@getResults')->name('search');

Route::get('/user/{username}', 'ProfileController@getProfile')->name('profile');

Route::get('/profile/edit', 'ProfileController@getEdit')->name('profile.edit');
Route::post('/profile/edit', 'ProfileController@postEdit');

Route::get('/friends', 'FriendController@getIndex')->name('friends'); // 'middleware' => ['auth']
Route::get('/friends/add/{username}', 'FriendController@getAdd')->name('friend.add'); // 'middleware' => ['auth']

Route::get('/alert', function() {
    return redirect()->route('home')->with('info', 'You have signed up!');
});
