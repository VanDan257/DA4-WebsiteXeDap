@extends('layout.layout')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/css/login.css">
<link rel="stylesheet" href="/css/popup.css">

@section('content')
<div class="container" style="margin: 20px auto;">
    @include('layout.navbarkhachhang')
    <div class="col-sm-9">
        {{-- @if ($orders == null)
            Bạn chưa có đơn hàng nào
        @else   --}}
        <table class="table table-borered">
            <thead>
                <tr class="bg-gray-200 text-black">
                    <td></td>
                    <th>Đơn hàng</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                </th>
            </thead>
            <tbody>
                
                @foreach ($orders as $order)    
                    <tr>
                        <td class="text-center">
                            @if ($order->Status == 'Giao hàng thành công')
                            <i class="text-success fa-solid fa-check " style="font-size: 1.4rem;"></i>
                            @else
                                @if ($order->Status == 'Đang giao')
                                    <form action="{{ route('CapNhatTrangThaiDH') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <input type="hidden" name="Status" value="Giao hàng thành công">
                                        <button style="padding: 2px; min-width: 70px" class="btn btn-info">Đã nhận được hàng</button>
                                    </form>
                                @elseif ($order->Status == 'Đã huỷ')
                                <i class="fa-solid fa-cancel" style="font-size: 1.4rem; color: red"></i>
                                @else
                                    <i class="fa-solid fa-check" style="font-size: 1.4rem;"></i>
                                    <form action="{{ route('CapNhatTrangThaiDH') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <input type="hidden" name="Status" value="Đã huỷ">
                                        <button style="padding: 2px; min-width: 70px" class="btn btn-info btn-danger">Huỷ</button>
                                    </form>
                                @endif
                            @endif
                        </td>
                        <td id="donhang{{ $index++ }}"></td>
                        <td>
                            @if ($order->Status == 'Giao hàng thành công' || $order->Status == 'Đã huỷ')
                                {{$order->Status}}
                            @else
                                {{ $order->Status }}, 
                                @if ($order->Paid == 0)
                                    <div>Chưa thanh toán</div> 
                                @else
                                    <div>Đã thanh toán</div> 
                                @endif
                            @endif    
                        </td>
                        <td>{{ $order->created_at  }}</td>
                        <td>{{ number_format($order->TotalPay, 0, ',', '.')}}VNĐ</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- @endif --}}
    </div>
</div>
</div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            @foreach ($orders as $order)
            $.ajax({
                url: "{{ route('LayCTDHTheoHD', "$order->id") }}",
                type: 'GET',
                dataType: "json",
                success: function(response) {
                    // Xử lý kết quả trả về ở đây
                    var data = response;
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html+= '<div> + ' + data[i].Title + ' - SL - ' + data[i].Quantity + ' - Giá - ' + data[i].Price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) + '</div>'
                    }
                        $('#donhang{{ $indexdh++ }}').html(html);
                }
            });
            @endforeach
        });
    </script>
@endsection