<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\EditprofileController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function(){
    return view('about');

});
Route::get('/contact', function(){
    return view('contact');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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








