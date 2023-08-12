<?php

use App\Http\Controllers\admin\addressController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\Front\indexController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\customerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\UserAuthController;
use App\Http\Controllers\Front\orderitems;
use App\Http\Controllers\Front\usercategorycontroller;
use App\Http\Middleware\EnsureUserRole;

// Route::any('dashboard',function(){
//     return view('welcome');
// })->middleware('auth');
//Route::group(['middleware'=>'auth'],function(){
Route::get('/',[indexController::class,'index']);
Route::get('/product/{slug}',[indexController::class,'show']);
Route::post('/cart',[indexController::class,'addToCart'])->name('cart');
Route::get('/cartdelete/{id}',[indexController::class,'delete']);
Route::get('/cart',[indexController::class,'cartpage'])->middleware('auth');
Route::get('/checkout',[indexController::class,"checkout"])->middleware('auth');
Route::post('/placeorder',[indexController::class,"placeorder"]);


Route::get('/orders',[orderitems::class,'orderitems']);
Route::get('/show-order/{id}',[orderitems::class,'showorder']);
// Route::get('/cartget',[indexController::class,'ajaxupdate'])->name('ajaxget');
//});

Route::get('/all-categories',[usercategoryController::class,'allcategory']);
Route::get('/categories/{category}',[usercategoryController::class,'categories']);


Route::group([],function(){
Route::get('login', [authController::class, 'index'])->name('login');
Route::any('registered-information', [authController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [authController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [authController::class, 'customRegistration'])->name('register.custom');
});
Route::resource('admin',adminController::class);
Route::resource('category',categoryController::class);

Route::resource('product',productController::class);
Route::resource('customer',customerController::class);
Route::resource('address',addressController::class);
// Route::get('Address',[viewaddress::class,'index'])->name('')

Route::group([],function(){
    // Route::get('Userlogin',[UserAuthController::class,'index']);
    Route::get('userlogin',[UserAuthController::class,'index']);
    Route::post('loginvalidate',[UserAuthController::class,'loginvalidate'])->middleware(EnsureUserRole::class);
    Route::get('register',[UserAuthController::class,'register']);
    Route::post('registervalidate',[UserAuthController::class,'registervalidate']);
    Route::get('signout', [UserAuthController::class, 'signOut'])->name('signout');
});

?>

