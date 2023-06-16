<?php

use App\Http\Controllers\Merchant\MerchantRegistrationController;
use App\Http\Controllers\Merchant\ProductController;
use App\Http\Controllers\Merchant\ProductImageController;
use App\Http\Controllers\Merchant\StoreController;
use App\Http\Controllers\Merchant\StoreProductController;

Route::prefix('merchant-registration')->name('merchant-registration.')->group(function() {
        
    Route::get('/{step?}', [MerchantRegistrationController::class, 'merchantInformation'])
    ->name('index')
    ->withoutMiddleware('merchant');
    Route::post('/', [MerchantRegistrationController::class, 'registerMerchant'])
    ->name('store')
    ->withoutMiddleware('merchant');
    Route::post('/{merchant}', [MerchantRegistrationController::class, 'uploadDocuments'])
    ->name('store-documents')
    ->withoutMiddleware('merchant');
});

Route::resource('products', ProductController::class);
Route::prefix('product-image')->name('product-image.')->group(function() {
    Route::put('{image}', [ProductImageController::class, 'setFavoriteImage'])->name('set-favorite');
    Route::delete('{image}', [ProductImageController::class, 'remove'])->name('remove');
});

Route::resource('stores', StoreController::class);
Route::prefix('store-product')->name('store-product.')->group(function() {
    Route::post('{store}', [StoreProductController::class, 'store'])->name('store');
    Route::put('{storeProduct}', [StoreProductController::class, 'update'])->name('update');
});