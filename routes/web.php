<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
Route::get('product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
Route::post('/add-book', [App\Http\Controllers\ProductController::class, 'store'])->name('add-book');
Route::get('/index',[MainController::class,'index'])->name('index');
Route::get('fetch-data', [App\Http\Controllers\ProductController::class, 'fetchdata']);
Route::get('edit-data/{id}', [App\Http\Controllers\ProductController::class, 'editProduct']);
Route::post('update-data/{id}',[App\Http\Controllers\ProductController::class, 'updateProduct']);
Route::delete('delete-product/{id}',[App\Http\Controllers\ProductController::class, 'delete']);
Route::get('categorie_list',[App\Http\Controllers\CategorieController::class, 'index']);
Route::post('add-categries',[App\Http\Controllers\CategorieController::class, 'store']);
Route::get('fetch-categries',[App\Http\Controllers\CategorieController::class, 'fetchCategries']);
Route::get('editcategries-data/{id}',[App\Http\Controllers\CategorieController::class, 'editCategries']);
Route::post('update-categriesdata/{id}',[App\Http\Controllers\CategorieController::class, 'updateCategries']);
Route::delete('delete-categriesdata/{id}',[App\Http\Controllers\CategorieController::class, 'delete']);
Auth::routes();