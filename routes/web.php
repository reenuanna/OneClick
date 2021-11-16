<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SmsController;
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
Route::get('/',[UserController::class,'index']);
Route::get('/login',[UserController::class,'login']);
Route::post('/UserLogin',[UserController::class,'UserLogin']);
Route::get('/UserRegister',[UserController::class,'UserRegister']);
Route::post('/userReg',[UserController::class,'userReg']);
Route::get('/viewProduct/{id}',[UserController::class,'viewProduct']);
Route::get('/cart',[UserController::class,'cart']);
Route::post('/addcart',[UserController::class,'addcart']);
Route::get('/updatecart/{id}',[UserController::class,'updatecart']);
Route::post('/buynow/{id}',[UserController::class,'buynow']);
Route::get('/buynow1/{id}',[UserController::class,'buynow1']);
Route::get('/checkout',[UserController::class,'checkout']);


Route::get('payment', [UserController::class, 'payForm']);
Route::post('payment', [UserController::class, 'store'])->name('razorpay.payment.store');
Route::get('/paysuccess', [UserController::class,'paysuccess']);
Route::get('/cartpayForm',[UserController::class, 'cartpayForm']);
Route::post('cartpayment', [UserController::class, 'cartstore'])->name('razorpay.payment.cartstore');

Route::post('/order',[UserController::class,'order']);
Route::get('/cartCheckout',[UserController::class,'cartCheckout']);
Route::get('/checkout1',[UserController::class,'checkout1']);
Route::post('/order1',[UserController::class,'order1']);
Route::get('/logout',[UserController::class,'logout']);
Route::get('/forgot_password',[UserController::class,'getEmail']);
Route::post('/SendEmail',[UserController::class,'SendEmail']);
Route::get('/passwordReset',[UserController::class,'passwordReset']);
Route::post('/updatePass',[UserController::class,'updatePass']);



Route::get('/admin',[AdminController::class,'index']);
Route::get('/vendorDetails',[AdminController::class,'vendorDetails']);
Route::get('/businesstype',[AdminController::class,'showBusinessType']);
Route::post('/addbusiness',[AdminController::class,'addbusiness']);
Route::get('/category',[AdminController::class,'showcategory']);
Route::post('/addcategory',[AdminController::class,'addcategory']);
Route::get('/showSubCat/{id}',[AdminController::class,'showSubCat']);
Route::post('/addsubcat/{id}',[AdminController::class,'addsubcat']);
Route::get('/moreVenderDetails/{id}',[AdminController::class,'moreVenderDetails']);
Route::get('/venapprove/{id}',[AdminController::class,'venapprove']);
Route::get('/viewProduct',[AdminController::class,'viewProduct']);
Route::get('/moreProductview/{id}',[AdminController::class,'moreProductview']);
Route::get('/prdapprove/{id}',[AdminController::class,'prdapprove']);
Route::post('/prdareject/{id}',[AdminController::class,'prdareject']);
Route::post('/savecmpy/{id}',[AdminController::class,'savecmpy']);

Route::get('/vendor',[VendorController::class,'index']);
Route::post('/login',[VendorController::class,'login']);
Route::get('/forgotPassword',[VendorController::class,'getEmail']);
Route::post('/VendorSendEmail',[VendorController::class,'VendorSendEmail']);
Route::get('/vendorPasswordReset',[VendorController::class,'vendorPasswordReset']);
Route::post('/updatePassword',[VendorController::class,'updatePassword']);

Route::get('/home',[VendorController::class,'home']);
Route::get('/signupVendor',[VendorController::class,'signUp']);
Route::post('/send',[VendorController::class,'saveOtp']);
Route::get('/verifypage',[VendorController::class,'verifyOtppage']);
Route::post('/verify',[VendorController::class,'verifyOtp']);
Route::post('/vendorReg',[VendorController::class,'vendorReg']);
Route::get('/vendorDetailsAdd',[VendorController::class,'vendorDetails']);
Route::get('/vendersp',[VendorController::class,'vendersp']);
Route::get('/product',[VendorController::class,'product']);
Route::get('/productForm',[VendorController::class,'productForm']);
Route::get('/prdSubCat/{id}',[VendorController::class,'prdSubCat']);
Route::post('/savePrd',[VendorController::class,'savePrd']);
Route::post('/addDetails/{id}',[VendorController::class,'addDetails']);
Route::get('/orderDetails',[VendorController::class,'orderDetails']);


// Route::view('forgot_password', 'user.rest_password')->name('password.reset');
Route::get('photos','App\Http\Controllers\ImgUpload@view')->name('photos');
Route::post('upload','App\Http\Controllers\ImgUpload@store');

Route::post('/sms',[SmsController::class,'index']);