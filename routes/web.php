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

    Route::get('categorie', [CategorieController::class, 'create'])->name('categorie.create');
    Route::post('categorie', [CategorieController::class, 'store'])->name('categorie.post');

    Route::get('categories', [CategorieController::class, 'index'])->name('categories.index');

    Route::get('categorie/{id}/delete', [CategorieController::class, 'destroy'])->name('categorie.delete');

    Route::get('categorie/{id}/edit', [CategorieController::class, 'edit'])->name('categorie.edit');
    Route::post('categorie/{id}/update', [CategorieController::class, 'update'])->name('categorie.update');

    Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('article/{id}', [ArticleController::class, 'show'])->name('article.show');
    Route::get('article', [ArticleController::class, 'create'])->name('article.create');
    Route::post('article', [ArticleController::class, 'store'])->name('article.store');
    Route::get('article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::post('article/{id}/update', [ArticleController::class, 'update'])->name('article.update');

    Route::post('cover/create', [ArticleController::class, 'saveImageCover'])->name('article.cover');
    Route::post('cover/destroy', [ArticleController::class, 'destroyImageCover'])->name('article.destroy');
});
