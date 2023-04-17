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
        $products = productsModel::limit(8)->get();
        $productsale = DB::table('product')->where('PromotionPrice', '<>', 0)->limit(8)->get();
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
        $product = DB::table('product')
        ->join('imageproduct', 'Product.id', '=', 'imageproduct.ProID')
        ->select('product.*', 'imageproduct.*')
        ->where('imageproduct.ProID', $request->id)
        ->get();
        dd($product);
        // $product = productsModel::where('id', $request->id)->first();
        // $product = productsModel::with('image')->get();
        // echo($product);
        // $sp_tuongtu = productsModel::where('CateID', $product->CateID)->paginate(8);
        // $sp_tuongtu = null;
        // return view('ChiTietSanPham', compact('product', 'sp_tuongtu'));
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
