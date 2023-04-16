<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminProductController;
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

Route::prefix('/admin')->middleware(['auth'])->group(function(){
    Route::get('/dashboard', [HomeAdminController::class, 'index'])->name('dashboard');
    Route::get('/login', [HomeAdminController::class, 'login'])->name('login');
    Route::post('/loginstore', [HomeAdminController::class, 'loginstore'])->name('loginstore');
    Route::get('/product/index', [AdminProductController::class, 'index'])->name('indexsp');
    Route::get('/product/create', [AdminProductController::class, 'create'])->name('createsp');
    Route::post('/product/store', [AdminProductController::class, 'store'])->name('storesp');
    Route::get('/product/show', [AdminProductController::class, 'show'])->name('showsp');
    Route::get('/product/edit/{id}', [AdminProductController::class, 'edit'])->name('editsp');
    Route::post('/product/update/{id}', [AdminProductController::class, 'update'])->name('updatesp');
    Route::post('/product/destroy', [AdminProductController::class, 'destroy'])->name('deletesp');
});
