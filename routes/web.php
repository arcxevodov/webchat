<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('home', ['messages' => Message::latest()->get()]);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::post('/home', [HomeController::class, 'sendMessage'])
    ->name('send');

Route::delete('/home', [HomeController::class, 'deleteMessage'])
    ->name('del');

Route::patch('/home', [HomeController::class, 'editMessage'])
    ->name('edit');
