<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});




/*------------------------------------------

--------------------------------------------

All Normal Users Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-permission:penjual'])->group(function () {

  

    Route::get('penjual/home', [HomeController::class, 'penjualHome'])->name('penjual.home');

});

  

/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-permission:admin'])->group(function () {

  
    Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
    
    // admin product
    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('/admin/product/add', [ProductController::class, 'create'])->name('admin.product.add');
    Route::POST('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::PUT('/admin/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/admin/product/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

     // admin user
     Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
     Route::get('/admin/user/add', [UserController::class, 'create'])->name('admin.user.add');
     Route::POST('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');
     Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
     Route::PUT('/admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
     Route::get('/admin/user/destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');



});

  

/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-permission:pembeli'])->group(function () {

  

    Route::get('/pembeli/home', [HomeController::class, 'pembeliHome'])->name('pembeli.home');

});

 