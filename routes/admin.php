<?php

use App\Http\Controllers\Admin\DocumentValidationController;
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\Admin\BannerController;


Route::get('/merchants/new-merchants', [MerchantController::class, 'newMerchants'])->name('merchants.new');
Route::put('/merchants/{merchant}/{status}', [MerchantController::class, 'statusUpdate'])->name('merchants.status-update');
Route::resource('merchants', MerchantController::class);
Route::put('/document-validation/{document}/{status}', [DocumentValidationController::class, 'updateStatus'])->name('document-validation.status');

Route::resource('categories', CategoryController::class);

Route::resource('couriers', CourierController::class);

Route::prefix('settings')->name('settings.')->group(function() {

    Route::resource('banners', BannerController::class);
});