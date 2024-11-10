<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    return view('index');
});
// Route::get('/profile', function () {
//     return view('profile');
// });

// Route::get('/profile',[ProfileController::class, 'profile'])->name('profile');
Route::put('/profileUpdate',[ProfileController::class, 'update'])->name('profile.update');

Route::group(['prefix' => 'account'], function(){

    // guest middleware
    Route::group(['middleware' => 'guest'], function(){
        Route::get('login',[LoginController::class, 'index'])->name('account.login');
        Route::post('authenticate',[LoginController::class, 'login'])->name('account.authenticate');
        Route::get('register',[LoginController::class, 'register'])->name('account.register');
        Route::post('process-register',[LoginController::class, 'processRegister'])->name('account.processRegister');
    });

    // authenticated middleware
    Route::group(['middleware' => 'auth'], function(){
        // Route::get('dashboard',[DashboardController::class, 'index'])->name('account.dashboard');
        Route::get('/profile',[ProfileController::class, 'profile'])->name('profile');
        Route::get('logout',[LoginController::class, 'logout'])->name('account.logout');
    });
});

Route::get('/account/dashboard',[DashboardController::class, 'index'])->name('account.dashboard');
Route::group(['prefix' => 'admin'], function(){

    // guest middleware
    Route::group(['middleware' => 'admin.guest'], function(){
        
        Route::get('login',[AdminLoginController::class ,'index'])->name('admin.login');
        Route::post('authenticate',[AdminLoginController::class, 'login'])->name('admin.authenticate');
    });

    // authenticated middleware
    Route::group(['middleware' => 'admin.auth'], function(){

        Route::get('dashboard',[AdminDashboardController::class ,'index'])->name('admin.dashboard');
        Route::get('logout',[AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});

Route::post('contact_mail', [DashboardController::class, 'contact_mail_sent'])->name('contact_mail');

// Route::get('/admin/login',[AdminLoginController::class ,'index'])->name('admin.login');
// Route::post('/admin/authenticate',[AdminLoginController::class, 'login'])->name('admin.authenticate');

// Route::get('/admin/dashboard',[AdminDashboardController::class ,'index'])->name('admin.dashboard');
// Route::get('/admin/logout',[AdminLoginController::class, 'logout'])->name('admin.logout');




///////////////////////////////

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');



