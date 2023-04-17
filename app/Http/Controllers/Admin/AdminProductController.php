<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categoryModel;
use App\Models\imageproductModel;
use App\Models\priceproductModel;
use App\Models\productsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = DB::table('product')
            ->join('category', 'product.CateID', '=', 'category.id')
            ->select('product.*', 'category.*')
            ->get();
        $products = productsModel::all();
        $categories = categoryModel::all();
        return view('admin.product.index', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = categoryModel::all();
        
        return view('admin.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $sp = $request->all();
        $sp = new productsModel();
        $sp->Title = $request->input('Title');
        $sp->CateID = $request->input('CateID');
        $sp->Description = $request->input('Description');
        $sp->Image = $request->input('Image');
        $sp->Price = $request->input('Price');
        $sp->PromotionPrice = $request->input('PromotionPrice');
        $sp->save();

        $newestProduct = productsModel::latest()->first();
        $price = new priceproductModel();
        $price->ProID = $newestProduct->id;
        $price->Price = $request->input('Price');
        $price->StartDate = Carbon::today();
        $price->EndDate = '2023-06-06 00:00:00';
        $price->save();

        $image = new imageproductModel();
        $image->ProID = $newestProduct->id;
        $image->ImagePath = $request->input('Image');
        $image->Caption = 'Ảnh chính';
        $image->IsDefault = true;
        $image->SortOrder = 1;
        $image->save();
        
        return redirect()->route('indexsp')->with('thongbao', 'Thêm sản phẩm thành công!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = productsModel::where('id', $id)->first();
        return view('admin.product.update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        productsModel::find($id)->update([
            'Title' => $request->input('Title'),
            'CateID' => $request->input('CateID'),
            'Description' => $request->input('Description'),
            'Price' => $request->input('Price'),
            'PromotionPrice' => $request->input('PromotionPrice')]);
        return redirect()->route('indexsp')->with('thongbao', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $image = imageproductModel::where('ProID', $id)->first();
        $image->delete();

        $price = priceproductModel::where('ProID', $id)->first();
        $price->delete();

        $product = productsModel::find($id);
        $product->delete();
        return redirect()->route('indexsp')->with('thongbao', 'Xoá sản phẩm thành công');
    }
}
