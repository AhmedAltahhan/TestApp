<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\student\ProfileController;
use App\Http\Controllers\Web\student\TestController;

Route::middleware(['auth','role:student'])->prefix('student')->group(function () {
    Route::resource('information', ProfileController::class);
    Route::get('/test',[TestController::class,'test'])->name('show_test');
    Route::get('/{test}',[TestController::class,'start'])->name('start_test');
    Route::post('/my_result',[TestController::class,'result'])->name('my_result');
    Route::get('/serch_test',[TestController::class,'search']);

});

