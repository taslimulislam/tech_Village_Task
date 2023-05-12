<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ResultController;

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


Route::get('/', [UserController::class, 'userList'])->name('userlist');
Route::get('/task-2', [ResultController::class, 'index'])->name('results');
Route::get('/task-2/3rd-highest', [ResultController::class, 'getfilterdData'])->name('3rdHighest');
