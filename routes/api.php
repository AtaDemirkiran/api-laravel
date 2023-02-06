<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(ItemController::class)->group(function () {
    Route::get('/items','index');
    Route::post('/items','store');
    Route::get('/items/{id}','show');
    Route::put('/item/{id}','update');
    Route::delete('/item/{id}','delete');   
});

Route::controller(ProductController::class)->group(function(){

    Route::get('/products','index');
    Route::post('/products','store');    
    Route::get('/products/{id}','show');
    Route::post('/products/{id}','update');
    Route::post('/products-delete/{id}','destroy');
});