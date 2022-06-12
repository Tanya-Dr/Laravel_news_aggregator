<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ParserController as AdminParserController;

use App\Http\Controllers\ReviewController as ReviewController;
use App\Http\Controllers\OrderController as OrderController;

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Account\ProfileController as ProfileController;
use App\Http\Controllers\SocialController;

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

Route::get('/', function() {
    return view('info');
})->name('info');

Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
    Route::get('/', [NewsController::class, 'index'])
        ->name('index');
    Route::get('/category/{category}', [NewsController::class, 'showCategory'])
        ->name('category');
    Route::get('/source/{source}', [NewsController::class, 'showSource'])
        ->name('source');
    Route::get('/{slug}', [NewsController::class, 'show'])
        ->name('show');
});

Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'account', 'as' => 'account.'], function() {
        Route::get('/', AccountController::class)
            ->name('index');
        Route::get('/edit', [ProfileController::class, 'edit'])
            ->middleware('userLogin')
            ->name('edit');
        Route::post('/update/{user}', [ProfileController::class, 'update'])
            ->middleware('userLogin')
            ->name('update');
    });

    Route::group(['prefix' => 'order', 'as' => 'order.'], function() {
        Route::get('/makeOrder',[OrderController::class, 'makeOrder'])
            ->name('make');
        Route::post('/storeOrder',[OrderController::class, 'storeOrder'])
            ->name('store');
    });

    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('/',AdminController::class)
            ->name('index');
        Route::resource('/categories',AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/sources', AdminSourceController::class);
        Route::resource('/orders', AdminOrderController::class);
        Route::resource('/users', AdminUserController::class);
        Route::get('/parser', AdminParserController::class)
            ->name('parser');
    });
});

Route::group(['prefix' => 'review', 'as' => 'reviews.'], function() {
    Route::get('/', [ReviewController::class, 'showReviews'])
        ->name('index');
    Route::get('/leaveReview',[ReviewController::class, 'makeReview'])
        ->name('make')
        ->middleware('auth');
    Route::post('/storeReview',[ReviewController::class, 'storeReview'])
        ->name('store')
        ->middleware('auth');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth/{driver}/redirect', [SocialController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social.redirect');
    Route::any('/auth/{driver}/callback', [SocialController::class, 'callback'])
        ->where('driver', '\w+')
        ->name('social.callback');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
