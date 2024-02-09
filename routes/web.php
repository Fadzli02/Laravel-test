<?php

use App\Http\Controllers\Authent;
use App\Http\Controllers\GalleryController;
use App\Models\GalerryController;
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
    return view('welcome');
});


Route::get('/upload',function(){
    return view('home.uplod');
});
// Route::get('/login',[Authent::class,'login']);

Route::middleware('guest')->group(function () {
    Route::post('/register', [Authent::class, 'register']);
    Route::view('/register', 'verif.register');

    Route::view('/login', 'verif.login')->name('login');
    Route::post('/login', [Authent::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [GalleryController::class, 'index']);

    Route::get('/keluar', [Authent::class, 'keluar']);
    Route::post('/keluar', [Authent::class, 'keluar']);
});
