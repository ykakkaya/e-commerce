<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;



//Admin Routes
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profileIndex'])->name('admin.profile.index');
    Route::post('profile',[AdminController::class,'profileUpdate'])->name('admin.profile.update');

});
