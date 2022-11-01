<?php

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
// Ui 
Route::get('/', [App\Http\Controllers\UiController::class, 'index']);
Route::get('/posts', [App\Http\Controllers\UiController::class, 'postIndex']);
Route::get('/posts/{id}/details', [App\Http\Controllers\UiController::class, 'postDetailIndex'])->middleware('auth');
Route::get('/search_posts', [App\Http\Controllers\UiController::class, 'search']);
Route::get('/search_posts_by_category/{catId}', [App\Http\Controllers\UiController::class, 'searchByCategory']);



Route::post('/post/like/{postId}', [App\Http\Controllers\LikeDislikeController::class, 'like']);
Route::post('/post/dislike/{postId}', [App\Http\Controllers\LikeDislikeController::class, 'dislike']);

Route::post('/post/comment/{postId}', [App\Http\Controllers\CommentController::class, 'comment']);




// Admin 
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\admin\AdminDashboardController::class, 'index']);

    // User
    Route::get('/users', [App\Http\Controllers\admin\UserController::class, 'index']);
    Route::get('/users/{id}/edit', [App\Http\Controllers\admin\UserController::class, 'edit']);
    Route::post('/users/{id}/update', [App\Http\Controllers\admin\UserController::class, 'update']);
    Route::post('/users/{id}/delete', [App\Http\Controllers\admin\UserController::class, 'delete']);

    //Sell
    Route::resource('/sell', '\App\Http\Controllers\admin\SellController');
    //Partner
    Route::resource('partners', '\App\Http\Controllers\admin\PartnerController');
    //CustomerCount
    Route::get('/customer_count', [App\Http\Controllers\admin\CustomerCountController::class, 'index']);
    Route::post('/customer_count/create', [App\Http\Controllers\admin\CustomerCountController::class, 'create']);
    Route::post('/customer_count/{id}/update', [App\Http\Controllers\admin\CustomerCountController::class, 'update']);
    //Category
    Route::resource('/categories', '\App\Http\Controllers\admin\CategoryController');
    //Post
    Route::resource('/posts', '\App\Http\Controllers\admin\PostController');
    Route::post('/comment/{commentId}/show_hide', [\App\Http\Controllers\admin\PostController::class, 'showHideComment']);
});

// Blank Home 
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
