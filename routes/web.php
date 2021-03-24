<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\WidgetController;
use App\Http\Controllers\Admin\PaygateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MenuController;
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
    Route::get('/login', [LoginController::class, 'login']);
    Route::post('/login', [LoginController::class, 'postLogin']);
    Route::get('/logout', [LoginController::class, 'logout']);
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
        Route::get('/index', [WidgetController::class, 'index']);
        Route::post('{id}/update', [WidgetController::class, 'update']);
        Route::get('{id}/delete', [WidgetController::class, 'delete']);
        Route::post('create',[WidgetController::class, 'create']);
    });

    Route::group(['prefix' => 'paygates'], function () {
        Route::get('index', [PaygateController::class, 'index']);
        Route::get('{id}/edit', [PaygateController::class, 'edit']);
        Route::post('{id}/update', [PaygateController::class, 'update']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('index', [UserController::class, 'index']);
        Route::get('{id}/edit', [UserController::class, 'edit']);
        Route::post('{id}/update', [UserController::class, 'update']);
        Route::get('{id}/delete', [UserController::class, 'delete']);
    });

    Route::group(['prefix' => 'menus'], function () {
        Route::get('index', [MenuController::class, 'index']);
        Route::get('{id}/edit', [MenuController::class, 'edit']);
        Route::post('{id}/update', [MenuController::class, 'update']);
        Route::post('create', [MenuController::class, 'store']);
        Route::get('show/{id}', [MenuController::class, 'show']);
        Route::get('create', [MenuController::class, 'create']);
        Route::get('{id}/delete', [MenuController::class, 'destroy']);
        Route::get('add', [MenuController::class, 'add']);
    });
});
