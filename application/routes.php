<?php

// Home view
Route::get('/', function() {
	return View::make('home.index');
});

// Wedstrijden index
Route::get('contests', array('as' => 'contests', 'uses' => 'contests@index'));

// Een single wedstrijd laten zien
Route::get('contests/(:any)', array('as' => 'contest', 'uses' => 'contests@show'));

// Nieuwe Wedstrijd maken
Route::get('contests/new', array('as' => 'new_contest', 'uses' => 'contests@new'));
Route::post('contests/new', 'contests@create');

// Wedstrijd bewerken
Route::get('contests/(:any)/edit', array('as' => 'edit_contest', 'uses' => 'contests@edit'));

// Maak een nieuwe entry aan
Route::get('contests/(:any)/add', array('as' => 'new_entry', 'uses' => 'entry@new'));
Route::post('contests/(:any)/add', 'entry@create');

// Maak een nieuw account aan
Route::get('users/new', array('as' => 'new_user', 'uses' => 'users@new'));
Route::post('users/new', 'users@create');

// Laat een single user zien
Route::get('users/(:any)', array('as' => 'user', 'uses' => 'users@show'));

// User Login
Route::get('users/login', array('as' => 'login_user', 'uses' => 'users@login'));
Route::post('users/login', 'users@login');

// User Logout
Route::get('users/logout', array('as' => 'logout_user', 'uses' => 'users@logout'));

// Contactform
Route::get('contacts/new', array('as' => 'new_contact', 'uses' => 'contacts@new'));
Route::post('contacts/new', 'contacts@new');

// Contactform confirmation
Route::get('contacts', array('as' => 'contacts', 'uses' => 'contacts@index'));

// Entry updated
Route::post('contests/(:any)', 'entry@update');

// Testroute
Route::get('test', function() {
	$user = User::find(2)->entries;
	dd($user);
});


/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application. The exception object
| that is captured during execution is then passed to the 500 listener.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function($exception)
{
	return Response::error('500');
});

Event::listen('laravel.query', function($sql) 
{
	
});


/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});