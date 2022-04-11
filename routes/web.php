<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\EditprofileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\fornntendController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\WishlistController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use App\Http\Controllers\Sendinvoice;





//Frontend Route
Route::get('/', [fornntendController::class, 'welcome']);
Route::get('/about', [fornntendController::class, 'aboutpage']);

Route::get('/product/details/{product_id}/{product_name}', [fornntendController::class, 'product_detail']);
Route::get('/product/single_details/{product_id}', [fornntendController::class, 'singleproduct_detail']);
Route::get('/product/shop', [fornntendController::class, 'productshop']);
Route::get('/category/product/{category_id}', [fornntendController::class, 'category_product']);
Route::get('/checkout', [CartController::class, 'checkout']);
Route::post('/getcitylist', [CartController::class, 'getcitylist']);


//Cart ROute
Route::post('/addto/cart', [CartController::class, 'cart']);
Route::get('/delete/cart/{cart_id}', [CartController::class, 'deletecart']);
Route::get('/details/cart', [CartController::class, 'cartdetails']);
Route::get('/details/cart/{coupon_name}', [CartController::class, 'cartdetails']);
Route::post('/cart/update', [CartController::class, 'cartupdate']);


Route::post('/order/confirm', [CartController::class, 'order']);

//Wishlist work
Route::get('/add/wishlist/{product_id}', [WishlistController::class, 'wishlist']);



//Cupon Route
Route::get('/coupon', [CouponController::class, 'coupon']);
Route::post('/coupon/insert', [CouponController::class, 'insert']);

//review route
Route::post('/review', [fornntendController::class, 'review']);

Route::get('/language/bangla', [LanguageController::class, 'Bangla'])->name('bangla.language');

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');









Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');;

//Category Route
Route::get('/addcategory', [CategoryController::class, 'index']);
Route::post('/category/insert', [CategoryController::class, 'insert']);
Route::get('/category/delete/{category_id}', [CategoryController::class, 'delete']);

//SUbcategory Route
Route::get('/subcategory', [SubcategoryController::class, 'index']);
Route::post('/subcategory/insert', [SubcategoryController::class, 'insert']);
Route::get('/subcategory/delete/{subcategory_id}', [SubcategoryController::class, 'delete']);
Route::get('/subcategory/edit/{subcategory_id}', [SubcategoryController::class, 'edit']);
Route::post('/subcategory/update', [SubcategoryController::class, 'update']);
Route::get('/subcategory/restore/{deletesubcategory_id}', [SubcategoryController::class, 'restore']);
Route::get('/subcategory/perdelete/{subcategory_id}', [SubcategoryController::class, 'perdelete']);
Route::post('/subcategory/markdelete', [SubcategoryController::class, 'markdelete']);
// Route::post('/subcategory/markrestore', [SubcategoryController::class, 'markrestore']);

//Profile Edit page
Route::get('/editprofile', [EditprofileController::class, 'index']);
Route::post('/editprofile/namechange', [EditprofileController::class, 'profilechange']);
Route::post('/editprofile/passchange', [EditprofileController::class, 'passwordchange']);
Route::post('/editprofile/userphotochange', [EditprofileController::class, 'userphotochange']);


//Product Route
Route::get('/product', [ProductController::class, 'view']);
Route::get('/product/add', [ProductController::class, 'index']);
Route::post('/product/insert', [ProductController::class, 'insert']);
Route::get('/product/view/{id}', [ProductController::class, 'signleview']);
Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/product/update', [ProductController::class, 'update']);
Route::get('/product/delete/{product_id}', [ProductController::class, 'delete']);

//User role
Route::post('/user/insert', [HomeController::class, 'userinsert']);


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/online/payment', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


//PDF Download
Route::get('/invoice/download/{order_id}', [HomeController::class, 'invoicedownload']);

//PDF invoice send
Route::get('/invoice/send/{order_id}', [HomeController::class, 'invoicesend']);

//SMS Send
Route::get('/invoice/smssend/{order_id}', [HomeController::class, 'Smssend']);



//search
Route::get('/search', [HomeController::class, 'search']);



//EMail verify
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

///APi Infos
Route::get('/apimovies', [ApiController::class, 'apiwork']);
