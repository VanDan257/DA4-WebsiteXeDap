@extends('layout.layout')


<link rel="stylesheet" href="/Assets/css/GioHang.css">


@section('content')


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                @if ($message = Session::get('success'))
                    <div class="p-4 mb-3 bg-green-400 text-success rounded">
                        <p class="text-green-800">{{ $message }}</p>
                    </div>
                @endif
                <table id="table-cart" class="table table-striped table-bordered text-center mb-0 display">
                    <thead class="bg-gray-200 text-dark">
                        <tr>
                            {{-- <th>STT</th> --}}
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($cartItems as $item)
                        <tr>
                            <td class="align-middle"> 
                                <img src="/FileUpLoad/images/{{ $item->attributes->image }}" alt="" style="width: 50px;"> 
                                {{ $item->name }}
                            </td>
                            <td class="align-middle">
                                {{ number_format($item->price, 0, ',', '.') }}VNĐ
                            </td>
                            <td class="align-middle">
                                <form action="{{ route('cart.update') }}" method="post">

                                    <div class="input-group quantity mx-auto" style="width: 100px;">

                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" >
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" name="id" value="{{ $item->id}}" >
                                        <input type="text"  name="quantity" value="{{ $item->quantity }}"  class="form-control form-control-sm bg-gray-200 text-center" value="{{ $item->quantity }}">
                                        <input type="hidden" class="form-control" name="quantityUpdate" value="{{ $item->quantity }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id}}" >
                                    <button class="btn-update-cart btn btn-primary">Cập nhật</button>
                                </form>
                            </td>
                            <td class="align-middle">
                                {{ number_format($item->price * $item->quantity, 0, ',', '.') }}VNĐ
                                {{-- ${{ $item->price }} --}}
                            </td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <td class="align-middle"><button class="btn-delete-cart btn btn-sm btn-primary" data-delete="{{ $item->id }}"> <i class="fa fa-times"></i></button></td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left mr-2"></i> TIẾP TỤC MUA SẮM</a>
                
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-gray-200 border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    {{-- <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="subtotal-cart font-weight-medium">$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div> --}}
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total pay</h5>
                            <h5 class="total-cart font-weight-bold">{{ number_format($sum, 0, ',', '.') }}VNĐ</h5>
                        </div>
                        <a href="{{ route('thanhtoan') }}" class="btn-proceed-ckeckout btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


@endsection