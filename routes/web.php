<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminImageProduct;
use App\Http\Controllers\Admin\AdminOrderController;
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

Route::post('/search-danh-muc-san-pham', [HomeController::class, 'SearchDanhMucSanPham'])->name('searchdanhmucsanpham');

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

Route::post('/thanh-toan', [HomeController::class, 'ThanhToanStore'])->name('thanhtoanstore');

Route::get('/cai-dat', [HomeController::class, 'KhachHang'])->name('khachhang');

Route::get('/quan-ly-don-hang', [HomeController::class, 'QuanLyDonHang'])->name('quanlydonhang');

Route::post('/cap-nhat-thong-tin', [HomeController::class, 'UpdateKhachHang'])->name('updatekhachhang');

Route::post('/cap-nhat-mat-khau', [HomeController::class, 'CapNhatMatKhau'])->name('capnhatmatkhau');

Route::get('/dang-xuat', [HomeController::class, 'Logout'])->name('dangxuat');

Route::get('/dang-nhap', [HomeController::class, 'Login'])->name('dangnhap');

Route::post('/dang-nhap-post', [HomeController::class, 'LoginStore'])->name('dangnhappost');

Route::get('/dang-ki', [HomeController::class, 'Register'])->name('dangki');

Route::post('/dang-ki-post', [HomeController::class, 'RegisterStore'])->name('dangkipost');

Route::get('/admin/login', [HomeAdminController::class, 'login'])->name('login');
Route::post('/admin/loginstore', [HomeAdminController::class, 'loginstore'])->name('loginstore');
Route::prefix('/admin')->middleware(['auth'])->group(function(){
    Route::get('/dashboard', [HomeAdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [HomeAdminController::class, 'logout'])->name('logout');

    // Product
    Route::prefix('/product')->group(function(){
        Route::get('/index', [AdminProductController::class, 'index'])->name('indexsp');
        Route::get('/create', [AdminProductController::class, 'create'])->name('createsp');
        Route::post('/store', [AdminProductController::class, 'store'])->name('storesp');
        Route::get('/show/{id}', [AdminProductController::class, 'show'])->name('showsp');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('editsp');
        Route::put('/update/{id}', [AdminProductController::class, 'update'])->name('updatesp');
        Route::delete('/destroy/{id}', [AdminProductController::class, 'destroy'])->name('deletesp');
    });

    // ImageProduct
    Route::prefix('/imageproduct')->group(function(){
        Route::get('/index/{id}', [AdminImageProduct::class, 'index'])->name('indeximg');
        Route::get('/create/{id}', [AdminImageProduct::class, 'create'])->name('createimg');
        Route::post('/store', [AdminImageProduct::class, 'store'])->name('storeimg');
        Route::get('/show/{id}', [AdminImageProduct::class, 'show'])->name('showimg');
        Route::get('/edit/{id}', [AdminImageProduct::class, 'edit'])->name('editimg');
        Route::put('/update/{id}', [AdminImageProduct::class, 'update'])->name('updateimg');
        Route::delete('/destroy/{idimg}', [AdminImageProduct::class, 'destroy'])->name('deleteimg');
    });

    // Order
    Route::prefix('/order')->group(function(){
        Route::get('/index', [AdminOrderController::class, 'index'])->name('indexdh');
        Route::get('/create', [AdminOrderController::class, 'create'])->name('createdh');
        Route::post('/store', [AdminOrderController::class, 'store'])->name('storedh');
        Route::get('/show/{id}', [AdminOrderController::class, 'show'])->name('showdh');
        Route::get('/edit/{id}', [AdminOrderController::class, 'edit'])->name('editdh');
        Route::put('/update/{id}', [AdminOrderController::class, 'update'])->name('updatedh');
        Route::delete('/destroy/{id}', [AdminOrderController::class, 'destroy'])->name('deletedh');
        Route::get('/createPdf', [AdminOrderController::class, 'createPDF']);
    });
    
    // Category
    Route::prefix('/category')->group(function(){
        Route::get('/index', [AdminCategoryController::class, 'index'])->name('indexdm');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('createdm');
        Route::post('/store', [AdminCategoryController::class, 'store'])->name('storedm');
        Route::get('/show/{id}', [AdminCategoryController::class, 'show'])->name('showdm');
        Route::get('/edit/{id}', [AdminCategoryController::class, 'edit'])->name('editdm');
        Route::put('/update/{id}', [AdminCategoryController::class, 'update'])->name('updatedm');
        Route::delete('/destroy/{id}', [AdminCategoryController::class, 'destroy'])->name('deletedm');
    });

    // User
    Route::prefix('/user')->group(function(){
        Route::get('/index', [AdminUserController::class, 'index'])->name('indexnv');
        Route::get('/create', [AdminUserController::class, 'create'])->name('createnv');
        Route::post('/store', [AdminUserController::class, 'store'])->name('storenv');
        Route::get('/show/{id}', [AdminUserController::class, 'show'])->name('shownv');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('editnv');
        Route::put('/update/{id}', [AdminUserController::class, 'update'])->name('updatenv');
        Route::delete('/destroy/{id}', [AdminUserController::class, 'destroy'])->name('deletenv');
    });

});
