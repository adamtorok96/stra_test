<?php

Route::get('/', 'HomeController@index')->name('home.index');

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function ()
{
    Route::get('/', 'AuthController@index')->name('index');
    Route::post('login', 'AuthController@login')->name('login');
    Route::get('logout', 'AuthController@logout')->name('logout');
});