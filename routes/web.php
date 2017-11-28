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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('pages.home');
});

Route::resource('products','ProductsController');
Route::post('/products/save',['as' => 'products.save', 'uses' => 'ProductsController@save']);
Route::get('/products/single/{id}',['as' => 'products.single', 'uses' => 'ProductsController@show']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
