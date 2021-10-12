<?php


use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api'], function (){
    Route::group(['prefix' => 'products'], function (){
        Route::get('','ProductController@index');
    });
});
