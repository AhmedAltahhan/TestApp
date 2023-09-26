<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\ProfileController;
use App\Http\Controllers\Web\Admin\StudentController;
use App\Http\Controllers\Web\Admin\TestController;
use App\Http\Controllers\Web\Admin\QuestionController;

Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {
    Route::resource('profile', ProfileController::class);
    Route::resource('students', StudentController::class);
    Route::get('/result',[StudentController::class,'result'])->name('show_result');
    Route::resource('tests', TestController::class);
    Route::resource('questions', QuestionController::class);
    Route::get('/student',[StudentController::class,'search']);
    Route::get('/question',[QuestionController::class,'search']);
    Route::get('/test',[TestController::class,'search']);

});

