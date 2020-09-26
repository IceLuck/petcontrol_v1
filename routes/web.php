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
    return view('auth.login');
});

#Acesso Público
Route::get('/home', 'PetController@index')->name('home');
Route::get('/pets','PetController@index')->name('listar_pets');
Route::get('/pets/{petId}/vacinas','VacinaController@index')->name('listar_vacinas');
Route::post('/pets/{petId}/vacinas','VacinaController@index');

#Acesso Privado
Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('/home', 'PetController@index')->name('home');
Route::put('/home', 'PetController@index')->name('home');

Route::get('/pets/create','PetController@create');
Route::post('/pets/create','PetController@store');
Route::get('/pets/{id}/edit','PetController@edit');
Route::put('/pets/{id}','PetController@update');
Route::delete('/pets/{id}','PetController@destroy');

Route::get('/pets/{petId}/vacinas/create','VacinaController@create');
Route::post('/pets/{petId}/vacinas/create','VacinaController@store');
Route::get('/pets/{petId}/vacinas/{id}/edit','VacinaController@edit');
Route::put('/pets/{petId}/vacinas/{id}','VacinaController@update');
Route::delete('/pets/{petId}/vacinas/{id}','VacinaController@destroy');
