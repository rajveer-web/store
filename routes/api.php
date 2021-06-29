<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('index','Category\CategoryController@index');
Route::get('index/{id}','Category\CategoryController@show');
Route::post('index','Category\CategoryController@store');
Route::put('index/{id}','Category\CategoryController@update'); 
Route::delete('index/{id}','Category\CategoryController@destroy');

Route::get('product','product\ProductController@product');
Route::get('product/{id}','product\ProductController@show');
Route::post('product','product\ProductController@store');
Route::put('product/{id}','product\ProductController@update'); 
Route::delete('product/{id}','product\ProductController@destroy');

Route::get('blog','blog\BlogController@blog');
Route::get('blog/{id}','blog\BlogController@show');
Route::post('blog','blog\BlogController@store');
Route::put('blog/{id}','blog\BlogController@update'); 
Route::delete('blog/{id}','blog\BlogController@destroy');


Route::get('nutrition','nutrition\NutritionController@nutrition');
Route::get('nutrition/{id}','nutrition\NutritionController@show');
Route::post('nutrition','nutrition\NutritionController@store');
Route::put('nutrition/{id}','nutrition\NutritionController@update'); 
Route::delete('nutrition/{id}','nutrition\NutritionController@destroy');
