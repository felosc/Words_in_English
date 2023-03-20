<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\UserController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(WordController::class)->group(function () {
    Route::get('words.index', 'index')->name('word.index');
    Route::get('words', 'getRandomWords')->name('word.gameword');
    Route::post('word.answer', 'CompareAnswer')->name('word.answer');
    Route::get('word.create', 'create')->name('word.create');
    Route::post('word.store', [WordController::class, 'store'])->name('word.store');
    Route::get('word.show/{id}', [WordController::class, 'show'])->name('word.show');
    Route::get('word.edit/{id}', [WordController::class, 'edit'])->name('word.edit');
    Route::put('word.update/{word}', [WordController::class, 'update'])->name('word.update');
    Route::delete('word.delete/{word}', [WordController::class, 'destroy'])->name('word.delete');
});

Route::middleware('auth')->group(function () {
    Route::delete('user.delete/{user}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('user.edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('user.show/{user}', [UserController::class, 'show'])->name('user.show');
    Route::put('user.update/{user}', [UserController::class, 'update'])->name('user.update');
    Route::post('user.store', [WordController::class, 'store'])->name('user.store');
    Route::get('user.create', [WordController::class, 'create'])->name('user.create');
    Route::get('user.index', [UserController::class, 'index'])->name('user.index');
});





require __DIR__ . '/auth.php';
