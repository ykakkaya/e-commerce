<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\SliderController;
use App\Http\Controllers\Backend\Admin\CategoryController;



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
    Route::get('slider/destroy/{id}',[SliderController::class,'destroy'])->name('admin.slider.destroy');
    //Category Routes
    Route::get('category/index',[CategoryController::class,'index'])->name('admin.category.index');
    Route::get('category/create',[CategoryController::class,'create'])->name('admin.category.create');
    Route::post('category/store',[CategoryController::class,'store'])->name('admin.category.store');
    Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::post('category/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
    Route::get('category/destroy/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');
    //SubCategory Routes
    Route::get('sub-category/index',[SubCategoryController::class,'index'])->name('admin.sub-category.index');
    Route::get('sub-category/create',[SubCategoryController::class,'create'])->name('admin.sub-category.create');
    Route::post('sub-category/store',[SubCategoryController::class,'store'])->name('admin.sub-category.store');
    Route::get('sub-category/edit/{id}',[SubCategoryController::class,'edit'])->name('admin.sub-category.edit');
    Route::post('sub-category/update/{id}',[SubCategoryController::class,'update'])->name('admin.sub-category.update');
    Route::get('sub-category/destroy/{id}',[SubCategoryController::class,'destroy'])->name('admin.sub-category.destroy');


});
