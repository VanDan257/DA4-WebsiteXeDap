<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Models\productsModel;
use App\Models\priceproductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    //
    public function TrangChu(){
        // $categories = categoryModel::all();
        $products = productsModel::all();
        $productsale = DB::table('product')->where('PromotionPrice', '<>', 0)->limit(8)->get();
        // dd($products);
        return view('TrangChu', compact('products', 'productsale'));
    }
    public function DanhMucSanPham(){
        // $products = productsModel::where(key, value)->get();
        $products = productsModel::paginate(16);

        return view('DanhMucSanPham', ['products' => $products]);
    }
    public function DanhMucLoaiSanPham($type){
        $productsbytype = productsModel::where('CateID', $type)->paginate(16);
        return view('DanhMucSanPham', ['products' => $productsbytype]);
    }
    public function ChiTietSanPham(Request $request){
        $images = DB::table('product')
        ->join('imageproduct', 'Product.id', '=', 'imageproduct.ProID')
        ->select('imageproduct.*')
        ->where('imageproduct.ProID', $request->id)
        ->get();
        $specifications = DB::table('product')
        ->join('specifications', 'Product.id', '=', 'specifications.ProID')
        ->select('specifications.*')
        ->where('specifications.ProID', $request->id)
        ->get();
        // dd($specifications);
        $product = productsModel::where('id', $request->id)->first();
        $sp_tuongtu = productsModel::where('CateID', $product->CateID)->limit(8)->get();
        return view('ChiTietSanPham', compact('product', 'sp_tuongtu', 'images', 'specifications'));
    }
    public function GioHang(){
        return view('GioHang');
    }
    public function TinTuc(){
        return view('TinTuc');
    }
    public function DangNhap(){
        return view('DangNhap');
    }
    public function ThanhToan(){
        return view('ThanhToan');
    }
}
