<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminImageProduct;
use App\Http\Controllers\Admin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [HomeController::class, 'TrangChu'])->name('home');

Route::get('/danh-muc-san-pham', [HomeController::class, 'DanhMucSanPham'])->name('danhmucsanpham');

Route::get('/danh-muc-san-pham/{type}', [HomeController::class, 'DanhMucLoaiSanPham'])->name('danhmucloaisanpham');

Route::get('/chi-tiet-san-pham/id={id}', [HomeController::class, 'ChiTietSanPham'])->name('chitietsanpham');

// Route::get('/gio-hang', [HomeController::class, 'GioHang'])->name('giohang');
Route::get('/gio-hang', [CartController::class, 'cartList'])->name('giohang');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

Route::get('/tin-tuc', [HomeController::class, 'TinTuc'])->name('tintuc');

Route::get('/thanh-toan', [HomeController::class, 'ThanhToan'])->name('thanhtoan');

Route::get('/dang-nhap', [HomeController::class, 'DangNhap'])->name('dangnhap');

Route::get('/admin/login', [HomeAdminController::class, 'login'])->name('login');
Route::post('/admin/loginstore', [HomeAdminController::class, 'loginstore'])->name('loginstore');
Route::prefix('/admin')->middleware(['auth'])->group(function(){
    Route::prefix('/product')->group(function(){
        Route::get('/index', [AdminProductController::class, 'index'])->name('indexsp');
        Route::get('/create', [AdminProductController::class, 'create'])->name('createsp');
        Route::post('/store', [AdminProductController::class, 'store'])->name('storesp');
        Route::get('/show', [AdminProductController::class, 'show'])->name('showsp');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('editsp');
        Route::put('/update/{id}', [AdminProductController::class, 'update'])->name('updatesp');
        Route::delete('/destroy/{id}', [AdminProductController::class, 'destroy'])->name('deletesp');
    });
    Route::prefix('/imageproduct')->group(function(){
        Route::get('/index/{id}', [AdminImageProduct::class, 'index'])->name('indeximg');
        Route::get('/create/{id}', [AdminImageProduct::class, 'create'])->name('createimg');
        Route::post('/store/{id}', [AdminImageProduct::class, 'store'])->name('storeimg');
        Route::get('/show/{id}', [AdminImageProduct::class, 'show'])->name('showimg');
        Route::get('/edit/{id}', [AdminImageProduct::class, 'edit'])->name('editimg');
        Route::post('/update/{id}', [AdminImageProduct::class, 'update'])->name('updateimg');
        Route::delete('/destroy', [AdminImageProduct::class, 'destroy'])->name('deleteimg');
    });
    Route::get('/dashboard', [HomeAdminController::class, 'index'])->name('dashboard');
});
