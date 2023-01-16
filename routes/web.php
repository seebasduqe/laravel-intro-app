<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PhpSpreadsheet;
use App\Http\Controllers\PhpSpreadsheetController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
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

    $posts = Post::latest()->with('user')->latest()->paginate();

    return view('home', ['posts' => $posts]);
})->name('home');

Route::get('buscar', [PageController::class, 'buscar'])->name('home.buscar');

Route::controller(PostController::class)->group(function (){

    Route::get('posts', 'index')->name('posts.index');
    Route::get('blog/posts/buscar/{id}', 'show')->name('posts.buscar');
    
    Route::get('blog/posts/nuevo', 'formNewPost')->name('posts/nuevo');
    Route::post('blog/posts/postPost', 'postPost')->name('posts.postPost');
    
    Route::get('blog/posts/editar/{id}', 'formEditPost')->name('post/editar');
    Route::put('blog/putPost/{id}', 'putPost')->name('post.putPost');

    Route::delete('blog/posts/delete/{id}', 'deletePost')->name('post/delete');


    //Rutas para importar y exportar excel
    Route::post('export-posts', 'exportPosts')->name('exportPosts');
    //Exportar multiples hojas
    Route::get('export-two-sheet', 'exportTwoSheet')->name('exportTwoSheet');


})->middleware(['auth', 'verified']);



Route::redirect('/dashboard', '/')->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//Rutas para excel

Route::controller(UserController::class)->group(function(){
    Route::get('file-import', 'importView')->name('viewImport');
    Route::get('export-users', 'exportUsers')->name('exportUsers');
});




require __DIR__.'/auth.php';