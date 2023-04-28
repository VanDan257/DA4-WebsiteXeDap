<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categoryModel;
use Exception;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = categoryModel::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // try{

            $category = new categoryModel();
            $category->CateName = $request->input('CateName');
            $category->CateParentID = $request->input('CateParentID');
            $category->save();
        // }
        // catch(Exception $ex){
        //     return redirect()->back();
        // }
        return redirect()->route('indexdm');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = categoryModel::find($id);
        $category->delete();
        return redirect()->route('indexdm')->with('thongbao', 'Xoá danh mục thành công');
    }
}
