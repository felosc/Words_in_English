<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WordController;

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
    Route::get('words', 'getRandomWords')->name('word.gameword');
    Route::post('word.answer', 'CompareAnswer')->name('word.answer');
    Route::get('word.create', 'create')->name('word.create');
    Route::post('word.store', [WordController::class, 'store'])->name('word.store');
    //Route::get('word/{id}', [WordController::class, 'show'])->name('word.show');
    //Route::get('/word', [WordController::class, ''])->name('word.delete');
    //Route::get('/word', [WordController::class, ''])->name('word.update');
    //Route::get('/word', [WordController::class, ''])->name('word.words');
});

Route::middleware('auth')->group(function () {
    //Route::delete('/user', [WordController::class, ''])->name('user.delete');
    //Route::put('/user', [WordController::class, ''])->name('user.update');
    //Route::get('/user', [WordController::class, ''])->name('user.edit');
    //Route::get('/user', [WordController::class, ''])->name('user.show');
    //Route::post('/user', [WordController::class, ''])->name('user.store');
    //Route::get('/user', [WordController::class, ''])->name('user.create');
    //Route::get('/user', [WordController::class, ''])->name('user.index');
});





require __DIR__ . '/auth.php';
