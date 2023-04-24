<?php

namespace App\Http\Controllers;

use App\Jobs\sendMail;
use App\Models\categoryModel;
use App\Models\orderdetailModel;
use App\Models\orderModel;
use App\Models\productsModel;
use App\Models\priceproductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;


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
    public function ThanhToanStore(Request $request){
        try{
            // dd($request->all());
            $order = orderModel::create($request -> all());
            $carts = Cart::getContent();
            $newestOrder = orderModel::latest()->first();
            // dd($newestOrder);
            foreach($carts as $cart){
                $data =[
                    'OrdID' => $newestOrder->id,
                    'ProID' => $cart->id,
                    'Quantity' => $cart ->quantity,
                    'Price' => $cart-> price * $cart -> quantity,
                ];
                // dd($data);
                orderdetailModel::create($data);
            }
            Cart::clear();
        }catch(\Exception $ex){
            $this->ThanhToan();
        }

        // Send Mail
        sendMail::dispatch($request->input('Email'))->delay(now()->addSecond(2));

        $products = productsModel::all();
        $productsale = DB::table('product')->where('PromotionPrice', '<>', 0)->limit(8)->get();
        // dd($products);
        return view('TrangChu', compact('products', 'productsale'));
    }
    public function ThanhToan(){
        $carts = Cart ::getContent();
        $subtotal = Cart::getSubTotal();
        $total = Cart::getTotal();
        return view('ThanhToan', compact('carts', 'subtotal','total'));
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
}
