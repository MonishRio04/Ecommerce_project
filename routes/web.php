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
use App\Http\Controllers\Front\profilecontroller;
use App\Http\Controllers\Front\usercategorycontroller;
use App\Http\Middleware\EnsureUserRole;
use App\Http\Controllers\Front\UserAddrerss;
use App\Http\Controllers\Front\wishlistcontroller;
use App\Http\Controllers\admin\orderscontroller;



Route::group([],function(){   //User=Flow Details
    Route::get('/',[indexController::class,'index']);
    Route::post('/cart',[indexController::class,'addToCart'])->name('cart');
    Route::get('/cartdelete/{id}',[indexController::class,'delete']);
    Route::get('/cart',[indexController::class,'cartpage'])->middleware('auth');
    Route::get('/checkout',[indexController::class,"checkout"])->middleware('auth');
    Route::post('/placeorder',[indexController::class,"placeorder"]);
});

Route::group([],function(){
    Route::get('/product/{slug}',[indexController::class,'show']);
    Route::post('/search',[indexController::class,'search']);
    Route::get('/all-categories',[usercategoryController::class,'allcategories']);
    Route::get('/categories/{category}',[usercategoryController::class,'category']);
});

Route::group([],function(){   //User=Orders
    Route::get('/orders',[orderitems::class,'orderitems']);
    Route::get('/show-order/{id}',[orderitems::class,'showorder']);
    Route::get('/customer-address',[UserAddrerss::class,'useraddress']);
    Route::group([],function(){ //address controllers
        Route::post('/create-new-address',[UserAddrerss::class,'createaddress']);
        Route::delete('/destroy/{id}',[UserAddrerss::class,'destroy']);
        Route::get('/editaddress/{id}',[UserAddrerss::class,'edit']);
        Route::post('/getstate',[UserAddrerss::class,'getState']);
        Route::post('/getcity',[UserAddrerss::class,'getCity']);
    });
});

Route::group([],function(){
    Route::get('/view-profile',[profilecontroller::class,'viewprofile']);
    Route::post('/profile-update',[profilecontroller::class,'updateprofile'])->name('update');
});

Route::group([],function(){
    Route::get('/view-wishlist',[wishlistcontroller::class,'viewlist']);
     Route::get('/add-wishlist/{id}',[wishlistcontroller::class,'addlist']);
      Route::get('/wishlist-delete/{id}',[wishlistcontroller::class,'wishdelete']);
});


Route::group([],function(){  //AdminLogin
    Route::get('login', [authController::class, 'index'])->name('login');
    Route::any('registered-information', [authController::class, 'customLogin'])->name('login.custom');
    Route::get('registration', [authController::class, 'registration'])->name('register-user');
    Route::post('custom-registration', [authController::class, 'customRegistration'])->name('register.custom');
});

Route::group([],function(){     //Admin=operations
    Route::resource('admin',adminController::class);
    Route::resource('category',categoryController::class);
    Route::resource('product',productController::class);
    Route::resource('customer',customerController::class);
    Route::resource('address',addressController::class);
    Route::get('orders-controller',[orderscontroller::class,'index']);
    Route::post('orders-status-update',[orderscontroller::class,'update']);
});


Route::group([],function(){     //User=login
    Route::get('userlogin',[UserAuthController::class,'index']);
    Route::post('loginvalidate',[UserAuthController::class,'loginvalidate'])->middleware(EnsureUserRole::class);
    Route::get('register',[UserAuthController::class,'register']);
    Route::post('registervalidate',[UserAuthController::class,'registervalidate']);
    Route::get('signout', [UserAuthController::class, 'signOut'])->name('signout');
});

?>

