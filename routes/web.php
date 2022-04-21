<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

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


    Route::get('/',[HomeController::class,'home']);
    Route::view('/about', 'about')->middleware('auth');

Route::get('/article',[ArticleController::class,'create_article_page']);
Route::post('/article',[ArticleController::class,'post_article_page']);
Route::get('delete_article/{id}',[ArticleController::class,'delete_article']);

Route::get('/categories',[CategoryController::class,'category_list']);
Route::get('/add_category',[CategoryController::class,'add_category']);
Route::post('/save_category',[CategoryController::class,'save_category']);


Route::get('edit_category/{id}',[CategoryController::class,'edit_category']);
Route::post('update_category/{id}',[CategoryController::class,'update_category']);
Route::get('delete_category/{id}',[CategoryController::class,'delete_category']);


Route::get('/tags',[TagController::class,'tag_list']);
Route::get('/add_tag',[TagController::class,'add_tag']);
Route::post('/save_tag',[TagController::class,'save_tag']);



Route::get('edit_tag/{id}',[TagController::class,'edit_tag']);
Route::post('update_tag/{id}',[TagController::class,'update_tag']);
Route::get('delete_tag/{id}',[TagController::class,'delete_tag']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
