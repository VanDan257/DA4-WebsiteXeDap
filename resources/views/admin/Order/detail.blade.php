@extends('admin.layout.layout')

@section('NamePage')
    Hoá đơn
@endsection

@section('content')
<div ng-controller="oderctrl">


    <div id="dvContainer1">
        <hr />
        <h3>Thông tin vận đơn</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="text-dark text-bold">
                    Ngày đặt
                </div>
    
                <div>
                    {{ $order->created_at }}
                </div>
            </div>

            <div class="col-md-6">

                <div class="text-dark text-bold">
                    Địa chỉ
                </div>
    
                <div>
                    {{ $order->DeliveryAddress }}
                </div>
            </div>

            <div class="col-md-6">

                <div class="text-dark text-bold">
                    Ghi chú
                </div>
    
                <div>
                    {{ $order->Note }}
                </div>
            </div>

            <div class="col-md-6">

                <div class="text-dark text-bold">
                    Số điện thoại
                </div>
    
                <div>
                    {{ $order->Phone }}
                </div>
            </div>

            <div class="col-md-6">

                <div class="text-dark text-bold">
                    Tên người nhận
                </div>
    
                <div>
                    {{ $order->Recipient }}
                </div>
            </div>

            <div class="col-md-6">

                <div class="text-dark text-bold">
                    Phương thức thanh toán
                </div>
    
                <div>
                    {{ $order->MethodPayment }}
                </div>
            </div>

            <div class="col-md-6">

                <div class="text-dark text-bold">
                    Trạng thái
                </div>
    
                <div>
                    @if ($order->Status == 'Giao hàng thành công')
                        {{$order->Status}}
                    @else
                        {{ $order->Status }}, 
                        @if ($order->Paid == 0)
                            <div>Chưa thanh toán</div> 
                        @else
                            <div>Đã thanh toán</div> 
                        @endif
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-dark text-bold">
                    Tổng tiền
                </div>

                <div>
                    {{ number_format($order->TotalPay, 0, ',', '.')}}VNĐ
                </div>
            </div>
        </div>

        <h3>Thông tin khách hàng</h3>
        <table class="table table-bordered table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>
                        Tên khách hàng
                    </th>
                    <th>
                        Số điện thoại
                    </th>
                    <th>
                        Email
                    </th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>
                        {{ $customer->CusName }}
                    </td>
                    <td>
                        {{ $customer->Phone }}
                    </td>
                    <td>
                        {{ $customer->Email }}
                    </td>
                </tr>
            </tbody>
        </table>

        <h3>Chi tiết đơn hàng</h3>
        <table class="table table-bordered table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>
                        Hình ảnh
                    </th>
                    <th>
                        Tên sản phẩm
                    </th>
                    <th>
                        Số lượng
                    </th>
                    <th>
                        Giá tiền
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>
                            <img style="width: 150px;" src="/FileUpLoad/images/{{ $item->Image }}" />
                        </td>
                        <td>
                            {{ $item->Title }}
                        </td>
                        <td>
                            {{ $item->Quantity }}
                        </td>
                        <td>
                            {{ number_format($item->Price, 0, ',', '.')}}VNĐ
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <div class="card">
        <h3>TRẠNG THÁI ĐƠN HÀNG</h3>
        <div class="navbar" style="height: 60px;">
            @if($order->Status == 'Chờ xác nhận')
                <div><i class="fa-solid fa-check"></i> Xác nhận đơn hàng</div>
                <form action="{{ route('updatedh', $order->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="Status" value="Đã xác nhận">
                    {{-- <input type="hidden" name="id" value="{{ $order->id }}"> --}}
                    <div>
                        <button ng-click="UpdateStatusOrder('Đã xác nhận')" class="btn btn-info">Xác nhận</button>
                    </div>
                </form>
            @else
                @if($order->Status == 'Đã xác nhận' || $order->Status == 'Đang giao' || $order->Status == 'Giao hàng thành công')
                    <div><i class="text-success fa-solid fa-check"></i> Xác nhận đơn hàng</div>
                @endif
            @endif
        </div>
        <!-- <hr> -->
        <div class="navbar" style="height: 60px;">
            @if ($order->Paid == 0)    
                <div>
                    <i class="fa-solid fa-check"></i>
                    Xác nhận thanh toán
                </div>
                <form action="{{ route('updatedh', $order->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="Paid" value="1">
                    {{-- <input type="hidden" name="id" value="{{ $order->id }}"> --}}
                    <div>
                        <button class="btn btn-info">Xác nhận thanh toán</button>
                    </div>
                </form>
                
            @else
                @if ($order->Status == 'Giao hàng thành công')
                    <div>
                        <i class="text-success fa-solid fa-check"></i>
                        Đã thanh toán
                    </div>
                @else
                    <div>
                        <i class="text-success fa-solid fa-check"></i>
                        Đã thanh toán
                    </div>
                    <form action="{{ route('updatedh', $order->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="Paid" value="0">
                        <div>
                            <button class="btn btn-secondary">Hoàn tiền</button>
                        </div>
                    </form>
                @endif

            @endif
        </div>
        <!-- <hr> -->
        <div class="navbar" style="height: 60px;">
            @if ($order->Status == 'Giao hàng thành công')
                <div>
                    <i class="text-success fa-solid fa-check"></i>
                    Đã giao
                </div>
            @else
                @if ($order->Status == 'Đang giao')
                    <div>
                        <i class="text-success fa-solid fa-check"></i>
                        Đang giao
                    </div>
                @else
                    <div>
                        <i class="fa-solid fa-check"></i>
                        Giao hàng
                    </div>
                    <form action="{{ route('updatedh', $order->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="Status" value="Đang giao">
                        <div>
                            <button class="btn btn-info">Đã giao cho shipper</button>
                        </div>
                    </form>
                @endif
            @endif
            
        </div>
        @if ($order->Status != 'Giao hàng thành công')
            <form action="{{ route('updatedh', $order->id) }}" method="post">
                @csrf
                <input type="hidden" name="Status" value="Giao hàng thành công">
                <div class="navbar">
                    <button class="btn btn-success">Giao hàng thành công</button>
                </div>
            </form>
        @else
            <div class="navbar">
                <div class="text-success">Giao hàng thành công</div>
            </div>
        @endif
    </div>
    <div style="margin-top: 20px">
        <a class="btn btn-primary" href="{{ URL::to('/admin/order/createPdf',$item->id) }}">Export to PDF</a>
        <a class="btn btn-dark" href="{{ route('indexdh') }}">Quay lại</a>
    </div>
</div>
@endsection