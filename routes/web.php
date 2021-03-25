<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashBoardController;

/**
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

Route::group(['prefix' => '/admin'], function () {
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'postLogin']);
    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);
});

Route::get('login', [\App\Http\Controllers\FrontEnd\LoginController::class, 'login']);
Route::post('login', [\App\Http\Controllers\FrontEnd\LoginController::class, 'postLogin']);
Route::get('register', [\App\Http\Controllers\FrontEnd\LoginController::class, 'register']);
Route::post('register', [\App\Http\Controllers\FrontEnd\LoginController::class, 'postRegister']);
Route::get('logout', [\App\Http\Controllers\FrontEnd\LoginController::class, 'logout']);
Route::get('forgot-password', [\App\Http\Controllers\FrontEnd\LoginController::class, 'forgotPassword']);
Route::post('forgot-password', [\App\Http\Controllers\FrontEnd\LoginController::class, 'forgotPassword']);

Route::group(['middleware' => 'checkUserLogin'], function () {
    // Route front end has required login
});

/**
 * Route admin panel
 * Middelware
 */
Route::group(['middleware' => 'checkAdminLogin', 'prefix' => 'admin'], function () {
    Route::get('/', [DashBoardController::class, 'index']);

    Route::group(['prefix' => 'widgets'], function () {
        Route::get('/index', [\App\Http\Controllers\Admin\WidgetController::class, 'index']);
        Route::post('{id}/update', [\App\Http\Controllers\Admin\WidgetController::class, 'update']);
        Route::get('{id}/delete', [\App\Http\Controllers\Admin\WidgetController::class, 'delete']);
        Route::post('create',[\App\Http\Controllers\Admin\WidgetController::class, 'create']);
    });

    Route::group(['prefix' => 'paygates'], function () {
        Route::get('index', [\App\Http\Controllers\Admin\PaygateController::class, 'index']);
        Route::get('{id}/edit', [\App\Http\Controllers\Admin\PaygateController::class, 'edit']);
        Route::post('{id}/update', [\App\Http\Controllers\Admin\PaygateController::class, 'update']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('index', [\App\Http\Controllers\Admin\UserController::class, 'index']);
        Route::get('{id}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit']);
        Route::post('{id}/update', [\App\Http\Controllers\Admin\UserController::class, 'update']);
        Route::get('{id}/delete', [\App\Http\Controllers\Admin\UserController::class, 'delete']);
    });

    Route::group(['prefix' => 'menus'], function () {
        Route::get('index', [\App\Http\Controllers\Admin\MenuController::class, 'index']);
        Route::get('{id}/edit', [\App\Http\Controllers\Admin\MenuController::class, 'edit']);
        Route::post('{id}/update', [\App\Http\Controllers\Admin\MenuController::class, 'update']);
        Route::post('create', [\App\Http\Controllers\Admin\MenuController::class, 'store']);
        Route::get('show/{id}', [\App\Http\Controllers\Admin\MenuController::class, 'show']);
        Route::get('create', [\App\Http\Controllers\Admin\MenuController::class, 'create']);
        Route::get('{id}/delete', [\App\Http\Controllers\Admin\MenuController::class, 'destroy']);
        Route::get('add', [\App\Http\Controllers\Admin\MenuController::class, 'add']);
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, 'index']);
        Route::get('/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create']);
        Route::post('/add', [\App\Http\Controllers\Admin\CategoryController::class, 'store']);
        Route::get('{id}/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'edit']);
        Route::post('{id}/update', [\App\Http\Controllers\Admin\CategoryController::class, 'update']);
        Route::get('{id}/delete', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
        Route::post('search', [\App\Http\Controllers\Admin\CategoryController::class, 'search']);
    });

    Route::group(['prefix' => 'article'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\ArticleController::class, 'index']);
        Route::get('/create', [\App\Http\Controllers\Admin\ArticleController::class, 'create']);
        Route::post('add', [\App\Http\Controllers\Admin\ArticleController::class, 'store']);
        Route::get('{id}/edit', [\App\Http\Controllers\Admin\ArticleController::class, 'edit']);
        Route::post('{id}/update', [\App\Http\Controllers\Admin\ArticleController::class, 'update']);
        Route::get('{id}/delete', [\App\Http\Controllers\Admin\ArticleController::class, 'destroy']);
        Route::post('search', [\App\Http\Controllers\Admin\ArticleController::class, 'search']);
    });

    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\BlogController::class, 'index']);
        Route::get('/create', [\App\Http\Controllers\Admin\BlogController::class, 'create']);
        Route::post('add', [\App\Http\Controllers\Admin\BlogController::class, 'store']);
        Route::get('{id}/edit', [\App\Http\Controllers\Admin\BlogController::class, 'edit']);
        Route::post('{id}/update', [\App\Http\Controllers\Admin\BlogController::class, 'update']);
        Route::get('{id}/delete', [\App\Http\Controllers\Admin\BlogController::class, 'destroy']);
        Route::post('search', [\App\Http\Controllers\Admin\BlogController::class, 'search']);
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\TagsController::class, 'index']);
        Route::post('/create', [\App\Http\Controllers\Admin\TagsController::class, 'store']);
        Route::post('{id}/update', [\App\Http\Controllers\Admin\TagsController::class, 'update']);
        Route::get('{id}/delete', [\App\Http\Controllers\Admin\TagsController::class, 'destroy']);
    });

    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\ContactController::class, 'index']);
        Route::post('/search', [\App\Http\Controllers\Admin\ContactController::class, 'search']);
    });
});
