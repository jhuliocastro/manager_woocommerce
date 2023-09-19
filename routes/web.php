<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Login;
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

Route::get('/', [Login::class, 'index'])->name('login');
Route::post('/login', [Login::class, 'login'])->name('login.post');

Route::prefix('/dashboard')->middleware('auth')->group(function(){
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard.index');
});
