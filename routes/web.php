<?php

use App\Http\Controllers\HaberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ItemController;
use App\Models\Haber;

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

Route::get('/products',[ProductController::class,'index'])->name('products.index');

Route::get('/test',[ItemController::class,'index']);

Route::group(['prefix' => 'news'], function (){

    Route::get('/',[HaberController::class,'index']);
    Route::get('/{id}',[HaberController::class,'show'])->name('newShow');
    Route::put('/update/{id}', [HaberController::class, 'update'])->name('update');

});