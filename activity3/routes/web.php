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
    return view('welcome');
});


//Route that will fire when we type in 'login' in the url.
//This is just the name people will see on the outside
//as they type in the url.
Route::get('/login', function () {
    // View 'loginView' has to be the name for the file in the views.
    return view('loginView');
});

    Route::get('/login2', function () {
        // View 'loginView' has to be the name for the file in the views.
        return view('loginView2');
    });

// When the data is posted from the login page with our action set to 'dologin' it will come here
// Then route the request to a function called index
// In the LoginController
Route::post('/dologin', 'LoginController@index');

Route::get('/customer', function()
{
    return view('customer');
});

Route::post('/addcustomer', 'CustomerController@index');

//------------------------------------------------------------
//Order Routes
Route::get('/neworder', function() 
{
    return view('order');
});

Route::post('/addorder', 'OrderController@index');