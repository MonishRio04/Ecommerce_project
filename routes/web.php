<?php

use App\Http\Controllers\admin\addressController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\Front\indexController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\customerController;
use Illuminate\Support\Facades\Route;

// Route::any('dashboard',function(){
//     return view('welcome');
// })->middleware('auth');
//Route::group(['middleware'=>'auth'],function(){
Route::get('/',[indexController::class,'index']);
Route::get('/product/{slug}',[indexController::class,'show']);
Route::post('/cart',[indexController::class,'addToCart'])->name('cart');
Route::get('/cartdelete/{id}',[indexController::class,'delete']);
// Route::get('/cartget',[indexController::class,'ajaxupdate'])->name('ajaxget');
//});
Route::group([],function(){
Route::get('login', [authController::class, 'index'])->name('login');
Route::any('registered-information', [authController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [authController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [authController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [authController::class, 'signOut'])->name('signout');
});
Route::resource('admin',adminController::class);
Route::resource('category',categoryController::class);

Route::resource('product',productController::class);
Route::resource('customer',customerController::class);
Route::resource('address',addressController::class);
// Route::get('Address',[viewaddress::class,'index'])->name('')
?>
