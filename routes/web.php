<?php

use App\Http\Controllers\User\UserController;
Use App\Http\Controllers\Admin\AdminController;
Use App\Http\Controllers\Admin\BrandController;
Use App\Http\Controllers\Admin\CategoryController;
Use App\Http\Controllers\Admin\ProductController;
Use App\Http\Controllers\Admin\SliderController;
Use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class,'index']);

Auth::routes();


// ***************************** Admin Route ******************************//
Route::group(['prefix'=>'admin','middleware' =>['admin','auth'],'namespace'=>'Admin'], function(){

    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');

    //Admin profile
    Route::get('profile',[AdminController::class,'profile'])->name('profile');
    Route::post('update/info',[AdminController::class,'updateInfo'])->name('update.data');
    Route::get('update/image_page',[AdminController::class,'updateImgPage'])->name('admin.image');
    Route::post('image/store',[AdminController::class,'imgStore'])->name('store.image');
    Route::get('change_password',[AdminController::class,'changePass'])->name('change.password');
    Route::post('change_password_store',[AdminController::class,'changePassStore'])->name('change.password.store');

     //brand routes
     Route::get('all_brands',[BrandController::class,'index'])->name('brands');
     Route::post('brand/store',[BrandController::class,'brandStore'])->name('brand.store');
     Route::get('brand/edit/{brand_id}',[BrandController::class,'edit']);
     Route::post('brand/update',[BrandController::class,'brandUpdate'])->name('update.brand');
     Route::get('/brand/delete/{brand_id}',[BrandController::class,'delete']);

     //category
    Route::get('category',[CategoryController::class,'index'])->name('all.category');
    Route::post('category/store',[CategoryController::class,'categoryStore'])->name('category.store');
    Route::get('/category/edit/{cat_id}',[CategoryController::class,'edit']);
    Route::post('category/update',[CategoryController::class,'catUpdate'])->name('update.category');
    Route::get('/category/delete/{cat_id}',[CategoryController::class,'delete']);

    //subcategory
    Route::get('sucategory',[CategoryController::class,'subIndex'])->name('all.subcategory');
    Route::post('subcategory/store',[CategoryController::class,'subCategoryStore'])->name('subcategory.store');
    Route::get('subcategory/edit/{subcat_id}',[CategoryController::class,'subEdit']);
    Route::post('subcategory/update',[CategoryController::class,'subCatUpdate'])->name('update.subcategory');
    Route::get('subcategory/delete/{subcat_id}',[CategoryController::class,'subDelete']);

    //sub-subcategory
    Route::get('subsubcategory',[CategoryController::class,'subSubIndex'])->name('all.subsubcategory');
    Route::get('subcategory/ajax/{cat_id}',[CategoryController::class,'getSubCat']);
    Route::post('subsubcategory/store',[CategoryController::class,'subSubCategoryStore'])->name('subsubcategory.store');
    Route::get('subsubcategory/edit/{subsubcat_id}',[CategoryController::class,'subSubEdit']);
    Route::post('subsubcategory/update',[CategoryController::class,'subSubCatUpdate'])->name('subsubcategory.update');
    Route::get('subsubcategory/delete/{subsubcat_id}',[CategoryController::class,'subSubDelete']);

    //Product
    Route::get('add/product',[ProductController::class,'addProduct'])->name('add.product');
    Route::post('product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('subsubcategory/ajax/{subcat_id}',[ProductController::class,'getSubSubCat']);
    Route::get('manage/product',[ProductController::class,'manageProduct'])->name('manage.product');
    Route::get('/product/edit/{product_id}',[ProductController::class,'edit']);
    Route::post('product/update',[ProductController::class,'productDataUpdate'])->name('update.product');
    Route::get('/product/delete/{product_id}',[ProductController::class,'delete']);
    Route::post('product/thambnail/update',[ProductController::class,'thambnailUpdate'])->name('update.product_thambnail');
    Route::post('product/multi_image/update',[ProductController::class,'multiImagUpdate'])->name('update.product_image');
    Route::get('product/multiimg/delete/{id}',[ProductController::class,'multiImageDelete']);
    Route::get('product/inactive/{id}',[ProductController::class,'inactive']);
    Route::get('product/active/{id}',[ProductController::class,'active']);

     //sliders
     Route::get('slider',[SliderController::class,'index'])->name('sliders');
     Route::post('slider/store',[SliderController::class,'store'])->name('slider.store');
     Route::get('slider/edit/{id}',[SliderController::class,'edit']);
     Route::post('slider/update',[SliderController::class,'update'])->name('update.slider');
     Route::get('slider/delete/{id}',[SliderController::class,'destroy']);
     Route::get('slider/inactive/{id}',[SliderController::class,'inactive']);
     Route::get('slider/active/{id}',[SliderController::class,'active']);


});

// ***************************** User Route ******************************//
Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'User'], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::post('update/data',[UserController::class,'updateData'])->name('update.profile');
    Route::get('image',[UserController::class,'imagePage'])->name('user.image');
    Route::post('update/image',[UserController::class,'updateImage'])->name('update.image');
    Route::get('update/password',[UserController::class,'updatePassPage'])->name('update.password');
    Route::post('store/password',[UserController::class,'storePassword'])->name('password.store');
});

// ***************************** Frontend Route ******************************//
