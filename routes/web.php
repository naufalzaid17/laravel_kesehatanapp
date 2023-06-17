<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SpesialisController;
use App\Http\Controllers\ApiSpesialisController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\ApotekController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ApiArticleController;
use App\Http\Controllers\ApiDokterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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
    return redirect(route('login'));
});
Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    // Route::resource('/rumahsakit', RumahSakitController::class)->except('create');
    // Route::resource('/apotek', ApotekController::class)->except('create');

    Route::group(['middleware' => ['role:Admin']], function(){
        Route::resource('/users', UserController::class)->except('show');
        Route::get('/users/roles/{id}', [UserController::class, 'roles'])->name('users.roles');
        Route::put('/users/roles/{id}', [UserController::class, 'setRole'])->name('users.set_role');
        Route::resource('/role', RoleController::class)->except('create', 'show', 'edit', 'update');
        Route::resource('/spesialis', SpesialisController::class)->except('create', 'show');

    });


    Route::group(['middleware' => ['role:Dokter']], function(){
        Route::resource('/article', ArticleController::class);
    });

});

// Spesialis
Route::get('/api/spesialis/index', [ApiSpesialisController::class, 'index']);
Route::get('/api/spesialis/{id}', [ApiSpesialisController::class, 'show']);
// Route::post('/api/spesialis/store', [ApiSpesialisController::class, 'store']);

// Article
Route::get('/api/article/index', [ApiArticleController::class, 'index']);

// Dokter
Route::get('/api/dokter/index', [ApiDokterController::class, 'index']);
Route::get('/api/dokter/{id}', [ApiDokterController::class, 'show']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
