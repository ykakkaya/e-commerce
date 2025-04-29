<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Vendor\VendorController;



Route::get('/',[HomeController::class,'index'])->name('home');


Route::middleware(['auth','role:user'])->prefix('user')->group(function () {
  Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
  Route::get('profile',[UserController::class,'profileUser'])->name('user.profile');
  Route::post('profile',[UserController::class,'updateUserProfile'])->name('user.profile.update');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/admin.php';
require __DIR__.'/vendor.php';
require __DIR__.'/auth.php';
