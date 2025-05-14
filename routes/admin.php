<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\BrandController;
use App\Http\Controllers\Backend\Admin\SliderController;
use App\Http\Controllers\Backend\Admin\ProductController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\SubCategoryController;
use App\Http\Controllers\Backend\Admin\ChildCategoryController;



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
    Route::get('sub_category/index',[SubCategoryController::class,'index'])->name('admin.sub_category.index');
    Route::get('sub_category/create',[SubCategoryController::class,'create'])->name('admin.sub_category.create');
    Route::post('sub_category/store',[SubCategoryController::class,'store'])->name('admin.sub_category.store');
    Route::get('sub_category/edit/{id}',[SubCategoryController::class,'edit'])->name('admin.sub_category.edit');
    Route::post('sub_category/update/{id}',[SubCategoryController::class,'update'])->name('admin.sub_category.update');
    Route::get('sub_category/destroy/{id}',[SubCategoryController::class,'destroy'])->name('admin.sub_category.destroy');
    //ChildCategory Routes
    Route::get('child_category/index',[ChildCategoryController::class,'index'])->name('admin.child_category.index');
    Route::get('child_category/create',[ChildCategoryController::class,'create'])->name('admin.child_category.create');
    Route::post('child_category/store',[ChildCategoryController::class,'store'])->name('admin.child_category.store');
    Route::get('child_category/edit/{id}',[ChildCategoryController::class,'edit'])->name('admin.child_category.edit');
    Route::post('child_category/update/{id}',[ChildCategoryController::class,'update'])->name('admin.child_category.update');
    Route::get('child_category/destroy/{id}',[ChildCategoryController::class,'destroy'])->name('admin.child_category.destroy');
    Route::get('subcategory/ajax/{id}', [ChildCategoryController::class, 'subcategoryAjax'])->name('admin.subcategory.ajax');
    Route::get('childcategory/ajax/{id}', [ChildCategoryController::class, 'childcategoryAjax'])->name('admin.childcategory.ajax');
    //Brands Routes
    Route::get('brands/index',[BrandController::class,'index'])->name('admin.brands.index');
    Route::get('brands/create',[BrandController::class,'create'])->name('admin.brands.create');
    Route::post('brands/store',[BrandController::class,'store'])->name('admin.brands.store');
    Route::get('brands/edit/{id}',[BrandController::class,'edit'])->name('admin.brands.edit');
    Route::post('brands/update/{id}',[BrandController::class,'update'])->name('admin.brands.update');
    Route::get('brands/destroy/{id}',[BrandController::class,'destroy'])->name('admin.brands.destroy');
    //Product Routes
    Route::get('products/index',[ProductController::class,'index'])->name('admin.products.index');
    Route::get('products/create',[ProductController::class,'create'])->name('admin.products.create');
    Route::post('products/store',[ProductController::class,'store'])->name('admin.products.store');
    Route::get('products/edit/{id}',[ProductController::class,'edit'])->name('admin.products.edit');
    Route::post('products/update/{id}',[ProductController::class,'update'])->name('admin.products.update');
    Route::get('products/destroy/{id}',[ProductController::class,'destroy'])->name('admin.products.destroy');
    Route::get('products/product_images/{id}',[ProductController::class,'productImages'])->name('admin.products.product_images');
    Route::post('products/product_images/store',[ProductController::class,'productImagesStore'])->name('admin.products_images.store');
    Route::get('products/product_images/destroy/{id}',[ProductController::class,'productImagesDestroy'])->name('admin.productImages.destroy');

});
