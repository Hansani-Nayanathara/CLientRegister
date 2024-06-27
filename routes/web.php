<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


Route::middleware('auth')->group(function () {
    Route::view('/profile', 'home.profile')->name('profile');
});

Route::get('/signin', [HomeController::class,'signin'])->name('signin');
Route::get('/login', [HomeController::class,'login'])->name('login');
Route::post('/signin', [HomeController::class,'signinPost'])->name('signin.post');
Route::post('/login', [HomeController::class,'loginPost'])->name('login.post');
