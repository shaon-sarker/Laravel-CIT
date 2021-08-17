<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;


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

//Category ROute

Route::get('/addcategory', [CategoryController::class, 'index']);
Route::post('/category/insert', [CategoryController::class, 'insert']);
Route::get('/category/delete/{category_id}', [CategoryController::class, 'delete']);

