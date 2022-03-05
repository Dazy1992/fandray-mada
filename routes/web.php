<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ConversationsController;

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

Route::get('/',[GroupController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', [ConversationsController::class, 'index'])->name('home');
Route::get('/conversations', [ConversationsController::class, 'index'])->name('conversations');
Route::get('/conversations/{user}', [ConversationsController::class, 'index']);

require __DIR__.'/auth.php';
