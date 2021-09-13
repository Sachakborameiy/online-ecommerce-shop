<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\Mobile;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index.desktop.index');
});

Route::get('index', [MainController::class,'index']);
Route::get('new_product', [MainController::class,'new_product']);
Route::get('best_product', [MainController::class,'product_list']);
Route::get('thrify_shopping', [MainController::class,'thrify_shopping']);
Route::get('goods', [MainController::class,'special_goods']);
Route::get('goods_view', [MainController::class,'good_view']);

// redirect mobile 
Route::get('m', [Mobile::class,'index']);


// Route::get('about', [MainController::class,'about']);

// Route::get('m2',[MainController::class,'mobile'])
