<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categoryModel;
use App\Models\imageproductModel;
use App\Models\priceproductModel;
use App\Models\productsModel;
use App\Models\specificationproductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;

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
    public function store(ProductRequest $request)
    {

        // dd($request->all());

        // $file = $request->file('Image');
        // dd($file);

        $Image = "";

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $path = $file->store('FileUpLoad/images'); // Lưu trữ tệp tin trong thư mục 'uploads'
            $Image = $file->getClientOriginalName();
        } else {
            $Image = $request->input('Image');
        }

        $sp = new productsModel();
        $sp->Title = $request->input('Title');
        $sp->CateID = $request->input('CateID');
        $sp->Description = $request->input('Description');
        $sp->Image = $Image;
        $sp->Price = $request->input('Price');
        $sp->PromotionPrice = $request->input('PromotionPrice');
        // dd($sp);
        $sp->save();


        // Lấy ra sản phẩm mới nhất
        $newestProduct = productsModel::latest()->first();

        // Thêm ảnh sản phẩm vào bảng ảnh
        $image = new imageproductModel();
        $image->ProID = $newestProduct->id;
        $image->ImagePath = $request->input('Image');
        $image->Caption = 'Ảnh chính';
        $image->IsDefault = true;
        $image->SortOrder = 1;
        // dd($image);
        $image->save();

        // Thêm giá vào bảng priceproduct
        $priceproduct = new priceproductModel();
        $priceproduct->ProID = $newestProduct->id;
        $priceproduct->Price = $request->input('Price');
        $priceproduct->EndDate = '2023-07-07';
        $priceproduct->save();

        // Thêm danh sách thuộc tính sản phẩm
        $thongSo = $request->input('SpeDescription');
        $speNames = $request->input('SpeName');
        $specifications = [];

        if ($thongSo != null) {
            foreach ($thongSo as $key => $val) {
                $specifications[] = [
                    'ProID' => $newestProduct->id,
                    'SpeName' => $speNames[$key],
                    'Description' => $val
                ];
            }

            specificationproductModel::insert($specifications);
        }


        return redirect()->route('indexsp')->with('thongbao', 'Thêm sản phẩm thành công!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = productsModel::where('id', $id)->first();
        $specifications = DB::table('product')
            ->join('specifications', 'product.id', '=', 'specifications.ProID')
            ->select('specifications.*')
            ->where('specifications.ProID', $id)
            ->get();
        $imageproducts = DB::table('product')
            ->join('imageproduct', 'product.id', '=', 'imageproduct.ProID')
            ->select('imageproduct.*')
            ->where('imageproduct.ProID', $id)
            ->get();
        // dd($specifications);
        return view('admin.product.detail', compact('product', 'specifications', 'imageproducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $product = DB::table('product')
            ->join('category', 'product.cateid', '=', 'category.id')
            ->select('product.*', 'category.*')
            ->where('product.id', $id)
            ->first();
        // dd($product);
        $specifications = DB::table('product')
            ->join('specifications', 'product.id', '=', 'specifications.ProID')
            ->select('specifications.*')
            ->where('specifications.ProID', $id)
            ->get();
        $imageproducts = DB::table('product')
            ->join('imageproduct', 'product.id', '=', 'imageproduct.ProID')
            ->select('imageproduct.*')
            ->where('imageproduct.ProID', $id)
            ->get();
        return view('admin.product.update', compact('product', 'specifications', 'imageproducts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Xoá tất cả thông số kỹ thuật của sản phẩm
        $spe = specificationproductModel::where('ProID', $id)->first();
        if ($spe != null) {
            $spe->delete();
        }

        // Thêm danh sách thông số sản phẩm
        $thongSo = $request->input('SpeDescription');
        $speNames = $request->input('SpeName');
        $specifications = [];

        foreach ($thongSo as $key => $val) {
            $specifications[] = [
                'ProID' => $id,
                'SpeName' => $speNames[$key],
                'Description' => $val
            ];
        }
        // dd($specifications);

        specificationproductModel::insert($specifications);

        productsModel::find($id)->update([
            'Title' => $request->input('Title'),
            'CateID' => $request->input('CateID'),
            'Description' => $request->input('Description'),
            'Price' => $request->input('Price'),
            'PromotionPrice' => $request->input('PromotionPrice')
        ]);

        return redirect()->route('indexsp')->with('thongbao', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $image = DB::table('imageproduct')->where('ProID', $id)->delete();

        $specifications = DB::table('specifications')->where('ProID', $id)->delete();

        $product = productsModel::find($id);
        $product->delete();
        return redirect()->route('indexsp')->with('thongbao', 'Xoá sản phẩm thành công');
    }
    public function destroySpecification(string $id)
    {
        $specification = specificationproductModel::find($id);
        $specification->delete();
    }

    public function editPrice(string $id, Request $request)
    {
        $price = new priceproductModel();
        $price->ProID = $id;
        $price->Price = $request->input('Price');
        $price->save();
        return session()->put('message', 'Sửa giá sản phẩm thành công');
    }
}