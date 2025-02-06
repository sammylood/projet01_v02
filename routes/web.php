<?php
use App\Routes\Route;

use App\Controllers\HomeController;
use App\Controllers\ClientController;
use App\Controllers\UserController;
use App\Controllers\AuthController;

Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');

Route::get('/client/home', 'ClientController@home');

Route::get('/client/index', 'ClientController@index');
Route::get('/client/show', 'ClientController@show');
Route::get('/client/create', 'ClientController@create');
Route::post('/client/create', 'ClientController@store');
Route::get('/client/uploadImage', 'ClientController@upload');
Route::post('/client/uploadImage', 'ClientController@storeUpload');
Route::get('/client/upload', 'ClientController@uploadConfirmation');
Route::post('/client/upload', 'ClientController@storeUploadConfirmation');
Route::get('/client/produit', 'ClientController@miser');
Route::post('/client/produit', 'ClientController@storeMiser');
Route::get('/client/compte', 'ClientController@compte');
Route::get('/client/edit', 'ClientController@edit');
Route::post('/client/edit', 'ClientController@update');
Route::post('/client/delete', 'ClientController@delete');
Route::get('/client/catalogue', 'ClientController@catalogue');
Route::get('/client/catalogue-passe', 'ClientController@cataloguePasse');

Route::get('/user/userList', 'UserController@index');
Route::get('/user/userShow', 'UserController@show');
Route::get('/user/userEdit', 'UserController@edit');
Route::post('/user/userEdit', 'UserController@update');
Route::post('/user/delete', 'UserController@delete');
Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::dispatch();

?>