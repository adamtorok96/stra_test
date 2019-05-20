<?php

Route::get('/', 'HomeController@index')->name('home.index');

Route::group([
    'prefix' => 'contentEditor',
    'as' => 'contentEditor.',
    'middleware' => 'permission:show content editor'
], function ()
{
   Route::get('/', 'ContentEditorController@index')->name('index');
});

Route::group([
    'prefix' => 'loggedInUsers',
    'as' => 'loggedInUsers.',
    'middleware' => 'permission:show logged in users'
], function ()
{
    Route::get('/', 'LoggedInUsersController@index')->name('index');
});