<?php

use Illuminate\Http\Request;

Route::get('/cities', 'Api\CitiesController@index');
Route::get('/cities/{id}', 'Api\CitiesController@show');
Route::post('/cities', 'Api\CitiesController@save');