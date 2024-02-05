<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BookController::class , 'ShowBook'])->name('show');


Route::post('/', [BookController::class, 'addBook'])->name('books');

Route::delete('/delete/{id}', [BookController::class, 'delete'])->name('delete.book');

Route::put('/update/{id}', [BookController::class, 'update'])->name('update.book');


Route::get('/books/{id}', [BookController::class , 'seeBookDetails'])->name('books.show');


Route::post('/books', [BookController::class, 'ReseveAbook'])->name('reserve');


Route::get('/main', [BookController::class , 'MainPage'])->name('main');
