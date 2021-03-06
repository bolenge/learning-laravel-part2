<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('pages.home', [
        'active' => "home"
    ]);
});

Route::resource('user', 'UserController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('post', 'PostController', ['except' => 'show', 'edit', 'update']);

Route::post('/post/add', [App\Http\Controllers\PostController::class, 'store']);
Route::get('/post/tag/{tag}', [App\Http\Controllers\PostController::class, 'indexTag']);
Route::get('language', [PostController::class, 'language']);
