@extends('layout.layout')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/css/login.css">
<link rel="stylesheet" href="/css/popup.css">

@section('content')
<div class="container" style="margin: 20px auto;">
    @include('layout.navbarkhachhang')
    <div class="col-sm-9">
        <table class="table table-borered">
            <thead>
                <tr class="bg-gray-200 text-black">
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Trạng thái</th>
                </th>
            </thead>
            <tbody>
                @foreach ($orders as $order)    
                    <tr>
                        <td><img style="width: 150px;" src="/FileUpLoad/images/{{ $order->Image }}" alt=""></td>
                        <td>{{ $order->Title }}</td>
                        <td>{{ $order->Price }}</td>
                        <td>{{ $order->Status  }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection