<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\TimezoneController;
use App\Http\Controllers\Business\BusinessController;
use App\Http\Controllers\Business\CategoryController;


Route::group(['middleware' => ['auth:sanctum']], function () {
    
    //contacts route api
    Route::get('/contacts/{id}', [ContactsController::class, 'index']);
    Route::get('/contact/show/{id}', [ContactsController::class, 'show']);
    Route::post('/contact/create', [ContactsController::class, 'store']);
    Route::post('/contact/update/{id}', [ContactsController::class, 'update']);
    Route::delete('/contact/delete/{id}', [ContactsController::class, 'destroy']);
    
    //invoices route api
    Route::get('/invoices/{id}', [InvoiceController::class, 'index']);
    Route::get('/invoice/show/{id}', [InvoiceController::class, 'show']);
    Route::post('/invoice/create', [InvoiceController::class, 'store']);
    Route::post('/invoice/update/{id}', [InvoiceController::class, 'update']);
    Route::delete('/invoice/delete/{id}', [InvoiceController::class, 'destroy']);
    Route::post('/invoice/edit/status/{id}', [InvoiceController::class, 'edit_status']);

    //bills  route api
    Route::get('/bills/{id}', [BillController::class, 'index']);
    Route::get('/bill/show/{id}', [BillController::class, 'show']);
    Route::post('/bill/create', [BillController::class, 'store']);
    Route::post('/bill/update/{id}', [BillController::class, 'update']);
    Route::delete('/bill/delete/{id}', [BillController::class, 'destroy']);

    //overview route api
    Route::get('/cashflow/charts12/{id}', [OverviewController::class, 'cashflow12Months']);
    Route::get('/cashflow/charts6/{id}', [OverviewController::class, 'cashflow6Months']);
    Route::get('/cashflow/charts3/{id}', [OverviewController::class, 'cashflow3Months']);
    Route::get('/profit_and_lose/{id}', [OverviewController::class, 'profitandlose']);
    //overview account bank route api
    Route::get('/overview/banks', [BankController::class, 'overview_all_banks']);
    Route::get('/overview/show/{id}', [BankController::class, 'overview_show_banks']);

    //bank route api
    Route::get('/banks', [BankController::class, 'index']);
    Route::get('/bank/show/{id}', [BankController::class, 'show']);
    Route::post('/bank/create', [BankController::class, 'store']);
    Route::post('/bank/update/{id}', [BankController::class, 'update']);
    Route::delete('/bank/delete/{id}', [BankController::class, 'destroy']);


    //business route api
    Route::get('businesses', [BusinessController::class, 'index']);

    Route::get('business/categories', [CategoryController::class, 'index']);
    Route::get('currencies', [CurrencyController::class, 'index']);
    Route::get('timezones', [TimezoneController::class, 'index']);
});
