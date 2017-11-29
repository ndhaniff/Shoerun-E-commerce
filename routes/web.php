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

Route::get('/', 'PagesController@index');
Route::get('/search', 'PagesController@search');

Route::resource('products','ProductsController');
Route::post('/products/save',['as' => 'products.save', 'uses' => 'ProductsController@save']);
Route::get('/products/single/{id}',['as' => 'products.single', 'uses' => 'ProductsController@show']);

Route::post('/cart/create',['as' => 'cart.create', 'uses' => 'CartController@create']);
Route::get('/cart','CartController@index');
Route::get('/cart/remove/{rowId}','CartController@remove');

Route::get('/checkout', function(){
    $carts = Cart::content();
    $subtotal = Cart::total();

    return view('products.checkout')->
    with('carts',$carts)->with('subtotal',$subtotal);
});

Route::post('/order/create', 'OrdersController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
