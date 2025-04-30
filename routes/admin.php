<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\SliderController;



//Admin Routes
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profileIndex'])->name('admin.profile.index');
    Route::post('profile',[AdminController::class,'profileUpdate'])->name('admin.profile.update');
    //Slider Routes
    Route::get('slider/index',[SliderController::class,'index'])->name('admin.slider.index');
    Route::get('slider/create',[SliderController::class,'create'])->name('admin.slider.create');
    Route::post('slider/store',[SliderController::class,'store'])->name('admin.slider.store');
    Route::get('slider/edit/{id}',[SliderController::class,'edit'])->name('admin.slider.edit');
    Route::post('slider/update/{id}',[SliderController::class,'update'])->name('admin.slider.update');
    Route::get('slider/delete/{id}',[SliderController::class,'delete'])->name('admin.slider.delete');


});
