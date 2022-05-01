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

    /**
     * Grouper toutes les ressources de categories,
     * - Suppression utilise la methode DELETE categories/{id} au lieu de GET /categories/{id}/delete
     * - Modification utilise la methode UPDATE categories/{id} au lieu de GET /categories/{id}/edit
     */
    Route::resource('categories', CategorieController::class);

    Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');

    Route::get('article', [ArticleController::class, 'create'])->name('article');
    Route::post('article', [ArticleController::class, 'store'])->name('article.post');

});
