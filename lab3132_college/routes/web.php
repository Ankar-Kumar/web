<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/',[EmployeeController::class,'index'])->name('employees.index');
Route::get('/employ/{id}/show', [EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employ/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employs', [EmployeeController::class, 'store'])->name('employees.store');
Route::delete('/employs/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('employs/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
