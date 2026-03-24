<?php

use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\WarrantyController as AdminWarrantyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function () {

    Mail::raw('This is a test email from Laravel.', function ($message) {
        $message->to('darshankondekar01@gmail.com')
                ->subject('Laravel Test Email');
    });

    return "Test email sent successfully!";
});

Route::get('/', [WarrantyController::class, 'create'])->name('warranty.create');

Route::get('/qr-code', [WarrantyController::class, 'generateQR'])->name('qr.code');
Route::get('/warranty', [WarrantyController::class, 'create'])->name('warranty.create');
Route::post('/warranty', [WarrantyController::class, 'store'])->name('warranty.store');

Route::view('/terms', 'terms')->name('terms');

Route::get('/warranty/check', [WarrantyController::class, 'showSendOtpForm'])->name('warranty.check');
Route::post('/warranty/check', [WarrantyController::class, 'sendOtp'])->name('warranty.check.send');
Route::get('/warranty/check/verify/{warranty}', [WarrantyController::class, 'showVerifyOtpForm'])->name('warranty.check.verify');
Route::post('/warranty/check/verify/{warranty}', [WarrantyController::class, 'verifyOtp'])->name('warranty.check.verify.post');
Route::get('/warranty/check/card/{warranty}', [WarrantyController::class, 'showCard'])->name('warranty.check.card');

// --------------------------------------------------------------------------
// Admin Panel
// --------------------------------------------------------------------------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.warranties.index');
        })->name('dashboard');

        Route::get('warranties', [AdminWarrantyController::class, 'index'])->name('warranties.index');
        Route::get('warranties/create', [AdminWarrantyController::class, 'create'])->name('warranties.create');
        Route::post('warranties', [AdminWarrantyController::class, 'store'])->name('warranties.store');
        Route::get('warranties/{warranty}', [AdminWarrantyController::class, 'show'])->name('warranties.show');
        Route::delete('warranties/{warranty}', [AdminWarrantyController::class, 'destroy'])->name('warranties.destroy');
    });
});
