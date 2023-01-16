<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(PostController::class)->group(function (){

    Route::get('posts', 'index')->name('posts.index');
    Route::get('blog', 'getPosts')->name('blog');
    Route::get('blog/posts/buscar/{id}', 'show')->name('posts/buscar');
    
    Route::get('blog/posts/nuevo', 'formNewPost')->name('posts/nuevo');
    Route::post('blog/posts/postPost', 'postPost')->name('posts.postPost');
    
    Route::get('blog/posts/editar/{id}', 'formEditPost')->name('post/editar');
    Route::put('blog/putPost/{id}', 'putPost')->name('post.putPost');

    Route::delete('blog/posts/delete/{id}', 'deletePost')->name('post/delete');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';