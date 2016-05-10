<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ["as" => "public.welcome" , function () {
    return view('welcome');
}]);

// @todo For the two pages, make {page} optional and use a regex match

// List profiles (first page)
Route::get(
    'profiles',
    ["as" => "profiles.browse", 'uses' => 'Profile\ProfileController@index']
);

// List profiles by page number
Route::get(
    'profiles/{page}',
    ["as" => "profile.browse", 'uses' => 'Profile\ProfileController@index']
);

// View profile
Route::get(
    'profile/{username}',
     ["as" => "profile.view", 'uses' => 'Profile\ProfileController@view']
);

// Edit profile (first page)
Route::get(
    'edit/profile',
    ["as" => "profile.edit", 'uses' => 'Profile\ProfileController@editFirstPage']
);

// Edit profile by page number
Route::get(
    'edit/profile/{page}',
    ["as" => "profile.edit", 'uses' => 'Profile\ProfileController@editFirstPage']
);

// Authentication routes
Route::get('auth/login', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'public.getLogin']);
Route::post('auth/login', ['uses' => 'Auth\AuthController@postLogin', 'as' => 'public.postLogin']);
Route::get('auth/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'public.getLogout']);

// Registration routes
Route::get('auth/register', ['uses' => 'Auth\AuthController@getRegister', 'as' => 'public.getRegister']);
Route::post('auth/register', ['uses' => 'Auth\AuthController@postRegister', 'as' => 'public.postRegister']);

// Password reset link request routes...
Route::get('password/email', ['uses' => 'Auth\PasswordController@getEmail', 'as' => 'public.getEmail']);
Route::post('password/email', ['uses' => 'Auth\PasswordController@postEmail', 'as' => 'public.postEmail']);

// Password reset routes...
Route::get('password/reset/{token}', ['uses' => 'Auth\PasswordController@getReset', 'as' => 'public.getReset']);
Route::post('password/reset', ['uses' => 'Auth\PasswordController@postReset', 'as' => 'public.postReset']);
