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
use stdClass;

class HomeController extends Controller
{
    //
    public function TrangChu()
    {
        // $categories = categoryModel::all();
        $products = productsModel::all();
        $productsale = DB::table('product')->where('PromotionPrice', '<>', 0)->limit(8)->get();
        // dd($products);
        return view('TrangChu', compact('products', 'productsale'));
    }
    public function DanhMucSanPham()
    {
        // $products = productsModel::where(key, value)->get();
        $products = productsModel::paginate(16);

        return view('DanhMucSanPham', ['products' => $products]);
    }

    public function SearchDanhMucSanPham(Request $request)
    {
        // dd($request->input('Title'));
        $keyword = $request->input('Title');
        $products = productsModel::where('Title', 'REGEXP', $keyword)->paginate(16);

        // return $products;
        return view('DanhMucSanPham', compact('products'));
    }

    public function DanhMucLoaiSanPham($type)
    {
        $productsbytype = productsModel::where('CateID', $type)->paginate(16);
        return view('DanhMucSanPham', ['products' => $productsbytype]);
    }

    public function KhachHang()
    {
        $customer_id = Session::get('id');
        $customer = customerModel::find($customer_id);
        // printf($customer);
        return view('KhachHang', compact('customer'));
    }

    public function UpdateKhachHang(Request $request)
    {
        $customer_id = Session::get('id');
        // $request->validate([
        //     'CusName' => 'required|min:6',
        //     'Phone'=>  'regex:/^([0-9\s\-\+\(\)]*)$/',
        //     'Email' => 'required|email',
        //     'Password' => 'required|min:6',
        // ]);
        // dd($request->all());
        customerModel::find($customer_id)->update([
            'CusName' => $request->input('CusName'),
            'Phone' => $request->input('Phone'),
            'Email' => $request->input('Email'),
            'Address' => $request->input('Address')
        ]);
        return redirect()->back();
    }

    public function CapNhatMatKhau(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'matkhaumoi' => 'required|min:6'
        ]);
        $matkhaucu = $request->input('matkhaucu');
        $matkhaumoi = $request->input('matkhaumoi');
        $customer = customerModel::where('Password', $matkhaucu)->first();
        // dd($customer);
        if ($customer) {
            if ($customer->Password == $matkhaucu) {
                customerModel::find($customer->id)->update(['Password' => $matkhaumoi]);
            } else {
                return redirect()->back()->with('msg', 'Mật khẩu cũ không đúng');
            }
        }
        return redirect()->back()->with('msg', 'Thay đổi mật khẩu thành công');
    }

    public function QuanLyDonHang()
    {
        $customer_id = Session::get('id');
        // $order = new stdClass();
        $orders = DB::table('orderproduct')
            ->where('orderproduct.CusID', '=', $customer_id)
            ->get();
        return view('QuanLyDonHang', ['orders' => $orders, 'index' => $index = 0, 'indexdh' => $indexdh = 0]);
    }

    public function LayCTDHTheoHD($id)
    {
        $ctdh = DB::table('orderproductdetail')
            ->join('product', 'product.id', '=', 'orderproductdetail.proid')
            ->select('orderproductdetail.*', 'product.Title', 'product.Image')
            ->where('orderproductdetail.OrdID', '=', $id)
            ->get();
        return $ctdh;
    }

    public function CapNhatTrangThaiDH(Request $request)
    {
        orderModel::find($request->input('id'))->update([
            'Status' => $request->input('Status')
        ]);
        return redirect()->back();
    }

    public function ChiTietSanPham(Request $request)
    {
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

    public function ThanhToanStore(Request $request)
    {
        $request->validate([
            'Recipient' => 'required',
            'Phone' => 'required',
            'DeliveryAddress' => 'required',
            'Email' => 'email:rfc,dns'
        ]);
        try {
            // dd($request->all());
            // $customer_id = null;
            if (Session::has('id')) {
                $customer_id = Session::get('id');
            } else {
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
            $order->MethodPayment = $request->input('MethodPayment');
            $order->Paid = 0;
            $order->Status = 'Chờ xác nhận';
            $order->Note = $request->input('Note');
            $order->save();

            //  orderModel::create($request -> all());
            $carts = Cart::getContent();
            $newestOrder = orderModel::latest()->first();
            // dd($newestOrder);
            foreach ($carts as $cart) {
                $data = [
                    'OrdID' => $newestOrder->id,
                    'ProID' => $cart->id,
                    'Quantity' => $cart->quantity,
                    'Price' => $cart->price * $cart->quantity,
                ];
                // dd($data);
                orderdetailModel::create($data);

                // Send Mail
                // sendMail::dispatch($request->input('Email'))->delay(now()->addSecond(2));

            }
            Cart::clear();
        } catch (\Exception $ex) {
            $this->ThanhToan();
        }


        $products = productsModel::all();
        $productsale = DB::table('product')->where('PromotionPrice', '<>', 0)->limit(8)->get();
        // dd($products);
        return view('TrangChu', compact('products', 'productsale'));
    }
    public function ThanhToan()
    {
        $carts = Cart::getContent();
        $subtotal = Cart::getSubTotal();
        $total = Cart::getTotal();
        return view('ThanhToan', compact('carts', 'subtotal', 'total'));
    }
    public function GioHang()
    {
        return view('GioHang');
    }
    public function TinTuc()
    {
        return view('TinTuc');
    }

    public function Login()
    {
        return view('DangNhap');
    }

    public function LoginStore(LoginRequest $request)
    {
        $taikhoan = $request->input('Email');
        $matkhau = $request->input('Password');

        // $customer = new customerModel();
        $customer = customerModel::where('email', $taikhoan);
        // dd($customer->first());
        if ($customer->first() == null) {
            session()->put('message', 'Tài khoản không tồn tại');
            return redirect()->back();
            // echo 'Đăng nhập không thành công';
        }
        // dd($customer->first() == null);
        else if ($customer->first()->Password != $matkhau) {
            session()->put('message', 'Mật khẩu không chính xác');
            return redirect()->back();
        }

        // dd($customer->first()->id);

        session()->put('id', $customer->first()->id);
        session()->put('CusName', $customer->first()->CusName);

        return redirect('/');
    }

    public function Logout()
    {
        Session::forget('id');
        Session::forget('CusName');
        return view('DangNhap');
    }

    public function Register()
    {
        return view('DangKi');
    }

    public function RegisterStore(LoginRequest $request)
    {
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