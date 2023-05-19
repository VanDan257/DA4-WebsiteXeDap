<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Jobs\sendMail;
use App\Models\categoryModel;
use App\Models\orderdetailModel;
use App\Models\customerModel;
use App\Models\orderModel;
use App\Models\productsModel;
use App\Models\priceproductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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

    public function SearchDanhMucSanPham(Request $request){
        // dd($request->input('Title'));
        $keyword = $request->input('Title');
        $products = productsModel::where('Title', 'REGEXP', '/^' . $keyword)->get();
        // dd($products);
        $products = productsModel::paginate(16);

        return view('DanhMucSanPham', compact('products'));
    }

    public function DanhMucLoaiSanPham($type){
        $productsbytype = productsModel::where('CateID', $type)->paginate(16);
        return view('DanhMucSanPham', ['products' => $productsbytype]);
    }

    public function KhachHang(){
        $customer_id = Session::get('id');
        $customer = customerModel::find($customer_id);
        // printf($customer);
        return view('KhachHang', compact('customer'));
    }

    public function UpdateKhachHang(LoginRequest $request){
        $customer_id = Session::get('id');
        customerModel::find($customer_id)->update([
            'CusName' => $request->input('CusName'),
            'Phone' => $request->input('Phone'),
            'Email' => $request->input('Email'),
            'Address' => $request->input('Address')]);
        return redirect()->back();
    }

    public function CapNhatMatKhau(Request $request){
        // dd($request->all());
        $request->validate([
            'matkhaumoi' => 'required|min:6'
        ]);
        $matkhaucu = $request->input('matkhaucu');
        $matkhaumoi = $request->input('matkhaumoi');
        $customer = customerModel::where('Password', $matkhaucu)->first();
        // dd($customer);
        if($customer){
            if($customer->Password == $matkhaucu){
                customerModel::find($customer->id)->update(['Password' => $matkhaumoi]);
            }
            else{
                return redirect()->back()->with('msg', 'Mật khẩu cũ không đúng');
            }
        }
        return redirect()->back()->with('msg', 'Thay đổi mật khẩu thành công');
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
        $request->validate([
            'Recipient' => 'required',
            'Phone' => 'required',
            'DeliveryAddress' => 'required',
            'Email' => 'email:rfc,dns'
        ]);
        try{
            // dd($request->all());
            // $customer_id = null;
            if(Session::has('id')){
                $customer_id = Session::get('id');
            }
            else{
                $customer = new customerModel();
                $customer->CusName = $request->input('Recipient');
                $customer->Phone = $request->input('Phone');
                $customer->Email = $request->input('Email');
                $customer->Address = $request->input('DeliveryAddress');
                $customer->save();
            }

            $order = new orderModel();
            $order->Recipient = $request->input('Recipient');
            $order->Phone = $request->input('Phone');
            $order->DeliveryAddress = $request->input('DeliveryAddress');
            $order->CusID = $customer_id;
            $order->TotalPay = $request->input('TotalPay');
            $order->Status = $request->input('Status');
            $order->Note = $request->input('Note');
            $order->save();

            //  orderModel::create($request -> all());
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

                // Send Mail
                // sendMail::dispatch($request->input('Email'))->delay(now()->addSecond(2));

            }
            Cart::clear();
        }catch(\Exception $ex){
            $this->ThanhToan();
        }
        

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

    public function Login(){
        return view('DangNhap');
    }

    public function LoginStore(Request $request){
        $taikhoan = $request->input('Emaillg');
        $matkhau = $request->input('Passwordlg');

        // $customer = new customerModel();
        $customer = customerModel::where('email',$taikhoan);
        // dd($customer->first());
        if($customer->first() == null){
            session()->put('message', 'Tài khoản không tồn tại');
            return redirect()->back();
            // echo 'Đăng nhập không thành công';
        }
        // dd($customer->first() == null);

        else if($customer->first()->Password != $matkhau){
            session()->put('message', 'Mật khẩu không chính xác');
            return redirect()->back();
        }

        // dd($customer->first()->id);

        session()->put('id', $customer->first()->id);
        session()->put('CusName', $customer->first()->CusName);

        return redirect('/');
    }

    public function Logout(){
        Session::forget('id');
        Session::forget('CusName');
        return view('DangNhap');
    }

    public function Register(){
        return view('DangKi');
    }

    public function RegisterStore(LoginRequest $request){
        // dd($request->all());
        $data = new customerModel();
        $data->CusName = $request->input('CusName');
        $data->Email = $request->input('Email');
        $data->Phone = $request->input('Phone');
        $data->Password = $request->input('Password');

        $data->save();

        // Session::put('id', $customer_id);
        // Session::put('CusName', $customer_id->CusName);
        return redirect('/');
    }
}
