<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ManageController;
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
// in Web.php
//auth
Auth::routes();
Auth::routes(['register' => false]);


//resource
Route::resource('/blog', PostsController::class);
Route::resource('/category', CategoryController::class);



//name
Route::get('/', [PagesController::class, 'index']);
Route::get('/manage', [\App\Http\Controllers\PostsController::class, 'manage'])->name('manage');
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/manage/image/upload', [ManageController::class, 'uploadImage'])->name('manage.image.upload');
