@extends('admin.layout.layout')

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
                    Trạng thái
                </div>
    
                <div>
                    {{ $order->Status }}
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

            {{-- <div>
                Tên khách hàng
            </div>

            <div>
                @Html.DisplayFor(model => model.Customer.CusName)
            </div> --}}

            <div class="text-dark text-bold">
                Tổng tiền
            </div>

            <div>
                {{ number_format($order->TotalPay, 0, ',', '.')}}VNĐ
            </div>

        </div>

        {{-- <h3>Thông tin khách hàng</h3>
        <table class="table table-bordered table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>
                        Tên khách hàng
                    </th>
                    <th>
                        Địa chỉ
                    </th>
                    <th>
                        Số điện thoại
                    </th>
                    <th>
                        Email
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>
                        @Model.Customer.CusName
                    </td>
                    <td>
                        @Model.Customer.Address
                    </td>
                    <td>
                        @Model.Customer.Phone
                    </td>
                    <td>
                        @Model.Customer.Email
                    </td>
                    <td>
                        <a href="/Admin/OrderDetails/Edit?id=@Model.CusID"><i class="text-warning fa-solid fa-pen-to-square"></i></a>
                        <a href="/Admin/OrderDetails/Details?id=@Model.CusID"><i class="fa-solid fa-circle-info"></i></a>
                        <a href="/Admin/OrderDetails/Delete?id=@Model.CusID"><i class="text-danger fa-solid fa-trash"></i></a>

                    </td>
                </tr>
            </tbody>
        </table> --}}

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
        <a class="btn btn-primary" href="{{ URL::to('/admin/order/createPdf',$item->id) }}">Export to PDF</a>
        {{-- <a style="float:right;" href="{{ route('createPDF') }}" class="btn btn-primary" >Export to PDF</a> --}}
    </div>
    <p>
        <a class="btn btn-dark" href="{{ route('indexdh') }}">Quay lại</a>
    </p>
</div>
@endsection