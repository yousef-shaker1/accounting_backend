<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\SetupController;
use Illuminate\Support\Facades\Route;

// AUTH ROUTES
Route::controller(AuthController::class)->group(function () {


    Route::middleware('guest')->group(function () {
        Route::post('/register', 'register');
        Route::post('/login', 'login');
    });   

    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});


// FORGOT PASSWORD ROUTES
Route::controller(ForgotPasswordController::class)->middleware('guest')->group(function () {
    Route::post('/forgot-password', 'sendResetLinkEmail');
    Route::post('/reset-password', 'reset');
});


// WIZARD ROUTES
Route::middleware('auth:sanctum')->prefix('setup')->controller(SetupController::class)->group(function () {
    Route::post('step-one', 'stepOne');
    Route::post('step-two', 'stepTwo');
    Route::post('step-three', 'stepThree');
    Route::post('step-four', 'stepFour');
    Route::post('step-five', 'stepFive');
});
