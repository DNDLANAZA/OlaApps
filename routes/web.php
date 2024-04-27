<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProducttypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

# RBAC model [role_policy]
Route::group(['middleware' => 'role:admin'], function(){

    // Route for Manager
    Route::get('/manager', [ManagerController::class, 'index'])->name('manager.index');
    Route::post('/manager', [ManagerController::class, 'store'])->name('manager.store');
    Route::get('/manager/create', [ManagerController::class, 'create'])->name('manager.create');
    Route::get('manager/{id}', [ManagerController::class, 'show'])->name('manager.show');
    Route::get('manager-edit/{id}', [ManagerController::class, 'edit'])->name('manager.edit');
    Route::put('manager-update/{id}', [ManagerController::class, 'update'])->name('manager.update');
    Route::delete('manager-delete/{id}', [ManagerController::class, 'destroy'])->name('manager.destroy');

    // Route for Commercial
    Route::get('/commercial', [CommercialController::class, 'index'])->name('commercial.index');
    Route::post('/commercial', [CommercialController::class, 'store'])->name('commercial.store');
    Route::get('/commercial/create', [CommercialController::class, 'create'])->name('commercial.create');
    Route::get('commercial/{id}', [CommercialController::class, 'show'])->name('commercial.show');
    Route::get('commercial-edit/{id}', [CommercialController::class, 'edit'])->name('commercial.edit');
    Route::put('commercial-update/{id}', [CommercialController::class, 'update'])->name('commercial.update');
    Route::delete('commercial-delete/{id}', [commercialController::class, 'destroy'])->name('commercial.destroy');

    // Route for Roles
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::get('rus/{id}', [RoleController::class, 'show'])->name('role.show');
    Route::get('role-edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('role-update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('role-delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

    //Route for User_Role
    Route::get('/role-user', [UserRoleController::class, 'index'])->name('rus.index');
    Route::post('/role-user', [UserRoleController::class, 'store'])->name('rus.store');
    Route::get('/role-user/create', [UserRoleController::class, 'create'])->name('rus.create');
    Route::get('role-user/{id}', [UserRoleController::class, 'show'])->name('rus.show');
    Route::get('role-user-edit/{id}', [UserRoleController::class, 'edit'])->name('rus.edit');
    Route::put('role-user-update/{id}', [UserRoleController::class, 'update'])->name('rus.update');
    Route::delete('role-user-delete/{id}', [UserRoleController::class, 'destroy'])->name('rus.destroy');
});

# ABAC model [policy]
Route::group(['middleware' => 'role:gerant'], function(){

    // Route for Producttype
    Route::get('/producttype', [ProducttypeController::class, 'index'])->name('producttype.index');
    Route::post('/producttype', [ProducttypeController::class, 'store'])->name('producttype.store');
    Route::get('/producttype/create', [ProducttypeController::class, 'create'])->name('producttype.create');
    Route::get('producttype/{id}', [ProducttypeController::class, 'show'])->name('producttype.show');
    Route::get('producttype-edit/{id}', [ProducttypeController::class, 'edit'])->name('producttype.edit');
    Route::put('producttype-update/{id}', [ProducttypeController::class, 'update'])->name('producttype.update');
    Route::delete('producttype-delete/{id}', [ProducttypeController::class, 'destroy'])->name('producttype.destroy');

    // Route for Product
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('product-update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('product-delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('download/{file}', [ProductController::class, 'download'])->name('product.download');

    // Route for Stock
    Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
    Route::post('/stocks_store', [StockController::class, 'store'])->name('stock.store');
    Route::get('/stock/create', [StockController::class, 'create'])->name('stock.create');
    Route::get('stock/{id}', [StockController::class, 'show'])->name('stock.show');
    Route::get('stock-edit/{id}', [StockController::class, 'edit'])->name('stock.edit');
    Route::put('stock-update/{id}', [StockController::class, 'update'])->name('stock.update');
    Route::delete('stock-delete/{id}', [StockController::class, 'destroy'])->name('stock.destroy');

    // Route for Stock
    Route::get('/check', [CheckController::class, 'index'])->name('check.index');
    Route::post('/stock', [CheckController::class, 'store'])->name('check.store');
    Route::get('/checks', [CheckController::class, 'out'])->name('check.out');
    Route::post('/stocks', [CheckController::class, 'in'])->name('check.in');


});

# RBAC with domains model [domain_policy]
Route::group(['middleware' => 'role:commercial'], function(){
    // Route for Stock
    // Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
    Route::get('stock/{id}', [StockController::class, 'show'])->name('stock.show');

    // Route for Stock
    Route::get('/check', [CheckController::class, 'index'])->name('check.index');
    Route::get('/checks', [CheckController::class, 'out'])->name('check.out');
    Route::post('/stocks', [CheckController::class, 'in'])->name('check.in');

});
