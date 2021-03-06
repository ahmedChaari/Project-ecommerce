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
use App\Order;
use App\Head;
use App\Footer;
use App\Category;

//Route::get('/', function () {return view('index');});

//FrontEnd Route
Route::get('/','FrontEndControler@index')->name('index');
Route::get('post/{post}','FrontEndControler@single')->name('posts.single');


//Route::put('post/{post}','FrontEndControler@specialsShow')->name('specials.show');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories','CategoriesController');


//Post Route
Route::post('search','PostsController@search')->name('posts.search');

Route::get('getlist-posts','PostsController@getlist')->name('posts.list');
Route::resource('posts','PostsController');
Route::get('trashed-posts','PostsController@trashed')->name('posts.trashed');



Route::put('restore-posts/{post}','PostsController@restore')->name('posts.restore');

//Shopping Route
Route::post('/cart/add','ShoppingController@cartAdd')->name('cart.add');
Route::get('/cart','ShoppingController@cart')->name('cart');

Route::get('/cart/delete/{id}','ShoppingController@cartDelete')->name('cart.delete');

Route::get('/cart/incr/{id}/{qty}','ShoppingController@incr')->name('cart.incr');
Route::get('/cart/decr/{id}/{qty}','ShoppingController@decr')->name('cart.decr');
Route::get('/cart/rapid/add/{post}' ,'ShoppingController@addRapid')->name('cart.rapid.add');

//checkout Route
Route::get('/cart/checkout','CheckoutController@index')->name('cart.checkout');
Route::post('/cart/checkout','CheckoutController@pay')->name('cart.checkout');

//Header Route
//Route::resource('headers','HeadersController')->middleware('auth');
Route::resource('headers','HeadersController')->middleware('auth');
Route::get('/slide','HeadersController@slide')->name('slide');

//footer Route
//Route::get('/footerList','FooterController@list');
Route::get('/footers/list','FooterController@list')->name('list');
Route::resource('footers','FooterController')->middleware('auth');

//Head Route
Route::get('/head','HeadsController@head')->name('head');
Route::resource('heads','HeadsController')->middleware('auth');

//order Route
Route::post('/orders/store','OrderController@store')->name('orders.store');
Route::get('/orders','OrderController@index')->name('orders.index');
Route::post('orders/{order}/make-valid', 'OrderController@makeAdmin')->name('orders.make-valid'); 

//Users Route
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('users/update', 'UsersController@update')->name('users.update-profile');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin'); 
});
View::composer(['*'],function($valid)
{
    $valid->with(['valids' => Order::where('valid', '=', 'no_valid')->get()]);
});
View::composer(['*'],function($heads)
{
    $heads->with(['heads' => Head::all()]);
});
View::composer(['*'],function($footers)
{
    $footers->with(['footers' => Footer::all()])->with(['categories' => Category::all()]);
});
