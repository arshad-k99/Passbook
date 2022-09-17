<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
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



Route::get('/dashboard', [ClassController::class, 'dashboard'])->middleware(['auth','user'])->name('dashboard');


Route::get('/add-class', [ClassController::class, 'index'])->middleware(['auth','user'])->name('add-class');

Route::post('/add-class', [ClassController::class, 'store'])->middleware(['auth','user'])->name('add-class');
Route::get('/students-list', [StudentController::class, 'index'])->middleware(['auth','user'])->name('students-list');
Route::get('/transaction-search', [TransactionController::class, 'index'])->middleware(['auth','user'])->name('transaction-search');
Route::get('/search', [TransactionController::class, 'search'])->middleware(['auth','user'])->name('user.search');

Route::get('/transaction-create/{id}', [TransactionController::class, 'create'])->middleware(['auth','user'])->name('transaction-create');
Route::post('/transaction-store', [TransactionController::class, 'store'])->middleware(['auth','user'])->name('transaction-store');

Route::get('/transaction-list', [TransactionController::class, 'list'])->middleware(['auth','user'])->name('transaction-list');

Route::post('/transaction-list', [TransactionController::class, 'transaction_search'])->middleware(['auth','user'])->name('transaction-list-search');
Route::get('/transaction-show/{id}', [TransactionController::class, 'show'])->middleware(['auth','user'])->name('transaction-show');
Route::get('/transactions', [TransactionController::class, 'student_show'])->middleware(['auth','student'])->name('transactions');
Route::post('/transaction-update', [TransactionController::class, 'update'])->middleware(['auth','user'])->name('transaction-update');
Route::get('/transaction-edit/{id}', [TransactionController::class, 'edit'])->middleware(['auth','user'])->name('transaction-edit');
Route::get('/profile', [TransactionController::class, 'profile'])->middleware(['auth',])->name('profile');
require __DIR__.'/auth.php';
