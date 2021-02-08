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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/basic_response', function()
{
    return 'Hello World';
});
Route::get('/header', function()
{
   return response("Hello to Everyone in CST-256", 200) -> header('Content-Type', 'text/html');
});

//Route for new test page..
Route::get('/test', function()
{
    return view('test');
});

Route::get('contact', function()
{
    //Make sure to only use the name of the view file
    return view('contact');
});

Route::get('about', function()
{
    //Make sure to only use the name of the view file
    return view('about');
});

Route::get('customers', function()
{
    $customers = [
        'Collin Willis',
        'Eva Holbeck',
        'Layton Nowlin',
        'Alex Avant'
    ];
    return view('internals.customers', ['customers_arr' => $customers]);
});

Route::get('products', function()
{
    $products = [
        'Product 1',
        'Product 2',
        'Product 3',
        'Product 4'
    ];
    return view('internals.products', ['products_arr' => $products]);
});

