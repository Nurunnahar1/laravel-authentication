<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class, 'index']);
Route::get('/login',[UserController::class, 'loginPage'])->name('login.page');

Route::get('/registration',[UserController::class, 'registrationPage'])->name('registration.page');
Route::post('/registration',[UserController::class, 'registration'])->name('registration');
Route::post('/registration/verification/{token}/{email}',[UserController::class, 'registrationVerify']);

Route::get('/forget-password',[UserController::class, 'forgetPassword'])->name('forget.paassword');
Route::get('/logout',[UserController::class, 'logout']) ;
