<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\imageproductModel;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class AdminImageProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $id)
    {
        //
        $imageproducts = imageproductModel::where('ProID', $id)->get();
        // dd($imageproducts);
        return view('admin.ImageProduct.index', compact('imageproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(string $id)
    {

        $imageproducts = imageproductModel::where('ProID', $id)->get();
        // dd($imageproducts);
        return view('admin.ImageProduct.create', compact('imageproducts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $file = $request->input('Image');
        dd($file);
        dd($request);
        // $img = new imageproductModel();
        // $img->ProID = $request->input('ProID');
        // $img->Caption = $request->input('Caption');
        // $img->ImagePath = $request->file('ImagePath');
        // $img->IsDefault = 0;
        // $img->SortOrder = $request->input('SortOrder');
        // $img->save();

        // // Lưu file vào đường dẫn mong muốn
        // $file->move('FileUpLoad/images', $file->getClientOriginalName());

        // $imageproducts = imageproductModel::where('ProID', $request->ProID)->get();
        // dd($imageproducts);
        // return view('admin.ImageProduct.index', compact('imageproducts'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
