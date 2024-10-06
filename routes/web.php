<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PurchaseorderController;
use App\Http\Controllers\SalesorderController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PenjualController;

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

    // sales order penjual
    // Route::get('/pembeli/dashboard', [PembeliController::class, 'dashboard'])->name('pembeli.dashboard');
    Route::get('/penjual/product', [PenjualController::class, 'product'])->name('penjual.product');
    Route::get('/penjual/sales', [PenjualController::class, 'index'])->name('penjual.sales');
    Route::get('/penjual/sales/add', [PenjualController::class, 'create'])->name('penjual.sales.add');
    Route::POST('/penjual/sales/store', [PenjualController::class, 'store'])->name('penjual.sales.store');
    Route::get('/penjual/sales/show/{id}', [PenjualController::class, 'show'])->name('penjual.sales.show');
    Route::get('/penjual/sales/edit/{id}', [PenjualController::class, 'edit'])->name('penjual.sales.edit');
    Route::PUT('/penjual/sales/update/{id}', [PenjualController::class, 'update'])->name('penjual.sales.update');
    Route::get('/penjual/sales/destroy/{id}', [PenjualController::class, 'destroy'])->name('penjual.sales.destroy');

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

    //  admin purchase order
    Route::get('/admin/purchase', [PurchaseorderController::class, 'indexAdmin'])->name('admin.purchase');
    Route::get('/admin/purchase/add', [PurchaseorderController::class, 'create'])->name('admin.purchase.add');
    Route::POST('/admin/purchase/store', [PurchaseorderController::class, 'store'])->name('admin.purchase.store');
    Route::get('/admin/purchase/show/{id}', [PurchaseorderController::class, 'show'])->name('admin.purchase.show');
    Route::get('/admin/purchase/edit/{id}', [PurchaseorderController::class, 'edit'])->name('admin.purchase.edit');
    Route::PUT('/admin/purchase/update/{id}', [PurchaseorderController::class, 'update'])->name('admin.purchase.update');
    Route::get('/admin/purchase/destroy/{id}', [PurchaseorderController::class, 'destroy'])->name('admin.purchase.destroy');

    //  admin sales order
    Route::get('/admin/sales', [SalesorderController::class, 'index'])->name('admin.sales');
    Route::get('/admin/sales/add', [SalesorderController::class, 'create'])->name('admin.sales.add');
    Route::POST('/admin/sales/store', [SalesorderController::class, 'store'])->name('admin.sales.store');
    Route::get('/admin/sales/show/{id}', [SalesorderController::class, 'show'])->name('admin.sales.show');
    Route::get('/admin/sales/edit/{id}', [SalesorderController::class, 'edit'])->name('admin.sales.edit');
    Route::PUT('/admin/sales/update/{id}', [SalesorderController::class, 'update'])->name('admin.sales.update');
    Route::get('/admin/sales/destroy/{id}', [SalesorderController::class, 'destroy'])->name('admin.sales.destroy');




});

  

/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-permission:pembeli'])->group(function () {

  

      // purchase order pembeli
      Route::get('/pembeli/dashboard', [PembeliController::class, 'dashboard'])->name('pembeli.dashboard');
      Route::get('/pembeli/product', [PembeliController::class, 'product'])->name('pembeli.product');
      Route::get('/pembeli/purchase', [PembeliController::class, 'index'])->name('pembeli.purchase');
      Route::get('/pembeli/purchase/add', [PembeliController::class, 'create'])->name('pembeli.purchase.add');
      Route::POST('/pembeli/purchase/store', [PembeliController::class, 'store'])->name('pembeli.purchase.store');
      Route::get('/pembeli/purchase/show/{id}', [PembeliController::class, 'show'])->name('pembeli.purchase.show');
      Route::get('/pembeli/purchase/edit/{id}', [PembeliController::class, 'edit'])->name('pembeli.purchase.edit');
      Route::PUT('/pembeli/purchase/update/{id}', [PembeliController::class, 'update'])->name('pembeli.purchase.update');
      Route::get('/pembeli/purchase/destroy/{id}', [PembeliController::class, 'destroy'])->name('pembeli.purchase.destroy');

});

 