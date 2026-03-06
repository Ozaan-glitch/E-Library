<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenresController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {


// Route Auth
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::get('/register',[AuthController::class, 'register'])->name('auth.register');
Route::post('/login',[AuthController::class, 'actionlogin'])->name('action.login');
Route::post('/register',[AuthController::class, 'actionregister'])->name('action.register');
// End Route Auth
});

Route::middleware('auth')->group(function(){


// Route genre
Route::get('/logout',[AuthController::class, 'logout'])->name('action.logout');
Route::get('/dashboard',[AuthController::class, 'dashboard'])->name('dashboard');
 Route::get('/genre',[GenresController::class, 'index'])->name('genre.index');
 Route::get('/genre/create',[GenresController::class, 'create'])->name('genre.create');
 Route::post('/genre/create',[GenresController::class, 'store'])->name('genre.store');
 Route::get('/genre/edit/{id}',[GenresController::class, 'edit'])->name('genre.edit');
 Route::put('/genre/edit/{id}',[GenresController::class, 'update'])->name('genre.update');
 Route::delete('/genre/delete/{id}',[GenresController::class, 'destroy'])->name('genre.destroy');

//  END ROUTE GENRE


// Route Author
Route::get('/author', [AuthorsController::class,'index'])->name('penulis.index');
Route::get('/author/create', [AuthorsController::class, 'create'])->name('penulis.create');
Route::post('/author/create', [AuthorsController::class, 'store'])->name('penulis.store');
Route::get('/author/show/{id}', [AuthorsController::class, 'show'])->name('penulis.show');
Route::delete('/author/delete/{id}',[AuthorsController::class,'destroy'])->name('penulis.destroy');
Route::get('/author/edit/{id}', [AuthorsController::class, 'edit'])->name('penulis.edit');
Route::put('/author/update/{id}', [AuthorsController::class, 'update'])->name('penulis.update');
// End Route Author

// Books
Route::get('/books', [BooksController::class, 'index'])->name('books.index');
Route::get('/books/create',[BooksController::class, 'create'])->name('books.create');
Route::post('/books/store',[BooksController::class, 'store'])->name('books.store');
Route::get('/books/detail/{id}', [BooksController::class, 'detail'])->name('books.detail');
Route::delete('/books/delete/{id}', [BooksController::class, 'destroy'])->name('books.delete');
Route::get('/books/edit/{id}', [BooksController::class, 'edit'])->name('books.edit');
Route::put('/books/update/{id}', [BooksController::class, 'update'])->name('books.update');
// EndBooks
});