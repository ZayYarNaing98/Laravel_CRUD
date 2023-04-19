<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\PostsController;

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

Route::get('/', function(){
    return view('welcome');
});

Route::resource('/blog', BlogsController::class);
Route::resource('/post', PostsController::class);

Route::get('/newblog',[BlogController::class,('index')])->name('newblog.index');
Route::get('newblog/create',[BlogController::class,('create')])->name('newblog.create');
Route::post('newblog/store',[BlogController::class,('store')])->name('newblog.store');
Route::get('newblog/show/{blog}',[BlogController::class,('show')])->name('newblog.show');
Route::get('newblog/edit/{blog}',[BlogController::class,('edit')])->name('newblog.edit');
Route::post('newblog/update/{blog}',[BlogController::class,('update')])->name('newblog.update');
Route::post('newblog/destroy/{blog}',[BlogController::class,('destroy')])->name('newblog.destroy');

Route::get('/admin', [AdminController::class, ('index')])->name('admin');
Route::get('/admin/widget', [AdminController::class, ('widget')])->name('admin.widget');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
