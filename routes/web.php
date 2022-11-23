<?php

use App\Http\Controllers\UiController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
// UI routes 
Route::get('/', [UiController::class, 'index']);

// Admin 
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\admin\AdminDashboardController::class, 'index']);

    //User
    Route::get('/users', [App\Http\Controllers\admin\UserController::class, 'index']);
    Route::get('/users/{id}/edit', [App\Http\Controllers\admin\UserController::class, 'edit']);
    Route::post('/users/{id}/delete', [App\Http\Controllers\admin\UserController::class, 'delete']);
    Route::post('/users/{id}/update', [App\Http\Controllers\admin\UserController::class, 'update']);

    //Category
    Route::resource('/category', 'App\Http\Controllers\admin\CategoryController');

    //Blog
    Route::resource('/blog', 'App\Http\Controllers\admin\BlogController');
});



// // Blank Home 
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
