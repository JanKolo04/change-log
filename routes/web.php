<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AuthController;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [CategoryController::class, 'showAll']);

    Route::get('/category/{id}', [
        CategoryController::class, 'getCategoryModules'
    ])->whereNumber('id');
    
    Route::get('/category/{c_id}/module/{m_id}', [
        ModuleController::class, 'showData'
    ])->whereNumber('c_id', 'm_id');
    
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});