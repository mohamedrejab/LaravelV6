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

Route::get('indexProduits', 'ProduitsController@index')->name('indexProduits');
Route::get('showProduit/{id}', 'ProduitsController@show')->name('showProduit');
Route::post('addProduct', 'ProduitsController@store')->name('addProduct');

Route::get('indexAdresses', function(){
   // $users = App\User::all();
   //@foreach($users as $user)
   //<p>{{$user->name}}</p>
   //<p>{{$user->email}}</p>
   //<p>{{$user->adresses->country}}</p>
   //@endforeach

  // $adresses = App\Adresses::all();
    return view('adresses');
});

Route::get('createAdresse', function(){
    $user = factory(\App\User::class)->create();
    $user->adresses()->create(['country' => 'Tunisia']);
    return ('ok');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/registerUser', 'UserController@createUser')->name('registerUser');
Route::get('/listUser', 'UserController@index')->name('listUser');
Route::get('/editUser/{id}', 'UserController@editUser')->name('editUser');
Route::post('/editUserAction', 'UserController@editUserAction')->name('editUserAction');
Route::get('/deleteUser/{id}', 'UserController@deleteUser')->name('deleteUser');
Route::get('/messagerie', 'UserController@messagerie')->name('messagerie');
Route::get('/message/{id}', 'UserController@message')->name('message');



Route::get('loginUser', 'AuthController@index')->name('loginUser');
  Route::post('post-login', 'AuthController@postLogin'); 
  Route::get('registrationUser', 'AuthController@registration');
  Route::post('post-registration', 'AuthController@postRegistration'); 
  Route::get('dashboard', 'AuthController@dashboard'); 
  Route::get('logout', 'AuthController@logout');
