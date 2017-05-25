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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function (){

    Route::group(['prefix' => 'categories'], function (){
        Route::get('/', ['as' => 'app.categories.index', 'uses' => 'VrCategoriesController@index']);
        Route::get('/create', ['as' => 'app.categories.create', 'uses' => 'VrCategoriesController@create']);
        Route::post('/create', [ 'uses' => 'VrCategoriesController@store']);

        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', ['uses' => 'VrCategoriesController@show']);
            Route::get('/show', ['as' => 'app.categories.show', 'uses' => 'VrCategoriesController@show']);
            Route::get('/edit', ['as' => 'app.categories.edit', 'uses' => 'VrCategoriesController@edit']);
            Route::post('/edit', ['uses' => 'VrCategoriesController@update']);
            Route::delete('/delete', ['as' => 'app.categories.destroy', 'uses' => 'VrCategoriesController@destroy']);

        });
    });
});