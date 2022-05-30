<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

use App\Http\Controllers\UserController as UserController;


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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('info');
})->name('info');

Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
    Route::get('/', [NewsController::class, 'index'])
        ->name('index');
    Route::get('/category/{category}', [NewsController::class, 'showCategory'])
        ->name('category');
    Route::get('/source/{source}', [NewsController::class, 'showSource'])
        ->name('source');
    Route::get('/{news}', [NewsController::class, 'show'])
        ->name('show');
});

Route::get('/reviews', [UserController::class, 'showReviews'])->name('reviews');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/',AdminController::class)
        ->name('index');
    Route::resource('/categories',AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/sources', AdminSourceController::class);
    Route::resource('/orders', AdminOrderController::class);
});

Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
    Route::match(['get', 'post'],'/auth',[UserController::class, 'auth'])
        ->name('auth');
    Route::match(['get', 'post'],'/feedback',[UserController::class, 'feedback'])
        ->name('feedback');
    Route::match(['get', 'post'],'/dataUpload',[UserController::class, 'dataUpload'])
        ->name('dataUpload');
});
