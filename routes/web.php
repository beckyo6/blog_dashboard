<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;

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
Route::get('login', [AuthController::class, 'form_login'])->name('login');

Route::get('/signin', [AuthController::class, 'signin']); //to remove

Route::post('login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function () {

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('profil', [AuthController::class, 'getUser'])->name('profil');

    Route::get('/', function () {
    return view('home');
    });

    Route::get('categorie', [CategorieController::class, 'create'])->name('categorie');
    Route::post('categorie', [CategorieController::class, 'store'])->name('categorie.post');

    Route::get('categories', [CategorieController::class, 'index'])->name('categories.index');

    Route::get('categorie/{id}/delete', [CategorieController::class, 'destroy'])->name('categorie.delete');

    Route::get('categorie/{id}/edit', [CategorieController::class, 'edit'])->name('categorie.edit');
    Route::post('categorie/{id}/update', [CategorieController::class, 'update'])->name('categorie.update');

    Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');


});
