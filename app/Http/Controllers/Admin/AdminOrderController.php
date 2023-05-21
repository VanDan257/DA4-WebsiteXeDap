<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\customerModel;
use App\Models\orderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = orderModel::all();
        // dd($orders->all());
        return view('admin.Order.index', compact('orders'));
    }

    // Generate PDF
    public function createPDF() { 
        // retreive all records from db
        $orders = orderModel::all();
        $ordersArr = $orders->toArray();
        // share data to view
        view()->share('orderproduct',$ordersArr);
        $pdf = PDF::loadView('/admin/order/detail/', $ordersArr);
        print_r($pdf);
        // download PDF file with download method
        // return $pdf->download('pdf_file.pdf');
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // dd($id);
        $order = orderModel::find($id);
        $customer = customerModel::find($order->CusID);
        $data = DB::table('orderproduct')
            ->join('orderproductdetail', 'orderproduct.id', '=', 'orderproductdetail.ordid')
            ->join('product', 'product.id', '=', 'orderproductdetail.proid')
            ->select('orderproductdetail.*', 'product.*')
            ->where('orderproductdetail.ordid', '=', $id)
            ->get();
        return view('admin.Order.detail', compact('order', 'data', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, string $id)
    {
        //
        $status = $request->input('Status');
        $paid = $request->input('Paid');

        if(isset($status)){
            orderModel::find($id)->update([
                'Status' => $status
            ]);
        }
        else if(isset($paid)){
            orderModel::find($id)->update([
                'Paid' => $paid
            ]);
        }
        return redirect()->back();
    }
}
