<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Vendor\VendorController;

//Vendor Routes
Route::middleware(['auth','role:vendor'])->prefix('vendor')->group(function () {
    Route::get('dashboard',[VendorController::class,'index'])->name('vendor.dashboard');

});
