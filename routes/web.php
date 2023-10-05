<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Auth\AuthController;

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
    return redirect()->route('login');
});

Route::group(['middleware' => 'guest'] , function()
{
    Route::post('/login', [AuthController::class, 'checklogin'])->name('checklogin');
    Route::get('login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth.basic'] , function()
{
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
