<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\IndexController as AdminController;

use \App\Http\Controllers\AuthController;


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

Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{idCategory}', [NewsController::class, 'showCategory'])
    ->where('idCategory','\d+')
    ->name('news.category');
Route::get('/news/{idCategory}/{id}', [NewsController::class, 'show'])
    ->where('idCategory','\d+')
    ->where('id','\d+')
    ->name('news.show');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/',AdminController::class)
        ->name('index');
    Route::resource('/categories',AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

Route::get('/auth', [AuthController::class, 'index'])
    ->name('auth');
