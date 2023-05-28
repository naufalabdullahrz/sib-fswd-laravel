<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController1;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;

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
    return view('landing');
});
//tugas sebelum nya
Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
Route::get('/user1', [UserController1::class,'indexs']);
Route::get('/create1', [UserController1::class,'create1']);
Route::get('/edit1', [UserController1::class,'edit1']);

//dashboard
Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');
//user
Route::get('/user', [UserController::class, "index"])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//products
Route::get('/product', [ProductController::class, "index"])->name('product.index');
Route::get('/product/create', [ProductController::class, "create"])->name('product.create');
Route::post('/product', [ProductController::class, "store"])->name('product.store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


//category
Route::get('/category', [CategoryController::class, "index"])->name('category.index');
Route::get('/category/create', [CategoryController::class, "create"])->name('category.create');
Route::post('/category', [CategoryController::class, "store"])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');


//role
Route::get('/role', [RoleController::class, "index"])->name('role.index');
Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('/role', [RoleController::class, 'store'])->name('role.store');
Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::put('/role/{id}', [RoleController::class, 'update'])->name('role.update');
Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

//brand
Route::get('/brand', [BrandController::class, 'index'])->name('brand.index'); 
Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit'); 
Route::post('/brand', [BrandController::class, 'store'])->name('brand.store'); 
Route::put('/brand/{id}', [BrandController::class, 'update'])->name('brand.update'); 
Route::delete('/brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');

// Slider
Route::get('/slider', [SliderController::class, 'index'])->name('slider.index'); // route untuk menampilkan data awal
Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create'); // route untuk menampilkan form create
Route::post('/slider', [SliderController::class, 'store'])->name('slider.store'); // route untuk menyimpan data
Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit'); // route untuk menampilkan form edit
Route::put('/slider/{id}', [SliderController::class, 'update'])->name('slider.update'); // route untuk mengupdate data
Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy'); // route untuk menghapus data