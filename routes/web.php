<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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


// removing this as we will be making our own
// Route::get('/', function () {
    // return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');



// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Auth::routes(['verify' => true]);

Route::get('/home/my-tokens', [HomeController::class, 'getTokens'])->name('personal-tokens');
Route::get('/home/my-clients', [HomeController::class, 'getClients'])->name('personal-clients');
Route::get('/home/authorized_clients', [HomeController::class, 'getAuthorizedClients'])->name('authorized-clients');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/', function(){
	return view('welcome');
})->middleware('guest');
