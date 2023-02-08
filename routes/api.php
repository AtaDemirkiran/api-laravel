<?php

use App\Http\Controllers\AuthController;
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
 

// Register method

Route::post('/register',[AuthController::class,'register']); 

// Public routes 
Route::controller(ProductController::class)->group(function(){
     Route::get('/products','index');
     Route::get('/products/{id}','show');
     Route::get('/products/search/{name}','search');
});


// Private routes
Route::group(['middleware'=>['auth:sanctum']],function(){


    Route::controller(ProductController::class)->group(function(){
        
        Route::post('/products','store');    
        Route::put('/products/{id}','update');
        Route::delete('/products/{id}','destroy');
    
    });
    
});


// Route::controller(ItemController::class)->group(function () {
//     Route::get('/items','index');
//     Route::post('/items','store');
//     Route::get('/items/{id}','show');
//     Route::put('/item/{id}','update');
//     Route::delete('/item/{id}','delete');   
// });

