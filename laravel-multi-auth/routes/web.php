<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class, 'index'])->name('home');
Route::get('/dashboard',[UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/user-dashboard',[UserController::class, 'userDashboard'])->name('user.dashboard')->middleware('admin');



Route::get('/login',[UserController::class, 'loginPage'])->name('login.page');
Route::post('/login',[UserController::class, 'login'])->name('login');
Route::get('/logout',[UserController::class, 'logout'])->name('logout') ;


Route::get('/registration',[UserController::class, 'registrationPage'])->name('registration.page');
Route::post('/registration',[UserController::class, 'registration'])->name('registration');
Route::get('/registration/verification/{token}/{email}',[UserController::class, 'registrationVerify']);


Route::get('/forget-password',[UserController::class, 'forgetPasswordPage'])->name('forget.paassword.page');
Route::post('/forget-password',[UserController::class, 'forgetPassword'])->name('forget.paassword');


Route::get('/reset-password/{token}/{email}',[UserController::class, 'resetPasswordMethod'])->name('reset.paassword.method'); //reset_password
Route::post('/reset-password-submit',[UserController::class, 'resetPasswordSubmit'])->name('reset.paassword.submit');


/*Admin Routs*/
Route::get('/admin/login',[AdminController::class, 'loginPage'])->name('admin.login.page');
Route::post('admin/login',[AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/dashboard',[AdminController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('admin:admin');
Route::get('/admin/setting',[AdminController::class, 'adminSetting'])->name('admin.setting')->middleware('admin:admin');
Route::get('/admin/logout',[AdminController::class, 'logout'])->name('admin.logout') ;

