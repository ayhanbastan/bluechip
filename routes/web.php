<?php


Route::get('/test', 'TestController@test');


Route::get('/', 'IndexController@index');
Route::get('/musteri-tanımlama', 'CustomerDefinitionController@index');
Route::post('/musteri-tanımlama', 'CustomerDefinitionController@post');
Route::get('/yeni-musteri-tanımlama', 'CustomerDefinitionController@create');
Route::get('/musteri-tanımlama-edit/{id}', 'CustomerDefinitionController@edit');
Route::post('/musteri-tanımlama/{id}', 'CustomerDefinitionController@update');
Route::delete('/musteri-tanımlama/{id}', 'CustomerDefinitionController@delete');

Route::get('/kontak', 'ContactController@index');
Route::get('/yeni-kontak', 'ContactController@create');
Route::post('/yeni-kontak', 'ContactController@post');
Route::get('/kontak-edit/{id}', 'ContactController@edit');
Route::post('/kontak-edit/{id}', 'ContactController@update');
Route::delete('/kontak/{id}', 'ContactController@delete');

Route::get('/kullanicilar', 'UserController@index');
Route::get('/yeni-kullanici', 'UserController@create');
Route::post('/yeni-kullanici', 'UserController@post');
Route::get('/kullanici-edit/{id}', 'UserController@edit');
Route::post('/kullanici/{id}', 'UserController@update');
Route::delete('/kullanici/{id}', 'UserController@delete');

Route::get('/brief ', 'BriefController@index');
Route::get('/brief-create ', 'BriefController@create');
Route::post('/brief-create', 'BriefController@post');
Route::get('/brief-edit/{id}', 'BriefController@edit');
Route::get('/brief-detay/{id}', 'BriefController@show');
Route::post('/brief-update/{id}', 'BriefController@update');
Route::delete('/brief-delete/{id}', 'BriefController@delete');

Route::get('/butce-olustur', 'BudgetController@create');



Route::get('/referanslar/{id} ', 'ReferancesController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


