<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SpesialisController;
use App\Http\Controllers\ApiSpesialisController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\ApotekController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RoleController;

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
Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/spesialis', SpesialisController::class)->except('create', 'show');
    Route::resource('/rumahsakit', RumahSakitController::class)->except('create');
    Route::resource('/apotek', ApotekController::class)->except('create');
    Route::resource('/article', ArticleController::class);
    Route::resource('/role', RoleController::class)->except('create', 'show', 'edit', 'update');
    Route::post('/role/permission', [RoleController::class, 'addPermission'])->name('roles.add_permission');
    Route::get('/role/role-permission', [RoleController::class, 'rolePermission'])->name('roles.roles_permission');
    Route::get('role/{id}', [RoleController::class, 'roles'])->name('roles');
});


Route::get('/api/spesialis/index', [ApiSpesialisController::class, 'index']);
Route::post('/api/spesialis/store', [ApiSpesialisController::class, 'store']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
