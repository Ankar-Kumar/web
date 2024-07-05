<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[BookController::class,'index'])->name('books.index');
Route::get('/book/{id}/show', [BookController::class, 'show'])->name('books.show');
Route::get('/book/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

//for update book
Route::get('books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::patch('/books/{book}', [BookController::class, 'update'])->name('books.update');