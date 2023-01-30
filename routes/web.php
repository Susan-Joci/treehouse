<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NewsletterUserController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/newsletter/signup', [NewsletterUserController::class, 'signupIndex'])->name('signup');
Route::post('/newsletter/signup', [NewsletterUserController::class, 'signup'])->name('signup_post');
Route::get('/newsletter/users', [NewsletterUserController::class, 'index'])->name('newsletter');
Route::post('/newsletter/users', [NewsletterUserController::class, 'usersUpdate']);
Route::post('/submit', [NewsletterController::class, 'create']);
