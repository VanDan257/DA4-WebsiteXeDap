@extends('admin.layout.layout')

@section('NamePage')
    Hoá đơn
@endsection

@section('content')
<table style="margin-top: 12px" class="table table-bordered table-striped" id="dataTable" ng-controller="Order">
    <thead>

        <tr>
            {{-- <th>TT</th> --}}
            <th>
                Tên người nhận
            </th>
            <th>
                Ngày đặt hàng
            </th>
            <th>
                Số điện thoại
            </th>
            <th>
                Địa chỉ giao hàng
            </th>
            <th>
                Trạng thái
            </th>
            
            {{-- <th>
                Tên khách hàng
            </th> --}}
            <th>
                Tổng tiền
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $item)
            <tr>
                <td>
                    {{$item->Recipient}}
                </td>
                <td>
                    {{$item->created_at}}
                </td>
                <td>
                    {{$item->Phone}}
                </td>
                <td>
                    {{$item->DeliveryAddress}}
                </td>
                <td>
                    {{$item->Status}}
                </td>
                {{-- <td>
                    {{$item->Note}}
                </td>
                
                <td>
                    {{$item->CusID}}
                </td> --}}
                <td>
                    {{ number_format($item->TotalPay, 0, ',', '.')}}VNĐ
                </td>
                <td>
                    
                    <a href="{{ route('editdh', $item->id)}}"><i class="text-warning fa-solid fa-pen-to-square"></i></a>
                    <a href="{{ route('showdh', $item->id)}}"><i class="fa-solid fa-circle-info"></i></a>
                    <a href="{{ route('deletedh', $item->id)}}"><i class="text-danger fa-solid fa-trash"></i></a>

                </td>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection