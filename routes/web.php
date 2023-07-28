<?php


use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\admin\productController;
use Illuminate\Support\Facades\Route;

// Route::any('dashboard',function(){
//     return view('welcome');
// })->middleware('auth');
Route::group(['middleware'=>'auth'],function(){
Route::resource('dashboard',indexController::class)->middleware('auth');
});
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

?>
