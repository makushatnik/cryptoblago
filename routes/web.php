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


Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', 'UserController@login');

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', 'UserController@register');

Route::get('/logout', 'UserController@logout');

Route::get('/cabinet', 'UserController@cabinet');

Route::get('/proposal', 'ProposalController@index');

Route::get('/proposal/create', 'ProposalController@create');

Route::post('/proposal/create', 'ProposalController@store');

Route::get('/proposal/{id}', 'ProposalController@show');

Route::get('/admin', function () {
    return view('admin');
});